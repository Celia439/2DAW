# Contexto del proyecto para asistentes

> Este archivo sirve para que cualquier agente de código que entre en el proyecto sepa rápidamente qué está hecho, cómo funciona y qué reglas seguir con esta desarrolladora y actualizarlo.

---

## 1. Reglas de colaboración con la desarrolladora

- **Ella es estudiante de 2º DAW en prácticas de empresa.** El objetivo principal es que aprenda, no que el código se haga rápido.
- **ANTES de escribir código, explicar el concepto.** Dejar que ella lo implemente siempre que sea posible.
- **NUNCA dar la respuesta completa lista para copiar y pegar.** Dar pistas, preguntar qué entiende, proponer ejercicios pequeños. Si está bloqueada, dar fragmentos mínimos o preguntas que la hagan pensar.
- **Si hay urgencia real, preguntar antes de tocar:** "¿Quieres que lo haga yo o prefieres que te guíe paso a paso?"
- **Incluso si ella pide código directamente, dar solo pistas mínimas.** Fragmentos de 1-2 líneas como máximo. Obligarla a pensar y escribir ella misma. Nunca soluciones completas listas para copiar.
- **Nunca dar por hecho que algo está roto por un cambio reciente sin investigar primero.** Consultar `git diff` o el historial si es necesario.
- **Si ella dice "hey eso no mola, quítalo" o similar, hacerle caso inmediatamente.** Ella manda en su forma de aprender.

---

## 2. Arquitectura general

### Router (`index.php` raíz)
No usa framework PHP (Laravel, Symfony, etc.). El enrutamiento es artesanal:

1. Toma `$_SERVER['REQUEST_URI']`, le quita el prefijo `/app-alojamientos-prod`.
2. Si la URI es `/` o vacía, redirige por defecto a `/publico/check-in`.
3. Carga en este orden (si existen):
   - **Modelo:** `modelos/{uri}/index.php`
   - **Controlador:** `controladores/{uri}/index.php`
   - **Vista:** `vistas/{uri}/index.php`
4. Las vistas de `/panel/*` se envuelven automáticamente con:
   - `bloques/header.php` (carga Bootstrap, jQuery, CSS propio)
   - `bloques/menu.php` (menú lateral, solo si hay sesión)
   - `bloques/modal.php` (modal genérico reutilizable)
   - `bloques/footer.php`
5. **Protección de rutas:** Si la URI empieza por `/panel`, no es `/panel/login` y no existe `$_SESSION["id_user"]`, redirige a `/panel/login`.

### Patrón MVC artesanal
- **Modelos:** clases PHP con métodos que usan el wrapper `Database` (PDO).
- **Controladores:** orquestan la lógica, leen `$_GET`/`$_POST`, llaman a modelos y preparan variables para la vista.
- **Vistas:** PHP puro que pinta HTML usando las variables del controlador. Cada módulo tiene su `index.php`, `index.js` y a veces `fila_*.php`.

---

## 3. Stack tecnológico

| Tecnología | Versión / Origen | Uso |
|---|---|---|
| PHP | 8.x | Backend nativo |
| MySQL | — | Base de datos |
| Bootstrap | 5.3 (CDN) | Grid, componentes, validación, modales |
| jQuery | 3.7.1 (CDN) | AJAX, manipulación DOM, eventos |
| jQuery LoadingOverlay | CDN | Bloqueo de UI durante peticiones AJAX |
| FPDF | Local (`libreria/php/fpdf/`) | Generación de facturas PDF |
| PHPMailer | 7.x (Composer) | Envío de facturas por email SMTP |
| Composer | — | Gestión de dependencias (solo PHPMailer por ahora) |

---

## 4. Configuración y constantes globales

Archivo clave: `config/index.php`

Define: `DEBUG`, `PROTOCOLO`, `ROOT`, `ROOT_URL`, `ROOT_AJAX`, `LIBRERIA_CSS/PHP/HTML/JS/IMG`, `CONSULTAS` (ruta a `libreria/php/mysql/mysql.php`), `PANEL_URL`, `MODELOS_LOGIN`, `MODELOS_RESERVAS`, etc.

- **Sesiones:** duran 32 horas (`session.gc_maxlifetime = 115200`).
- **`rootAJAX.php`:** punto de entrada único para todas las peticiones AJAX. Recibe `$_POST["pagina"]` (controlador) y opcionalmente `$_POST["modelo"]`. Si no viene modelo, lo infiere reemplazando `controladores/` por `modelos/`.

---

## 5. Base de datos

### Tablas principales

