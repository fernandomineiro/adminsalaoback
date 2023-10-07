# Use an official PHP runtime as a parent image
FROM php:6.0-apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && docker-php-ext-install pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Clone your Laravel application from GitHub or copy from your local system to the container
# If you have your Laravel application in a local directory, you can use the following command:
# COPY /path/to/your/laravel/app /var/www/html

# Install Laravel dependencies and set permissions
RUN composer install --no-dev

# Generate Laravel application key
RUN php artisan key:generate

# Set the appropriate permissions
RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache

# Expose port 80 and start Apache server
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]