<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once __DIR__ . '/../librerias/php/config.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $baseUrl = BASE_URL; ?>
    <title>Biblioteca Online - Inicio</title>
    <!--Icono de la web-->
    <link rel="icon" href="<?= $baseUrl ?>/librerias/img/LogoBiblioteca.svg">

    <!--Estilos css-->
    <link rel="stylesheet" href="<?= $baseUrl ?>/librerias/css/main.css">

    <!--css Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Cabecera -->
    <header>

        <nav class="menu-principal">
            <img class="logo-icon" src="<?= $baseUrl ?>/librerias/img/LogoBiblioteca.svg">
            <a class="seleccionado" href="<?= $baseUrl ?>/vistas/web/webBiblioTech.php">Inicio</a>
            <a href="<?= $baseUrl ?>/vistas/web/info-devolucion.php">Devoluciones</a>
            <a href="<?= $baseUrl ?>/vistas/web/info-prestamos.php">Prestamos</a>
            <a href="<?= $baseUrl ?>/vistas/usuario/reservas/reservas.php">Reservas</a>
            <button class="iconos-header"><img src="<?= $baseUrl ?>/librerias/img/lupa.svg" /></button>
            <button class="iconos-header"><img src="<?= $baseUrl ?>/librerias/img/notificacion.svg" /></button>
            <button class="iconos-header"><img src="<?= $baseUrl ?>/librerias/img/lista.svg" /></button>
            <button class="btn-general"><a href="<?= $baseUrl ?>/vistas/web/login.php">Login</a></button>
        </nav>

        <hr>

        <!-- Pestañas -->
        <div class="pestanas">
            <div class="pestana ">Recientes</div>
            <div class="pestana">Los número 1</div>
            <div class="pestana">Categorias</div>
            <div class="pestana">Recursos Académicos</div>
        </div>
    </header>
