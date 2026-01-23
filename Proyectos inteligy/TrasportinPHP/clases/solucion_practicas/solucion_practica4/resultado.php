<?php
    require_once "model.php";

    $jugadores = array();
    $mensajeError = "";
    $totalMVP = 0;
    $totalNoMVP = 0;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $nick = "";
        $rol = "tirador";
        $kills = 0;
        $assists = 0;
        $deaths = 0;
        $fechaIngreso = "";
        $skills = array();

        if (isset($_POST["nick"])) {
            $nick = $_POST["nick"];
        }
        if (isset($_POST["rol"])) {
            $rol = $_POST["rol"];
        }
        if (isset($_POST["kills"])) {
            $kills = (int)$_POST["kills"];
        }
        if (isset($_POST["assists"])) {
            $assists = (int)$_POST["assists"];
        }
        if (isset($_POST["deaths"])) {
            $deaths = (int)$_POST["deaths"];
        }
        if (isset($_POST["fechaIngreso"])) {
            $fechaIngreso = $_POST["fechaIngreso"];
        }
        if (isset($_POST["skills"])) {
            $skills = $_POST["skills"];
        }

        if ($nick === "" || $fechaIngreso === "") {
            $mensajeError = "Los datos del jugador no son válidos.";
        } else {
            if ($rol === "soporte") {
                $jugador = new Soporte($nick, "Soporte", $kills, $assists, $deaths, $fechaIngreso, $skills);
            } else {
                if ($rol === "tanque") {
                    $jugador = new Tanque($nick, "Tanque", $kills, $assists, $deaths, $fechaIngreso, $skills);
                } else {
                    $jugador = new Tirador($nick, "Tirador", $kills, $assists, $deaths, $fechaIngreso, $skills);
                }
            }

            $jugadores[] = $jugador;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Resultados - Práctica 4</title>
    </head>
    <body>
        <h1>Informe de Jugadores - ProLeague Manager</h1>

        <?php
            if ($mensajeError !== "") {
                echo "<p>" . htmlspecialchars($mensajeError) . "</p>";
            } else {

                if (count($jugadores) === 0) {
                    echo "<p>No se ha recibido ningún jugador.</p>";
                } else {

                    $i = 0;
                    $total = count($jugadores);

                    while ($i < $total) {
                        $j = $jugadores[$i];

                        $kda = $j->kda();
                        $rend = $j->calcularRendimiento();
                        $nivel = $j->nivelJugador();
                        $bonus = $j->bonusRol();
                        $esMVP = $j->esMVP();

                        if ($esMVP) {
                            $totalMVP = $totalMVP + 1;
                        } else {
                            $totalNoMVP = $totalNoMVP + 1;
                        }

                        echo "<hr>";
                        echo "<h2>Informe del jugador</h2>";

                        echo "<p><strong>Ficha descriptiva:</strong><br>";
                        echo htmlspecialchars($j->__toString()) . "<br>";
                        $s = $j->getSkills();
                        if (count($s) > 0) {
                            echo "Skills: " . htmlspecialchars(implode(", ", $s));
                        } else {
                            echo "Skills: Ninguna seleccionada";
                        }
                        echo "</p>";

                        echo "<p><strong>Análisis deportivo:</strong><br>";
                        echo "KDA: " . number_format($kda, 2) . "<br>";
                        echo "Rendimiento: " . number_format($rend, 2) . "<br>";
                        echo "Nivel de jugador: " . htmlspecialchars($nivel) . "<br>";
                        echo "Bonus por rol: " . number_format($bonus, 2) . "<br>";
                        echo "</p>";

                        echo "<p><strong>Conclusión:</strong><br>";
                        if ($esMVP) {
                            echo "El jugador ha sido clasificado como <strong>MVP</strong>.";
                        } else {
                            echo "El jugador no ha sido clasificado como MVP.";
                        }
                        echo "</p>";

                        $i = $i + 1;
                    }

                    echo "<hr>";
                    echo "<h2>Resumen global</h2>";
                    echo "<p>Total de jugadores procesados: " . Jugador::getTotalJugadores() . "</p>";
                    echo "<p>MVP: " . $totalMVP . "</p>";
                    echo "<p>No MVP: " . $totalNoMVP . "</p>";
                }
            }
        ?>
    </body>
</html>
