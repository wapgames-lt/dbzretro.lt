FROM php:8.4-apache

RUN apt-get update && apt-get install -y libzip-dev
RUN apt-get update && apt-get install -y git
RUN docker-php-ext-install zip mysqli pdo pdo_mysql

COPY php.ini /usr/local/etc/php/conf.d/php.ini

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html
