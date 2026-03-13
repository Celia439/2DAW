<?php

//INCLUIMOS ARCHIVO CONFIG
require_once($_SERVER["DOCUMENT_ROOT"] . "/app-alojamientos-prod/config/index.php");

$manejadorControl = new manejador();
$manejadorControl->incluirPaginas();

class manejador
{

    private $uri;

    public function __construct()
    {
        $ruta = $_SERVER[REQUEST_URI];
        $ruta = str_replace("/app-alojamientos-prod", "", $ruta); //quitamos
        //SI TIENE PARAMETROS LO TENEMOS QUE LIMPIAR
        if (strpos($ruta, "?")) {
            $partesRuta = explode("?", $ruta);
            $ruta = $partesRuta[0];
        }

        $this->uri = $ruta == "/" || !$ruta ? "/publico/check-in" : $ruta;
    }

    function incluirPaginas()
    {

        session_start();

        // Si la ruta comienza por /panel 
        // No estamos en login 
        // Y no hay sesión.
        if (
            strpos($this->uri, "/panel") === 0 &&
            $this->uri !== "/panel/login" &&
            !isset($_SESSION["id_user"])
        ) {
            header("Location: /app-alojamientos-prod/panel/login");
            exit;
        }



        if (file_exists(ROOT . "modelos/" . $this->uri . "/index.php")) {
            include ROOT . "modelos/" . $this->uri . "/index.php";
        }
        if (file_exists(ROOT . "controladores/" . $this->uri . "/index.php")) {
            include ROOT . "controladores/" . $this->uri . "/index.php";
        }



        /* if (file_exists(ROOT . "vistas/" . $this->uri . "/index.php")) {

             include ROOT . "bloques/header.php";
             include ROOT . "vistas/" . $this->uri . "/index.php";
             include ROOT . "bloques/footer.php";
         }*/

        if (file_exists(ROOT . "vistas/" . $this->uri . "/index.php")) {
            // si la ruta empieza por /panel → cargar menu
            include ROOT . "bloques/header.php";

            if (strpos($this->uri, "/panel") === 0 && strpos($this->uri, "/panel/login") !== 0) {
                include ROOT . "bloques/menu.php";
            }

            include ROOT . "vistas/" . $this->uri . "/index.php";

            if (strpos($this->uri, "/panel") === 0 && strpos($this->uri, "/panel/login") !== 0) {
                include ROOT . "bloques/modal.php";
            }

            include ROOT . "bloques/footer.php";
        }
    }

}
