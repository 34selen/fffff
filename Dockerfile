FROM alpine:edge

# Setup user
RUN adduser -D -u 1000 -g 1000 -s /bin/sh www

RUN apk add --no-cache --update supervisor nginx build-base openssl-dev

RUN apk add --no-cache --update php7-fpm php7-phar php7-fileinfo php7-soap php7-json php7-dev php7-session

COPY config/fpm.conf /etc/php7/php-fpm.d/www.conf
COPY config/supervisord.conf /etc/supervisord.conf
COPY config/nginx.conf /etc/nginx/nginx.conf

COPY src/index.php /www/index.php
COPY src /app

RUN mkdir /www/uploads
RUN chown -R www:www /www/uploads /var/lib/nginx

EXPOSE 80

COPY --chown=root entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
