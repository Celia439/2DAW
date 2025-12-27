<!doctype html>
<html>
<head>
    <style>
        body {
            background-color: azure;
        }
        table{
            border-collapse: collapse;
        }
        th{
            background: black;
            color: white;
            border: solid white 2px;
            padding: 15px;
        }
        td{
            color: white;
            padding: 15px;
        }
    </style>
</head>
<body>
<h2>Ejercicio9</h2>

<form action="ej9.php" method="post">
    <input type="number" name="num1" placeholder="num1" required/>
    <input type="number" name="num2" placeholder="num2" required/>
    <input type="number" name="num3" placeholder="num3" required/>
    <input type="number" name="num4" placeholder="num4" required/>
    <input type="submit" value="Comprobar">
</form>

<?php
if (isset($_POST["num1"], $_POST["num2"], $_POST["num3"], $_POST["num4"])) {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $num3 = $_POST["num3"];
    $num4 = $_POST["num4"];

    echo "<table>
    <tr>
        <th>Número</th>
        <th>Cuadrado</th>
        <th>Cubo</th>
    </tr>";

    // Array con números
    $nums = array($num1, $num2, $num3, $num4);

    // Variable para alternar color
    $variar = 0;

    foreach ($nums as $num) {

        // Alternar color según $toggle
        if ($variar === 0) {
            $color = "green";
            $variar = 1;
        } else {
            $color = "limegreen";
            $variar = 0;
        }

        echo "<tr>";
        echo "<td style='background:$color;'>" . $num . "</td>";
        echo "<td style='background:$color;'>" . ($num ** 2) . "</td>";
        echo "<td style='background:$color;'>" . ($num ** 3) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>

</body>
</html>
