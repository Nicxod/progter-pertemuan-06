#!/bin/sh
set -e

touch /var/www/html/database/database.sqlite
chmod 666 /var/www/html/database/database.sqlite
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

php artisan migrate --force

exec "$@"
