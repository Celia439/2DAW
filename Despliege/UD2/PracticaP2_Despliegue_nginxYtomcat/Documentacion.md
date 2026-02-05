# PRIMERA PARTE: Gestión Manual con Docker

## Descripción general

Esta primera parte se centra en comprender cada componente y comando Docker necesario para desplegar la arquitectura. Aprenderás a gestionar redes, contenedores, volúmenes y configuraciones de forma manual.

---

## 🔹 Parte 1: Preparación del entorno

### Tarea 1.1: Obtención de recursos

- **Crea un directorio de trabajo** para esta práctica (ej: `~/tomcat_practica`)
![alt text](image.png)
- **Obtén un archivo WAR**:
    - Descargar `sample.war` del repositorio (carpeta `recursos`)
    ![alt text](image-1-1.png)
    - Consulta el README para instrucciones detalladas
    docker run --rm -v ${PWD}:/data tomcat:9.0 jar -tvf /data/sample.war
    Para comprobar que va bien el war
    - O utiliza cualquier WAR disponible

- **Crea el archivo de configuración `default.conf`** para Nginx:
    - Escucha en puerto 80
    - Configuración de `location /` con `proxy_pass`
    - Proxy apunta a `NOMBRE_CONTENEDOR_TOMCAT:8080/NOMBRE_APLICACION`
    - Gestión de errores (500, 502, 503, 504)
![alt text](image-1.png)
- **Verifica los archivos**: `sample.war` y `default.conf`

### Tarea 1.2: Creación de la red

```bash
docker network create red_tomcat
docker network ls
```
![alt text](image-2.png)
---

## 🔹 Parte 2: Despliegue del servidor Tomcat

### Tarea 2.1: Despliegue básico de Tomcat

```bash
docker run -d ^
 --name aplicacionjava ^
 --network red_tomcat ^
 -v ${PWD}/sample.war:/usr/local/tomcat/webapps/sample.war ^
 tomcat:9.0
```
    ${PWD} es el directorio actual en power shell 

**Verificaciones**:
- Estado del contenedor: `docker ps`
![alt text](image-3.png)
- Logs: `docker logs aplicacionjava`
![alt text](image-4.png)
- Acceso al contenedor: `docker exec -it aplicacionjava bash`
- Archivo WAR desplegado: `/usr/local/tomcat/webapps/`
![alt text](image-5.png)

---
****************************************No funciona lo de localhost
## 🔹 Parte 3: Configuración y despliegue de Nginx

### Tarea 3.1: Configuración del proxy inverso

Actualiza `default.conf`:
- Sustituye `NOMBRE_CONTENEDOR_TOMCAT` → `aplicacionjava`
- Sustituye `NOMBRE_APLICACION` → `sample`

- Verifica directivas: `listen`, `server_name`, `location`, `proxy_pass`

### Tarea 3.2: Despliegue de Nginx

```bash
docker run -d \
    --name proxy \
    --network red_tomcat \
    -p 80:80 \
    -v $(pwd)/default.conf:/etc/nginx/conf.d/default.conf:ro \
    nginx:latest
```

**Verificaciones**:
- Estado: `docker ps`
- Logs: `docker logs proxy`

### Tarea 3.3: Verificación del despliegue

- Accede a `http://localhost` en el navegador
- Verifica que la aplicación se carga correctamente a través de Nginx

---

## 🔹 Parte 4: Análisis de la arquitectura

### Tarea 4.1: Flujo de peticiones

**Análisis**:
1. Nginx recibe la petición (puerto 80)
2. Redirecciona a `aplicacionjava:8080/sample` (resolución DNS interna)
3. Docker resuelve el nombre dentro de la red `red_tomcat`
4. Tomcat procesa y devuelve la respuesta

**Pruebas de conectividad**:
```bash
docker exec proxy ping aplicacionjava
docker exec proxy curl http://aplicacionjava:8080/sample
```

### Tarea 4.2: Bind mount vs volúmenes

- **Bind mount**: Ideal para archivos de configuración y desarrollo
- **Volúmenes**: Mejor para datos persistentes y compatibilidad multiplataforma
- Verifica archivos en el host: `$(pwd)/sample.war` y `$(pwd)/default.conf`

---

## 🔹 Parte 5: Configuración avanzada

### Tarea 5.1: Modificación de la configuración de Nginx

Añade en `location /` del `default.conf`:

```nginx
proxy_set_header Host $host;
proxy_set_header X-Real-IP $remote_addr;
proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
proxy_set_header X-Forwarded-Proto $scheme;
```

Recarga Nginx sin parar:
```bash
docker exec proxy nginx -s reload
```

### Tarea 5.2: Acceso directo a Tomcat

```bash
docker stop aplicacionjava
docker run -d \
    --name aplicacionjava \
    --network red_tomcat \
    -p 8080:8080 \
    -v $(pwd)/sample.war:/usr/local/tomcat/webapps/sample.war:ro \
    tomcat:latest
```

- Accede a `http://localhost:8080/sample`
- Compara URLs y cabeceras con acceso a través de Nginx

### Tarea 5.3: Múltiples aplicaciones

Configura en `default.conf`:

```nginx
location /app1/ {
    proxy_pass http://aplicacionjava:8080/aplicacion1/;
}

location /app2/ {
    proxy_pass http://aplicacionjava:8080/aplicacion2/;
}
```
