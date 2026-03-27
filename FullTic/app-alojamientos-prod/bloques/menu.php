<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/app-alojamientos-prod/config/index.php");
?>
<nav class="navbar bg-body-tertiary ">
    <div class="container">
        <a class="navbar-brand" href="#">Administración</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="<?php echo PANEL_URL . "/casas" ?>">Casas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="<?php echo PANEL_URL . "/clientes" ?>">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="<?php echo PANEL_URL . "/reservas" ?>">Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo PANEL_URL . "/logout" ?>">Cerrar
                            sesión</a>
                    </li>
            </div>
        </div>
    </div>
</nav>
<div id="alertas"></div>