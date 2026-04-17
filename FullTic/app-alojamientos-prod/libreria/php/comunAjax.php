<?php

require_once LIBRERIA_PHP . 'comun.php';

$comun = new comun();


switch ($_POST["action"]) {

    case 'NaciProv':

        $paises = $comun->getNacionalidades();
        $provincias = $comun->getProvincias();

        echo json_encode([
            "provincias" => $provincias,
            "paises" => $paises
        ]);

        exit;

}