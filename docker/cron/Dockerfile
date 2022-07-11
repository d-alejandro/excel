FROM php:8.0.6-fpm

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y  \
    cron  \
    libmemcached-dev \
    libz-dev \
    libpq-dev \
    libjpeg-dev \
    libpng-dev \
    libwebp-dev \
    libfreetype6-dev \
    libssl-dev \
    libmcrypt-dev \
    libzip-dev \
    zlib1g-dev && \
    docker-php-ext-install zip && \
    docker-php-ext-install sockets && \
    docker-php-ext-install pdo mysqli pdo_mysql

COPY ./crontab /etc/cron.d/crontab

RUN crontab /etc/cron.d/crontab

RUN touch /var/log/cron.log

CMD ["cron", "-f"]
