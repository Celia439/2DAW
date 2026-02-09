<?php
//Iniciar sesion
session_start();

//Agenda personal web

//--Sistema de login para acceder a la agenda
//- *formulario de login con usuario y contraseña

/**
 * Función void que muestra el formulario
 */
echo "<form action='#' enctype='multipart/form-data' method='post'>
<p>Login :D</p>
<input name='usuario' type='text' placeholder='usuario' />
<input name='pass' type='password' placeholder='contraseña'/>
<input name='enviar' type='submit' value='enviar'/>
</form>";


/**
 * Función para comprobar que el formulario este correcto
 * Devuelve 1 true
 *          0 false
 * @param $usuario
 * @param $pass
 * @return bool
 */
function comprobarLogin($usuario, $pass)
{
    $correcto = false;
    if (preg_match("`^.{3,}$`", $usuario) && preg_match("`^.{8,}$`", $pass)) {
        $correcto = true;
    }
    return $correcto;
}

if (isset($_POST["enviar"])) {
    $usuario = $_POST["usuario"];
    $contrasenia = $_POST["pass"];
    if (comprobarLogin($usuario, $contrasenia)) {
        echo "<p>Comprobando bbdd ver usuario existente</p>";
        //- *Comprobar credenciales contra la base de datos
        //CREATE DATABASE if not EXISTS agendaPersonal;
        //use agendaPersonal;
        //create table usuarios(
        //	nombre varchar(50),
        //	rol SET("usuario","administrador"),
        //    pass varchar(50)
        //);
        $conexion = mysqli_connect("localhost", "root", "", "agendaPersonal");
        $sentencia = "select nombre,rol from usuarios where nombre=? and pass=?";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bind_param("ss", $usuario, $contrasenia);
        $consulta->execute();
        $consulta->bind_result($nombre, $rol);
        $consulta->fetch();
        if ($nombre != "") {
            //- *Sesiones para mantener usuario conectado
            echo "Usuario encontrado, pasas";
            $_SESSION["login"]=true;
        $_SESSION["usuario"]=$nombre;
        $_SESSION["rol"]=$rol;
        header("location: panel.php");
        exit;
        } else {
            echo "Oye que tu usuario no existe.";
        }
    } else {
        echo "<p> Bad $usuario---$contrasenia</p>";
    }
}