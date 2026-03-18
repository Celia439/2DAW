<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Online - Inicio</title>
    <!--Icono de la web-->
    <link rel="icon" href="../librerias/img/LogoBiblioteca.svg">

    <!--Estilos css-->
    <link rel="stylesheet" href="../librerias/css/WebBiblioTech.css">

    <!--css Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Cabecera -->
    <header class="container-build bg-prymary">

        <nav class="menu-principal">
            <img class="logo-icon" src="../librerias/img/LogoBiblioteca.svg">
            <a class="seleccionado" href="../vistas/WebBiblioTech.php">Inicio</a>
            <a href="../vistas/info-devolucion.php">Devoluciones</a>
            <a href="../vistas/info-prestamos.php">Prestamos</a>
            <a href="../vistas/USUARIO/reservas.html">Reservas</a>
            <button class="iconos-header"><img src="../librerias/img/lupa.svg" /></button>
            <button class="iconos-header"><img src="../librerias/img/notificacion.svg" /></button>
            <button class="iconos-header"><img src="../librerias/img/lista.svg" /></button>
            <button class="btn-general"><a href="../vistas/login.php">Login</a></button>
        </nav>

        <hr>

        <!-- Pestañas -->
        <div class="pestanas container-build bg-prymary">
            <div class="pestana ">Recientes</div>
            <div class="pestana">Los número 1</div>
            <div class="pestana">Categorias</div>
            <div class="pestana">Recursos Académicos</div>
        </div>
    </header>
