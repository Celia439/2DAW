<?php
// Recoger ID de la petición (si existe es edición, si no es nuevo)
$id = $_POST["id"] ?? null;

if ($id) {
    // Si hay id, es EDICIÓN: buscamos la reserva en la base de datos
    $reservasControl = new reservas();
    $reserva = $reservasControl->getReservaById($id)[0];

    $canal = $reserva['canal'];
    $total_huespedes = $reserva['total_huespedes'];
    $fecha_entrada = $reserva['fecha_entrada'];
    $fecha_salida = $reserva['fecha_salida'];
    $importe_bruto = $reserva['importe_bruto'];
    $descuento = $reserva['descuento'];
    $comision = $reserva['comision'];
    $num_reserva = $reserva['num_reserva'];
    $textoBoton = "Actualizar";
    $accion = "update";
} else {
    // Si NO hay id, es NUEVO: todos los campos van vacíos
    $canal = '';
    $total_huespedes = '';
    $fecha_entrada = '';
    $fecha_salida = '';
    $importe_bruto = '';
    $descuento = '';
    $comision = '';
    $num_reserva = '';
    $textoBoton = "Registrar";
    $accion = "insert";
}

ob_start();

$selected_B = $canal == 'B' ? 'selected' : '';
$selected_A = $canal == 'A' ? 'selected' : '';
$selected_D = $canal == 'D' ? 'selected' : '';
$selected_O = $canal == 'O' ? 'selected' : '';

echo <<<HTML
<form id="formReservaModal" action="#" method="post" class="needs-validation" novalidate>
    <!-- Enviamos la acción (insert o update) y el ID de forma oculta para procesarlo en JS -->
    <input type="hidden" name="action" id="reservaAccion" value="{$accion}">
    <input type="hidden" name="id" value="{$id}">

    <div class="row g-3">

        <div class="col-6">
            <label class="form-label" for="canal">Canal</label>
          <select id="canal" class="form-select" name="canal" required>
            <option value="" disabled>Seleccione canal</option>
            <option value="B" $selected_B>Booking</option>
            <option value="A" $selected_A>Airbnb</option>
            <option value="D" $selected_D>Direct</option>
            <option value="O" $selected_O>Otro</option>
          </select>
        </div>

        <div class="col-6">
            <label class="form-label" for="total_huespedes">Total huéspedes</label>
            <input id="total_huespedes" type="number" class="form-control" 
                   name="total_huespedes" value="{$total_huespedes}" required min="1" max="50">
        </div>

        <div class="col-6">
            <label class="form-label" for="fecha_entrada">Fecha de entrada</label>
            <input id="fecha_entrada" type="date" class="form-control" 
                   name="fecha_entrada" value="{$fecha_entrada}" required>
        </div>

        <div class="col-6">
            <label class="form-label" for="fecha_salida">Fecha de salida</label>
            <input id="fecha_salida" type="date" class="form-control" 
                   name="fecha_salida" value="{$fecha_salida}" required>
        </div>

        <div class="col-6">
            <label class="form-label" for="importe_bruto">Importe bruto</label>
            <input id="importe_bruto" type="number" step="0.01" class="form-control" 
                   name="importe_bruto" value="{$importe_bruto}" required min="0">
        </div>

        <div class="col-6">
            <label class="form-label" for="descuento">Descuento</label>
            <input id="descuento" type="number" step="0.01" class="form-control" 
                   name="descuento" value="{$descuento}" required min="0">
        </div>

        <div class="col-6">
            <label class="form-label" for="comision">Comisión</label>
            <input id="comision" type="number" step="0.01" class="form-control" 
                   name="comision" value="{$comision}" required min="0">
        </div>

        <div class="col-6">
            <label class="form-label" for="num_reserva">Número de reserva</label>
            <input id="num_reserva" type="text" class="form-control" 
                   name="num_reserva" value="{$num_reserva}" required maxlength="30">
        </div>

    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-outline-success">{$textoBoton}</button>
    </div>
</form>
HTML;
$form = ob_get_clean();
echo json_encode([
    "HTML" => $form
]);
