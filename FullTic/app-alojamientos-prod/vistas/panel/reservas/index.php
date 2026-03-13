<?php
if (!$_SESSION["id_user"]) {
    header("Location: login");
    exit;
}

?>
<div class="container mt-5">
    <main>
        <h3 class="d-flex justify-content-between p-3">Reservas<button class="btn btn-outline-success"
                data-bs-toggle="modal" data-bs-target="#modalReserva">Nuevo</button></h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <?php
                    foreach ($columnas as $columna) {
                        foreach ($columna as $detalle) {
                            echo "<th>$detalle</th>";
                        }
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if($reservas){
                    foreach ($reservas as $reserva)
                        include ROOT . "vistas/panel/reservas/fila_reserva.php";
                }
                ?>
            </tbody>
            <tfoot>
                <tr class="table-secondary fw-bold">
                    <td>TOTAL</td>
                    <td></td>
                    <td><?= $resumen["total_huespedes"] ?></td>
                    <td></td>
                    <td></td>
                    <td><?= $resumen["total_bruto"] ?></td>
                    <td><?= $resumen["total_descuento"] ?></td>
                    <td><?= $resumen["total_comision"] ?></td>
                    <td><?= $resumen["total_final"] ?></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <!--Modal nueva casa-->
        <?php
        $contenidoFormulario = '
    <form id="formReservas" action="#" method="post" class="needs-validation" novalidate>
      <div class="row g-3">

    <!-- canal -->
    <div class="col-6">
        <label class="form-label">Canal</label>
        <select class="form-select" name="canal">
            <option value="" selected disabled>Seleccione canal</option>
            <option value="Booking">Booking</option>
            <option value="Airbnb">Airbnb</option>
            <option value="Web">Web</option>
            <option value="Directo">Directo</option>
        </select>
    </div>

    <!-- total_huespedes -->
    <div class="col-6">
        <label class="form-label">Total huéspedes</label>
        <input type="number" class="form-control" name="total_huespedes">
    </div>

    <!-- fecha_entrada -->
    <div class="col-6">
        <label class="form-label">Fecha de entrada</label>
        <input type="date" class="form-control" name="fecha_entrada">
    </div>

    <!-- fecha_salida -->
    <div class="col-6">
        <label class="form-label">Fecha de salida</label>
        <input type="date" class="form-control" name="fecha_salida">
    </div>

    <!-- importe_bruto -->
    <div class="col-6">
        <label class="form-label">Importe bruto</label>
        <input type="number" step="0.01" class="form-control" name="importe_bruto">
    </div>

    <!-- descuento -->
    <div class="col-6">
        <label class="form-label">Descuento</label>
        <input type="number" step="0.01" class="form-control" name="descuento">
    </div>

    <!-- comision -->
    <div class="col-6">
        <label class="form-label">Comisión</label>
        <input type="number" step="0.01" class="form-control" name="comision">
    </div>

    <!-- num_reserva -->
    <div class="col-6">
        <label class="form-label">Número de reserva</label>
        <input type="text" class="form-control" name="num_reserva">
    </div>

</div>
<div class="mt-3">
    <button type="submit" class="btn btn-outline-success">Registrar</button>
    </div>
</form>
';
        $titulo = "Nueva reserva";
        $idModal = "modalReserva";
        ?>
    </main>
</div>