<?php
include_once "../../php/crud/crud.php";
include_once "../../php/crud/Parametros.php";

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Online - Usuarios Bibliotecario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/estilos-bibliotecario.css">
    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../../js/usuario.js"></script>
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
        <button class="btn-nuevo" data-bs-toggle="modal" data-bs-target="#modalNuevoUsuario">+ Nuevo</button>
    </div>

    <!-- ========== CONTENIDO ========== -->
    <div class="contenido-principal">
        <div class="card-biblioteca">
            <div class="card-titulo">Usuarios</div>

            <!-- Tabla de Usuarios -->
            <div class="table-responsive">
                <table class="tabla-biblioteca">
                    <thead>
                        <tr>
                            <?php
                            // Pedir los nombres de las columnas de una tabla usando la tabla del sistema.
                            $datos = [
                                "tabla" => "INFORMATION_SCHEMA.COLUMNS",
                                "campos" => ["COLUMN_NAME"],
                                "where" => "TABLE_SCHEMA = 'bibliotech' AND TABLE_NAME = 'usuarios'",
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
                            "tabla" => "usuarios"
                        ];
                        $parametrosF = new Parametros($datos);
                        $resultado = consultar($parametrosF);
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
                            <td>01</td>
                            <td>Celia</td>
                            <td>Vega</td>
                            <td>44589762T</td>
                            <td>Málaga</td>
                            <td>678542315</td>
                            <td><span class="estado-badge estado-activo">Activo</span></td>
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

    <!-- ========== MODAL: Nuevo Usuario ========== -->
    <div class="modal fade modal-biblioteca" id="modalNuevoUsuario" tabindex="-1"
        aria-labelledby="modalNuevoUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 520px;">
            <div class="modal-content"
                style="border-radius: 8px; overflow: hidden; box-shadow: 0 6px 24px rgba(0,0,0,0.18);">

                <!-- Header -->
                <div class="modal-header d-flex justify-content-between align-items-center">
                    <h5 class="modal-title" id="modalNuevoUsuarioLabel">
                        Nuevo usuario <i class="bi bi-people"></i>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">

                    <!-- FORMULARIO -->
                    <form id="formNuevoUsuario" method="POST" action="procesarNuevoUsuario.php">
                        <div class="row g-3">

                            <!-- Nombre -->
                            <div class="col-6">
                                <label class="form-label"><i class="bi bi-person label-icon"></i>Nombre</label>
                                <input type="text" class="form-control" id="usr_nom" name="usr_nom">
                            </div>

                            <!-- Apellidos -->
                            <div class="col-6">
                                <label class="form-label"><i class="bi bi-person label-icon"></i>Apellidos</label>
                                <input type="text" class="form-control" id="usr_ape" name="usr_ape">
                            </div>

                            <!-- DNI -->
                            <div class="col-6">
                                <label class="form-label"><i class="bi bi-person label-icon"></i>DNI</label>
                                <input type="text" class="form-control" id="usr_dni" name="usr_dni" maxlength="9">
                            </div>

                            <!-- Correo -->
                            <div class="col-6">
                                <label class="form-label"><i class="bi bi-envelope label-icon"></i>Correo
                                    Electrónico</label>
                                <input type="email" class="form-control" id="usr_cor" name="usr_cor">
                            </div>

                            <!-- Password -->
                            <div class="col-6">
                                <label class="form-label"><i class="bi bi-lock label-icon"></i>Password</label>
                                <input type="password" class="form-control" id="usr_pass" name="usr_pass">
                            </div>

                            <!-- Teléfono -->
                            <div class="col-6">
                                <label class="form-label"><i class="bi bi-telephone label-icon"></i>Teléfono</label>
                                <input type="tel" class="form-control" id="usr_tel" name="usr_tel">
                            </div>

                            <!-- Dirección -->
                            <div class="col-6">
                                <label class="form-label"><i class="bi bi-geo-alt label-icon"></i>Dirección</label>
                                <input type="text" class="form-control" id="usr_dir" name="usr_dir">
                            </div>

                            <!-- Roles -->
                            <div class="col-6">
                                <label class="form-label">Roles</label>
                                <select class="form-select" id="usr_rol" name="usr_rol">
                                    <option value="" selected disabled></option>
                                    <option value="usuario">Usuario</option>
                                    <option value="bibliotecario">Bibliotecario</option>
                                    <option value="admin">Administrador</option>
                                </select>
                            </div>

                            <!-- Estado -->
                            <div class="col-12">
                                <label class="form-label">Estado</label>
                                <select class="form-select" id="usr_est" name="usr_est">
                                    <option value="" selected disabled></option>
                                    <option value="activo">Activo</option>
                                    <option value="deshabilitado">Deshabilitado</option>
                                </select>
                            </div>
                        </div>

                        <!-- Botón registrar -->
                        <div class="mt-3">
                            <button type="submit" class="btn-registrar">Registrar</button>
                        </div>
                    </form>
                    <!-- FIN FORMULARIO -->

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>