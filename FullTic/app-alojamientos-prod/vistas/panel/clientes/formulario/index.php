<?php
// Este archivo sirve tanto para CREAR como para EDITAR un cliente
// Se accede desde el listado de clientes con:
//   - Nuevo:  enlace a /panel/clientes/formulario
//   - Editar: enlace a /panel/clientes/formulario con POST id=X

require_once LIBRERIA_PHP . "comun.php";
$comun = new comun();

// Detectar si estamos en modo EDITAR o NUEVO
// Si viene $_POST["id"] o $_GET["id"] → editar
// Si no viene nada → nuevo
$modo = "nuevo";
$cliente = [];
$id = null;

if (!empty($_POST["id"])) {
    $modo = "editar";
    $id = intval($_POST["id"]);
} elseif (!empty($_GET["id"])) {
    $modo = "editar";
    $id = intval($_GET["id"]);
}

// Si es editar, cargar los datos del cliente
if ($modo === "editar") {
    $clientesControl = new clientes();
    $clienteArr = $clientesControl->getClienteById($id);
    if (!empty($clienteArr)) {
        $cliente = $clienteArr[0];
    } else {
        echo "<div class='alert alert-danger'>Cliente no encontrado.</div>";
        return;
    }
}

// Cargar catálogos siempre (tanto para nuevo como editar)
$nacionalidades = $comun->getNacionalidades();
$provincias = $comun->getProvincias();

// Para municipios: si es editar, cargar los de la provincia del cliente
// Si es nuevo, dejar vacío o cargar los de la primera provincia
$municipios = [];
if ($modo === "editar" && !empty($cliente['provincia'])) {
    $municipios = $comun->getMunicipiosPorProvincia($cliente['provincia']);
}

// Título de la página
$tituloPagina = $modo === "editar" ? "Editar cliente" : "Nuevo cliente";
?>

