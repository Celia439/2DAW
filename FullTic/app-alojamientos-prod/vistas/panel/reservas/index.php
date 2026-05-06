<?php
if (!$_SESSION["id_user"]) {
    header("Location: login");
    exit;
}

?>
<div class="container mt-5">
    <main>
        <h3 class="d-flex justify-content-between p-3">Reservas<button id="btnNuevaReserva" class="btn btn-outline-success">Nuevo</button></h3>


        <form id="filtrosReservas" novalidate>
            <fieldset class="p-3">
                <legend>
                    <h4>Filtros</h4>
                </legend>
                <hr>
                <div class="row g-3">

                    <div class="col-12 col-md-3">
                        <label for="numeroF">Número</label>
                        <input id="numeroF" class="form-control" type="number" placeholder="Número" min="0">
                    </div>

                    <div class="col-12 col-md-3">
                        <label for="anioF">Año</label>
                        <select id="anioF" class="form-control">
                            <option value="">Seleccione un año</option>

                            <?php
                            $anio = 2022;
                            $anioAct = date("Y");

                            for ($i = $anio; $i <= $anioAct; $i++) {
                                echo "<option value='" . $i . "'> " . $i . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-12 col-md-3">
                        <label for="desdeF">Desde</label>
                        <input id="desdeF" class="form-control" type="date">
                    </div>

                    <div class="col-12 col-md-3">
                        <label for="hastaF">Hasta</label>
                        <input id="hastaF" class="form-control" type="date">
                    </div>

                </div>

                <div class="mt-4">
                    <button id="buscar" type="submit" class="btn btn-success me-2">Buscar</button>
                    <button id="resetF" type="reset" class="btn btn-secondary">Restablecer Filtros</button>
                </div>
            </fieldset>
        </form>




        <!--Tabla de reservas -->
        <table id="tablaReservas" class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número</th>
                    <th>Canal</th>
                    <th>Huéspedes</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th>Bruto</th>
                    <th>Descuento</th>
                    <th>Comisión</th>
                    <th>Importe final</th>
                    <th></th>
                    <th></th>
                    <?php
                    /*
                    foreach ($columnas as $columna) {
                        foreach ($columna as $detalle) {
                            echo "<th>$detalle</th>";
                        }
                    }*/
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($reservas) {
                    foreach ($reservas as $reserva)
                        include ROOT . "vistas/panel/reservas/fila_reserva.php";
                }
                ?>
            </tbody>
            <tfoot>
                <tr class="table-secondary fw-bold">
                    <td>TOTAL</td>
                    <td></td>
                    <td></td>
                    <td id="total_huespedes_resumen"><?= $resumen["total_huespedes"] ?></td>
                    <td></td>
                    <td></td>
                    <td id="total_bruto_resumen"><?= $resumen["total_bruto"] ?></td>
                    <td id="total_descuento_resumen"><?= $resumen["total_descuento"] ?></td>
                    <td id="total_comision_resumen"><?= $resumen["total_comision"] ?></td>
                    <td id="total_final_resumen"><?= $resumen["total_final"] ?></td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <!--Modal nueva casa-->
        <?php
       /* $contenidoFormulario = '
<form id="formReservas" action="#" method="post" class="needs-validation" novalidate>
    <div class="row g-3">

        <!-- canal -->
        <div class="col-6">
            <label class="form-label" for="canal">Canal</label>
            <select id="canal" class="form-select" name="canal" required>
                <option value="" selected disabled>Seleccione canal</option>
                <option value="B">Booking</option>
                <option value="A">Airbnb</option>
                <option value="D">Direct</option>
                <option value="O">Otro</option>
            </select>
            <div class="invalid-feedback">Seleccione un canal válido.</div>
        </div>

        <!-- total_huespedes -->
        <div class="col-6">
            <label class="form-label" for="total_huespedes">Total huéspedes</label>
            <input id="total_huespedes" type="number" class="form-control" name="total_huespedes"
                   required min="1" max="50">
            <div class="invalid-feedback">Introduzca el número total de huéspedes.</div>
        </div>

        <!-- fecha_entrada -->
        <div class="col-6">
            <label class="form-label" for="fecha_entrada">Fecha de entrada</label>
            <input id="fecha_entrada" type="date" class="form-control" name="fecha_entrada" required>
            <div class="invalid-feedback">Seleccione una fecha de entrada válida.</div>
        </div>

        <!-- fecha_salida -->
        <div class="col-6">
            <label class="form-label" for="fecha_salida">Fecha de salida</label>
            <input id="fecha_salida" type="date" class="form-control" name="fecha_salida" required>
            <div class="invalid-feedback">Seleccione una fecha de salida válida.</div>
        </div>

        <!-- importe_bruto -->
        <div class="col-6">
            <label class="form-label" for="importe_bruto">Importe bruto</label>
            <input id="importe_bruto" type="number" step="0.01" class="form-control" name="importe_bruto"
                   required min="0">
            <div class="invalid-feedback">Introduzca un importe bruto válido.</div>
        </div>

        <!-- descuento -->
        <div class="col-6">
            <label class="form-label" for="descuento">Descuento</label>
            <input id="descuento" type="number" step="0.01" class="form-control" name="descuento"
                   required min="0">
            <div class="invalid-feedback">Introduzca un descuento válido.</div>
        </div>

        <!-- comision -->
        <div class="col-6">
            <label class="form-label" for="comision">Comisión</label>
            <input id="comision" type="number" step="0.01" class="form-control" name="comision"
                   required min="0">
            <div class="invalid-feedback">Introduzca una comisión válida.</div>
        </div>

        <!-- num_reserva -->
        <div class="col-6">
            <label class="form-label" for="num_reserva">Número de reserva</label>
            <input id="num_reserva" type="text" class="form-control" name="num_reserva"
                   required maxlength="30">
            <div class="invalid-feedback">Introduzca un número de reserva válido.</div>
        </div>

    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-outline-success">Registrar</button>
    </div>
</form>
';
        $titulo = "Nueva reserva";
        $idModal = "modalReserva";*/
        ?>
    </main>
</div>