| Tabla | Función |
|---|---|
| `reservas` | Reservas de alojamiento (canal, fechas, importes, num_reserva, total_huespedes) |
| `clientes` | Datos personales de huéspedes (DNI, contacto, dirección, nacionalidad, etc.) |
| `casas` | Alojamientos (nombre, capacidad, habitaciones, baños, precio_noche, dirección) |
| `reservas_huespedes` | Tabla puente: vincula `reservas` + `casas` + `clientes`. Campo `es_titular` (1/0) |
| `usuarios` | Usuarios del panel (`username`, `password_hash`) |
| `provincias` | Catálogo de provincias |
| `municipios` | Catálogo de municipios (con `idProvincia`) |
| `nacionalidades` | Catálogo de países/nacionalidades |

### Relaciones clave

```
reservas (1) ────────┐
                     │
                     ▼
reservas_huespedes (N) ──► casas (1)
         │
         └──────────────► clientes (1)

clientes.provincia ─────► provincias.id
clientes.localidad ─────► municipios.id
clientes.nacionalidad_id ─► nacionalidades.id
casas.provincia ────────► provincias.id
casas.localidad ────────► municipios.id
```

### Capa de datos
- **Wrapper PDO:** `libreria/php/mysql/mysql.php` → clase `Database`.
- Métodos principales: `select`, `selectv2`, `insert`, `update`, `delete`.
- **Nota:** algunos filtros dinámicos en `whereArray` concatenan strings directamente. Los `insert`/`update` sí usan prepared statements.

---

## 6. Sistema de login / autenticación

- **Modelo:** `modelos/panel/login/index.php` → clase `login` con `comprobarUsuario($usuario, $pass)` usando `password_verify()`.
- **Controlador:** `controladores/panel/login/index.php` → recibe POST, devuelve JSON `{"ok": true/false}`. Si OK, guarda `$_SESSION["id_user"]`.
- **Vista:** `vistas/panel/login/index.php` + `index.js`. El JS captura el submit, valida con Bootstrap y envía AJAX a `rootAJAX.php`.
- **Logout:** `vistas/panel/logout/index.php` destruye sesión y redirige.
- **Login2:** existen carpetas `login2` en modelos, controladores y vistas, pero están **vacías** (intento abandonado).

---

## 7. Módulos del panel

### Reservas (`panel/reservas/`)
- CRUD completo con modal dinámico (Nuevo / Editar).
- Filtros por número, año, rango de fechas.
- Botón **"Link"** para copiar URL de check-in encriptada al portapapeles.
- Botón **"Generar facturas"**: crea PDF con FPDF y lo envía por email SMTP (PHPMailer) al cliente.
- Paginación.
- Tabla con resumen financiero al pie (totales de huéspedes, bruto, descuento, comisión, final).

### Clientes (`panel/clientes/`)
- CRUD completo con búsqueda en vivo (AJAX).
- Filtros por nombre, apellidos, DNI, teléfono, email.
- Paginación.
- Join con `provincias` y `municipios` para mostrar nombres legibles.

### Casas (`panel/casas/`)
- CRUD de alojamientos.
- Filtros por nombre, provincia, localidad.
- Paginación.

### Huéspedes (`panel/huespedes/`)
- Gestión de la tabla `reservas_huespedes`.
- Filtros por reserva, casa, cliente.
- Paginación.

### Reservas v2 (`panel/reservas_v2/`)
- Versión simplificada de reservas (solo lectura, sin operaciones CRUD).

---

## 8. Check-in público (flujo completo)

### Estado: EN REFACTORIZACIÓN (mayo 2026)

> **⚠️ Vulnerabilidad detectada por el jefe (Raúl):** El token anterior era solo el `id_reserva` encriptado con una clave hardcodeada. Esto es predecible: un atacante puede desencriptar, sumar/restar 1 al ID, volver a encriptar y acceder a otras reservas (ataque IDOR).
>
> **Solución en curso:** Implementar un sistema de URL con múltiples capas de seguridad basado en `clave_unica` por reserva + parámetros señuelo.

---

### Nueva arquitectura de seguridad del token (5 capas)

