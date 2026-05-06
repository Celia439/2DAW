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
        try {
            $clientes = $comun->getClientes();
            $json = json_encode([
                "clientes" => $clientes
            ], JSON_UNESCAPED_UNICODE);

            if ($json === false) {
                echo json_encode([
                    "error" => "JSON encoding error: " . json_last_error_msg(),
                    "clientes" => []
                ]);
            } else {
                echo $json;
            }
        } catch (Throwable $e) {
            echo json_encode([
                "error" => "PHP Error: " . $e->getMessage(),
                "file" => $e->getFile(),
                "line" => $e->getLine(),
                "clientes" => []
            ]);
        }

        exit;

    case 'reservas':
        try {
            $reservas = $comun->getReservas();
            $json = json_encode([
                "reservas" => $reservas
            ], JSON_UNESCAPED_UNICODE);

            if ($json === false) {
                echo json_encode([
                    "error" => "JSON encoding error: " . json_last_error_msg(),
                    "reservas" => []
                ]);
            } else {
                echo $json;
            }
        } catch (Throwable $e) {
            echo json_encode([
                "error" => "PHP Error: " . $e->getMessage(),
                "file" => $e->getFile(),
                "line" => $e->getLine(),
                "reservas" => []
            ]);
        }

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
