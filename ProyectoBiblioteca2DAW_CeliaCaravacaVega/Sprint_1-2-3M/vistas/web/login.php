<?php
require_once __DIR__ . '/../../librerias/php/config.php';
$baseUrl = BASE_URL;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Biblioteca Online</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $baseUrl ?>/librerias/css/base.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>/librerias/css/componets.css">
</head>
<body class="bg-light">

<main class="container-fluid p-0 vh-100 d-flex flex-column flex-md-row">
    
    <!-- Lado Izquierdo: Imagen -->
    <div class="col-12 col-md-6 d-none d-md-block" style="background: url('<?= $baseUrl ?>/librerias/img/ImagenAnuncioEj.png') center/cover no-repeat;">
        <!-- Puedes cambiar la imagen en el style de arriba -->
    </div>

    <!-- Lado Derecho: Formulario -->
    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center bg-white position-relative">
        
        <!-- Botón volver -->
        <a href="<?= $baseUrl ?>/vistas/web/webBiblioTech.php" class="position-absolute top-0 start-0 m-4 text-dark fs-4">
            <i class="bi bi-chevron-left"></i>
        </a>

        <!-- Contenedor del form -->
        <div class="agrupacion-contenido w-75 p-5 shadow-lg">
            <h2 class="text-white mb-4 fw-bold">Login</h2>

            <form action="#" method="POST">
                
                <div class="mb-4">
                    <label for="email" class="form-label text-white">Email</label>
                    <input type="email" class="form-control form-control-lg" id="email" placeholder="Value">
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label text-white">Password</label>
                    <input type="password" class="form-control form-control-lg" id="password" placeholder="Value">
                </div>

                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-naranja btn-lg">Sign In</button>
                </div>

                <div class="text-center">
                    <a href="#" class="text-white-50 text-decoration-none">Forgot password?</a>
                </div>

            </form>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
