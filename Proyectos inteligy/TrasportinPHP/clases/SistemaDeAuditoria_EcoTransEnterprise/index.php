<!doctype html>
<html>
<head>

</head>
<body>
<h1>index</h1>
<form action="index.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Datos de los vehículos</legend>
        <label>
        <textarea name="datos_raw" placeholder="TIPO|ID|NOMBRE|FECHA|KM (Separados por #).">
        </textarea>
        </label>
    </fieldset>
    <fieldset>
        <legend>Filtro por Mínimo y Maximo de KM</legend>
        <label>
            <input type="number" name="min" placeholder="min" value="0"/>
        </label>
        <label>
            <input type="number" name="max" placeholder="max" value="0"/>
        </label>
    </fieldset>
    <fieldset>
        <legend>Equipamientos</legend>
        <label>GPS
            <input type="checkbox" name="checkboxes[]" value="gp s">GPS<br>
            <input name="gps" type="checkbox">
        </label>
        <label>Sensor de carril
            <input name="sensor_carril" type="checkbox">
        </label>
        <label>Cámara 360
            <input name="camara_360" type="checkbox">
        </label>
        <label>ABS
            <input name="abs" type="checkbox">
        </label>

    </fieldset>
    <input name="enviar" type="submit">
</form>
<?php
if (isset($_POST["enviar"])) {
    $datos = $_POST["datos_raw"];
    $min = $_POST["min"];
    $max = $_POST["max"];
    $gps= $_POST["gps"];
}
?>
</body>
</html>