<!doctype html>
<html>
<head>
<title>ej2</title>
</head>
<body>
<h2>Ejercicio2</h2>

<form action="ej2.1.php" method="post" enctype="multipart/form-data">
    <input name="euros" type="number" placeholder="Euros">
    <select name="tipo">
        <option selected>Seleciona</option>
        <option>dólar</option>
        <option>libra</option>
        <option>estrelina</option>
        <option>yen</option>
    </select>
    <input type="submit" value="Comprobar">
</form>
<?php
//2) Realizar un formulario HTML que permita al usuario introducir un importe en
//euros. El formulario tendrá una lista desplegable para seleccionar la
//moneda de destino (dólar, libra esterlina, yen). Al enviar, una página PHP
//mostrará el importe convertido según la moneda seleccionada.
?>


</body>
</html>