<?php
    $superficiesDisponibles = array(
        "Asfalto",
        "Adoquines",
        "Tierra compacta",
        "Césped",
        "Grava",
        "Pavimento húmedo",
        "Arena",
        "Sendero natural",
        "Rampa / desnivel",
        "Escaleras urbanas"
    );

    $sensacionesDisponibles = array(
        "Cómodo",
        "Fluido",
        "Fatiga moderada",
        "Fatiga intensa",
        "Dolor muscular",
        "Pesado",
        "Motivado",
        "Desconcentrado",
        "Energético",
        "Ritmo inestable"
    );
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Práctica 6 - UrbanRun Tracker</title>
    </head>
    <body>
        <h1>Práctica 6 - Registro de Recorridos</h1>

        <form action="resultado.php" method="post">

            <label>Nombre del recorrido:</label><br>
            <input type="text" name="nombre" required><br><br>

            <label>Distancia (km):</label><br>
            <input type="number" step="0.01" name="distancia" required><br><br>

            <label>Tiempo total (minutos):</label><br>
            <input type="number" name="tiempo" min="1" required><br><br>

            <label>Fecha (AAAA-MM-DD):</label><br>
            <input type="text" name="fecha" required><br><br>

            <label>Tipo de recorrido:</label><br>
            <select name="tipo">
                <option value="urbano">Urbano</option>
                <option value="mixto">Mixto</option>
            </select><br><br>

            <label>Superficies:</label><br>
            <?php
                $i = 0;
                $totalSup = count($superficiesDisponibles);
                while ($i < $totalSup) {
                    $s = $superficiesDisponibles[$i];
                    ?>
                    <label>
                        <input type="checkbox" name="superficies[]" value="<?php echo htmlspecialchars($s); ?>">
                        <?php echo htmlspecialchars($s); ?>
                    </label><br>
                    <?php
                    $i = $i + 1;
                }
            ?>
            <br>

            <label>Sensaciones:</label><br>
            <?php
                $j = 0;
                $totalSen = count($sensacionesDisponibles);
                while ($j < $totalSen) {
                    $sen = $sensacionesDisponibles[$j];
                    ?>
                    <label>
                        <input type="checkbox" name="sensaciones[]" value="<?php echo htmlspecialchars($sen); ?>">
                        <?php echo htmlspecialchars($sen); ?>
                    </label><br>
                    <?php
                    $j = $j + 1;
                }
            ?>
            <br>

            <button type="submit">Procesar recorrido</button>
        </form>
    </body>
</html>
