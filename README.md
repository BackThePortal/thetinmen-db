# TheTinMen Database

This repository contains the source code for the database for a collection of TheTinMen posts. It uses Laravel 11.

For some posts, other useful data is also stored.

The database was created with community collaboration in mind. For this reason, a public API is provided with
unrestricted read access, with no token or user login required. Write access is limited&mdash;see the API section for more information.

## Requisites

- WSL2 (if you're on Windows)
- PHP 8.2
- Composer
- Docker


## Setup
It is assumed that you have set up the alias for `sail`.

1. Clone the repository and navigate to the project directory.

    `git clone https://github.com/BackThePortal/thetinmen-db.git && cd thetinmen-db`

2. Create the `.env` file using `.env.example`.

    `cp .env.example .env`

3. Install dependencies.

    `composer install`

4. Install Sail and run it.

    `php artisan sail:install && sail up -d`

5. Generate application key.

    `sail artisan key:generate`

6. Reset database and run seeders

    `sail php artisan migrate:fresh --seed`


## Commands

- Run remaining migrations

  `sail php artisan migrate`

### Development macros

- Create model and its migration.

  `sail php artisan make:model Name -m`

- Create API resource controller from model.

    `sail php artisan make:controller NameController --api --model=Name`

### Authentication

- Generate API token for user

    `sail artisan user:create-token [email|id]`

### Documentation

- Generate API documentation

  `sail php artisan scribe:generate`

## API

API documentation is automatically generated using Scribe with the Scalar theme. It is available [here]().