<div class="container mt-4">
    <h2><?= $tituloPagina ?></h2>

    <form id="formCliente" action="#" method="post" class="needs-validation p-4" novalidate>
        <!-- Si es editar, guardamos el id en un campo oculto -->
        <?php if ($modo === "editar"): ?>
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php endif; ?>

        <!-- Campo oculto para que el controlador sepa qué action usar -->
        <input type="hidden" name="action" value="<?= $modo === "editar" ? "update" : "insert" ?>">

        <div class="row g-4">
            <!-- COLUMNA IZQUIERDA: Datos personales -->
            <div class="col-lg-6">
                <fieldset>
                    <legend>Datos personales</legend>
                    <div class="row g-3 p-3">
                        <!-- Nombre -->
                        <div class="col-md-6">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                value="<?= $modo === 'editar' ? htmlspecialchars($cliente['nombre']) : '' ?>"
                                required pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" maxlength="50" placeholder="Ej: María">
                            <div class="invalid-feedback">Introduce un nombre válido.</div>
                        </div>

                        <!-- Primer apellido -->
                        <div class="col-md-6">
                            <label class="form-label" for="primer_apellido">Primer apellido</label>
                            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido"
                                value="<?= $modo === 'editar' ? htmlspecialchars($cliente['primer_apellido']) : '' ?>"
                                required pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" maxlength="50" placeholder="Ej: García">
                            <div class="invalid-feedback">Introduce un primer apellido válido.</div>
                        </div>

                        <!-- Segundo apellido -->
                        <div class="col-md-6">
                            <label class="form-label" for="segundo_apellido">Segundo apellido</label>
                            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido"
                                value="<?= $modo === 'editar' ? htmlspecialchars($cliente['segundo_apellido']) : '' ?>"
                                required pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" maxlength="50" placeholder="Ej: López">
                            <div class="invalid-feedback">Introduce un segundo apellido válido.</div>
                        </div>

                        <!-- Sexo -->
                        <div class="col-md-6">
                            <label class="form-label" for="sexo">Sexo</label>
                            <select class="form-select" id="sexo" name="sexo" required>
                                <option value="" disabled <?= $modo === 'nuevo' ? 'selected' : '' ?>>Seleccione</option>
                                <option value="H" <?= ($modo === 'editar' && $cliente['sexo'] == 'H') ? 'selected' : '' ?>>Hombre</option>
                                <option value="M" <?= ($modo === 'editar' && $cliente['sexo'] == 'M') ? 'selected' : '' ?>>Mujer</option>
                                <option value="X" <?= ($modo === 'editar' && $cliente['sexo'] == 'X') ? 'selected' : '' ?>>Otro</option>
                            </select>
                            <div class="invalid-feedback">Selecciona un sexo.</div>
                        </div>

                        <!-- Número de documento -->
                        <div class="col-md-6">
                            <label class="form-label" for="numero_documento_identidad">Número de documento</label>
                            <input type="text" class="form-control" id="numero_documento_identidad" name="numero_documento_identidad"
                                value="<?= $modo === 'editar' ? htmlspecialchars($cliente['numero_documento_identidad']) : '' ?>"
                                required pattern="^[0-9]{8}[A-Z]$" placeholder="Ej: 12345678A">
                            <div class="invalid-feedback">Introduce un número de documento válido.</div>
                        </div>

                        <!-- Tipo de documentación -->
                        <div class="col-md-6">
                            <label class="form-label" for="tipo_documentacion">Tipo de documentación</label>
                            <select class="form-select" id="tipo_documentacion" name="tipo_documentacion" required>
                                <option value="D" <?= ($modo === 'editar' && $cliente['tipo_documentacion'] == 'D') ? 'selected' : '' ?>>DNI</option>
                                <option value="N" <?= ($modo === 'editar' && $cliente['tipo_documentacion'] == 'N') ? 'selected' : '' ?>>NIE</option>
                                <option value="P" <?= ($modo === 'editar' && $cliente['tipo_documentacion'] == 'P') ? 'selected' : '' ?>>Pasaporte</option>
                            </select>
                            <div class="invalid-feedback">Selecciona un tipo de documentación.</div>
                        </div>

                        <!-- Número de soporte -->
                        <div class="col-md-6">
                            <label class="form-label" for="numero_soporte_documento">Número de soporte</label>
                            <input type="text" class="form-control" id="numero_soporte_documento" name="numero_soporte_documento"
                                value="<?= $modo === 'editar' ? htmlspecialchars($cliente['numero_soporte_documento']) : '' ?>"
                                required maxlength="20" placeholder="Ej: ABC123456">
                            <div class="invalid-feedback">Introduce un número de soporte válido.</div>
                        </div>

                        <!-- Nacionalidad -->
                        <div class="col-md-6">
                            <label class="form-label" for="nacionalidad_id">Nacionalidad</label>
                            <select class="form-select" id="nacionalidad_id" name="nacionalidad_id" required>
                                <?php foreach ($nacionalidades as $nac): ?>
                                    <option value="<?= $nac['id'] ?>"
                                        <?= ($modo === 'editar' && $nac['id'] == $cliente['nacionalidad_id']) ? 'selected' : '' ?>>
                                        <?= $nac['nombre'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Introduce una nacionalidad.</div>
                        </div>

                        <!-- Fecha de nacimiento -->
                        <div class="col-md-6">
                            <label class="form-label" for="fecha_nacimiento">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                value="<?= $modo === 'editar' ? $cliente['fecha_nacimiento'] : '' ?>" required>
                            <div class="invalid-feedback">Introduce una fecha válida.</div>
                        </div>

                        <!-- Teléfono fijo -->
                        <div class="col-md-6">
                            <label class="form-label" for="telefono_fijo">Teléfono fijo</label>
                            <input type="text" class="form-control" id="telefono_fijo" name="telefono_fijo"
                                value="<?= $modo === 'editar' ? htmlspecialchars($cliente['telefono_fijo']) : '' ?>"
                                pattern="^[0-9]{9}$" placeholder="Ej: 912345678">
                            <div class="invalid-feedback">Introduce un teléfono fijo válido.</div>
                        </div>

                        <!-- Teléfono móvil -->
                        <div class="col-md-6">
                            <label class="form-label" for="telefono_movil">Teléfono móvil</label>
                            <input type="text" class="form-control" id="telefono_movil" name="telefono_movil"
                                value="<?= $modo === 'editar' ? htmlspecialchars($cliente['telefono_movil']) : '' ?>"
                                required pattern="^[0-9]{9}$" placeholder="Ej: 612345678">
                            <div class="invalid-feedback">Introduce un teléfono móvil válido.</div>
                        </div>

                        <!-- Correo -->
                        <div class="col-md-6">
                            <label class="form-label" for="correo">Correo electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo"
                                value="<?= $modo === 'editar' ? htmlspecialchars($cliente['correo']) : '' ?>"
                                required placeholder="Ej: cliente@email.com">
                            <div class="invalid-feedback">Introduce un correo válido.</div>
                        </div>

                        <!-- Menor de edad -->
                        <div class="col-md-6">
                            <label class="form-label" for="menores_de_edad">¿Menor de edad?</label>
                            <select class="form-select" id="menores_de_edad" name="menores_de_edad" required>
                                <option value="0" <?= ($modo === 'editar' && $cliente['menores_de_edad'] == '0') ? 'selected' : '' ?>>No</option>
                                <option value="1" <?= ($modo === 'editar' && $cliente['menores_de_edad'] == '1') ? 'selected' : '' ?>>Sí</option>
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
                        <!-- País -->
                        <div class="col-md-6">
                            <label class="form-label" for="pais">País</label>
                            <select class="form-select" id="pais" name="pais" required>
                                <?php foreach ($nacionalidades as $pais): ?>
                                    <option value="<?= $pais['id'] ?>"
                                        <?= ($modo === 'editar' && $pais['id'] == $cliente['pais']) ? 'selected' : '' ?>>
                                        <?= $pais['nombre'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Selecciona un país.</div>
                        </div>

                        <!-- Provincia -->
                        <div class="col-md-6">
                            <label class="form-label" for="provincia">Provincia</label>
                            <select class="form-select" id="provincia" name="provincia" required>
                                <?php foreach ($provincias as $prov): ?>
                                    <option value="<?= $prov['id'] ?>"
                                        <?= ($modo === 'editar' && $prov['id'] == $cliente['provincia']) ? 'selected' : '' ?>>
                                        <?= $prov['Provincia'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Selecciona una provincia.</div>
                        </div>

                        <!-- Localidad -->
                        <div class="col-md-6">
                            <label class="form-label" for="localidad">Localidad</label>
                            <select class="form-select" id="localidad" name="localidad" required>
                                <?php if ($modo === 'editar'): ?>
                                    <?php foreach ($municipios as $mun): ?>
                                        <option value="<?= $mun['id'] ?>"
                                            <?= ($mun['id'] == $cliente['localidad']) ? 'selected' : '' ?>>
                                            <?= $mun['Municipio'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="" disabled selected>Seleccione una localidad</option>
                                <?php endif; ?>
                            </select>
                            <div class="invalid-feedback">Selecciona una localidad.</div>
                        </div>

                        <!-- Dirección -->
                        <div class="col-md-6">
                            <label class="form-label" for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion"
                                value="<?= $modo === 'editar' ? htmlspecialchars($cliente['direccion']) : '' ?>"
                                required maxlength="100" placeholder="Ej: Calle Mayor, 15">
                            <div class="invalid-feedback">Introduce una dirección válida.</div>
                        </div>

                        <!-- Código postal -->
                        <div class="col-md-6">
                            <label class="form-label" for="codigo_postal">Código postal</label>
                            <input type="text" class="form-control" id="codigo_postal" name="codigo_postal"
                                value="<?= $modo === 'editar' ? htmlspecialchars($cliente['codigo_postal']) : '' ?>"
                                required pattern="^[0-9]{5}$" placeholder="Ej: 28001">
                            <div class="invalid-feedback">Introduce un código postal válido.</div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>

        <div class="mt-5 d-flex gap-2">
            <button type="submit" class="btn btn-outline-success btn-lg">
                <?= $modo === "editar" ? "Actualizar" : "Guardar" ?>
            </button>
            <a href="<?= PANEL_URL ?>clientes" class="btn btn-outline-secondary btn-lg">Volver al listado</a>
        </div>
    </form>
</div>

<script>
// Cuando cambie la provincia, cargar municipios por AJAX (igual que en el modal)
$(document).on("change", "#provincia", function () {
    let idProvincia = $(this).val();
    let selectLocalidad = $("#localidad");

    $.ajax({
        url: ROOT_AJAX,
        type: "POST",
        dataType: "json",
        data: {
            pagina: "libreria/php/municipios.php",
            provincia: idProvincia
        },
        success: function (data) {
            let html = '<option value="" disabled selected>Seleccione una localidad</option>';
            if (data.municipios) {
                data.municipios.forEach(m => {
                    html += `<option value="${m.id}">${m.Municipio}</option>`;
                });
            }
            selectLocalidad.html(html);
        }
    });
});

// Enviar el formulario por AJAX y redirigir al listado
$(document).on("submit", "#formCliente", function (e) {
    e.preventDefault();

    const form = document.getElementById("formCliente");
    if (!form.checkValidity()) {
        form.classList.add("was-validated");
        return;
    }

    let datos = $(this).serialize();
    let action = $("input[name='action']").val(); // "insert" o "update"

    $.ajax({
        url: ROOT_AJAX,
        type: "POST",
        dataType: "json",
        data: {
            pagina: "controladores/panel/clientes/index.php",
            modelo: "modelos/panel/clientes/index.php",
            datos: datos,
            action: action
        },
        beforeSend: function () {
            comun.bloquearUI();
        },
        success: function (respuesta) {
            if (respuesta.ok) {
                comun.mostrarAlerta(
                    action === "insert" ? "Cliente creado correctamente" : "Cliente actualizado correctamente",
                    "success"
                );
                // Redirigir al listado después de un breve delay
                setTimeout(function () {
                    window.location.href = ROOT_URL + "panel/clientes";
                }, 800);
            } else {
                comun.mostrarAlerta("Error: " + (respuesta.error || "No se pudo guardar"), "danger");
            }
        },
        error: function () {
            comun.mostrarAlerta("Error de conexión", "danger");
        },
        complete: function () {
            comun.desbloquearUI();
        }
    });
});
</script>
