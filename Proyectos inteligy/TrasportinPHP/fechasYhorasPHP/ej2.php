<!Doctype html>
<html>
<head>
    <title>Ej2 resta fecha</title>
</head>
<body>
<form action="ej2.php" method="post" enctype="multipart/form-data">
    <input name="fecha1" type="date">
    <input name="fecha2" type="date">
    <input type="submit" value="enviar">
</form>
<?php
//Ejercicio 2
//Programar una página en HTML – PHP que a través de formularios pida al usuario
//dos fechas completas (día, mes y año) y le diga cuántos días han pasado entre una y
//la otra.
if (isset($_POST["fecha1"], $_POST["fecha2"])) {
    $fechastrA = $_POST["fecha1"];
    $fechastrB = $_POST["fecha2"];
    // sacar la fecha con substring
    echo "La fecha sacada tal cual del formulario: <br>";
    echo "A:" . $fechastrA . "<br> B:" . $fechastrB;
    $anioA = substr($fechastrA, 0, 4);
    $mesA = substr($fechastrA, 5, 2);
    $diaA = substr($fechastrA, 8, 2);
    // pasarlo a variables
    $anioB = substr($fechastrB, 0, 4);
    $mesB = substr($fechastrB, 5, 2);
    $diaB = substr($fechastrB, 8, 2);
    //comprobar que la fecha sea valida
    if (checkdate($mesA, $diaA, $anioA) && checkdate($mesB, $diaB, $anioB)) {
        echo "<br>fechas valida<br>";
        //crear un timestamp en segundos de la fecha introducida.
        $timestampA = mktime(0, 0, 0, $mesA, $diaA, $anioA);
        $timestampB = mktime(0, 0, 0, $mesB, $diaB, $anioB);
        // Mostrar la fecha formateada con date
        echo "Fecha formateada a date A: " . date("d/m/Y", $timestampA) . "<br>";
        echo "Fecha formateada a date B: " . date("d/m/Y", $timestampB) . "<br>";
        // Calcular la diferencia
        echo "<br>el timestamp se ve asi $timestampA <br>";
        // si ponemos una fecha mas grande en el segundo parametro sucede un error y no se
        // puenden procesar numeros negativos con las fechas por lo que comprobamos cual
        // el mas grande para evitar el error
        if ($timestampA > $timestampB) {
            $timestampDiferencia = $timestampA - $timestampB;
        } else {
            $timestampDiferencia = $timestampB - $timestampA;
        }
        $dias = $timestampDiferencia / (60 * 60 * 24);
        echo "Y la diferencia entre estas dos fechas son $dias días";
    } else {
        echo "Alguna de las fechas esta mal.";
    }
}
?>
</body>
</html>