# DPS1

https://github.com/gmsantos/projeto-dps

Alunos:

    Daniel Constantino RA: 580996
    Gabriel Machado RA: 581062
    Leandro dos Santos - RA 580970
    Elivelton Andreati Sorato – RA 545015

## How to use

1. Install Docker in your host machine. Follow [docker documentation](https://docs.docker.com/engine/installation/) and don't forget the [optional steps](https://docs.docker.com/engine/installation/linux/linux-postinstall/) if running on Linux.
1. If you are running on Windows, make sure your [system met the minimum requirements](https://docs.docker.com/docker-for-windows/install/#what-to-know-before-you-install).
1. Run `docker-compose pull` to download container images
1. Execute `docker-compose run php composer install` to download dependencies files.
1. Copy the content of .env.example to .env to setup database configurations.
1. Run `docker-compose run php artisan key:generate` on the first time to create criptography keys. 
1. Initialize database with `docker-compose run php artisan migrate:refresh --seed`.
1. Launch with `docker-compose up web` and open your browser.
1. The default address is `http://localhost:8080` but this can be changed in `docker-compose.yml`.
1. There are two pre-cadastred users: `joao` and `juca`, with the credentials:

    email: joao@ufscar.br password: senha123,
    email: juca@ufscar.br password: senha321

## Important notes

This project is powered by [Laravel Framework 5.4](https://laravel.com/).

PHP container entrypoint is set to `php`, making easy to run php scripts (e.g: `docker-compose run php artisan`).

Database is populated with random values acording to definitions in `database/factories` and `database/seeds`.

All application code is inside `app` folder, separeted by namespaces.

Project views are in `resources/views` folder.
