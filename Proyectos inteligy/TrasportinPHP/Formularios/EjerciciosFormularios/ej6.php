<!doctype html>
<html>
<head>

</head>
<body>
<h2>Ejercicio6</h2>

<form action="ej6.php" method="post">
    <input type="text" name="nombre" placeholder="tu nombre"/>
    <input type="number" name="edad" placeholder="tu edad"/>
    <input type="submit">
</form>
<?php
//6. Programar una página en HTML – PHP que a través de formularios pida al
//usuario su nombre y su edad. La página le dirá al usuario si es mayor de edad o
//no lo es.
$nombre = "";
$edad = "";

if (isset($_POST["nombre"], $_POST["edad"]) && is_string($_POST["nombre"]) && is_numeric($_POST["edad"])) {
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    if ($edad >= 18) {
        echo "$nombre eres mayor de edad busca trabajo";
    } else {
        echo "$nombre eres menor de edad deja el vape y estudia";
    }
}
?>
</body>
</html>