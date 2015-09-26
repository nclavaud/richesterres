FROM php:5.6

COPY docker/php.ini /usr/local/etc/php/
RUN docker-php-ext-install mbstring bcmath

VOLUME /var/www
WORKDIR /var/www

ENTRYPOINT ["/var/www/run"]
