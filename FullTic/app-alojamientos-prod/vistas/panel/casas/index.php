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
            <input type="text" class="form-control" name="nombre" required minlength="2" maxlength="100">
            <div class="invalid-feedback">El nombre es obligatorio.</div>
        </div>

        <!-- Huéspedes -->
        <div class="col-6">
            <label class="form-label"><i class="bi bi-geo-alt label-icon"></i>Huéspedes</label>
            <input type="number" class="form-control" name="max_huespedes" required min="1" max="50">
            <div class="invalid-feedback">Indica el número de huéspedes.</div>
        </div>

        <!-- Habitaciones -->
        <div class="col-6">
            <label class="form-label"><i class="bi bi-door-open label-icon"></i>Habitaciones</label>
            <input type="number" class="form-control" name="habitaciones" required min="1" max="20">
            <div class="invalid-feedback">Indica cuántas habitaciones tiene.</div>
        </div>

        <!-- Baños -->
        <div class="col-6">
            <label class="form-label"><i class="bi bi-droplet label-icon"></i>Baños</label>
            <input type="number" class="form-control" name="banos" required min="1" max="20">
            <div class="invalid-feedback">Indica cuántos baños tiene.</div>
        </div>

        <!-- Dirección -->
        <div class="col-6">
            <label class="form-label"><i class="bi bi-geo label-icon"></i>Dirección</label>
            <input type="text" class="form-control" name="direccion" required minlength="5" maxlength="200">
            <div class="invalid-feedback">La dirección es obligatoria.</div>
        </div>

        <!-- Localidad (VACÍA, se rellena por AJAX) -->
        <div class="col-6">
            <label class="form-label">Localidad</label>
            <select class="form-select" name="localidad" id="localidad" required>
                <option value="" selected disabled>Selecciona localidad</option>
            </select>
            <div class="invalid-feedback">Selecciona una localidad.</div>
        </div>

        <!-- Provincia (CON FOREACH) -->
        <div class="col-6">
            <label class="form-label">Provincia</label>
            <select class="form-select" name="provincia" id="provincia" required>
                <option value="" selected disabled>Selecciona provincia</option>';

    foreach ($provincias as $prov) {
        $contenidoFormulario .= "<option value=\"{$prov['id']}\">{$prov['Provincia']}</option>";
    } 

    $contenidoFormulario .= '
            </select>
            <div class="invalid-feedback">Selecciona una provincia.</div>
        </div>

        <!-- Descripción -->
        <div class="col-12">
            <label class="form-label"><i class="bi bi-card-text label-icon"></i>Descripción</label>
            <textarea class="form-control" name="descripcion" required minlength="10" maxlength="500"></textarea>
            <div class="invalid-feedback">La descripción es obligatoria.</div>
        </div>

        <!-- Precio por noche -->
        <div class="col-6">
            <label class="form-label"><i class="bi bi-cash label-icon"></i>Precio por noche</label>
            <input type="number" class="form-control" name="precio_noche" required min="1" max="9999">
            <div class="invalid-feedback">Indica un precio válido.</div>
        </div>

    </div>

    <!-- Botón registrar -->
    <div class="mt-3">
        <button class="btn btn-outline-success">Registrar</button>
    </div>

</form>
';
    $titulo = "Nueva Casa";
    $idModal = "modalCasa";
    ?>

</div>