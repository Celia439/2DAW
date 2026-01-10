<!Doctype html>
<html>
<head>
    <title>Ej1 clase</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="formularioVehiculo.php">
    <fieldset>
        <legend>Vehiculo 1</legend>
        <input name="nombre1" type="text" placeholder="nombre">
        <label>Camión</label>
        <input name="tipo1" type="radio" value="C">
        <label>Moto</label>
        <input name="tipo1" type="radio" value="M">
        <label>Turismo</label>
        <input name="tipo1" type="radio" value="T">
        <input name="peso1" type="text" placeholder="Toneladas">
    </fieldset>
    <fieldset>
        <legend>Vehiculo 2</legend>
        <input name="nombre2" type="text" placeholder="nombre">
        <label>Camión</label>
        <input name="tipo2" type="radio" value="C">
        <label>Moto</label>
        <input name="tipo2" type="radio" value="M">
        <label>Turismo</label>
        <input name="tipo2" type="radio" value="T">
        <input name="peso2" type="text" placeholder="Toneladas">
    </fieldset>
    <input type="submit" value="enviar">
</form>
<?php
if (isset($_POST["nombre1"])) {
// --- Variables Vehículo 1 ---
    $nombre1 = $_POST["nombre1"];
    $tipo1 = $_POST["tipo1"];
    $peso1 = $_POST["peso1"];

// --- Variables Vehículo 2 ---
    $nombre2 = $_POST["nombre2"];
    $tipo2 = $_POST["tipo2"];
    $peso2 = $_POST["peso2"];
    require_once("./Vehiculo.php");
    $vehiculo1 = new Vehiculo($nombre1, $tipo1, $peso1);
    $vehiculo2 = new Vehiculo($nombre2, $tipo2, $peso2);
    if ($vehiculo1->__get("tipo") !== $vehiculo2->__get("tipo")) {
        echo "<br>Los vehículos tienen distinto tipo no se pueden comparar";
    } else if ($vehiculo1->__get("peso") === $vehiculo2->__get("peso")) {
        echo "<br>Los dos vehículos pesan lo mismo";
    } else if ($vehiculo1->__get("peso") > $vehiculo2->__get("peso")) {
        echo "<br>El Primer vehículo pesa más que el segundo";
    } else if ($vehiculo1->__get("peso") < $vehiculo2->__get("peso")) {
        echo "<br> El segundo vehículo pesa más que el primero";
    } else {
        echo "<br>Ha ocurrido un error al comparar vehículos";
    }
}
?>
</body>
</html>