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

<form action="ej1.php" method="post" enctype="multipart/form-data">

    <input type="text" placeholder="Nombre imagen" name="nombreImg">
    <input type="file" name="img">
    <input type="submit" value="Comprobar">
</form>
<?php
// Realizar un documento en HTML – PHP que solicite
//al usuario una imagen y un nombre para la imagen
//(no tiene por qué coincidir con el nombre original).
//El documento deberá guardar la imagen con el
//nuevo nombre y mostrar por pantalla la
//información de la imagen subida por el usuario en
//una tabla como la siguiente:
if (isset($_POST["nombreImg"], $_FILES["img"])) {
    $nombre = $_POST["nombreImg"];
    $nombreOri = $_FILES["img"]["name"];
    $nombreTmp = $_FILES["img"]["tmp_name"];
    $tipo = $_FILES["img"]["type"];
    $tam = $_FILES["img"]["size"];
// crear un directorio img si no existe
    if (!file_exists("./img")) {
        mkdir("./img",0777,true);
    }

    $info = pathinfo($nombreOri, PATHINFO_EXTENSION);
    //establecer la ruta donde se almacena el archivo a subir
    $ruta = "./img/$nombre." . $info;
    // subir el archivo con el nombre de la ruta
    move_uploaded_file($nombreTmp, $ruta);


    echo "<table>";
    echo "<tr><th>Nombre original</th><th>Nombre nuevo</th><th>Tamaño en megas</th><th>Tipo de imagen</th></tr>";

    echo "</table>";

}
?>


</body>
</html>