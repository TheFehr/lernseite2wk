#!/bin/bash

echo -e "\033[1;33mSetting up MySQL server\033[0m"
service mysql start && mysql < /var/www/db/dump.sql && mysql < /var/www/db/setup.sql
sleep .5
service mysql stop

echo -e "\033[1;33mStarting CGI and LEMP stack\033[0m"
/etc/init.d/fcgiwrap start && service supervisor start
