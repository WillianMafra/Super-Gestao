# Instruções para executar usando Laravel Sail


## Pré-requisitos

Antes de começar, certifique-se de ter o seguinte instalado em seu sistema:

- Docker
- Docker Compose
- Git

## Configuração inicial

1. Clone este repositório

```bash
git clone https://github.com/WillianMafra/Super-Gestao.git
```

2. Acesse o diretório do projeto.

``` bash
cd app_super_gestao
```

3. Instale as dependências do Composer.

```docker
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs

```

5. Gere uma chave de aplicativo.

```bash
php artisan key:generate
```

## Usando Laravel Sail

0. Crie um alias para facilitar o uso do sail
```bash
    alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

1. Inicialize o ambiente Sail.

```bash
sail up -d
```

2. Acesse o container da aplicação.

```bash
sail shell
```

3. Execute as migrações do banco de dados.

```bash
sail php artisan migrate
```

## Acessando a aplicação

Após seguir as etapas acima, sua aplicação Laravel deve estar em execução e acessível através do navegador da web no seguinte endereço:

```
http://localhost
```

## Encerrando o ambiente Sail

Para parar o ambiente Sail, execute o seguinte comando no diretório do projeto:

```bash
sail down
```

---
