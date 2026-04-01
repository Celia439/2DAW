<div class="container mt-5 d-flex flex-column">
    <h3 class="d-flex justify-content-between p-3">Casas<button class="btn btn-outline-success" data-bs-toggle="modal"
            data-bs-target="#modalCasa">Nuevo</button></h3>
    <table id="tablaCasas" class="table table-hover">
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
                    include ROOT . "vistas/panel/casas/fila_casa.php";
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
            <label class="form-label" for="nombre">Nombre</label>
            <input type="text" id="nombre" class="form-control" name="nombre" required minlength="2" maxlength="100">
            <div class="invalid-feedback">El nombre es obligatorio.</div>
        </div>

        <!-- Huéspedes -->
        <div class="col-6">
            <label class="form-label" for="max_huespedes">Huéspedes</label>
            <input type="number" id="max_huespedes" class="form-control" name="max_huespedes" required min="1" max="50">
            <div class="invalid-feedback">Indica el número de huéspedes.</div>
        </div>

        <!-- Habitaciones -->
        <div class="col-6">
            <label class="form-label" for="hab">Habitaciones</label>
            <input type="number" id="hab" class="form-control" name="hab" required min="1" max="20">
            <div class="invalid-feedback">Indica cuántas habitaciones tiene.</div>
        </div>

        <!-- Baños -->
        <div class="col-6">
            <label class="form-label" for="banios">Baños</label>
            <input type="number" id="banios" class="form-control" name="banios" required min="1" max="20">
            <div class="invalid-feedback">Indica cuántos baños tiene.</div>
        </div>

        <!-- Dirección -->
        <div class="col-12">
            <label class="form-label" for="direccion">Dirección</label>
            <input type="text" id="direccion" class="form-control" name="direccion" required minlength="5" maxlength="200">
            <div class="invalid-feedback">La dirección es obligatoria.</div>
        </div>
 <!-- Provincia -->
        <div class="col-6">
            <label class="form-label" for="provincia">Provincia</label>
            <select id="provincia" class="form-select" name="provincia" required>
                <option value="" disabled selected>Seleccione una provincia</option>';
    foreach ($provincias as $prov) {
        $contenidoFormulario .= "<option value=\"{$prov['id']}\">{$prov['Provincia']}</option>";
    }
    $contenidoFormulario .= '

            </select>
            <div class="invalid-feedback">Selecciona una provincia.</div>
        </div>

        <!-- Localidad -->
        <div class="col-6">
            <label class="form-label" for="localidad">Localidad</label>
            <select id="localidad" class="form-select" name="localidad" required>
                <option value="" disabled selected>Seleccione una localidad</option>
            </select>
            <div class="invalid-feedback">Selecciona una localidad.</div>
        </div>

        <!-- Descripción -->
        <div class="col-12">
            <label class="form-label" for="descripcion">Descripción</label>
            <textarea id="descripcion" class="form-control" name="descripcion" required minlength="10" maxlength="500"></textarea>
            <div class="invalid-feedback">La descripción es obligatoria.</div>
        </div>

        <!-- Precio por noche -->
        <div class="col-6">
            <label class="form-label" for="precio_noche">Precio por noche</label>
            <input type="number" id="precio_noche" class="form-control" name="precio_noche" required min="1" max="9999">
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