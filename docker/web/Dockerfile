FROM php:7.1-apache

# Install PHP extensions
RUN apt-get update && apt-get install -y \
      libicu-dev \
      libpq-dev \
      libmcrypt-dev \
      libsqlite3-dev \
    && rm -r /var/lib/apt/lists/*

RUN docker-php-ext-install \
      intl \
      mbstring \
      mcrypt \
      pcntl \
      pdo_mysql \
      pdo_sqlite \
      zip \
      opcache

# Put apache config for Laravel
COPY apache2-laravel.conf /etc/apache2/sites-available/laravel.conf
RUN a2dissite 000-default.conf && a2ensite laravel.conf && a2enmod rewrite

# Change uid and gid of apache to docker user uid/gid
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

VOLUME /var/www/html
WORKDIR /var/www/html
