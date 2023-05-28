FROM php:8.1-apache

RUN apt-get update

RUN apt-get install libpq-dev -y

RUN docker-php-ext-install pdo_pgsql

RUN /usr/sbin/a2enmod rewrite

#   Local file -> Docker file
COPY default.conf /etc/apache2/sites-available/000-default.conf

RUN chmod -R 765 /var/www/html