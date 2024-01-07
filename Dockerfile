FROM php:apache

COPY Controllers /var/www/html/
COPY mainPageTemp /var/www/html/
COPY Models /var/www/html/
COPY Views /var/www/html/
COPY test.php /var/www/html/
COPY farmTest.php /var/www/html
COPY cropTest.php /var/www/html
COPY fieldTest.php /var/www/html
COPY weatherAPITest.php /var/www/html


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



