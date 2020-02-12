FROM mitto98/simple-laravel:latest

VOLUME storage
RUN chown www-data:www-data -R storage
