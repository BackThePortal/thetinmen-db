# TheTinMen Database

This repository contains the source code for the database for a collection of TheTinMen posts. It uses Laravel 11.

For some posts, other useful data is also stored.

The database was created with community collaboration in mind. For this reason, a public API is provided with
unrestricted read access, with no token or user login required. Write access is limited&mdash;see the API section for more information.

## Commands

### Setup
- Reset database and run seeders

  `sail php artisan migrate:fresh --seed`

- Run remaining migrations

  `sail php artisan migrate`

### Development macros

- Create model and its migration.

  `sail php artisan make:model ModelName -m`

### Documentation

- Generate API documentation

  `sail php artisan scribe:generate`

## API

API documentation is automatically generated using Scribe with the Scalar theme. It is available [here]().
