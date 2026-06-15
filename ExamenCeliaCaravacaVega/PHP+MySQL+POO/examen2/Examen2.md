# DWES — 2025/2026
## IES Trafalgar
### UT 5, 6 y 7

# Examen — Plataforma: Sistema de Gestión Bibliotecaria "BookTrack"

**ACLARACIONES:** No se permite el uso de internet más allá del manual de PHP o la Moodle para acceder a la tarea correspondiente. Las pantallas deberán grabarse desde el inicio de la prueba. No se corregirá ninguna prueba que no incluya el correspondiente vídeo en el que se muestre la realización completa del examen. La no entrega del vídeo junto con la prueba o la detección de cualquier actividad sospechosa supondrá la calificación de suspenso automático. Se valorará, además de la funcionalidad del programa, la calidad del código, claridad, legibilidad, indentaciones, uso de nombres apropiados, modularidad, limpieza del código, organización general y buenas prácticas de programación.

Se entregará todo comprimido en un zip en la propia tarea creada en la Moodle.

## Contexto

La biblioteca "BookTrack" necesita una aplicación interna para gestionar el préstamo de libros. El sistema permite que los usuarios consulten los libros disponibles y hagan reservas, mientras que los administradores pueden añadir nuevos libros y gestionar las devoluciones.

Se proporciona el esquema de base de datos (`database.sql`) y un modelo HTML con estilos tanto para el login como el dashboard (`login.php` y `dashboard.php`). Además, la expresión regular para validar el email (`otros.txt`).

---

## Apartado 1 — Arquitectura de clases (1.5 puntos)

Diseña un modelo de clases en un archivo llamado `clases.php` que cumpla con:

- Una interfaz, `IInformable`, para estandarizar la salida de información de los objetos, es decir, con un método `getResumen()`.
- Una clase base, `Publicacion`, que gestione los datos comunes: **título** y **autor**. Tendrá el método `getResumen()` como abstracto.
- Una clase derivada, `Libro`, que gestione el estado del ejemplar y determine visualmente su situación en la tabla del panel.
  - Tendrá como atributo privado: `estado` (valores: `Disponible` y `Prestado`).
  - Método `getResumen()`: Devuelve el título en mayúsculas y el estado entre corchetes. Ejemplo:
    - `NUEVO LIBRO: Don Quijote [Disponible]`
  - Método `getEstilo()`: Devuelve una cadena de estilos. Si el libro está disponible, fondo verde; si está prestado, fondo naranja. (Mirar archivo: `otros.txt`).

**Nota:** No es obligatorio implementar los métodos Getter ni Setter en ninguna clase.

---

## Apartado 2 — Autenticación (1.5 puntos)

Debes implementar un sistema de autenticación (`login.php`) que proteja el acceso al panel usando sentencias preparadas. Además, tras iniciar sesión con éxito, el sistema debe recordar (durante 24h) el último correo electrónico utilizado para iniciar sesión mediante mecanismos de persistencia en el cliente y que se mostrará automáticamente en el campo del formulario al volver a entrar.

---

## Apartado 3 — Dashboard (2 puntos)

En `dashboard.php`, el listado de libros debe cumplir:

- Muestre un listado completo que muestre: **título**, **autor** y **estado**.
- Los administradores deben ver todos los libros, mientras que el resto de usuarios solo verán aquellos que estén **disponibles**.
- Se aplique la lógica de estilos definida en las clases para diferenciar cada fila de la tabla.

---

## Apartado 4 — Lógica de préstamos (2 puntos)

- **Alta de libros (admin):** Será quien registre nuevos libros. Al finalizar, mostrará el resumen del libro creado.
- **Reserva de libros (usuario):** Permite a los usuarios marcar un libro disponible como prestado.
- **Devolución de libros (admin):** Permite a los administradores marcar un libro prestado como disponible de nuevo.

---

## Apartado 5 — Seguridad y código (1.5 puntos)

Se deberá garantizar un flujo de navegación seguro mediante el uso correcto de sesiones y cookies (si las hubiese), asegurando que el acceso al panel esté estrictamente protegido y que las redirecciones se ejecuten de forma coherente en todo momento. Se exigirá una implementación impecable de la seguridad en las consultas. Asimismo, se valorará la calidad interna del código, la cual debe destacar por una indentación limpia, una organización modular lógica y una semántica apropiada en el nombrado de variables y funciones. Finalmente, el programa deberá ejecutarse de manera fluida y profesional.

---

## Adicional — Token de Seguridad Anti-F5 (+0.5 puntos extra)

Optimiza el formulario de alta de libros para evitar la duplicidad de datos producida por el refresco accidental de la página (F5) o reenvíos del navegador. El sistema debe invalidar la petición una vez procesada correctamente, es decir, al registrar un nuevo libro.
