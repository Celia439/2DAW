<!doctype html>
<html>
<head>
    <title>ej3</title>
</head>
<body>
<h2>Ejercicio3</h2>

<form action="ej3.1.php" method="post" enctype="multipart/form-data">
    <label>nombre
        <input type="text" name="nombre" required>
    </label>
    <label>email
        <input type="email" name="email" required>
    </label>
    <label>contraseña
        <input type="password" name="contrasena" required>
    </label>

    <input type="submit" value="Comprobar">
</form>
<?php
//3) Realizar un formulario HTML que solicite nombre de usuario, email y
//contraseña. Al enviar el formulario, los datos se envían a otra página PHP que
//mostrará un mensaje de bienvenida con el nombre de usuario y el email.
?>


</body>
</html>