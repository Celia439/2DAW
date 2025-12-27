<!Doctype html>
<html>
<head>
    <title>Ej1 fecha</title>
</head>
<body>
<form action="ej1.php" method="post">
    <input name="fecha" type="date">
    <input type="submit" value="enviar">
</form>
<?php
//Ejercicio 1
//Programar una página en HTML – PHP que a través de formularios pida al usuario
//su fecha de nacimiento completa (día, mes y año) y le diga al usuario si nació en
//Lunes, martes,… o domingo.
if (isset($_POST["fecha"])) {
    $fechastr = $_POST["fecha"];// te devuelve la fecha con guiones
    // sacar la fecha con substring
    echo "La fecha sacada tal cual del formulario: " . $fechastr;
    echo "<br>" . "Año sacado:" . substr($fechastr, 0, 4), "<br>";
    echo "Mes sacado:" . substr($fechastr, 5, 2), "<br>";
    echo "Día sacado:" . substr($fechastr, 8, 2), "<br>";
    // pasarlo a variables
    $anio = substr($fechastr, 0, 4);
    $mes = substr($fechastr, 5, 2);
    $dia = substr($fechastr, 8, 2);
    //comprobar que la fecha sea valida
    if (checkdate($mes, $dia, $anio)) {
        echo "fecha valida<br>";
        echo "Te recuerdo que hoy es: ".date("d/m/Y")."<br>";//Mostrar el dia de hoy
        //crear un timestamp en segundos de la fecha introducida.
        $timestamp = mktime(0, 0, 0, $mes, $dia, $anio);
        // Mostrar la fecha formateada con date
        echo "Fecha formateada a date " . date("d/m/Y", $timestamp) . "<br>";
        // mostrar dia en el que nacio lunes martes etc
        echo "Y el día en el que naciste fue el " . date("l", $timestamp);

    }
}
?>
</body>
</html>