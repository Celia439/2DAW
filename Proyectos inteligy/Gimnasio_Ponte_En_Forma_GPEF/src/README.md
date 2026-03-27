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
* Entrenador: Ver clases que imparte, lista de alumnos,  consultar horario.
* *DUDA* todos los alumos y los que tengo inscritos o solos los de la clase?  

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
- Campos minimos de clases
    *   id
    * nombre
    * descripcion
    * duracion
    * capacidad
    * imagen
    * entrenador_id
    * created_at
    * updated_at
- Campos minimos de Horarios
    * id
    * class_id
    * fecha
    * hora_inicio
    * hora_fin
    * created_at
    * updated_at
- Campos minimos de Reservas
    *  id
    *  user_id
    *  schedule_id
    *  estado (activa / cancelada)
    *  created_at
    *  updated_at
### Relaciones principales
- Relaciones
    * Un usuario puede tener muchas reservas
    * Un horario puede tener muchas reservas
    * Una clase puede tener varios horarios.
    * Una clase pertenece a un entrenador
    * Un entrenador puede impartir muchas clases
  
## Funcionalidades

### 1. Autenticación
- Registro de usuarios.
- Inicio de sesión.
- Cierre de sesión.
- Guardar en sesión: `id_usuario`, `nombre`, `rol`.

### 2. Dashboard Dinámico (por rol)

#### ➤ Administrador
- Gestión de usuarios.
- Gestión de clases.
- Gestión de horarios.
- Gestión de reservas.
- Estadísticas del gimnasio.

#### ➤ Cliente
- Ver clases disponibles.
- Realizar reservas.
- Ver mis reservas.
- Cancelar reservas.
- Editar perfil.

#### ➤ Entrenador
- Ver clases que imparte.
- Ver alumnos inscritos.
- Ver calendario de clases.

### 3. Gestión de Clases (Admin)
- Crear, editar, eliminar, ver listado.
- Campos del formulario: nombre, descripción, duración, imagen, capacidad, entrenador.

### 4. Gestión de Horarios (Admin)
- Asignar horarios a clases.
    - Ejemplo: Clase: Yoga | Fecha: 10/05/2026 | Hora inicio: 10:00 | Hora fin: 11:00

### 5. Sistema de Reservas (Cliente)
- Reservar plaza en horario disponible.
- Controlar capacidad máxima.
- Estado inicial: **activa**.

### 6. Cancelación de Reservas (Cliente)
- Cambiar estado a **cancelada**.

### 7. Mis Reservas (Cliente)
- Tabla con: Clase | Fecha | Hora | Estado.

### 8. Panel del Entrenador
- Ver clases que imparte.
- Ver horarios.
- Ver alumnos inscritos.

### 9. Gestión de Usuarios (Admin)
- Ver, editar, eliminar usuarios.
- Cambiar rol de usuario.

### 10. Estadísticas (Admin)
- Número total de usuarios.
- Número total de clases.
- Clases con más reservas.
- Clientes con más reservas.
- Reservas por día.

---

##  Organización de Rutas

- **Rutas públicas** (registro, login).
- **Rutas autenticadas** (dashboard, reservas, perfil).
- **Rutas de administración** (gestión completa).

---

##  Control y Seguridad

- Verificar sesión activa.
- Solo **admin** accede al panel de administración.
- **Entrenador** accede solo a funcionalidades específicas.

---

##  Modelos

Cada modelo debe definir:
- Campos `fillable`.
- Relaciones con otros modelos.

---

##  Migraciones

Incluir:
- Claves primarias.
- Claves foráneas.
- Timestamps (`created_at`, `updated_at`).

---

##  Seeders

Datos iniciales para pruebas:
- 1+ administrador.
- Varios entrenadores.
- 5+ clientes.
- Varias clases.
- Algunos horarios.

---

## ️ Vistas Blade

- Usar **Blade** para generar vistas.
- Layout principal con:
    - Menú de navegación (adaptado por rol).
    - Contenido dinámico.
    - Mensajes flash.

---

## ✅ Validación de Formularios

Validar:
- Nombre obligatorio.
- Duración numérica.
- Capacidad > 0.
- Fecha válida.

---

## 🍪 Uso de Cookies

Funcionalidades:
- Recordar usuario.
- Guardar preferencia de vista.

---

## 🌟 Funcionalidades Opcionales (mejora de nota)(si termino lo hago)

- Búsqueda de clases.
- Filtrado por entrenador.
- Paginación de resultados.
- Calendario visual de clases.

---

## Resultado Esperado

La aplicación debe permitir:
- Registrarse e iniciar sesión.
- Consultar clases.
- Reservar y cancelar plazas.
- Gestionar clases y usuarios desde admin.
- Mostrar estadísticas básicas.