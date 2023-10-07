FROM php:7.0
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN mkdir -p /home/winpc/test/laravelApp/app
WORKDIR /home/winpc/test/laravelApp/app
RUN curl -sS https://getcomposer.org/installer | \
            php -- --install-dir=/usr/bin/ --filename=composer

RUN "rm -r vendor/ && rm composer.lock && composer install --no-cache"
EXPOSE 80
EXPOSE 22
CMD "php artisan serve --host 0.0.0.0 --port 80"