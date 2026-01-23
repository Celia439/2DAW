<?php
    $skillsDisponibles = array(
        "Precisión",
        "Reflejos rápidos",
        "Visión de mapa",
        "Toma de decisiones",
        "Comunicación en equipo",
        "Posicionamiento",
        "Estrategia avanzada",
        "Control de objetivos",
        "Mecánicas individuales",
        "Gestión de recursos",
        "Juego defensivo",
        "Juego agresivo",
        "Adaptabilidad",
        "Liderazgo",
        "Resiliencia mental"
    );
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Práctica 4 - ProLeague Manager</title>
    </head>
    <body>
        <h1>Práctica 4 - Registro de Jugadores de E‑Sports</h1>

        <form action="resultado.php" method="post">

            <label>Nick:</label><br>
            <input type="text" name="nick" required><br><br>

            <label>Rol:</label><br>
            <select name="rol">
                <option value="tirador">Tirador</option>
                <option value="soporte">Soporte</option>
                <option value="tanque">Tanque</option>
            </select><br><br>

            <label>Kills:</label><br>
            <input type="number" name="kills" min="0" required><br><br>

            <label>Assists:</label><br>
            <input type="number" name="assists" min="0" required><br><br>

            <label>Deaths:</label><br>
            <input type="number" name="deaths" min="0" required><br><br>

            <label>Fecha de ingreso (AAAA-MM-DD):</label><br>
            <input type="text" name="fechaIngreso" required><br><br>

            <label>Skills:</label><br>
            <?php
                $i = 0;
                $total = count($skillsDisponibles);
                
                while ($i < $total) {
                    $skill = $skillsDisponibles[$i];
                    ?>
                    <label>
                        <input type="checkbox" name="skills[]" value="<?php echo htmlspecialchars($skill); ?>">
                        <?php echo htmlspecialchars($skill); ?>
                    </label><br>
                    <?php
                    $i = $i + 1;
                }
            ?>
            <br>

            <button type="submit">Procesar jugador</button>
        </form>
    </body>
</html>
