FROM php:8.0-apache
COPY . /var/www/html
EXPOSE 80
CMD ["apache2-foreground"]

FROM php:8.1-apache

# Instalações necessárias para o PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql

# Outras configurações...
COPY . /var/www/html
