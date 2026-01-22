#!/bin/sh

# Fix permissions for mounted volumes
chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage
chmod -R 775 /var/www/html/bootstrap/cache

# Start PHP-FPM and Nginx
php-fpm -D && nginx -g 'daemon off;'
