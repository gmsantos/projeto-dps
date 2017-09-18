FROM php:7.1

# Install PHP extensions
RUN apt-get update && apt-get install -y \
      libicu-dev \
      libpq-dev \
      libmcrypt-dev \
      libsqlite3-dev \
    && rm -r /var/lib/apt/lists/* \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-install \
      intl \
      mbstring \
      mcrypt \
      pcntl \
      pdo_mysql \
      pdo_sqlite \
      zip \
      opcache

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

VOLUME /var/www/html
WORKDIR /var/www/html

#COPY docker-php-entrypoint /usr/local/bin
#ENTRYPOINT [ "docker-php-entrypoint" ]
