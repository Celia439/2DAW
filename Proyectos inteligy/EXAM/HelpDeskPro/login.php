<?php
session_start();
// en caso de no existiera el usuario
$error = "";
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $conexion = new mysqli("localhost", "root", "", "examen_php");
    $sentencia = "select rol,nombre,id from usuarios where email=? and password=?";
    $consulta = $conexion->prepare($sentencia);
    $consulta->bind_param("ss", $email, $pass);
    $consulta->execute();
    $consulta->bind_result($rol,$nombre,$id);
    $consulta->fetch();

    if ($rol == "") {
        $error = "Su usuario o correo son incorrectos";
    } else {
        //datos de sesión
        $_SESSION["id"]=$id;
        $_SESSION["nombre"]=$nombre;
        $_SESSION["email"] = $email;
        $_SESSION["rol"] = $rol;
        //almacenar una cookie por 24h con el email
        $_COOKIE["email"]=$email;
        setcookie("email",$email,time()+(24*60*60));
        header("location: dashboard.php");
        exit();
    }

}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Soporte - Login</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            padding-top: 100px;
            background: #eee;
        }

        .login-box {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            display: block;
            width: 250px;
            margin-bottom: 10px;
            padding: 8px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .error{
            color: red;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h3>Acceso Técnicos</h3>
    <form method="POST">
        <input type="email" name="email" value="" placeholder="Email" required>
        <input type="password" name="pass" placeholder="Contraseña" required>
        <button type="submit" name="login">Entrar</button>
    </form>
    <p class="error"><?php if ($error != "") {
            echo $error;
        } ?></p>
</div>
</body>
</html>