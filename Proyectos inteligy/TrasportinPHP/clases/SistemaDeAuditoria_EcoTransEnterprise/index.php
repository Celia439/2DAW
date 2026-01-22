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
            <input type="checkbox" name="checkboxes[]" value="gps"><br>
        </label>
        <label>Sensor de carril
            <input type="checkbox" name="checkboxes[]" value="sensor_carril"><br>
        </label>
        <label>Cámara 360
            <input type="checkbox" name="checkboxes[]" value="camara_360"><br>
        </label>
        <label>ABS
            <input type="checkbox" name="checkboxes[]" value="abs"><br>
        </label>

    </fieldset>
    <input name="enviar" type="submit">
</form>
<?php
if (isset($_POST["enviar"])) {
    $datos = $_POST["datos_raw"];
    $min = $_POST["min"];
    $max = $_POST["max"];
    $equipamientos = $_POST["checkboxes"];
    $datos=explode("#",$datos);
    echo implode( " ",$datos);
foreach ($datos as $coche){

}



}
?>
</body>
</html>