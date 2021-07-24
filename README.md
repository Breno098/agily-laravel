# API Agily

Este é um aplicativo feito para Agily com a intenção de consumir e disponibilizar dados e uma API.

## Instalação

### Clonando e instalando dependências

Clone o repositório

    git clone https://github.com/Breno098/agily-laravel.git

Navegue até a pasta do projeto:

    cd .\agily-larave

Faça a instalação das dependencias PHP com o comando:

    composer install

### Comandos para execução e construção

Copie o arquivo env de exemplo e faça as alterações de configuração necessárias no arquivo .env

    cp .env.example .env

Gerar uma nova chave de aplicativo

    php artisan key:generate

Execute as migrações do banco de dados (defina a conexão do banco de dados em .env antes de migrar)

    php artisan migrate

Inicie o servidor de desenvolvimento local

    php artisan serve

Agora você pode acessar o servidor em http: // localhost: 8000

## Populando banco de dados

Preencha os dados para das tabelas timelogs, users, components e issues.Execute o comando:

    php artisan db:seed

## Visão geral do código

### Pastas

- `app` - Contém todos os modelos Eloquent
- `app` - Contains all the Eloquent models
- `app/Http/Controllers` - Contém todos os controladores da aplicação
- `app/Models` - Contém todos os modelos/entidades da aplicação
- `config` - Contém todos os arquivos de configuração do aplicativo
- `database/migrations` - Contém todas as migrações de banco de dados
- `database/seeds` - Contém o semeador de banco de dados
- `routes/view` - Contém todas as views da aplicação
- `routes` - Contém todas as rotas api definidas no arquivo api.php

### Variáveis de ambiente

- `.env` - As variáveis ​​de ambiente podem ser definidas neste arquivo

### API para uso local e testes

Execute o servidor de desenvolvimento laravel:

    php artisan serve

A API agora pode ser acessada em:

    http://localhost:8000/api