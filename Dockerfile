# Use a imagem oficial do PHP com Apache
FROM php:8.3.2-apache

# Instale as dependências necessárias
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        unzip \
        libpq-dev \
        && docker-php-ext-install zip pdo_mysql pdo_pgsql

# Configurar o Apache
RUN a2enmod rewrite

# Copiar arquivos do aplicativo para o contêiner
COPY . /var/www/html/

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar dependências do Composer
RUN composer install --no-interaction --optimize-autoloader

# Atualizar as permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copiar o arquivo de configuração do VirtualHost
COPY apache/laravel.conf /etc/apache2/sites-available/laravel.conf

# Ativar o VirtualHost
RUN a2ensite laravel.conf


# Expor a porta 80
EXPOSE 80

# Comando para iniciar o servidor Apache
CMD ["apache2ctl", "-D", "FOREGROUND"]
