<!doctype html>
<html>
<head>
    <title>ej9</title>
</head>
<body>
<h2>Ejercicio9</h2>
<!--
9) Realizar un formulario HTML que permita al usuario subir varios archivos a la
vez (input tipo file con multiple).
• El formulario permitirá subir imágenes o documentos de texto.
-->
<form action="ej9.1.php" method="post" enctype="multipart/form-data">
        <label> Subir pdf
            <input name="archivos[]" type="file" multiple>
        </label>
        <input type="submit" value="Comprobar">
        <input type="reset" value="Lipiar Parametros">
</form>
</body>
</html>