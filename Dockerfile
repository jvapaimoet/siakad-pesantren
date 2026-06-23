FROM php:8.2-fpm-alpine

# Instal ekstensi yang dibutuhkan Laravel & koneksi database
RUN apk add --no-cache nginx wget supervisor bzip2-dev freetype-dev libjpeg-turbo-dev libpng-dev libwebp-dev libxpm-dev libzip-dev
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql zip bcmath gd

# Instal Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
COPY . .

# Instal dependensi Laravel
RUN composer install --no-dev --optimize-autoloader

# Atur izin folder
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Konfigurasi Nginx & Server Ports
EXPOSE 80
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]