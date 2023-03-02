FROM php:8.1-fpm-alpine

RUN apk add --no-cache \
        libzip-dev

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/bin \
    && php -r "unlink('composer-setup.php');" \
    && mv /usr/bin/composer.phar /usr/bin/composer \
    && docker-php-ext-configure pdo_mysql \
    && docker-php-ext-install pdo_mysql zip

