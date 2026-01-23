<?php
    $marcasDisponibles = array(
        "Agente verificado",
        "Confidencial",
        "Urgente",
        "Externo",
        "Prioridad táctica",
        "Requiere respuesta",
        "Información sensible",
        "Canal inseguro",
        "Revisión manual",
        "Autenticidad dudosa"
    );
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Práctica 5 - CipherNet Security</title>
    </head>
    <body>
        <h1>Práctica 5 - Registro de Mensajes Encriptados</h1>

        <form action="resultado.php" method="post">

            <label>Contenido del mensaje (cifrado):</label><br>
            <textarea name="contenido" rows="5" cols="60" required></textarea><br><br>

            <label>Fecha de recepción (AAAA-MM-DD):</label><br>
            <input type="text" name="fechaRecepcion" required><br><br>

            <label>Prioridad (1-5):</label><br>
            <input type="number" name="prioridad" min="1" max="5" required><br><br>

            <label>Tipo de cifrado:</label><br>
            <select name="tipo">
                <option value="basico">Básico</option>
                <option value="avanzado">Avanzado</option>
            </select><br><br>

            <label>Marcas:</label><br>
            <?php
                $i = 0;
                $total = count($marcasDisponibles);
                while ($i < $total) {
                    $m = $marcasDisponibles[$i];
                    ?>
                    <label>
                        <input type="checkbox" name="marcas[]" value="<?php echo htmlspecialchars($m); ?>">
                        <?php echo htmlspecialchars($m); ?>
                    </label><br>
                    <?php
                    $i = $i + 1;
                }
            ?>
            <br>

            <button type="submit">Procesar mensaje</button>
        </form>
    </body>
</html>
