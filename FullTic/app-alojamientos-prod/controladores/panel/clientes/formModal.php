<?php
require_once LIBRERIA_PHP . "comun.php";
$comun = new comun();

$id = $_POST["id"];
$clientesControl = new clientes();
$clienteArr = $clientesControl->getClienteById($id);
if (empty($clienteArr)) {
    echo json_encode(["HTML" => "<p class='text-danger'>Error: Cliente no encontrado.</p>"]);
    exit;
}
$cliente = $clienteArr[0];

$nacionalidades = $comun->getNacionalidades();
$provincias = $comun->getProvincias();
$municipios = $comun->getMunicipiosPorProvincia($cliente['provincia']);

ob_start();
?>
<form id="formEditarClientes" action="#" method="post" class="needs-validation p-4" novalidate>
    <input type="hidden" name="id" value="<?= $id ?>">
    <div class="row g-4">
        <!-- COLUMNA IZQUIERDA: Datos personales -->
        <div class="col-lg-6">
            <fieldset>
                <legend>Datos personales</legend>
                <div class="row g-3 p-3">
                    <div class="col-md-6">
                        <label class="form-label" for="nombre_e">Nombre</label>
                        <input type="text" class="form-control" id="nombre_e" name="nombre" value="<?= htmlspecialchars($cliente['nombre']) ?>" required pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" maxlength="50">
                        <div class="invalid-feedback">Introduce un nombre válido.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="primer_apellido_e">Primer apellido</label>
                        <input type="text" class="form-control" id="primer_apellido_e" name="primer_apellido" value="<?= htmlspecialchars($cliente['primer_apellido']) ?>" required pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" maxlength="50">
                        <div class="invalid-feedback">Introduce un primer apellido válido.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="segundo_apellido_e">Segundo apellido</label>
                        <input type="text" class="form-control" id="segundo_apellido_e" name="segundo_apellido" value="<?= htmlspecialchars($cliente['segundo_apellido']) ?>" required pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" maxlength="50">
                        <div class="invalid-feedback">Introduce un segundo apellido válido.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="sexo_e">Sexo</label>
                        <select class="form-select" id="sexo_e" name="sexo" required>
                            <option value="H" <?= $cliente['sexo'] == 'H' ? 'selected' : '' ?>>Hombre</option>
                            <option value="M" <?= $cliente['sexo'] == 'M' ? 'selected' : '' ?>>Mujer</option>
                            <option value="X" <?= $cliente['sexo'] == 'X' ? 'selected' : '' ?>>Otro</option>
                        </select>
                        <div class="invalid-feedback">Selecciona un sexo.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="numero_documento_identidad_e">Número de documento</label>
                        <input type="text" class="form-control" id="numero_documento_identidad_e" name="numero_documento_identidad" value="<?= htmlspecialchars($cliente['numero_documento_identidad']) ?>" required pattern="^[0-9]{8}[A-Z]$">
                        <div class="invalid-feedback">Introduce un número de documento válido.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="tipo_documentacion_e">Tipo de documentación</label>
                        <select class="form-select" id="tipo_documentacion_e" name="tipo_documentacion" required>
                            <option value="DNI" <?= $cliente['tipo_documentacion'] == 'DNI' ? 'selected' : '' ?>>DNI</option>
                            <option value="NIE" <?= $cliente['tipo_documentacion'] == 'NIE' ? 'selected' : '' ?>>NIE</option>
                            <option value="PASAPORTE" <?= $cliente['tipo_documentacion'] == 'PASAPORTE' ? 'selected' : '' ?>>Pasaporte</option>
                        </select>
                        <div class="invalid-feedback">Selecciona un tipo de documentación.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="numero_soporte_documento_e">Número de soporte</label>
                        <input type="text" class="form-control" id="numero_soporte_documento_e" name="numero_soporte_documento" value="<?= htmlspecialchars($cliente['numero_soporte_documento']) ?>" required maxlength="20">
                        <div class="invalid-feedback">Introduce un número de soporte válido.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="nacionalidad_id_e">Nacionalidad</label>
                        <select class="form-select" id="nacionalidad_id_e" name="nacionalidad_id" required>
                            <?php foreach ($nacionalidades as $nac): ?>
                                <option value="<?= $nac['id'] ?>" <?= $nac['id'] == $cliente['nacionalidad_id'] ? 'selected' : '' ?>><?= $nac['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Introduce una nacionalidad.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="fecha_nacimiento_e">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento_e" name="fecha_nacimiento" value="<?= $cliente['fecha_nacimiento'] ?>" required>
                        <div class="invalid-feedback">Introduce una fecha válida.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="telefono_fijo_e">Teléfono fijo</label>
                        <input type="text" class="form-control" id="telefono_fijo_e" name="telefono_fijo" value="<?= htmlspecialchars($cliente['telefono_fijo']) ?>" pattern="^[0-9]{9}$">
                        <div class="invalid-feedback">Introduce un teléfono fijo válido.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="telefono_movil_e">Teléfono móvil</label>
                        <input type="text" class="form-control" id="telefono_movil_e" name="telefono_movil" value="<?= htmlspecialchars($cliente['telefono_movil']) ?>" required pattern="^[0-9]{9}$">
                        <div class="invalid-feedback">Introduce un teléfono móvil válido.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="correo_e">Correo electrónico</label>
                        <input type="email" class="form-control" id="correo_e" name="correo" value="<?= htmlspecialchars($cliente['correo']) ?>" required>
                        <div class="invalid-feedback">Introduce un correo válido.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="menores_de_edad_e">¿Menor de edad?</label>
                        <select class="form-select" id="menores_de_edad_e" name="menores_de_edad" required>
                            <option value="0" <?= $cliente['menores_de_edad'] == '0' ? 'selected' : '' ?>>No</option>
                            <option value="1" <?= $cliente['menores_de_edad'] == '1' ? 'selected' : '' ?>>Sí</option>
                        </select>
                        <div class="invalid-feedback">Selecciona una opción.</div>
                    </div>
                </div>
            </fieldset>
        </div>

        <!-- COLUMNA DERECHA: Ubicación -->
        <div class="col-lg-6">
            <fieldset>
                <legend>Ubicación</legend>
                <div class="row g-3 p-3">
                    <div class="col-md-6">
                        <label class="form-label" for="pais_e">País</label>
                        <select class="form-select" id="pais_e" name="pais" required>
                            <?php foreach ($nacionalidades as $pais): ?>
                                <option value="<?= $pais['id'] ?>" <?= $pais['id'] == $cliente['pais'] ? 'selected' : '' ?>><?= $pais['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Selecciona un país.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="provincia_e">Provincia</label>
                        <select class="form-select" id="provincia_e" name="provincia" required>
                            <?php foreach ($provincias as $prov): ?>
                                <option value="<?= $prov['id'] ?>" <?= $prov['id'] == $cliente['provincia'] ? 'selected' : '' ?>><?= $prov['Provincia'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Selecciona una provincia.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="localidad_e">Localidad</label>
                        <select class="form-select" id="localidad_e" name="localidad" required>
                            <?php foreach ($municipios as $mun): ?>
                                <option value="<?= $mun['id'] ?>" <?= $mun['id'] == $cliente['localidad'] ? 'selected' : '' ?>><?= $mun['Municipio'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Selecciona una localidad.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="direccion_e">Dirección</label>
                        <input type="text" class="form-control" id="direccion_e" name="direccion" value="<?= htmlspecialchars($cliente['direccion']) ?>" required maxlength="100">
                        <div class="invalid-feedback">Introduce una dirección válida.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="codigo_postal_e">Código postal</label>
                        <input type="text" class="form-control" id="codigo_postal_e" name="codigo_postal" value="<?= htmlspecialchars($cliente['codigo_postal']) ?>" required pattern="^[0-9]{5}$">
                        <div class="invalid-feedback">Introduce un código postal válido.</div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="mt-5">
        <button type="submit" class="btn btn-outline-success btn-lg">Actualizar</button>
    </div>
</form>
<?php
$form = ob_get_clean();
echo json_encode(["HTML" => $form]);
