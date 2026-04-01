<?php
require_once __DIR__ . '/../librerias/php/config.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php $baseUrl = BASE_URL; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Online - Usuarios Bibliotecario</title>
    <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Iconos de Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!--Estilos del proyecto-->
    <link rel="stylesheet" href="<?= $baseUrl ?>/librerias/css/main.css">

    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--JS Asincrono-->
    <script src="<?= $baseUrl ?>/librerias/js/bibliotecario.js"></script>
</head>

<body>
    <!-- ========== NAVBAR ========== -->
    <nav class="navbar navbar-biblioteca navbar-expand-lg">
        <a class="navbar-brand" href="<?= $baseUrl ?>/vistas/bibliotecario/inicio/IniciBibliotecario.php">
            <img src="<?= $baseUrl ?>/librerias/img/LogoBiblioteca.svg" alt="Logo">
        </a>
        <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#navMenu">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-3">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseUrl ?>/vistas/bibliotecario/prestamos/PrestamosBibliotecario.php"
                        style="background: rgba(255,255,255,0.12); border-radius:4px;">
                        <span class="nav-icon">+</span> Préstamos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseUrl ?>/vistas/bibliotecario/reservas/ReservasBibliotecario.php">
                        <span class="nav-icon"><i class="bi bi-calendar3"></i></span> Reservas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseUrl ?>/vistas/bibliotecario/multas/MultasBibliotecario.php">
                        <span class="nav-icon"><i class="bi bi-clock"></i></span> Multas
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <button class="btn-notificacion"><i class="bi bi-bell"></i></button>
                </li>
                <li class="nav-item">
                    <button class="btn-login">Login</button>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ========== SIDEBAR + CONTENIDO ========== -->
    <div class="d-flex">

        <!-- Sidebar -->
        <div class="sidebar"
            style="width: 160px; min-height: calc(100vh - 60px); background-color: #fff; border-right: 1px solid #eee; padding-top: 0.8rem; flex-shrink: 0;">
            <a href="<?= $baseUrl ?>/vistas/bibliotecario/usuarios/UsuariosBibliotecario.php" class="d-block px-3 py-2 text-decoration-none"
                style="color: var(--color-texto-oscuro); font-size: 0.9rem; font-weight: 600; border-left: 3px solid transparent; transition: all 0.2s;"
                onmouseover="this.style.borderLeftColor='var(--color-navbar)'; this.style.background='#f0f8f8';"
                onmouseout="this.style.borderLeftColor='transparent'; this.style.background='transparent';">
                Usuarios
            </a>
            <a href="<?= $baseUrl ?>/vistas/bibliotecario/libros/LibrosBibliotecario.php" class="d-block px-3 py-2 text-decoration-none"
                style="color: var(--color-texto-oscuro); font-size: 0.9rem; font-weight: 600; border-left: 3px solid transparent; transition: all 0.2s;"
                onmouseover="this.style.borderLeftColor='var(--color-navbar)'; this.style.background='#f0f8f8';"
                onmouseout="this.style.borderLeftColor='transparent'; this.style.background='transparent';">
                Libros
            </a>
            <a href="<?= $baseUrl ?>/vistas/bibliotecario/empresa/EmpresaBibliotecario.php" class="d-block px-3 py-2 text-decoration-none"
                style="color: var(--color-texto-oscuro); font-size: 0.9rem; font-weight: 600; border-left: 3px solid transparent; transition: all 0.2s;"
                onmouseover="this.style.borderLeftColor='var(--color-navbar)'; this.style.background='#f0f8f8';"
                onmouseout="this.style.borderLeftColor='transparent'; this.style.background='transparent';">
                Empresa
            </a>
        </div>

        <!-- Contenido principal -->
        <div class="flex-grow-1" style="background-color: var(--color-fondo-pagina);">

            <!-- Barra secundaria -->
            <div class="barra-secundaria">
                <div class="input-group input-busqueda">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Buscar...">
                </div>
            </div>