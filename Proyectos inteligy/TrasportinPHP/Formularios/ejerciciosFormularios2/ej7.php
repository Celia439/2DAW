<!doctype html>
<html>
<head>
    <title>ej7</title>
</head>
<body>
<h2>Ejercicio7</h2>
<!--
7) Realizar un formulario HTML que permita al usuario subir una imagen de
perfil y escribir un nombre de usuario.
• La imagen debe ser jpg, png o gif.
-->
<form action="ej7.1.php" method="post" enctype="multipart/form-data">
    <label>Nombre de usuario
        <input name="nombre" type="text">
        <label>Foto de perfil
            <input name="foto" type="file">
        </label>
        <input type="submit" value="Comprobar">
        <input type="reset" value="Lipiar Parametros">
</form>
</body>
</html>