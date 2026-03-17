<?php
//iniciar la sesión en cada página si no hemos iniciado antes
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once($_SERVER["DOCUMENT_ROOT"] . "/app-alojamientos-prod/config/index.php"); 

?>
<!--Para redireccionar en js utilizando la constante ROOT-->
<script>
    const ROOT_URL = "<?php echo ROOT_URL; ?>";
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para clientes</title>
    <!--Estilos de login -->
    <link href="<?php echo LIBRERIA_CSS . "login.css" ?>" rel="stylesheet">
    <!--Estilos-->
    <link rel="stylesheet" href="<?php echo LIBRERIA_CSS . "index.css" ?>">
    <!--Boostraop-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="cabecera container-fluid p-4">
        <div class="container d-flex justify-content-center">
            <img id="logoC" src="<?php echo LIBRERIA_IMG . "LogoBambuB.png" ?>" alt="Logo bambu casas rurales marrón" />
        </div>
    </header>