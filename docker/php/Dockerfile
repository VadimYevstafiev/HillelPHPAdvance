FROM php:8.1-apache
#COPY . /var/www/html
#WORKDIR /var/www/html

RUN apt-get update

RUN apt-get upgrade -y

#RUN apt get install -y git

RUN apt-get install libpq-dev -y

RUN docker-php-ext-install pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN /usr/sbin/a2enmod rewrite

#   Local file -> Docker file
COPY default.conf /etc/apache2/sites-available/000-default.conf

RUN chmod -R 765 /var/www/html