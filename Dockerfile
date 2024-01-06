FROM php:apache

#COPY src /var/www/html/src
#COPY index.php /var/www/html/
COPY Controllers /var/www/html/
COPY mainPageTemp /var/www/html/
COPY Models /var/www/html/
COPY Views /var/www/html/
COPY test2.php /var/www/html/
COPY test.php /var/www/html/


RUN docker-php-ext-install pdo pdo_mysql &&\
    apt-get update && apt-get upgrade -y &&\
    pecl install xdebug &&\
    docker-php-ext-enable xdebug

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip

RUN docker-php-ext-install zip
RUN docker-php-ext-install mysqli



