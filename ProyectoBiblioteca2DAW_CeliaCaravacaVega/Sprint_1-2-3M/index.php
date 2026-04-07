<?php
/**
 * BIBLIOTECH - Sistema de Gestión Bibliotecaria
 * Punto de entrada principal (index.php)
 * 
 * Este archivo redirige a la página de inicio web por defecto
 * Para acceder al panel del bibliotecario, ir a: /vistas/bibliotecario/inicio/IniciBibliotecario.php
 */

// Configuración global
require_once __DIR__ . '/librerias/php/config.php';

// Definir rutas base
if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__);
}

// Redirigir a la página principal web
header('Location: ' . BASE_URL . '/vistas/web/webBiblioTech.php');
exit;
?>