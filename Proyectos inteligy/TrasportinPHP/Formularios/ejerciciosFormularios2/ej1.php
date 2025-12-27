<!doctype html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
        }

        th {
            font-family: cursive;
            padding: 1em;
        }

        td {
            padding: 1em;
        }
    </style>
</head>
<body>
<h2>Ejercicio1</h2>

<form action="ej1.1.php" method="post" enctype="multipart/form-data">

    <input type="text" placeholder="Nombre" name="nombre">
    <input type="number" maxlength="2" placeholder="Edad" name="edad">
    <input type="submit" value="Comprobar">
</form>
<?php
//1) Realizar un formulario HTML que solicite al usuario su nombre y su edad.
//Al enviar el formulario, los datos se envían a otra página PHP que mostrará
//un saludo personalizado con el nombre y la edad introducidos.
?>


</body>
</html>