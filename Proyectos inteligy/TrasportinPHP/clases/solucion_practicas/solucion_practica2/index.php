<?php
    $materiales = array(
        "acero",
        "aluminio",
        "plástico",
        "madera",
        "cobre",
        "silicio",
        "vidrio",
        "fibra de carbono",
        "goma",
        "cerámica"
    );
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Práctica 2 - TechForge Labs</title>
    </head>
    <body>
        <h1>Práctica 2 - Sistema de Gestión de Inventos "TechForge Labs"</h1>

        <form action="resultado.php" method="post">
            <label>Nombre del invento:</label><br>
            <input type="text" name="nombre" required><br><br>

            <label>Propósito:</label><br>
            <input type="text" name="proposito" required><br><br>

            <label>Fecha del prototipo (AAAA-MM-DD):</label><br>
            <input type="text" name="fechaPrototipo" required><br><br>

            <label>Coste (€):</label><br>
            <input type="number" step="0.01" name="coste" required><br><br>

            <label>Tipo de invento:</label><br>
            <select name="tipo">
                <option value="mecanico">Mecánico</option>
                <option value="electronico">Electrónico</option>
            </select><br><br>

            <label>Materiales:</label><br>
            <?php
                $i = 0;
                $totalMateriales = count($materiales);
                while ($i < $totalMateriales) {
                    $mat = $materiales[$i];
                    ?>
                    <label>
                        <input type="checkbox" name="materiales[]" value="<?php echo htmlspecialchars($mat); ?>">
                        <?php echo htmlspecialchars(ucfirst($mat)); ?>
                    </label><br>
                    <?php
                    $i = $i + 1;
                }
            ?>
            <br>

            <button type="submit">Procesar invento</button>
        </form>
    </body>
</html>
