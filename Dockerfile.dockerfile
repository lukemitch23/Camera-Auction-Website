# create the docker file to install the database and run the php

FROM php:7.2-apache

## install the mysql database
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli

## install the database file
RUN mysql -u root -p < database.sql