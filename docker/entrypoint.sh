#!/bin/sh
set -e

# Render asigna el puerto en $PORT; Apache escucha en 80 por defecto
if [ -n "$PORT" ]; then
    sed -ri "s/Listen 80$/Listen ${PORT}/" /etc/apache2/ports.conf
    sed -ri "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf
fi

# Espera a que PostgreSQL acepte conexiones antes de migrar
until php -r "new PDO('pgsql:host='.getenv('DB_HOST').';port='.(getenv('DB_PORT') ?: 5432).';dbname='.getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'));" >/dev/null 2>&1; do
    echo "Esperando a la base de datos..."
    sleep 2
done

php artisan package:discover --ansi || true
php artisan migrate --force
php artisan config:cache
php artisan route:cache

exec "$@"
