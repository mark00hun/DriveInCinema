FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    && docker-php-ext-install pdo pdo_mysql gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

CMD ["php-fpm"]
