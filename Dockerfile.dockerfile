# create the docker file to install the database and run the php

FROM php:7.2-apache@sha256:4dc0f0115acf8c2f0df69295ae822e49f5ad5fe849725847f15aa0e5802b55f8

## install the mysql database
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli

## install the database file
RUN mysql -u root -p < database.sql