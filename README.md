# TheTinMen Database

## Commands

- Reset database

    `sail php artisan migrate:fresh --seed`

- Create model and its migration.

    `sail php artisan make:model ModelName -m`
- Run remaining migrations

    `sail php artisan migrate`

- Generate documentation

    `sail php artisan scribe:generate`
