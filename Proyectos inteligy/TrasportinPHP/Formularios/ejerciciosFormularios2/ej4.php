<!doctype html>
<html>
<head>
    <title>ej4</title>
</head>
<body>
<h2>Ejercicio4</h2>

<form action="ej4.1.php" method="post" enctype="multipart/form-data">
    <label>Figura Geometrica
        <select name="figura">
            <option selected>Selectione figura</option>
            <option>Cuadrado</option>
            <option>Rectangulo</option>
            <option>Circulo</option>
        </select>
        <label>Rectangulo
            <input name="base" type="number" placeholder="base">
            <input name="altura" type="number" placeholder="altura">
        </label>
        <label>Cuadrado
            <input name="lado" type="number" placeholder="lados">
        </label>
        <label>Circulo
            <input name="radio" type="number" placeholder="radio">
        </label>
    </label>

    <input type="submit" value="Comprobar">
</form>
<?php
//4) Crear un formulario HTML que permita al usuario seleccionar una figura
//geométrica (cuadrado, rectángulo, círculo) y escribir los valores necesarios
//para calcular el área. Al enviar, una página PHP mostrará el área calculada
//según los datos introducidos.
?>


</body>
</html>