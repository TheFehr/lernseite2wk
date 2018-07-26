FROM linuxconfig/lemp
EXPOSE 80
LABEL maintainer="Lukas Bischof"
LABEL version="1.0"
LABEL description="Orsum Ichnographiae Docker Image"

ENV MYSQL_ROOT_PASSWORD=admin
ENV MYSQL_ALLOW_EMPTY_PASSWORD=false
ENV FCGI_USER=root
ENV FCGI_GROUP=root

COPY --chown=root:www-data ./ /var/www
COPY ./docker/nginx.conf /etc/nginx/sites-enabled/default
COPY ./docker/entrypoint.sh /docker-entrypoint.sh

RUN /bin/bash -c "apt-get update && apt-get upgrade"
RUN /bin/bash -c "yes | apt-get install nginx spawn-fcgi fcgiwrap build-essential && cpan JSON"
ENTRYPOINT [ "/docker-entrypoint.sh" ]
