# Blog Admin

Este projeto utiliza Laravel 5.7 e VueJS. Projeto pessoal para se estudar ambas as tecnologias.

## How To

- Criar controller com métodos de CRUD:
```sh
php artisan make:controller Admin/ArticlesController --resource
```

- Criar um Seed
```sh
php artisan make:seeder UserTableSeeder
```

- Fazer migrate e persistir os Seeders
```sh
php artisan migrate:fresh --seed
```

- Traduzir assets para pt-BR
https://github.com/lucascudo/laravel-5.7-pt-BR-localization

