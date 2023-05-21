FROM php:8.1-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install

RUN chgrp -R www-data storage bootstrap/cache

RUN chmod -R ug+rwx storage bootstrap/cache
