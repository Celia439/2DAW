<?php

/*
header('Content-Type: application/json; charset=utf-8');

echo json_encode([
    'recibido'     => true,
    'metodo'       => $_SERVER['REQUEST_METHOD'],
    'post_raw'     => $_POST,
    'php_input'    => file_get_contents('php://input'),
    'get'          => $_GET,
    'request_all'  => $_REQUEST
]);
exit;

*/

if (isset($_REQUEST['usuario']) && isset($_REQUEST['pass'])) {

    //Recoger los datos
    $usuario = trim($_REQUEST['usuario'] ?? '');
    $pass = trim($_REQUEST['pass'] ?? '');

    //Comprobar los datos
    if (empty($usuario) || empty($pass)) {
        echo json_encode([
            "ok" => false,
            "message" => "Faltan usuario o contraseña"
        ]);
        exit;
    }

    //Utilizar los metodos login
    $loginControl = new login();

    // Verifica credenciales
    $usuarioBD = $loginControl->comprobarUsuario($usuario, $pass);

    if ($usuarioBD !== false) {
        // Login OK → guarda en sesión (usa el array devuelto por el modelo)
        $_SESSION["id_user"] = $usuarioBD['id'] ?? null;

        echo json_encode([
            "ok" => true,
            "message" => "Login correcto. Redirigiendo..."
        ]);
    } else {
        echo json_encode([
            "ok" => false,
            "message" => "Usuario o contraseña incorrectos"
        ]);
    }

    exit;  // Siempre termina aquí 

}