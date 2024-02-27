# Instruções para executar o Super Gestão

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
    cd Super-Gestao
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
4. Crie um alias para facilitar o uso do sail.

```bash
    alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

5. Inicialize o ambiente dokcer utilizando o Sail.

```bash
    sail up -d
```

6. Renomeie o arquivo .env copy para .env.

```bash
    mv '.env copy' .env
```

7. Acesse o container da aplicação.

```bash
    sail shell
```
8. Gere uma chave de aplicativo.
   
```bash
    php artisan key:generate
```

9. Execute as migrações do banco de dados.
    
```bash
    php artisan migrate --seed
```

## Acessando a aplicação

Após seguir as etapas acima, o app Super Gestão deve estar em execução e acessível através do navegador da web no seguinte endereço:

```
http://localhost
```

## Encerrando o ambiente Sail

Para parar o ambiente Sail, saia do shell da aplicação digitando 

```bash
    exit
```
e execute o seguinte comando no diretório do projeto:

```bash
sail down
```

---
