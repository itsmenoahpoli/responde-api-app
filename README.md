## GO RESPONDE APP (Back-end Server)

```bash

-   Laravel 8.83.11
-   MySQL
-   PHP 7.2 - 8.0
```

#### Installation Guide

```bash
git clone https://github.com/itsmenoahpoli/responde-api-app

cd responde-api-app

composer install

php artisan migrate

php artisan db:seed

php artisan serve
```

After completing the commands above, proceed to open your browser then go to `http://localhost:8000/doc` to view the API documentation powered by laravel-scribe

To download the postman collection file, go to `public/docs/collection.json`
