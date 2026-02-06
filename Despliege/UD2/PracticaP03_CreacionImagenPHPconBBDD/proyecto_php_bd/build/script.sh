#!/bin/bash

echo "====================================="
echo "Iniciando script de configuración..."
echo "====================================="

# Mostrar variables de entorno (sin contraseñas)
echo "Host de BD: ${DB_HOST}"
echo "Usuario de BD: ${DB_USER}"
echo "Nombre de BD: ${DB_NAME}"
echo ""

# Esperar a que MariaDB esté disponible
echo "Esperando a que MariaDB esté disponible..."
COUNTER=0
MAX_TRIES=30

while ! mysql -u "${DB_USER}" -p"${DB_PASS}" -h "${DB_HOST}" -e ";" 2>/dev/null; do
    COUNTER=$((COUNTER + 1))
    if [ $COUNTER -gt $MAX_TRIES ]; then
        echo "ERROR: No se pudo conectar a MariaDB después de $MAX_TRIES intentos"
        exit 1
    fi
    echo "Intento $COUNTER/$MAX_TRIES - MariaDB no está lista aún, esperando..."
    sleep 2
done

echo "✓ MariaDB está disponible!"
echo ""
# Verificar si la tabla existe
echo "Verificando si la base de datos ya está inicializada..."
TABLE_EXISTS=$(mysql -u "${DB_USER}" -p"${DB_PASS}" -h "${DB_HOST}" "${DB_NAME}" \
  -sse "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema='${DB_NAME}' AND table_name='users';")

if [ "$TABLE_EXISTS" -eq "0" ]; then
    echo "Base de datos vacía. Inicializando por primera vez..."
    if mysql -u "${DB_USER}" -p"${DB_PASS}" -h "${DB_HOST}" "${DB_NAME}" < /opt/schema.sql; then
        echo "✓ Base de datos inicializada correctamente"
    else
        echo "ERROR: Fallo al inicializar la base de datos"
        exit 1
    fi
else
    echo "✓ Base de datos ya inicializada. Omitiendo schema.sql"
fi

echo ""
echo "====================================="
echo "Iniciando servidor Apache..."
echo "====================================="

# Iniciar Apache en primer plano
apache2ctl -D FOREGROUND