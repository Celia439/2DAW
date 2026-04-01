# GPEF
### Puntos Segun el enunciado 

- Usuarios que consultan:
    * Clases disponibles.
    * Reservar plazas
    * Gestionar reservas.
- Panel de administrador tipico

## Objetivo:

- Simular funcionamiento basico de gestión de gimnasio con *PHP y MYSQL*.
- Donde:
  *  Los entrenadores vean las clases que imparten.
  *  Los Administradores gestionan usuarios, clases y reservas.

- Controlar bien el acceso según el rol

### Usuarios
* Administrador: CRUD (clases, horarios, reservas) más estadisticas.
* Cliente: Ver clases (disponible OJO), reservar clases, cancelar reservas, ver historial y editar perfil. 
* Entrenador: Ver clases que imparte, lista de alumnos, consultar horario que tenga inscritos de su clase  

## Base de datos
- Campos minimos de usuario:
    *   id 
    *  nombre 
    *  email
    *  password
    *  telefono
    *  rol (admin / cliente / entrenador)
    *  created_at
    *  updated_at
- 