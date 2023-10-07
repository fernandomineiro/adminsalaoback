FROM php:7.0
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN mkdir -p /home/winpc/test/laravelApp/app
WORKDIR /home/winpc/test/laravelApp/app

COPY composer.json /home/winpc/test/laravelApp/app
RUN composer install

COPY . /home/winpc/test/laravelApp/app

CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181