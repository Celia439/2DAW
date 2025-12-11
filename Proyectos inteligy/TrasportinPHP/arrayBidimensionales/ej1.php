<!DOCTYPE html>
<html>
<head>
    <title>array</title>
    <style>
        table {
            background-color: lightblue;
        }

        th {
            background-color: pink;
            padding: 1em;
        }

        td {
            background-color: coral;
            padding: 2em;
        }
    </style>
</head>
<body>
<?php
$elementos = [1 => 2, 3 => 4, 5 => 6];
$claves = array_keys($elementos);
$valores = array_values($elementos);
?>
<table>
    <tr>
        <th>Clave</th>

        <?php
        foreach ($claves as $clave) {
            echo "<td>$clave</td>";
        }
        ?>
    </tr>
    <tr>
        <th>Valor</th>

        <?php
        foreach ($valores as $valor) {
            echo "<td>$valor</td>";
        }
        ?>
    </tr>
</table>

</body>
</html>
