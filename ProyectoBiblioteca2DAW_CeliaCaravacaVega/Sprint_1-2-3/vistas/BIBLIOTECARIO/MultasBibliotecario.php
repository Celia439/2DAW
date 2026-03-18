<?php
include_once "../../modelo/crud.php";
include_once "../../librerias/php/Parametros.php";

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Online - Usuarios Bibliotecario</title>
    <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Iconos de Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!--Estilos del bibliotecario-->
    <link rel="stylesheet" href="../../librerias/css/estilos-bibliotecario.css">

    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--JS Asincrono-->
    <script src="../../librerias/js/usuario.js"></script>
</head>

<body>
    <!-- ========== NAVBAR ========== -->
    <nav class="navbar navbar-biblioteca navbar-expand-lg">
        <a class="navbar-brand" href="./IniciBibliotecario.php">
            <img src="../img/LogoBiblioteca.svg" alt="Logo">
        </a>
        <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#navMenu">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-3">
                <li class="nav-item">
                    <a class="nav-link" href="PrestamosBibliotecario.php"
                        style="background: rgba(255,255,255,0.12); border-radius:4px;">
                        <span class="nav-icon">+</span> Préstamos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ReservasBibliotecario.php">
                        <span class="nav-icon"><i class="bi bi-calendar3"></i></span> Reservas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="MultasBibliotecario.php">
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

    <!-- ========== BARRA SECUNDARIA ========== -->
    <div class="barra-secundaria">
        <button class="btn-mas"><i class="bi bi-chevron-down"></i> Más</button>
        <div class="input-group input-busqueda">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="text" class="form-control" placeholder="Buscar...">
        </div>
        <button class="btn-nuevo">+ Nuevo</button>
    </div>

    <!-- ========== CONTENIDO ========== -->
    <div class="contenido-principal">
        <div class="card-biblioteca">

            <!-- Título + Toggle filtro -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="card-titulo mb-0">Multas</div>
                <div class="toggle-filtro">
                    <span>Sin pagar</span>
                    <div class="form-check form-switch mb-0">
                        <input class="form-check-input" type="checkbox" id="toggleSinPagar"
                            style="width:2.5rem; height:1.3rem; cursor:pointer;">
                    </div>
                </div>
            </div>

            <!-- Tabla de Multas -->
            <div class="table-responsive">
                <table class="tabla-biblioteca">
                    <thead>
                        <tr>
                            <?php
                            $datos = [
                                "tabla" => "INFORMATION_SCHEMA.COLUMNS",
                                "campos" => ["COLUMN_NAME"],
                                "where" => "TABLE_SCHEMA = 'bibliotech' AND TABLE_NAME = 'multas'",
                                "order" => "ORDINAL_POSITION"
                            ];
                            $parametrosC = new Parametros($datos);
                            $resultado = consultar($parametrosC);
                            foreach ($resultado as $campo) {
                                foreach ($campo as $valor) {
                                    echo "<th>$valor</th>";
                                }
                            }
                            ?>
                            <th style="width: 80px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $datos = [
                            "tabla" => "multas"
                        ];
                        $parametros = new Parametros($datos);
                        $resultado = consultar($parametros);
                        foreach ($resultado as $campo) {
                            echo "<tr>";
                            foreach ($campo as $valor) {
                                echo "<td>$valor</td>";
                            }
                            echo '<td>
                                <div class="acciones-tabla">
                                    <button class="btn-editar" title="Editar"><i class="bi bi-pencil"></i></button>
                                    <button class="btn-eliminar" title="Eliminar"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>';
                            echo "</tr>";

                        }

                        ?>
                        <tr>
                            <td>05</td>
                            <td>10/11/2025</td>
                            <td>3€</td>
                            <td>Celia</td>
                            <td>1</td>
                            <td>Retraso</td>
                            <td><span class="estado-badge estado-pagada">Pagada</span></td>
                            <td>
                                <div class="acciones-tabla">
                                    <button class="btn-editar" title="Editar"><i class="bi bi-pencil"></i></button>
                                    <button class="btn-eliminar" title="Eliminar"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>