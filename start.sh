#!/bin/bash
docker compose up -d 
docker compose exec app php artisan migrate
docker compose exec app ls -ld /tmp
docker compose exec app chmod 1777 /tmp
docker compose exec app chown -R www-data:www-data storage bootstrap/cache
docker compose exec app chmod -R 775 storage bootstrap/cache
docker compose exec app php artisan view:clear
docker compose exec app php artisan cache:clear

