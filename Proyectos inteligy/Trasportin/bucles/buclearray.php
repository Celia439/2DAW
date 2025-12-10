<!DOCTYPE html>
<html>
<head>
    <title>Condicionales</title>
    <style>
        table {
            border-collapse: collapse;
            border: black 1px solid;
        }

        th {
            color: white;
            background-color: red;
            border: white 1px solid;
            padding: 5px;
            text-align: left;
            width: 5em;
        }

        td {
            padding: 5px;
            text-align: left;
            border: white 1px solid;
            width: 5em;
        }
    </style>
</head>
<body>
<?php
$numeros = array("pos0" => "palabra1", "pos2" => "palabra2", "pos3" => "palabra3", "pos4" => "palabra4");
?>
<table>
    <tr>
        <th>Posición</th>
        <th>valor</th>
    </tr>
    <?php
    $uno = 1;
    foreach ($numeros as $clave => $valor) {
        echo "<tr>";
        if ($uno === 1) {

            echo "<td style='background-color: pink'>" . $clave . "</td>";
            echo "<td style='background-color: pink'>" . $valor . "</td>";
            echo "</tr>";
            $uno = 0;
        } else {
            echo "<td style='background-color: palevioletred'>" . $clave . "</td>";
            echo "<td style='background-color: palevioletred'>" . $valor . "</td>";
            echo "</tr>";
            $uno = 1;
        }
    }
    ?>
</table>
</body>
</html>