| Capa | Descripción | ¿Por qué? |
|---|---|---|
| **1. Parámetros señuelo** | 8 parámetros falsos con nombres variados (`v`, `book`, `ref`...) y valores aleatorios | Confunden al atacante: no sabe qué parámetros son reales |
| **2. Orden aleatorio** | Todos los parámetros (falsos + reales) se barajan con `shuffle()` | El parámetro real nunca está en la misma posición |
| **3. Clave única por reserva** | Cada reserva tiene un `clave_unica` generada aleatoriamente en la BD (`VARCHAR(64) UNIQUE`) | Romper una reserva no rompe las demás. Cada una tiene su propia "llave" |
| **4. Basura delante de la clave** | Los 5 primeros caracteres del parámetro `clave` son falsos; la clave real empieza en el carácter 6 | Aunque vean la URL, no saben dónde empieza el valor real |
| **5. Sal + ID encriptado** | El ID no se encripta solo. Se encripta el texto `"c4d1zf0rn14\|" . $id_reserva` usando como **clave de encriptación** la `clave_unica` de la BD | Incluso desencriptando, ven un chorizo de letras y deben saber dónde cortar |

---

### Flujo de la URL segura

**Generación (panel):**
1. Obtener `clave_unica` de la reserva desde BD.
2. Crear array con 8 parámetros falsos: `cadenaAleatoria(longitud)`.
3. Crear parámetro real `clave` = `cadenaAleatoria(5)` + `clave_unica`.
4. Crear parámetro real `id` = encriptar(`"c4d1zf0rn14|" . $id_reserva`, usando `clave_unica` como clave AES).
5. Añadir ambos al array.
6. `shuffle($array)` para mezclar todo.
7. `implode("&", $array)` para montar la query string.

**URL resultante (ejemplo, el orden cambia cada vez):**
```
?v=k3m9pL2q&id=aB3xK...&book=Xa7vB3wQ9z&clave=xyZ3a|aB3xK...&ref=a3B9x2
```

**Validación (check-in público):**
1. Recibir todos los parámetros por `$_GET`.
2. Extraer parámetro `clave`, quitar 5 caracteres delante: `substr($clave, 5)` → `clave_unica`.
3. Consultar BD: `SELECT * FROM reservas WHERE clave_unica = '...'`.
4. Si existe, usar esa misma `clave_unica` como clave para **desencriptar** el parámetro `id`.
5. Del texto desencriptado (`"c4d1zf0rn14|10"`), extraer el ID real tras el `\|`.
6. Continuar con el flujo normal (buscar `id_casa`, calcular huéspedes, etc.).

---

### Funciones implicadas en `libreria/php/comun.php`

| Función | Estado | Uso |
|---|---|---|
| `cadenaAleatoria(int $longitud)` | ✅ Existe | Generar cadenas aleatorias seguras (parámetros falsos, basura delante de clave) |
| `encriptarConClave($texto, $clave)` | ✅ Completa | Encriptar usando AES-256-CBC con clave dinámica (IV aleatorio, base64url) |
| `desencriptarConClave($texto, $clave)` | ✅ Completa | Desencriptar usando la clave dinámica recibida (conversión base64url → base64) |
| `Get_url_customer_booking($id_reserva)` | ✅ Completa | Genera URL con 8 parámetros señuelo + `clave` + `id` encriptado, todo mezclado con `shuffle()` |
| `generarUrlCheckin()` | ⚠️ Obsoleto | Será reemplazado por `Get_url_customer_booking()` |
| `encriptar()` / `desencriptar()` | ⚠️ Obsoleto | Usan clave hardcodeada `"5pzD2y3*9"`. Se mantienen temporalmente por compatibilidad |

---

### Base de datos

```sql
ALTER TABLE reservas ADD clave_unica VARCHAR(64) NOT NULL UNIQUE AFTER num_reserva;
```

- Se rellena con `UPDATE reservas SET clave_unica = REPLACE(UUID(), '-', '') WHERE clave_unica IS NULL;` para las existentes.
- Las nuevas reservas deben generar su `clave_unica` al insertarse.

---

### Compatibilidad
- Las URLs antiguas (`?id_reserva=X&id_casa=Y`) siguen funcionando como fallback.
- Las URLs del sistema anterior (`?token=...`) quedarán obsoletas una vez se despliegue el nuevo sistema.

### Archivos clave
- `libreria/php/comun.php` → `cadenaAleatoria()`, `encriptarConClave()`, `desencriptarConClave()`, `Get_url_customer_booking()`.
- `vistas/panel/reservas/fila_reserva.php` → botón Link (llamará a la nueva función).
- `vistas/panel/reservas/index.js` → repintará la nueva URL tras AJAX.
- `controladores/panel/reservas/filtros.php` → generará la nueva URL en cada reserva filtrada.
- `controladores/panel/reservas/index.php` → generará la nueva URL tras insert/update/delete.
- `controladores/publico/check-in/index.php` → validará los nuevos parámetros (`clave` + `id`).
- `modelos/publico/check-in/index.php` → clase `checkin`.

