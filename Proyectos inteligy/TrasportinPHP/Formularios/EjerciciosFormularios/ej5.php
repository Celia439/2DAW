<!doctype html>
<html>
<head>
    <style>
        table {
            border-collapse: separate;
            margin: 2em;
        }

        th {
            background-color: darkslateblue;
            padding-left: 26em;
            color: white;
            text-align: left;
        }

        td {
            background-color: #cbbaef;
        }

        th, td {
            padding: 15px;
        }
    </style>
</head>
<body>
<h2>Ejercicio5</h2>

<form action="ej5.php" method="post">
    <input type="number" name="numero1" placeholder="num"/>
    <input type="number" name="numero2" placeholder="num"/>
    <input type="submit">
</form>
<?php
//5. Programar una página en HTML – PHP que a través de formularios pida al
//usuario dos números y muestre, en una tabla el rango de números que van desde
//el menor hasta el mayor.( hay alguna diferencia )
$primero = "";
$segundo = "";
if (isset($_POST["numero1"]) && isset($_POST["numero2"])) {
    $primero = $_POST["numero1"];
    $segundo = $_POST["numero2"];
    /** otra opccion
     * echo "<table>";
     * for(;$primero<=$segundo;$primero++){
     * echo "<td>$primero</td>";
     * }
     * echo "</table>";
     * }
     */

    echo "<table><tr>";
    foreach (range($primero, $segundo) as $num) {
        echo "<td>$num</td>";
    }
    echo "</tr></table>";

}

?>
</body>
</html>