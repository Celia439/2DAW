<?php
/**
 * Configuración global del proyecto
 */

// Ajustar según el entorno (desarrollo, pruebas, producción)
define('DB_HOST', 'localhost');
define('DB_NAME', 'bibliotech');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASS', '');

// URL base para rutas de assets y enlaces (solo se usa en HTML, no en la lógica de API)
define('BASE_URL', '/biblioteca/Sprint_1-2-3M');

// Control de errores, más seguro en producción
if (!defined('ENVIRONMENT')) {
    define('ENVIRONMENT', 'development');
}

if (ENVIRONMENT === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}
