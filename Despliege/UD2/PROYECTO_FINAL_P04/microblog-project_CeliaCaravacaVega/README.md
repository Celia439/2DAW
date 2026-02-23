# Microblog Project

## Descripción
Pequeño sistema de blog con frontend PHP, base de datos MariaDB, caché Redis y proxy Nginx.

## Arquitectura
Resumen breve + enlace a `docs/ARCHITECTURE.md`.

## Requisitos
- Docker
- Docker Compose

## Cómo desplegar
1. Clonar repo.
2. Copiar `.env.example` a `.env`.
3. `docker compose build`
4. `docker compose up -d`
5. Blog: http://localhost  
   phpMyAdmin: http://localhost/phpmyadmin

## Documentación
- Arquitectura: `docs/ARCHITECTURE.md`
- Despliegue y pruebas: `docs/DEPLOYMENT.md`
