<!Doctype html>
<html>
<head>
    <title>Dia de nacimiento</title>
</head>
<body>
<form action="ej1.php" method="post">
    <label for="fecha">Introduzca su fecha de nacimiento
        <input name="fechaN" type="datetime-local" id="fecha">
    </label>
    <input type="submit" value="enviar">
</form>
<?php
if (!empty($_POST["fechaN"])) {
    $fecha = $_POST["fechaN"];
    $anio = substr($fecha, 0, 4);
    $mes = substr($fecha, 5, 2);
    $dia = substr($fecha, 8, 2);
    $hora= substr($fecha,11,2);
    $min= substr($fecha,14,2);
    date_default_timezone_set('UTC');


} else {
    echo "Rellene los datos";
}

?>
</body>
</html>

