# Use a imagem oficial do PHP com Apache
FROM php:latest

# Instale as dependências necessárias
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        unzip \
        libpq-dev \
        && docker-php-ext-install zip pdo_mysql pdo_pgsql

# Defina o diretório de trabalho dentro do contêiner
WORKDIR /var/www/html
# Copiar arquivos do aplicativo para o contêiner
COPY . /var/www/html/

# Copie apenas o arquivo composer.json e o arquivo composer.lock
COPY composer.json composer.lock ./

# Instalar o Composer como usuário não-root
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quiet

# Instalar dependências do Composer
RUN composer install --no-interaction --optimize-autoloader

# Atualizar as permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Limpar pacotes temporários
RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

