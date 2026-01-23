Práctica 2.1: Despliegue de WordPress con MariaDB

Documentación que incluye:

Todos los comandos utilizados en cada tarea
Capturas de pantalla que demuestren:
WordPress funcionando en el navegador
Panel de administración de WordPress
Contenido creado (páginas, posts, tema, plugins)
Lista de contenedores en ejecución
Inspección de la red Docker
Estructura de directorios de los volúmenes
Conexión a la base de datos y exploración de tablas
Respuestas detalladas a todas las preguntas de análisis
Comparación con las prácticas anteriores (Guestbook y Temperaturas)

🔹 Parte 1: Despliegue básico de WordPress
Tarea 1.1: Preparación del entorno


🔹 Parte 5: Análisis y documentación
Tarea 5.1: Preguntas de análisis
Responde a las siguientes preguntas en tu documentación:

Arquitectura de la aplicación:

¿Por qué WordPress necesita una base de datos?
¿Qué tipo de datos se almacenan en la base de datos vs. en el volumen de WordPress?
¿Cómo se comunican WordPress y MariaDB?
Persistencia de datos:

¿Qué pasaría si no usáramos volúmenes?
¿Por qué es crítico hacer backups de ambos volúmenes?
¿Qué estrategias de backup recomendarías para un WordPress en producción?
Seguridad:

¿Es necesario exponer el puerto de MariaDB al host? ¿Por qué?
¿Qué riesgos de seguridad existen al exponer la base de datos?
¿Cómo mejorarías la seguridad de este despliegue?
Scripts de inicialización:

¿Qué función cumple el docker-entrypoint.sh en MariaDB?
¿Qué función cumple el docker-entrypoint.sh en WordPress?
¿En qué momento se crea el archivo wp-config.php?
Comparación con prácticas anteriores:

¿En qué se diferencia este despliegue de Guestbook?
¿En qué se diferencia de la aplicación Temperaturas?
¿Cuál es más compleja de mantener y por qué?
Escalabilidad y alta disponibilidad:

¿Se podría ejecutar múltiples instancias de WordPress conectadas a la misma base de datos?
¿Cómo se podría implementar alta disponibilidad en la base de datos?
¿Qué limitaciones tiene este despliegue para un entorno de producción?
Tarea 5.2: Comandos utilizados
Documenta todos los comandos Docker utilizados para:

Crear la red y los directorios
Desplegar y gestionar el contenedor de MariaDB
Desplegar y gestionar el contenedor de WordPress
Verificar logs y estado de los contenedores
Inspeccionar la configuración de red
Acceder y consultar la base de datos