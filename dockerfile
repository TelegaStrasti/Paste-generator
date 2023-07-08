FROM westside072/php-fpm:8.1.2

ENV APP_PORT=8000
ENV FPM_PORT=9000

ADD ./docker/container/php.ini /etc/php/8.1/fpm/php.ini
ADD ./docker/container/php.ini /etc/php/8.1/cli/php.ini
ADD ./docker/container/www.conf /etc/php/8.1/fpm/pool.d/www.conf
ADD ./www/laravel /home/app

WORKDIR /home/app

# Install nginx, add the cron job, set permissions, get dependencies
RUN apt update && apt install -y nginx && \
    crontab -l | { cat; echo "* * * * * cd /home/app && php artisan schedule:run >> /dev/null 2>&1"; } | crontab -  >> /dev/null && \
    chmod -R o+w storage bootstrap/cache && \
    composer install --optimize-autoloader --no-dev

ADD ./docker/container/nginx.conf /etc/nginx/sites-enabled/default

# Start cron and app
CMD bash ./run.sh && \
    /usr/sbin/php-fpm$PHP_VERSION -R && \
    service cron start && \
    nginx -g 'daemon off;'

