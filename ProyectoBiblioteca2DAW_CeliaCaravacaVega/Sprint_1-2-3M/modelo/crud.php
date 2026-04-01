<?php
/**
 * CONSULTAR (SELECT)
 * 
 * Parámetros esperados:
 * - campos: array con los nombres de columnas (opcional)
 * - tabla: nombre de la tabla
 * - where: condición WHERE (opcional)
 * - order: condición ORDER BY (opcional)
 * 
 * Devuelve:
 * - array asociativo con los resultados
 */
function consultar($parametros)
{
    include_once __DIR__ . "/../librerias/php/conexion.php";
    $pdo = conectar();
    // Si no se especifican campos, se seleccionan todos
    $campos = !empty($parametros->campos)
        ? implode(",", $parametros->campos)
        : "*";

    // Condición WHERE opcional
    $where = !empty($parametros->where)
        ? " WHERE " . $parametros->where
        : "";

    // Condición ORDER BY opcional (se busca usar orden, pero se mantiene order para compatibilidad)
    $order = !empty($parametros->order)
        ? "ORDER BY " . $parametros->order
        : "";
    $orden = !empty($parametros->orden)
        ? "ORDER BY " . $parametros->orden
        : "";
    $orderBy = $order ?: $orden;

    $sentencia = "SELECT $campos FROM {$parametros->tabla} $where $orderBy";

    $stm = $pdo->prepare($sentencia);
    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * ELIMINAR (DELETE)
 * 
 * Parámetros esperados:
 * - tabla: nombre de la tabla
 * - where: condición WHERE obligatoria
 * 
 * Devuelve:
 * - número de filas afectadas
 */
function eliminar($parametros)
{
    include_once __DIR__ . "/../librerias/php/conexion.php";

    $pdo = conectar();

    $sentencia = "DELETE FROM {$parametros->tabla} WHERE {$parametros->where}";

    $stm = $pdo->prepare($sentencia);
    $stm->execute();

    return $stm->rowCount();
}

/**
 * ACTUALIZAR (UPDATE)
 * 
 * Parámetros esperados:
 * - tabla: nombre de la tabla
 * - campos: string con los campos a actualizar (ej: "nombre='Juan', edad=20")
 * - where: condición WHERE opcional
 * 
 * Devuelve:
 * - número de filas afectadas
 */
function actualizar($parametros)
{
    include_once __DIR__ . "/../librerias/php/conexion.php";

    $pdo = conectar();

    $sentencia = "UPDATE {$parametros->tabla} SET {$parametros->campos}";

    if (!empty($parametros->where)) {
        $sentencia .= " WHERE " . $parametros->where;
    }

    $stm = $pdo->prepare($sentencia);
    $stm->execute();

    return $stm->rowCount();
}

/**
 * INSERTAR (INSERT)
 * 
 * Parámetros esperados:
 * - tabla: nombre de la tabla
 * - arrayCampos: array con los nombres de columnas
 * - campos: array con los valores (ya preparados entre comillas)
 * 
 * Devuelve:
 * - id del último registro insertado
 */
function insertar($parametros)
{
    include_once __DIR__ . "/../librerias/php/conexion.php";

    $pdo = conectar();

    $sentencia = "INSERT INTO {$parametros->tabla} (" .
        implode(",", $parametros->arrayCampos) .
        ") VALUES (" .
        implode(",", $parametros->campos) .
        ")";

    $stm = $pdo->prepare($sentencia);
    $stm->execute();

    return $pdo->lastInsertId();
}
