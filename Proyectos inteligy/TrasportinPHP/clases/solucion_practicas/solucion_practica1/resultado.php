<?php
    require_once 'clases.php';

    $flota = []; // Será mi matriz 3D
    $avisos = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['datos_raw'])) {
        $min = (float)$_POST['min'];
        $max = (float)$_POST['max'];
        
        if (isset($_POST['extras'])) {      //Otra forma: $extras = $_POST['extras'] ?? [];
            $extras = $_POST['extras'];
        } else {
            $extras = [];
        }

        // 1. Separar los vehículos por '#'
        $bloques = explode('#', $_POST['datos_raw']);

        foreach ($bloques as $bloque) {
            // 2. Separar campos por '|'
            $datos = explode('|', trim($bloque));
            
            if (count($datos) === 5) {
                try {
                    $tipo  = trim($datos[0]);
                    $id    = $datos[1];
                    $nom   = $datos[2];
                    $fec   = $datos[3];
                    $km    = (float)$datos[4];

                    // Filtrar por KM
                    if (($km >= $min) && ($km <= $max)) {
                        // Instanciar según tipo
                        if ($tipo === 'EL') {
                            $vehiculo = new Electrico($id, $nom, $fec, $km, $extrasSeleccionados);
                        } elseif ($tipo === 'HI') {
                            $vehiculo = new Hidrogeno($id, $nom, $fec, $km, $extrasSeleccionados);
                        } else {
                            throw new Exception("Tipo desconocido: $tipo");
                        }

                        // Determinamos el estado para la matriz 3D
                        $salud = $vehiculo->calcularSalud();
                        $estado = ($salud >= 75) ? "ÓPTIMO" : "REVISIÓN";
                        
                        // Guardamos en la matriz tridimensional [TIPO][ESTADO][]
                        $flota[$tipo][$estado][] = $vehiculo;
                    }
                } catch (Exception $e) {
                    $avisos[] = $e->getMessage();
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Resultado de Auditoría</title>
        <style>
            .categoria-box { border: 2px solid #333; padding: 10px; margin-bottom: 20px; }
            .estado-optimo { color: green; }
            .estado-revision { color: red; }
            .ficha { margin-bottom: 15px; border-left: 3px solid #ccc; padding-left: 10px; }
        </style>
    </head>
    
    <body>
        <h1>Informe Técnico EcoTrans</h1>

        <?php if ($avisos) { ?>
            <div style="background: #fee; padding: 10px; border: 1px solid red;">
                <?php foreach ($avisos as $a) {
                    echo "<p>$a</p>"; 
                } ?>
            </div>
        <?php } ?>

        <?php if (empty($flota)) { ?>
            <p>No hay vehículos que coincidan con los criterios.</p>
        <?php } else { ?>
            <?php foreach ($flota as $tipoCod => $estados) { ?>
                <div class="categoria-box">
                    <h2>Categoría: <?php echo ($tipoCod === 'EL') ? 'ELÉCTRICO' : 'HIDRÓGENO'; ?></h2>
                    
                    <?php foreach ($estados as $estNom => $vehiculos) { ?>
                        <h3 class="<?php echo ($estNom === 'ÓPTIMO') ? 'estado-optimo' : 'estado-revision'; ?>">
                            Estado: <?php echo $estNom; ?>
                        </h3>
                        
                        <?php foreach ($vehiculos as $v) { ?>
                            <div class="ficha">
                                <p><?php echo $v; // Llama a __toString() ?></p>
                                <ul>
                                    <li>Salud: <?php echo $v->calcularSalud(); ?>%.</li>
                                    <li>Autonomía: <?php echo $v->calcularAutonomia(); ?> km</li>
                                    <li>Certificación: <?php echo $v->obtenerEtiqueta(); ?></li>
                                </ul>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>
        <?php } ?>

        <hr>
        <h3>Total de vehículos auditados: <?php echo Vehiculo::$contador; ?></h3>
        <a href="index.php">Volver al formulario</a>
    </body>
</html>