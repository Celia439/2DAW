<!doctype html>
<html>
<head>
    <title>ej8</title>
</head>
<body>
<h2>Ejercicio8</h2>
<!--
8) Crear un formulario HTML que permita al usuario subir un documento PDF y
escribir un título.
-->
<form action="ej8.1.php" method="post" enctype="multipart/form-data">
    <label>Titulo del Pdf
        <input name="titulo" type="text">
        <label> Subir pdf
            <input name="pdf" type="file">
        </label>
        <input type="submit" value="Comprobar">
        <input type="reset" value="Lipiar Parametros">
</form>
</body>
</html>