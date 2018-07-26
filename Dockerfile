FROM linuxconfig/lemp
EXPOSE 80

ENV MYSQL_ROOT_PASSWORD=admin
ENV MYSQL_ALLOW_EMPTY_PASSWORD=true
ENV MYSQL_RANDOM_ROOT_PASSWORD=random
ENV FCGI_USER=root
ENV FCGI_GROUP=root

COPY ./ /var/www
COPY ./docker/nginx.conf /etc/nginx/sites-enabled/default
COPY ./docker/entrypoint.sh /docker-entrypoint.sh

RUN /bin/bash -c "apt-get update && apt-get upgrade"
RUN /bin/bash -c "yes | apt-get install nginx spawn-fcgi fcgiwrap build-essential && cpan JSON"
ENTRYPOINT [ "/docker-entrypoint.sh" ]
