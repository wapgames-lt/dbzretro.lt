FROM php:5.6-apache

RUN docker-php-ext-install mysql pdo_mysql

COPY php.ini /usr/local/etc/php/conf.d/php.ini

RUN curl -sS https://getcomposer.org/installer \
        | php -- --install-dir=/usr/local/bin \
        && mv /usr/local/bin/composer.phar /usr/local/bin/composer

WORKDIR /var/www/html
