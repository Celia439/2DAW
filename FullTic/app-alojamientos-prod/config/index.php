<?php

ini_set("session.cookie_lifetime", "115200");
ini_set("session.gc_maxlifetime", "115200");
session_start();
$protocolo = "https";

//Creamos los accesos a la libreria
define("DEBUG", true);
//DECLARACIONES
if (DEBUG) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ERROR);
}
define("PROTOCOLO", $protocolo);
define("ROOT", $_SERVER["DOCUMENT_ROOT"] . "/app-alojamientos-prod/");
define("ROOT_URL", "$protocolo://$_SERVER[HTTP_HOST]/app-alojamientos-prod/");
// e añadido app-alojamientos-prod a las rutas publicas de libreria
define("LIBRERIA_CSS", "$protocolo://$_SERVER[HTTP_HOST]/app-alojamientos-prod/libreria/css/");
define("LIBRERIA_PHP", ROOT . "/libreria/php/");
define("LIBRERIA_HTML", ROOT . "/libreria/html/");
define("ROOT_MODULOS", LIBRERIA_PHP . "modulos/");
define("LIBRERIA_JS", "$protocolo://$_SERVER[HTTP_HOST]/app-alojamientos-prod/libreria/js/");
define("LIBRERIA_IMG", "$protocolo://$_SERVER[HTTP_HOST]/app-alojamientos-prod/libreria/img/");
define("CONSULTAS", LIBRERIA_PHP . "mysql/mysql.php");

//Nueva ruta para acceder a modelos check-in 
define("MODELOS_CHECKIN", ROOT . "modelos/publico/check-in");
//Para acceder a panel 
define("PANEL_URL", "/app-alojamientos-prod/panel");
//Ruta para acceder a modelos login (si no lo tengo da error pero no debe)
define("MODELOS_LOGIN", ROOT . "modelos/panel/login/index.php");
//Ruta para acceder a modelos reservas?
define("MODELOS_RESERVAS", ROOT . "modelos/panel/reservas/index.php");
