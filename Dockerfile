FROM php:8-apache


#COPY . /var/www/html
#USER root
#RUN set -eux \
#&& chown -R www-data /var/www/html \
#;
#USER www-data

COPY --chown=www-data . /var/www/html


EXPOSE 80