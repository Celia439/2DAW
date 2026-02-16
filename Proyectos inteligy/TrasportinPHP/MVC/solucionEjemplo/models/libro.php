<?php

class Libro {

    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerTodos() {
        $resultado = $this->conexion->query("SELECT * FROM libros");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function insertar($titulo) {
        $stmt = $this->conexion->prepare("INSERT INTO libros (titulo) VALUES (?)");
        $stmt->bind_param("s", $titulo);
        $stmt->execute();
    }

    public function borrar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM libros WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
