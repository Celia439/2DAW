<?php


// HTML del formulario
$HTML = `
<form id="formEditarReservas" action="#" method="post" class="needs-validation" novalidate>
    <div class="row g-3">
        <div class="col-6">
            <label class="form-label" for="canal">Canal</label>
            <select id="canal" class="form-select" name="canal" required>
                <option value="" disabled>Seleccione canal</option>
                <option value="B">Booking</option>
                <option value="A">Airbnb</option>
                <option value="D">Direct</option>
                <option value="O">Otro</option>
            </select>
            <div class="invalid-feedback">Seleccione un canal válido.</div>
        </div>
        <div class="col-6">
            <label class="form-label" for="total_huespedes">Total huéspedes</label>
            <input id="total_huespedes" type="number" class="form-control" name="total_huespedes" required min="1" max="50">
            <div class="invalid-feedback">Introduzca el número total de huéspedes.</div>
        </div>
        <div class="col-6">
            <label class="form-label" for="fecha_entrada">Fecha de entrada</label>
            <input id="fecha_entrada" type="date" class="form-control" name="fecha_entrada" required>
            <div class="invalid-feedback">Seleccione una fecha de entrada válida.</div>
        </div>
        <div class="col-6">
            <label class="form-label" for="fecha_salida">Fecha de salida</label>
            <input id="fecha_salida" type="date" class="form-control" name="fecha_salida" required>
            <div class="invalid-feedback">Seleccione una fecha de salida válida.</div>
        </div>
        <div class="col-6">
            <label class="form-label" for="importe_bruto">Importe bruto</label>
            <input id="importe_bruto" type="number" step="0.01" class="form-control" name="importe_bruto" required min="0">
            <div class="invalid-feedback">Introduzca un importe bruto válido.</div>
        </div>
        <div class="col-6">
            <label class="form-label" for="descuento">Descuento</label>
            <input id="descuento" type="number" step="0.01" class="form-control" name="descuento" required min="0">
            <div class="invalid-feedback">Introduzca un descuento válido.</div>
        </div>
        <div class="col-6">
            <label class="form-label" for="comision">Comisión</label>
            <input id="comision" type="number" step="0.01" class="form-control" name="comision" required min="0">
            <div class="invalid-feedback">Introduzca una comisión válida.</div>
        </div>
        <div class="col-6">
            <label class="form-label" for="num_reserva">Número de reserva</label>
            <input id="num_reserva" type="text" class="form-control" name="num_reserva" required maxlength="30">
            <div class="invalid-feedback">Introduzca un número de reserva válido.</div>
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-outline-success">Actualizar</button>
    </div>
</form>`;

echo json_encode([
    "HTML" => $HTML
]);