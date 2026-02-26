FROM php:8.4-fpm


RUN apt-get update && apt-get install -y \
git curl zip unzip libpng-dev libonig-dev libxml2-dev \
default-mysql-client nodejs npm


RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


WORKDIR /var/www/html
COPY . .


RUN composer install


RUN chown -R www-data:www-data /var/www/html


EXPOSE 9000
CMD ["php-fpm"]

