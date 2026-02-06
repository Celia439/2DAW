# 1. Imagen base con PHP y Apache
FROM php:8.2-apache

# 2. Actualizar sistema e instalar mariadb-client
RUN apt-get update && apt-get install -y \
    mariadb-client \
    && rm -rf /var/lib/apt/lists/*

# 3. Instalar y habilitar la extensión mysqli
RUN docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli

# 4. Copiar archivos de la aplicación al DocumentRoot de Apache
COPY app/ /var/www/html/

# 5. Copiar script de inicialización y schema SQL
COPY script.sh /usr/local/bin/
COPY schema.sql /opt/

# 6. Dar permisos de ejecución al script
RUN chmod +x /usr/local/bin/script.sh

# 7. Definir variables de entorno con valores por defecto
ENV DB_HOST=db \
    DB_USER=usuario_app \
    DB_PASS=password_app \
    DB_NAME=aplicacion_db

# 8. Exponer puerto 80 (HTTP)
EXPOSE 80

# 9. Ejecutar script de inicialización al iniciar contenedor
CMD ["script.sh"]
