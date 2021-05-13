FROM wyveo/nginx-php-fpm:php74

MAINTAINER dev@gmail.com

RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin \
    --filename=composer \
    --version=2.0.9

CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000