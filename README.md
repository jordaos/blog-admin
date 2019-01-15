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

- Criar migrate em uma tabela específica
```sh
php artisan make:migration add_user_id_table_articles --table=articles
```

- Fazer migrate e persistir os Seeders
```sh
php artisan migrate:fresh --seed
```

- Traduzir assets para pt-BR
https://github.com/lucascudo/laravel-5.7-pt-BR-localization