---

## 9. Facturas (FPDF + PHPMailer)

- **Ubicación:** `controladores/panel/reservas/facturaReservas.php`.
- **Proceso:**
  1. Recibe `id` de reserva por POST.
  2. Lee reserva → titular → casa → cliente.
  3. Genera PDF con FPDF (`Factura_reserva.pdf`).
  4. Envía el PDF por email SMTP (host: `smtp.panel247.com`) usando PHPMailer.
- **Librerías:** FPDF está en `libreria/php/fpdf/`. PHPMailer se gestiona por Composer (`composer.json` en `libreria/php/`).

---

## 10. Librerías internas compartidas

### `libreria/php/comun.php` (clase `comun`)
Métodos de consulta reutilizables:
- `getReservaById`, `getClienteById`, `getCasaById`
- `getTitularReserva`, `getHuespedesByReserva`
- `getNacionalidades`, `getProvincias`, `getMunicipiosPorProvincia`
- `getClientes`, `getReservas($filtros)`, `getCasas($filtros)`
- `mostrarBusquedaClienteenVivo`
- `encriptar()`, `desencriptar()`, `generarUrlCheckin()`
- `cadenaAleatoria()` (para futuros tokens aleatorios)

### `libreria/js/comun.js` (objeto `comun`)
- `listarMunicipios` — carga municipios por provincia.
- `mostrarAlerta` — alertas Bootstrap flotantes.
- `mostrarModal` / `mostrarModal_v2` — modales dinámicos reutilizables.
- `bloquearUI` / `desbloquearUI` — overlay de carga.

### `libreria/html/`
- `form_clientes.html` — formulario de check-in (público y panel).
- `busqueda-cliente-vivo.php` — componente de búsqueda AJAX de clientes.
- `form_editar_reservas.htm` — plantilla para modal de reservas.

---

## 11. Notas técnicas importantes

### Encriptación
- Algoritmo: `AES-256-CBC`.
- Clave hardcodeada: `"5pzD2y3*9"` (corta, pero funcional para pruebas).
- El resultado se convierte a **base64url** (`+` → `-`, `/` → `_`, quita `=`) para que sea seguro en URLs.
- El IV viaja concatenado al mensaje cifrado (`IV + ciphertext`), no es secreto.

### CSS
- `index.css` carga **después** de Bootstrap en `bloques/header.php` para que los estilos personalizados prevalezcan.
- Componente `.item-busqueda-cliente` extraído de inline a CSS externo.

### AJAX
- Todo el CRUD del panel y el check-in público usa `$.ajax` contra `ROOT_AJAX` (`config/rootAJAX.php`).
- Siempre se envía `pagina` (ruta al controlador) y opcionalmente `modelo`.

### Seguridad (puntos conocidos)
- Algunos filtros en `whereArray` concatenan variables directamente en strings SQL. Depende del wrapper PDO para escapar, pero no usa prepared statements en `select`.
- Credenciales de BD hardcodeadas en `libreria/php/mysql/mysql.php`.
- Clave de encriptación de 9 caracteres para AES-256-CBC.

---

## 12. Pendientes / mejoras futuras

- **Token aleatorio en BD:** en lugar de encriptar el ID en la URL, generar un token único guardado en una tabla `tokens_acceso` con expiración y revocación. Más profesional y seguro.
- **Clave de encriptación:** cambiar la clave actual (9 caracteres) por una de 32 bytes aleatorios.
- **Sanitización de filtros:** revisar los `whereArray` que concatenan strings para evitar inyección SQL.
- **Municipios duales:** hay dos rutas para cargar municipios (`libreria/php/municipios.php` y `controladores/publico/check-in/municipios_v2.php`). Unificar.
- **Login2:** eliminar carpetas vacías de `login2` si no se van a usar.

---

## 13. Estructura rápida de carpetas

```
bloques/          → header, footer, menu, modal
config/           → constantes y rootAJAX
controladores/    → lógica (panel/ y publico/)
libreria/         → css, js, php, html
modelos/          → acceso a datos (panel/ y publico/)
vistas/           → HTML/PHP visual (panel/ y publico/)
```

---

## 14. Estado actual del trabajo en curso

> **Contexto:** Refactorización del sistema de tokens del check-in por vulnerabilidad IDOR detectada por el jefe (Raúl). Sustituido el token predecible (`id_reserva` encriptado con clave fija) por un sistema de 5 capas con `clave_unica` por reserva + parámetros señuelo.

---

### ✅ Lo que YA está hecho (sesiones anteriores)

