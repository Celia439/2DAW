<!doctype html>
<html>
<head>

</head>
<body>
<h1>Primer formulario funcional</h1>
<h2>Ejercicio1</h2>

<form action="ej1.php" method="get">
    <input type="text" name="nombre" placeholder="Su nombre es"/>
    <input type="submit">
</form>
<?php
$nombre = "";
if (isset($_GET["nombre"])) {
    $nombre = $_GET["nombre"];
}
echo "<p>Hola $nombre</p>";
?>
</body>
</html>