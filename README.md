# Projeto Pokémon

Este projeto é uma aplicação que permite visualizar uma lista de Pokémons, filtrar por nome e acessar detalhes de cada Pokémon. A aplicação é dividida em duas partes: **Frontend** (Vue.js) e **Backend** (Laravel).


## Pré-requisitos

Antes de começar, verifique se você possui as seguintes ferramentas instaladas:

- [Node.js](https://nodejs.org/) (versão 20 ou superior)
- [Composer](https://getcomposer.org/) (para o Laravel)
- [PHP](https://www.php.net/) (versão 8.3 ou superior)

## Configuração do Backend

1. Navegue até a pasta do backend:
    
    ```bash
    cd backend
    
2. Instale as dependências do Laravel usando o Composer:

    ```bash
    composer install

3. Crie um arquivo .env a partir do arquivo de exemplo:

    ```bash
    cp .env.example .env

4. Gere a chave do Laravel:

    ```bash
    php artisan key:generate

5. Inicie o servidor do Laravel:

    ```bash
    php artisan serve

## Configuração do Frontend

1. Navegue até a pasta do frontend:

    ```bash
    cd frontend

2. Instale as dependências do Vue.js usando o npm:

    ```bash
    npm install

3. Inicie o servidor de desenvolvimento:

    ```bash
    npm run dev

## Como Usar

1. Acesse o frontend em http://localhost:3000.
2. Utilize o filtro para buscar Pokémons pelo nome.
3. Clique em "Ver detalhes" para visualizar informações adicionais sobre cada Pokémon.