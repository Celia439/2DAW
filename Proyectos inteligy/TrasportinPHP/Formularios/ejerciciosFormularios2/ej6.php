<!doctype html>
<html>
<head>
    <title>ej6</title>
</head>
<body>
<h2>Ejercicio6</h2>
<!--
6) Realizar un formulario HTML que pida nombre, email, asunto y mensaje. Al
enviar, una página PHP mostrará un resumen de los datos introducidos en
una tabla.
-->
<form action="ej6.1.php" method="post" enctype="multipart/form-data">
    <label>nombre
        <input name="nombre" type="text">
        <label>email
            <input name="email" type="email" placeholder="ejemplo@gmail.com">
        </label>
        <label> Asunto
            <input name="asunto" type="text">
        </label>
        <label> mensaje
            <textarea name="mensaje"></textarea>
        </label>
        <input type="submit" value="Comprobar">
        <input type="reset" value="Lipiar Parametros">
</form>
</body>
</html>