FROM php:8.0.6-fpm

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y cron

COPY ./crontab /etc/cron.d/crontab

RUN crontab /etc/cron.d/crontab

RUN touch /var/log/cron.log

CMD ["cron", "-f"]
