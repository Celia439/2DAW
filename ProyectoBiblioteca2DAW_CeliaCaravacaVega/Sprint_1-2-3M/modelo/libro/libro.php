<?php
/**
 * MODELO: Libro
 * Gestiona todas las operaciones relacionadas con libros
 */

include_once __DIR__ . '/crud.php';
include_once __DIR__ . '/../librerias/php/Parametros.php';

class Libro
{
    /**
     * Obtener todos los libros
     */
    public static function obtenerTodos()
    {
        $params = new Parametros([
            'tabla' => 'libros',
            'orden' => 'id_libro DESC'
        ]);
        
        return consultar($params);
    }

    /**
     * Obtener libro por ID
     */
    public static function obtenerPorId($id)
    {
        $params = new Parametros([
            'tabla' => 'libros',
            'where' => "id_libro = $id"
        ]);
        
        $resultado = consultar($params);
        return $resultado[0] ?? null;
    }

    /**
     * Crear nuevo libro
     */
    public static function crear($datos)
    {
        $params = new Parametros([
            'tabla' => 'libros',
            'arrayCampos' => ['isbn', 'titulo', 'autor', 'editorial', 'anio_publicacion', 'idioma', 'num_paginas', 'cantidad', 'descripcion', 'estado'],
            'campos' => [
                "'" . $datos['isbn'] . "'",
                "'" . $datos['titulo'] . "'",
                "'" . $datos['autor'] . "'",
                "'" . ($datos['editorial'] ?? '') . "'",
                ($datos['anio_publicacion'] ?? 'NULL'),
                "'" . ($datos['idioma'] ?? 'Español') . "'",
                ($datos['num_paginas'] ?? 'NULL'),
                ($datos['cantidad'] ?? 1),
                "'" . ($datos['descripcion'] ?? '') . "'",
                "'" . ($datos['estado'] ?? 'activo') . "'"
            ]
        ]);
        
        return insertar($params);
    }

    /**
     * Actualizar libro
     */
    public static function actualizar($id, $datos)
    {
        $setCampos = [];
        
        if (isset($datos['isbn'])) $setCampos[] = "isbn='{$datos['isbn']}'";
        if (isset($datos['titulo'])) $setCampos[] = "titulo='{$datos['titulo']}'";
        if (isset($datos['autor'])) $setCampos[] = "autor='{$datos['autor']}'";
        if (isset($datos['editorial'])) $setCampos[] = "editorial='{$datos['editorial']}'";
        if (isset($datos['anio_publicacion'])) $setCampos[] = "anio_publicacion={$datos['anio_publicacion']}";
        if (isset($datos['idioma'])) $setCampos[] = "idioma='{$datos['idioma']}'";
        if (isset($datos['num_paginas'])) $setCampos[] = "num_paginas={$datos['num_paginas']}";
        if (isset($datos['cantidad'])) $setCampos[] = "cantidad={$datos['cantidad']}";
        if (isset($datos['descripcion'])) $setCampos[] = "descripcion='{$datos['descripcion']}'";
        if (isset($datos['estado'])) $setCampos[] = "estado='{$datos['estado']}'";
        
        $params = new Parametros([
            'tabla' => 'libros',
            'campos' => implode(', ', $setCampos),
            'where' => "id_libro = $id"
        ]);
        
        return actualizar($params);
    }

    /**
     * Eliminar libro
     */
    public static function eliminar($id)
    {
        $params = new Parametros([
            'tabla' => 'libros',
            'where' => "id_libro = $id"
        ]);
        
        return eliminar($params);
    }

    /**
     * Buscar libros por título
     */
    public static function buscarPorTitulo($titulo)
    {
        $params = new Parametros([
            'tabla' => 'libros',
            'where' => "titulo LIKE '%$titulo%'"
        ]);
        
        return consultar($params);
    }

    /**
     * Obtener géneros de un libro
     */
    public static function obtenerGeneros($id_libro)
    {
        $params = new Parametros([
            'tabla' => 'libro_genero lg INNER JOIN generos g ON lg.id_genero = g.id_genero',
            'campos' => ['g.id_genero', 'g.nombre'],
            'where' => "lg.id_libro = $id_libro"
        ]);
        
        return consultar($params);
    }
}
?>