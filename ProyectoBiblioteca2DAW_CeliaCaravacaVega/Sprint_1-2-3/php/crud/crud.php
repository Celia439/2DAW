<?php
/**
 * Consultar 
 * Debes de tener dentro de parametros 
 * Campos(si no introduces ninguno te los da todos)
 * Tabla
 * Condiciones(opcional)
 * @param mixed $parametros
 * @return void
 */
function consultar($parametros)
{
    include_once "../conexion.php";
    if ($parametros->campos) {
        $campos = implode(",", $parametros->campos);
    } else {
        $campos = "*";
    }
    if ($parametros->where) {
        $were = " WHERE " . $parametros->where;
    }

    $sentencia = "SELECT " . $campos . " FROM " . $parametros->tabla . $were;
    $pdo->prepare($sentencia);

}

/**
 * Eliminar
 * @param mixed $parametros
 * @return void
 */
function eliminar($parametros)
{
    include_once "../conexion.php";
    $sentencia = "DELETE FROM ".$parametros->tabla ." WHERE ".$parametros->where;
    $pdo->prepare($sentencia);
    $pdo->execute();

}
/**
 * Actualizar 
 * Tabla
 * Campos a acutalizar
 * @param mixed $parametros
 * @return void
 */
function actualizar($parametros)
{
    include_once "../conexion.php";
    $sentencia = "UPDATE ".$parametros->tabla." SET ".$parametros->campos;
    $pdo->prepare($sentencia);

}
//todo: Debes de realizar lo que pone aqui en las demas 
/**
 * 
 * Insertar dentro de bibliotech
 * Debes de introducir un objeto con 
 * -tabla
 * -campos
 * -valores
 * @param mixed $parametros
 * @return void
 */
function insertar($parametros)
{
    include_once "../conexion.php";
    $sentencia = "INSERT INTO " . $parametros->tabla . "(" . implode(",", $parametros->arrayCampos) . ") VALUES (" . implode(",", $parametros->campos) . ")";

    $stm=$pdo->prepare($sentencia);
    $stm->execute();
    echo $sentencia;
}