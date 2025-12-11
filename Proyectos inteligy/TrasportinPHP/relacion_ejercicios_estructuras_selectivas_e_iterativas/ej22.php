<!Doctype html>
<html>

<head>
    <title>Estructuras selectivas e iterativas</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }

        table {
            border-collapse: collapse;
            margin: 20px;
            float: left;
        }

        th, td {
            border: 1px solid #333;
            padding: 5px 10px;
            text-align: center;
        }

        th {
            background-color: #87ceeb;
        }

        .mes {
            background-color: #add8e6;
            font-weight: bold;
        }
    </style>
</head>

<body>
<p>22.Utilizando bucles hacer una página web un PHP que muestre el calendario
    de todo un año. La página tendrá una tabla por cada mes en la que habrá,
    una fila con el nombre del mes, una fila con cada día de la semana y las
    celdas necesarias para los días del mes. El año empezará en lunes (1 de
    enero = lunes).
</p>

<?php
$meses = array(
        "Enero" => 31, "Febrero" => 28, "Marzo" => 31, "Abril" => 30,
        "Mayo" => 31, "Junio" => 30, "Julio" => 31, "Agosto" => 31,
        "Septiembre" => 30, "Octubre" => 31, "Noviembre" => 30, "Diciembre" => 31
);

$diasSemana = array("Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom");

// Día de la semana donde empieza el año (1 de enero es lunes, así que 0 = lunes)
$diaSemanaActual = 0;

foreach ($meses as $mes => $dias) {
    echo "<table>";
    echo "<tr><th colspan='7' class='mes'>$mes</th></tr>";
    echo "<tr>";
    foreach ($diasSemana as $diaS) {
        echo "<th>$diaS</th>";
    }
    echo "</tr>";

    echo "<tr>";

    // Imprimir celdas vacías antes del primer día del mes
    for ($i = 0; $i < $diaSemanaActual; $i++) {
        echo "<td></td>";
    }

    for ($dia = 1; $dia <= $dias; $dia++) {
        echo "<td>$dia</td>";
        $diaSemanaActual++;

        // Si es domingo, cerrar la fila y empezar otra
        if ($diaSemanaActual == 7) {
            echo "</tr>";
            if ($dia != $dias) {
                echo "<tr>";
            }
            $diaSemanaActual = 0;
        }
    }

    // Rellenar celdas vacías si el mes no termina en domingo
    if ($diaSemanaActual != 0) {
        for ($i = $diaSemanaActual; $i < 7; $i++) {
            echo "<td></td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}
?>

</body>

</html>
