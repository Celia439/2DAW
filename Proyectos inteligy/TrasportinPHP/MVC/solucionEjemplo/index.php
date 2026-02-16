<?php

    require_once "config/database.php";
    require_once "controllers/libroController.php";

    $conexion = Database::conectar();

    $controller = new LibroController($conexion);
    $controller->index();
