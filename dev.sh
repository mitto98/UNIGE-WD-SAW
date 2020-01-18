#!/bin/bash

if [ ! -f ".env" ]; then
    cp .env.example .env
    php artisan key:generate
fi

docker-compose -f docker-compose.dev.yml up -d
php artisan serve
