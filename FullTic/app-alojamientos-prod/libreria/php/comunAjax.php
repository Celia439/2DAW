<?php

require_once LIBRERIA_PHP . 'comun.php';

$comun = new comun();


switch ($_POST["action"]) {
    case 'casas':
        try {
            $casas = $comun->getCasas();

            $json = json_encode([
                "casas" => $casas
            ], JSON_UNESCAPED_UNICODE);

            if ($json === false) {
                echo json_encode([
                    "error" => "JSON encoding error: " . json_last_error_msg(),
                    "casas" => []
                ]);
            } else {
                echo $json;
            }
        } catch (Throwable $e) {
            echo json_encode([
                "error" => "PHP Error: " . $e->getMessage(),
                "file" => $e->getFile(),
                "line" => $e->getLine(),
                "casas" => []
            ]);
        }

        exit;
    case 'clientes':

        $input = !empty($_POST["input"]) ? $_POST["input"] : "";

        $filtros = [
            "nombre" => $input,
            "primer_apellido" => $input,
            "segundo_apellido" => $input,
            "telefono" => $input,
            "email" => $input,
            "DNI" => $input
        ];

        $clientes = $comun->getClientesPaginado(null, null, $filtros);

        echo json_encode([
            "clientes"=>$clientes
        ]);

        exit;
    case 'NaciProv':

        $paises = $comun->getNacionalidades();
        $provincias = $comun->getProvincias();

        echo json_encode([
            "provincias" => $provincias,
            "paises" => $paises
        ]);

        exit;
    default:
        echo "Acción no reconocida";
        exit;

}
