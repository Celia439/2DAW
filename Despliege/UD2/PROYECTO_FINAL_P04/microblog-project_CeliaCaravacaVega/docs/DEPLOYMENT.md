# Despliegue y pruebas

## Construcción

1. `docker compose build`
2. Verificar imágenes con `docker images`.

## Despliegue

1. `docker compose up -d`
2. Verificar contenedores con `docker ps`.

## Pruebas funcionales

- Blog: http://localhost
- phpMyAdmin: http://localhost/phpmyadmin

### Caché

- Primera carga: datos desde BD.
- Segunda carga: datos desde Redis (ver cambios en “Información del sistema”).

### Persistencia

1. Insertar post en phpMyAdmin.
2. Verlo en el blog.
3. `docker compose down`
4. `docker compose up -d`
5. Verificar que el post sigue.

## Capturas

- Diagrama de arquitectura.
- Blog funcionando.
- phpMyAdmin con datos.
- Información del sistema mostrando caché.
- `docker ps`
- `docker images`
- Verificación de persistencia.
