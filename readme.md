# DPS2

https://github.com/gmsantos/projeto-dps

Alunos:

    Daniel Constantino RA: 580996
    Gabriel Machado RA: 581062
    Leandro dos Santos - RA 580970
    Thiago Abdre - RA 579947

## How to use

1. Install Docker in your host machine. Follow [docker documentation](https://docs.docker.com/engine/installation/) and don't forget the [optional steps](https://docs.docker.com/engine/installation/linux/linux-postinstall/) if running on Linux.
1. If you are running on Windows, make sure your [system met the minimum requirements](https://docs.docker.com/docker-for-windows/install/#what-to-know-before-you-install).
1. Run `docker-compose up -d web` to download container images and build the custom ones
1. Execute `docker-compose exec web composer install` to download dependencies files.
1. Copy the content of .env.example to .env to setup project enviroment configurations (defaults to docker).
1. Run `docker-compose exec web php artisan key:generate` on the first time to create criptography keys.
1. Initialize database with `docker-compose exec web php artisan migrate:refresh --seed`.
1. The default address is `http://localhost:8080` but this can be changed in `docker-compose.yml`.
1. There are a pre-cadastred admin named `joao`, with the credentials:

    email: joao@ufscar.br password: senha123

## Important notes

This project is powered by [Laravel Framework 5.4](https://laravel.com/).

Database is populated with random values acording to definitions in `database/factories` and `database/seeds`.

All application code is inside `app` folder, separeted by namespaces.

Project views are in `resources/views` folder.