1. **Base de datos:**
   - Columna `clave_unica VARCHAR(64) NOT NULL UNIQUE` añadida a `reservas`.
   - Rellenada con UUID para todas las reservas existentes.

2. **`libreria/php/comun.php`:**
   - `cadenaAleatoria()`, `encriptarConClave()`, `desencriptarConClave()` → ✅ funcionan.
   - `Get_url_customer_booking($ID_reserva)` → ✅ completa. Genera URL con 8 parámetros señuelo + `clave` (5 chars basura + `clave_unica`) + `id` (encriptado con `clave_unica`), todo mezclado con `shuffle()`.
   - `generarUrlCheckin()`, `encriptar()`, `desencriptar()` → ⚠️ obsoletas (vacías o clave fija). No deben usarse.

---

### ✅ Lo completado hoy (18/05/2026)

**1. Panel de reservas — URLs seguras**
| Archivo | Cambio realizado |
|---|---|
| `vistas/panel/reservas/fila_reserva.php` | Botón Link usa `$comun->Get_url_customer_booking($reserva["id"])` en vez de `generarUrlCheckin()`. |
| `controladores/panel/reservas/filtros.php` | Filtros AJAX generan `url_checkin` con `Get_url_customer_booking()`. |
| `controladores/panel/reservas/index.php` | Función `actualizar()` usa `Get_url_customer_booking()`. Afecta a insert/update/delete. |

**2. Modelo de reservas — inserción completa**
| Archivo | Cambio realizado |
|---|---|
| `modelos/panel/reservas/index.php` | `guardarReserva()` ahora genera `clave_unica` con `$comun->cadenaAleatoria(64)` al insertar. |
| `controladores/panel/reservas/index.php` | Tras insertar la reserva, crea automáticamente el registro en `reservas_huespedes` (vincula reserva + casa + cliente titular). Ya no hace falta crearlo a mano en el módulo Huéspedes. |

**3. Check-in público — validación de nuevas URLs**
| Archivo | Cambio realizado |
|---|---|
| `controladores/publico/check-in/index.php` | Reescrito para validar el nuevo sistema: recibe `$_GET['clave']` e `$_GET['id']`, limpia la clave (`substr(..., 5)`), busca la reserva por `clave_unica`, desencripta el `id` con `desencriptarConClave()`, extrae el ID real con `explode("\|", ...)`. Fallback manual `?id_reserva=X&id_casa=Y` mantenido para pruebas. Sistema viejo `?token=` eliminado. |

**4. Formulario modal de reservas — edición**
| Archivo | Cambio realizado |
|---|---|
| `controladores/panel/reservas/formModal.php` | Al editar ahora carga correctamente: `$num_reserva` (antes faltaba y salía vacío), `$id_casa` (buscado desde `reservas_huespedes` vía `getTitularReserva()`), `$id_cliente` (también del titular, antes buscaba en tabla `reservas` donde no existe). |
| `vistas/panel/reservas/index.js` | Después de cargar las casas por AJAX, selecciona automáticamente la casa guardada (lee `#casa-seleccionada`). |
| `libreria/php/comun.php` | `getReservaByClave($clave_unica)` añadido. Arreglado `where` para usar comillas en el valor string (`clave_unica = '...'`). |

---

### ❌ Lo que falta / pendiente

| Archivo / funcionalidad | Qué falta | Prioridad |
|---|---|---|
| `controladores/panel/reservas/index.php` (update) | Al **editar** una reserva, si se cambia la casa o el cliente, NO se actualiza `reservas_huespedes`. Solo se actualiza la tabla `reservas`. | Media |
| `generarUrlCheckin()` y `encriptar()` / `desencriptar()` | Están obsoletas. Se pueden borrar cuando se confirme que nadie las llama. | Baja |
| `prueba_url.php` temporal | Nunca se creó. Sería útil para probar que `Get_url_customer_booking()` genera URLs válidas y que el check-in las lee bien. | Baja |

---

### 🎯 Reglas para el siguiente agente

1. **Preguntar primero** qué tiene escrito y revisar su código.
2. **Explicar el concepto antes de escribir código.** Ella es estudiante de 2º DAW; el objetivo es que aprenda.
3. **Si está bloqueada o hay urgencia real,** preguntar: *"¿Quieres que lo haga yo o prefieres que te guíe paso a paso?"*
4. **Nunca dar la solución completa lista para copiar y pegar.** Pistas, analogías y fragmentos mínimos.

**🔴 REGLA DE ORO:** Ella aprende escribiendo. Tú aprendes explicando.

---

*Última actualización: 2026-05-18 (sesión de mañana)*
