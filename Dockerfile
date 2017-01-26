FROM php:5.4-apache

ENV phpmemory_limit 256M
ENV upload_max_filesize 50M
ENV post_max_size 50M

ADD . /var/www/html

RUN a2enmod rewrite

RUN apt-get update && \
    apt-get install -y \
    zlib1g-dev && \
    docker-php-ext-install pdo pdo_mysql zip && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install --no-dev --no-interaction --no-progress --no-plugins --no-scripts --optimize-autoloader

EXPOSE 80

CMD ["apache2-foreground"]
