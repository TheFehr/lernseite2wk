FROM nginx:stable-alpine
EXPOSE 80
LABEL maintainer="Lukas Bischof"
LABEL version="1.0"
LABEL description="Orsum Ichnographiae Docker Image"

COPY --chown=root:nginx ./src /var/www
COPY ./docker/nginx.conf /etc/nginx/conf.d/default.conf

RUN apk update && apk add spawn-fcgi fcgiwrap perl perl-dbi perl-cgi perl-dbd-mysql perl-json
RUN chmod +x /var/www/ajaxResponder.pl /var/www/detailsResponder.pl

WORKDIR /var/www

CMD spawn-fcgi -U nginx -s /run/fcgi.sock /usr/bin/fcgiwrap && \
    nginx -g 'daemon off;'