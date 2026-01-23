<?php
    require_once "model.php";

    $mensajes = array();
    $mensajeError = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $contenido = "";
        $fechaRecepcion = "";
        $prioridad = 1;
        $tipo = "basico";
        $marcas = array();

        if (isset($_POST["contenido"])) {
            $contenido = $_POST["contenido"];
        }
        if (isset($_POST["fechaRecepcion"])) {
            $fechaRecepcion = $_POST["fechaRecepcion"];
        }
        if (isset($_POST["prioridad"])) {
            $prioridad = (int)$_POST["prioridad"];
        }
        if (isset($_POST["tipo"])) {
            $tipo = $_POST["tipo"];
        }
        if (isset($_POST["marcas"])) {
            $marcas = $_POST["marcas"];
        }

        if ($contenido === "" || $fechaRecepcion === "") {
            $mensajeError = "Los datos del mensaje no son válidos.";
        } else {
            if ($tipo === "basico") {
                $mensaje = new MensajeCifradoBasico($contenido, $fechaRecepcion, $prioridad, $marcas);
            } else {
                $mensaje = new MensajeCifradoAvanzado($contenido, $fechaRecepcion, $prioridad, $marcas);
            }

            $mensajes[] = $mensaje;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Resultados - Práctica 5</title>
    </head>
    <body>
        <h1>Informe de Mensajes - CipherNet Security</h1>

        <?php
            if ($mensajeError !== "") {
                echo "<p>" . htmlspecialchars($mensajeError) . "</p>";
            } else {

                if (count($mensajes) === 0) {
                    echo "<p>No se ha recibido ningún mensaje.</p>";
                } else {

                    $i = 0;
                    $total = count($mensajes);

                    while ($i < $total) {
                        $m = $mensajes[$i];

                        $descifrado = $m->desencriptar();
                        $metadatos = $m->extraerMetadatos();
                        $patrones = $m->analizarPatrones();
                        $origen = $m->origen();
                        $urgente = $m->esUrgente();

                        echo "<hr>";
                        echo "<h2>Informe del mensaje</h2>";

                        echo "<p><strong>Ficha descriptiva:</strong><br>";
                        echo htmlspecialchars($m->__toString()) . "<br>";
                        $mar = $m->getMarcas();
                        if (count($mar) > 0) {
                            echo "Marcas: " . htmlspecialchars(implode(", ", $mar));
                        } else {
                            echo "Marcas: Ninguna";
                        }
                        echo "</p>";

                        echo "<p><strong>Análisis del contenido:</strong><br>";
                        echo "<strong>Mensaje desencriptado:</strong><br>";
                        echo "<pre>" . htmlspecialchars($descifrado) . "</pre>";

                        echo "<strong>Metadatos:</strong><br>";
                        echo "Palabras: " . $metadatos["palabras"] . "<br>";
                        echo "Caracteres: " . $metadatos["caracteres"] . "<br>";
                        echo "Símbolos: " . $metadatos["simbolos"] . "<br>";

                        echo "<strong>Patrones detectados:</strong><br>";
                        echo "<pre>";
                        print_r($patrones);
                        echo "</pre>";

                        echo "Origen: " . htmlspecialchars($origen) . "<br>";
                        echo "</p>";

                        echo "<p><strong>Conclusión:</strong><br>";
                        if ($urgente) {
                            echo "El mensaje se considera <strong>urgente</strong>.";
                        } else {
                            echo "El mensaje no se considera urgente.";
                        }
                        echo "</p>";

                        $i = $i + 1;
                    }

                    echo "<hr>";
                    echo "<h2>Resumen global</h2>";
                    echo "<p>Total de mensajes procesados: " . Mensaje::getTotalMensajes() . "</p>";
                }
            }
        ?>
    </body>
</html>
