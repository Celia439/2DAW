<?php
if (!$_SESSION["id_user"]) {
    header("Location: login");
    exit;
}
?>
<div class="container mt-5">
    <h3 class="d-flex justify-content-between p-3">Reservas<button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalReserva">Nuevo</button></h3>
    <table class="table table-hover">
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
            </tr>
        </thead>
        <tbody>
            <?php
            if ($reservas) {
                foreach ($reservas as $reserva) {
                    include ROOT . "vistas/panel/reservas_v2/fila_reserva.php";
                }
            }
            ?>
        </tbody>
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

    <!-- importe_final -->
    <div class="col-6">
        <label class="form-label">Importe final</label>
        <input type="number" step="0.01" class="form-control" name="importe_final">
    </div>

    <!-- num_reserva -->
    <div class="col-12">
        <label class="form-label">Número de reserva</label>
        <input type="text" class="form-control" name="num_reserva">
    </div>



<div class="mt-3">
    <button class="btn btn-outline-success">Registrar</button>
</div>

</div>
</form>
';
    $titulo = "Nueva reserva";
    $idModal = "modalReserva";
    ?>

</div>