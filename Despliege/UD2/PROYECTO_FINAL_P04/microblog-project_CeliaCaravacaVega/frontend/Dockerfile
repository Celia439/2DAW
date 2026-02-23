FROM php:8.2-apache

# Extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql

# Redis (vía PECL)
RUN pecl install redis \
    && docker-php-ext-enable redis

# Copiar código
COPY public/ /var/www/html/
COPY config/ /var/www/html/config/

# Variables de entorno (opcionales, mejor vía .env)
ENV DB_HOST=db \
    DB_NAME=blogdb \
    DB_USER=bloguser \
    DB_PASS=blogpass_seguro \
    REDIS_HOST=redis \
    REDIS_PORT=6379

EXPOSE 80
