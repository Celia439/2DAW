<?php

class login
{
    function comprobarUsuario($usuario, $pass)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();

        $resultado = false;

        $parametros->tabla = "usuarios";

        $parametros->whereArray = [];
        $parametros->whereArray[] = "username = '$usuario'";
      
        $result = $dbControl->select($parametros);

        if (!$result || empty($result[0])) {
            return $resultado;
        }

        $usuarioBD = $result[0];

        if (password_verify($pass, $usuarioBD["password_hash"])) {
            $resultado = $usuarioBD;
        }
        return $resultado;
    }

}