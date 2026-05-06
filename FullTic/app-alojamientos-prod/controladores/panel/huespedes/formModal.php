<?php
require_once LIBRERIA_PHP . "comun.php";
$comun = new comun();

$id = $_POST["id"] ?? null;
$huespedControl = new huespedes();

if ($id) {
    // Modo Edición
    $huespedArr = $huespedControl->getHuespedById($id);
    if (empty($huespedArr)) {
        echo json_encode(["HTML" => "<p class='text-danger'>Error: Huésped no encontrado.</p>"]);
        exit;
    }
    $huesped = $huespedArr[0];

    $id_reserva = $huesped['id_reserva'];
    $id_casa = $huesped['id_casa'];
    $id_cliente = $huesped['id_cliente'];
    $es_titular = $huesped['es_titular'];
    $nombre_casa = $comun->getCasaById($id_casa);
    $nombre_reserva = $comun->getReservaById($id_reserva);
    $nombre_cliente = $comun->getClienteById($id_cliente);

    $accion = "update";
    $textoBoton = "Actualizar";
} else {
    // Modo Inserción
    $id_reserva = "";
    $id_casa = "";
    $id_cliente = "";
    $es_titular = "";

    $accion = "insert";
    $textoBoton = "Registrar";
}

ob_start();
?>
<form id="formHuespedModal" action="#" method="post" class="needs-validation" novalidate>

    <div class="row g-3">

        <!-- ID Reserva -->
        <div class="col-6">
            <label class="form-label" for="id_reserva">ID Reserva</label>
            <select id="id_reserva" class="form-control" name="id_reserva">
                <option value="<?php echo htmlspecialchars($id_reserva) ?>">
                    <?php echo htmlspecialchars($nombre_reserva) ?>
                </option>
            </select>
            <div class="invalid-feedback">El ID de reserva es obligatorio.</div>
        </div>

        <!-- ID Casa -->
        <div class="col-6">
            <label class="form-label" for="id_casa">ID Casa</label>
            <select id="id_casa" class="form-control" name="id_casa" required>
                <option value="<?php echo htmlspecialchars($id_casa) ?>">
                    <?php echo htmlspecialchars($nombre_casa) ?>
                </option>
            </select>

            <div class="invalid-feedback">El ID de casa es obligatorio.</div>
        </div>

        <!-- ID Cliente -->
        <div class="col-6">
            <label class="form-label" for="id_cliente">ID Cliente</label>
            <select id="id_cliente" class="form-control" name="id_cliente">
                <option value="<?php echo htmlspecialchars($id_cliente) ?>">
                    <?php echo htmlspecialchars($nombre_cliente) ?>
                </option>
            </select>
            <div class="invalid-feedback">El ID de cliente es obligatorio.</div>
        </div>

        <!-- Es Titular -->
        <div class="col-6">
            <label class="form-label" for="es_titular">Es Titular</label>
            <select id="es_titular" class="form-control" name="es_titular" required>
                <option value="">Seleccione una opción</option>
                <option value="1" <?php echo $es_titular === "1" ? "selected" : "" ?>>Sí</option>
                <option value="0" <?php echo $es_titular === "0" ? "selected" : "" ?>>No</option>
            </select>
            <div class="invalid-feedback">Debe indicar si es titular.</div>
        </div>

    </div>

    <input type="hidden" id="huespedAccion" name="action" value="<?php echo $accion ?>">
    <?php if ($id): ?>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id) ?>">
    <?php endif; ?>

    <div class="mt-4">
        <button type="submit" class="btn btn-success me-2"><?php echo $textoBoton ?></button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    </div>

</form>
<?php
$HTML = ob_get_clean();

echo json_encode([
    "HTML" => $HTML,
]);
