<!doctype html>
<html>
<head>
    <title>ej9</title>
</head>
<body>
<h2>Ejercicio9</h2>
<!--
10)Crear un formulario HTML para subir cualquier archivo.
• El usuario puede subir un solo archivo.
-->
<form action="ej9.1.php" method="post" enctype="multipart/form-data">
        <label> Subir archivo
            <input name="archivos" type="file">
        </label>
        <input type="submit" value="Comprobar">
        <input type="reset" value="Lipiar Parametros">
</form>
</body>
</html>