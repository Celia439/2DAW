<?php
require_once LIBRERIA_PHP . "comun.php";
$comun = new comun();

$id = $_POST["id"] ?? null;
$casasControl = new casas();

if ($id) {
    // Modo Edición
    $casaArr = $casasControl->getCasaById($id);
    if (empty($casaArr)) {
        echo json_encode(["HTML" => "<p class='text-danger'>Error: Casa no encontrada.</p>"]);
        exit;
    }
    $casa = $casaArr[0];

    $nombre = $casa['nombre'];
    $max_huespedes = $casa['max_huespedes'];
    $hab = $casa['hab'];
    $banios = $casa['banios'];
    $direccion = $casa['direccion'];
    $prov_id = $casa['provincia'];
    $localidad_id = $casa['localidad'];
    $descripcion = $casa['descripcion'];
    $precio_noche = $casa['precio_noche'];

    $accion = "update";
    $textoBoton = "Actualizar";
} else {
    // Modo Inserción
    $nombre = "";
    $max_huespedes = "";
    $hab = "";
    $banios = "";
    $direccion = "";
    $prov_id = "";
    $localidad_id = "";
    $descripcion = "";
    $precio_noche = "";

    $accion = "insert";
    $textoBoton = "Registrar";
}

$provincias = $comun->getProvincias();
$municipios = $prov_id ? $comun->getMunicipiosPorProvincia($prov_id) : [];

ob_start();
?>
<form id="formCasaModal" action="#" method="post" class="needs-validation" novalidate>
    <input type="hidden" id="casaAccion" name="action" value="<?= $accion ?>">
    <input type="hidden" name="id" value="<?= $id ?>">
    
    <div class="row g-3">
        <!-- Nombre -->
        <div class="col-6">
            <label class="form-label" for="nombre_e">Nombre</label>
            <input type="text" id="nombre_e" class="form-control" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required minlength="2" maxlength="100">
            <div class="invalid-feedback">El nombre es obligatorio.</div>
        </div>

        <!-- Huéspedes -->
        <div class="col-6">
            <label class="form-label" for="max_huespedes_e">Huéspedes</label>
            <input type="number" id="max_huespedes_e" class="form-control" name="max_huespedes" value="<?= $max_huespedes ?>" required min="1" max="50">
            <div class="invalid-feedback">Indica el número de huéspedes.</div>
        </div>

        <!-- Habitaciones -->
        <div class="col-6">
            <label class="form-label" for="hab_e">Habitaciones</label>
            <input type="number" id="hab_e" class="form-control" name="hab" value="<?= $hab ?>" required min="1" max="20">
            <div class="invalid-feedback">Indica cuántas habitaciones tiene.</div>
        </div>

        <!-- Baños -->
        <div class="col-6">
            <label class="form-label" for="banios_e">Baños</label>
            <input type="number" id="banios_e" class="form-control" name="banios" value="<?= $banios ?>" required min="1" max="20">
            <div class="invalid-feedback">Indica cuántos baños tiene.</div>
        </div>

        <!-- Dirección -->
        <div class="col-12">
            <label class="form-label" for="direccion_e">Dirección</label>
            <input type="text" id="direccion_e" class="form-control" name="direccion" value="<?= htmlspecialchars($direccion) ?>" required minlength="5" maxlength="200">
            <div class="invalid-feedback">La dirección es obligatoria.</div>
        </div>

        <!-- Provincia -->
        <div class="col-6">
            <label class="form-label" for="provincia_e">Provincia</label>
            <select id="provincia_e" class="form-select" name="provincia" required>
                <option value="" <?= empty($prov_id) ? 'selected' : '' ?> disabled>Seleccione una provincia</option>
                <?php foreach ($provincias as $prov): ?>
                    <option value="<?= $prov['id'] ?>" <?= $prov['id'] == $prov_id ? 'selected' : '' ?>><?= $prov['Provincia'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">Selecciona una provincia.</div>
        </div>

        <!-- Localidad -->
        <div class="col-6">
            <label class="form-label" for="localidad_e">Localidad</label>
            <select id="localidad_e" class="form-select" name="localidad" required>
                <option value="" <?= empty($localidad_id) ? 'selected' : '' ?> disabled>Seleccione una localidad</option>
                <?php foreach ($municipios as $mun): ?>
                    <option value="<?= $mun['id'] ?>" <?= $mun['id'] == $localidad_id ? 'selected' : '' ?>><?= $mun['Municipio'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">Selecciona una localidad.</div>
        </div>

        <!-- Descripción -->
        <div class="col-12">
            <label class="form-label" for="descripcion_e">Descripción</label>
            <textarea id="descripcion_e" class="form-control" name="descripcion" required minlength="10" maxlength="500"><?= htmlspecialchars($descripcion) ?></textarea>
            <div class="invalid-feedback">La descripción es obligatoria.</div>
        </div>

        <!-- Precio por noche -->
        <div class="col-6">
            <label class="form-label" for="precio_noche_e">Precio por noche</label>
            <input type="number" id="precio_noche_e" class="form-control" name="precio_noche" value="<?= $precio_noche ?>" required min="1" max="9999">
            <div class="invalid-feedback">Indica un precio válido.</div>
        </div>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-outline-success"><?= $textoBoton ?></button>
    </div>
</form>
<?php
$form = ob_get_clean();
echo json_encode(["HTML" => $form]);
