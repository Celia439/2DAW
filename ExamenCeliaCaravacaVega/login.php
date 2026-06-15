<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BookTrack - Login</title>
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
    </style>
</head>
<body>
<div class="login-box">
    <h3>Acceso BookTrack</h3>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="email" name="email" value="" placeholder="Email" required>
        <input type="password" name="pass" placeholder="Contraseña" required>
        <input type="submit" name="login">Entrar</input>
    </form>

</div>
</body>
</html>
<?php
try {
//Establecer conexion con la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'examen2_php', '3306');
    $correcto = false;
    if (isset($_POST["login"])) {
        echo "dentro";
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        $pass = isset($_POST["pass"]) ? $_POST["pass"] : '';
        $pass = "'" . $pass . "'";
        $email = "'" . $email . "'";
        $query = "SELECT email FROM usuarios WHERE email like  ? ";
        $consulta = $conexion->prepare($query);
        $consulta->bind_param('s', $email);
        $consulta->execute();
        $rows = $consulta->fetch();
        // no recuerdo el coutn de string
        if (strlen($rows) > 0) {
            $correcto = true;
        } else {
            echo "<p>Equivocación en el correo o contraseña</p>";
        }
        if ($correcto) {
            //Comporbar la contraseña
            $query2 = "SELECT password FROM password where password like ?";
            $conlustaP = $conexion->prepare($query2);
            $conlustaP->bind_param('s', $pass);
            $conlustaP->execute();
            $rows = $conlustaP->fetch();

            if (strlen($rows) > 0) {
                $correcto = true;
            } else {
                echo "<p>Equivocación en el correo o contraseña</p>";
            }
        }
        if ($correcto) {
            //guardar el correo durante 24h
            setcookie('email', $email, (time() + 24 * 60 * 60 * 60));
            //redirigir

        }


    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

