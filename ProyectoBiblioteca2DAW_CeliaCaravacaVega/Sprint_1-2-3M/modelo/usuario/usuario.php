<?php
/**
 * MODELO: Usuario
 * Gestiona todas las operaciones relacionadas con usuarios
 */

include_once __DIR__ . '/crud.php';
include_once __DIR__ . '/../librerias/php/Parametros.php';

class Usuario
{
    /**
     * Obtener todos los usuarios
     */
    public static function obtenerTodos()
    {
        $params = new Parametros([
            'tabla' => 'usuarios',
            'orden' => 'id_usuario DESC'
        ]);

        return consultar($params);
    }

    /**
     * Obtener un usuario por ID
     */
    public static function obtenerPorId($id)
    {
        $params = new Parametros([
            'tabla' => 'usuarios',
            'where' => "id_usuario = $id"
        ]);
        
        $resultado = consultar($params);
        return $resultado[0] ?? null;
    }

    /**
     * Crear nuevo usuario
     */
    public static function crear($datos)
    {
        include_once __DIR__ . '/../../librerias/php/helpers.php';

        $campos = sanearArray($datos);
        $campos['password'] = password_hash($campos['password'], PASSWORD_DEFAULT);

        $params = new Parametros([
            'tabla' => 'usuarios',
            'arrayCampos' => ['nombre', 'apellido', 'dni', 'email', 'password', 'telefono', 'direccion', 'rol', 'estado'],
            'campos' => [
                "'{$campos['nombre']}'",
                "'{$campos['apellido']}'",
                "'{$campos['dni']}'",
                "'{$campos['email']}'",
                "'{$campos['password']}'",
                "'{$campos['telefono']}'",
                "'{$campos['direccion']}'",
                "'{$campos['rol']}'",
                "'{$campos['estado']}'"
            ]
        ]);

        return insertar($params);
    }

    /**
     * Actualizar usuario
     */
    public static function actualizar($id, $datos)
    {
        $setCampos = [];
        
        if (isset($datos['nombre'])) $setCampos[] = "nombre='{$datos['nombre']}'";
        if (isset($datos['apellido'])) $setCampos[] = "apellido='{$datos['apellido']}'";
        if (isset($datos['dni'])) $setCampos[] = "dni='{$datos['dni']}'";
        if (isset($datos['email'])) $setCampos[] = "email='{$datos['email']}'";
        if (isset($datos['telefono'])) $setCampos[] = "telefono='{$datos['telefono']}'";
        if (isset($datos['direccion'])) $setCampos[] = "direccion='{$datos['direccion']}'";
        if (isset($datos['rol'])) $setCampos[] = "rol='{$datos['rol']}'";
        if (isset($datos['estado'])) $setCampos[] = "estado='{$datos['estado']}'";
        
        if (isset($datos['password'])) {
            $passwordHash = password_hash($datos['password'], PASSWORD_DEFAULT);
            $setCampos[] = "password='$passwordHash'";
        }
        
        $params = new Parametros([
            'tabla' => 'usuarios',
            'campos' => implode(', ', $setCampos),
            'where' => "id_usuario = $id"
        ]);
        
        return actualizar($params);
    }

    /**
     * Eliminar usuario
     */
    public static function eliminar($id)
    {
        $params = new Parametros([
            'tabla' => 'usuarios',
            'where' => "id_usuario = $id"
        ]);
        
        return eliminar($params);
    }

    /**
     * Buscar usuario por email
     */
    public static function buscarPorEmail($email)
    {
        $params = new Parametros([
            'tabla' => 'usuarios',
            'where' => "email = '$email'"
        ]);
        
        $resultado = consultar($params);
        return $resultado[0] ?? null;
    }

    /**
     * Verificar login
     */
    public static function verificarLogin($email, $password)
    {
        $usuario = self::buscarPorEmail($email);
        
        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario;
        }
        
        return false;
    }
}
?>