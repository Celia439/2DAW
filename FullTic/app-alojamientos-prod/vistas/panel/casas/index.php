<div class="container mt-5 d-flex flex-column">
    <h3 class="d-flex justify-content-between p-3">Casas<button class="btn btn-outline-success" data-bs-toggle="modal"
            data-bs-target="#modalCasa">Nuevo</button></h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del alojamiento</th>
                <th>Capacidad máxima</th>
                <th>Número de habitaciones</th>
                <th>Número de baños</th>
                <th>Dirección completa</th>
                <th>Localidad</th>
                <th>Provincia</th>
                <th>Descripción detallada</th>
                <th>Precio por noche (€)</th>
                <?php
                /*foreach ($columnas as $columna) {
                    foreach ($columna as $detalle) {
                        echo "<th>$detalle</th>";
                    }
                }*/
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($casas) {
                foreach ($casas as $casa)
                    include ROOT . "vistas/panel/reservas/fila_casa.php";
            }
            ?>
        </tbody>
    </table>

    <!--Modal nueva casa-->
    <?php
    $contenidoFormulario = '
        <form id="formCasas" action="#" method="post" class="needs-validation" novalidate>
         <div class="row g-3">
                        <!-- Nombre -->
                        <div class="col-6">
                            <label class="form-label"><i class="bi bi-person label-icon"></i>Nombre</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <!-- max_huespedes-->
                        <div class="col-6">
                            <label class="form-label"><i class="bi bi-geo-alt label-icon"></i>Huespedes</label>
                            <input type="number" class="form-control">
                        </div>
                        <!-- habitaciones-->
                        <div class="col-6">
                            <label class="form-label"><i class="bi bi-envelope label-icon"></i>Habitaciones</label>
                            <input type="email" class="form-control" placeholder="">
                        </div>
                        <!-- baños-->
                        <div class="col-6">
                            <label class="form-label"><i class="bi bi-telephone label-icon"></i>Baños</label>
                            <input type="tel" class="form-control" placeholder="">
                        </div>
                        <!-- dirección -->
                        <div class="col-6">
                            <label class="form-label"><i class="bi bi-credit-card label-icon"></i>Dirección</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <!--TODO: Localidad -->
                        <div class="col-6">
                            <label class="form-label">Localidad</label>
                            <select class="form-select">
                                <option value="" selected disabled></option>
                                <option value="admin"></option>
                            </select>
                        </div>
                        <!--TODO: Provincia-->
                        <div class="col-6">
                            <label class="form-label">Provincia</label>
                            <select class="form-select">
                                <option value="" selected disabled></option>
                                <option value="admin"></option>
                            </select>
                        </div>
                        <!-- Descripción -->
                        <div class="col-12">
                            <label class="form-label"><i class="bi bi-credit-card label-icon"></i>Descripción</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <!--Precio noche -->
                        <div class="col-6">
                            <label class="form-label"><i class="bi bi-credit-card label-icon"></i>Precio por
                                noche</label>
                            <input type="number" class="form-control" placeholder="">
                        </div>
                    </div>

                    <!-- Botón registrar -->
                    <div class="mt-3">
                        <button  class="btn btn-outline-success">Registrar</button>
                    </div>
                    </form>';
    $titulo = "Nueva Casa";
    $idModal = "modalCasa";
    ?>

</div>