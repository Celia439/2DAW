<div class="container mt-5 d-flex flex-column">
    <h3 class="d-flex justify-content-between p-3">Casas<button id="btnNuevaCasa" class="btn btn-outline-success">Nuevo</button></h3>

    <form id="filtrosCasas" novalidate>
        <fieldset class="p-3">
            <legend>
                <h4>Filtros</h4>
            </legend>
            <hr>
            <div class="row g-3">
                <div class="col-12 col-md-3">
                    <label for="idF">ID</label>
                    <input id="idF" class="form-control" type="number" minlength="1" min="0">
                </div>

                <div class="col-12 col-md-3">
                    <label for="alojamientoF">Nombre alojamiento</label>
                    <input id="alojamientoF" class="form-control" type="text" placeholder="alojamiento">
                </div>


                <div class="col-12 col-md-3">
                    <label for="provinciaF">Provincia</label>
                    <select id="provinciaF" name="provincia" class="form-control">
                        <option value="" selected>Ver todas</option>
                        <?php
                        foreach ($provincias as $prov) {
                            echo "<option value=\"{$prov['id']}\">{$prov['Provincia']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-3">
                    <label for="localidadF">Localidad</label>
                    <select id="localidadF" name="localidad" class="form-control">

                    </select>
                </div>

            </div>

            <div class="mt-4">
                <button id="buscar" type="submit" class="btn btn-success me-2">Buscar</button>
                <button id="resetF" type="reset" class="btn btn-secondary">Restablecer Filtros</button>
            </div>
        </fieldset>
    </form>
    <table id="tablaCasas" class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Huéspedes</th>
                <th>Habitaciones</th>
                <th>Baños</th>
                <th>Dirección</th>
                <th>Localidad</th>
                <th>Provincia</th>
                <th>Descripción</th>
                <th>P/Noche</th>
                <th></th>
                <th></th>
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



</div>