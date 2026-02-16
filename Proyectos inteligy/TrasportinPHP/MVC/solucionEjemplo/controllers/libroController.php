<?php

require_once "models/libro.php";

class LibroController {

    private $modelo;

    public function __construct($conexion) {
        $this->modelo = new Libro($conexion);
    }

    public function index() {

        // Insertar
        if (isset($_POST['titulo']) && $_POST['titulo'] != "") {
            $this->modelo->insertar($_POST['titulo']);
        }

        // Borrar
        if (isset($_GET['borrar'])) {
            $id = intval($_GET['borrar']);
            $this->modelo->borrar($id);
        }

        // Obtener datos
        $libros = $this->modelo->obtenerTodos();

        require "views/libros/lista.php";
    }
}
