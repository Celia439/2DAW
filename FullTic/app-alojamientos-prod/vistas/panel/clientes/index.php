<?php
//paginador
$totalPaginas = ceil($total / $porPag);

?>
<div class="container mt-5">
    <h3 class="d-flex justify-content-between p-3">Clientes<button class="btn btn-outline-success"
            data-bs-toggle="modal" data-bs-target="#modalCliente">Nuevo</button></h3>
    <table id="tablaCliente" class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Creación</th>
                <th>Nombre</th>
                <th>1º apellido</th>
                <th>2º apellido</th>
                <th>Sexo</th>
                <th>DNI/NIE</th>
                <th>Tipo doc.</th>
                <th>Soporte</th>
                <th>Nacionalidad</th>
                <th>Nacimiento</th>
                <th>Tlf. fijo</th>
                <th>Tlf. móvil</th>
                <th>Email</th>
                <th>Menores</th>
                <th>País</th>
                <th>Provincia</th>
                <th>Localidad</th>
                <th>Dirección</th>
                <th>CP</th>
                <?php
                /* Campos autimaticamente 
                foreach ($columnas as $columna) {
                    foreach ($columna as $detalles) {
                        echo "<th>$detalles</th>";
                    }
                }*/
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($clientes) {
                foreach ($clientes as $cliente) {
                    include VISTA_FILA_CLIENTES;
                }
            }
            ?>
        </tbody>
    </table>
    <!--Modal nuevo cliente-->
    <?php
    $contenidoFormulario = '
   <form id="formClientes" action="#" method="post" class="needs-validation" novalidate>
    <div class="row g-3">

        <!-- nombre -->
        <div class="col-6">
            <label class="form-label" for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                   required pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" maxlength="50">
            <div class="invalid-feedback">Introduce un nombre válido.</div>
        </div>

        <!-- primer_apellido -->
        <div class="col-6">
            <label class="form-label" for="primer_apellido">Primer apellido</label>
            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido"
                   required pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" maxlength="50">
            <div class="invalid-feedback">Introduce un primer apellido válido.</div>
        </div>

        <!-- segundo_apellido -->
        <div class="col-6">
            <label class="form-label" for="segundo_apellido">Segundo apellido</label>
            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido"
                   required pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" maxlength="50">
            <div class="invalid-feedback">Introduce un segundo apellido válido.</div>
        </div>

        <!-- sexo -->
        <div class="col-6">
            <label class="form-label" for="sexo">Sexo</label>
            <select class="form-select" id="sexo" name="sexo" required>
                <option value="" disabled selected></option>
                <option value="H">Hombre</option>
                <option value="M">Mujer</option>
                <option value="X">Otro</option>
            </select>
            <div class="invalid-feedback">Selecciona un sexo.</div>
        </div>

        <!-- numero_documento_identidad -->
        <div class="col-6">
            <label class="form-label" for="numero_documento_identidad">Número de documento</label>
            <input type="text" class="form-control" id="numero_documento_identidad" name="numero_documento_identidad"
                   required pattern="^[0-9]{8}[A-Z]$" placeholder="12345678A">
            <div class="invalid-feedback">Introduce un número de documento válido.</div>
        </div>

        <!-- tipo_documentacion -->
        <div class="col-6">
            <label class="form-label" for="tipo_documentacion">Tipo de documentación</label>
            <select class="form-select" id="tipo_documentacion" name="tipo_documentacion" required>
                <option value="" disabled selected></option>
                <option value="DNI">DNI</option>
                <option value="NIE">NIE</option>
                <option value="PASAPORTE">Pasaporte</option>
            </select>
            <div class="invalid-feedback">Selecciona un tipo de documentación.</div>
        </div>

        <!-- numero_soporte_documento -->
        <div class="col-6">
            <label class="form-label" for="numero_soporte_documento">Número de soporte</label>
            <input type="text" class="form-control" id="numero_soporte_documento" name="numero_soporte_documento"
                   required maxlength="20">
            <div class="invalid-feedback">Introduce un número de soporte válido.</div>
        </div>

        <!-- nacionalidad_id -->
        <div class="col-6">
            <label class="form-label" for="nacionalidad_id">Nacionalidad</label>
            <select class="form-select" id="nacionalidad_id" name="nacionalidad_id" required>
                <option value="" disabled selected>Seleccione una nación</option>';
    foreach ($paises as $p) {
        $contenidoFormulario .= "<option value=\"{$p['id']}\">{$p['nombre']}</option>";
    }
    $contenidoFormulario .= '
            </select>
            <div class="invalid-feedback">Introduce una nacionalidad.</div>
        </div>

        <!-- fecha_nacimiento -->
        <div class="col-6">
            <label class="form-label" for="fecha_nacimiento">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            <div class="invalid-feedback">Introduce una fecha válida.</div>
        </div>

        <!-- telefono_fijo -->
        <div class="col-6">
            <label class="form-label" for="telefono_fijo">Teléfono fijo</label>
            <input type="text" class="form-control" id="telefono_fijo" name="telefono_fijo"
                   pattern="^[0-9]{9}$" placeholder="912345678">
            <div class="invalid-feedback">Introduce un teléfono fijo válido.</div>
        </div>

        <!-- telefono_movil -->
        <div class="col-6">
            <label class="form-label" for="telefono_movil">Teléfono móvil</label>
            <input type="text" class="form-control" id="telefono_movil" name="telefono_movil"
                   required pattern="^[0-9]{9}$" placeholder="612345678">
            <div class="invalid-feedback">Introduce un teléfono móvil válido.</div>
        </div>

        <!-- correo -->
        <div class="col-6">
            <label class="form-label" for="correo">Correo electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
            <div class="invalid-feedback">Introduce un correo válido.</div>
        </div>

        <!-- menores_de_edad -->
        <div class="col-6">
            <label class="form-label" for="menores_de_edad">¿Menor de edad?</label>
            <select class="form-select" id="menores_de_edad" name="menores_de_edad" required>
                <option value="" disabled selected></option>
                <option value="0">No</option>
                <option value="1">Sí</option>
            </select>
            <div class="invalid-feedback">Selecciona una opción.</div>
        </div>

        <!-- País -->
        <div class="col-6">
            <label class="form-label" for="pais">País</label>
            <select class="form-select" id="pais" name="pais" required>
                <option value="" disabled selected>Seleccione un país</option>';
    foreach ($paises as $p) {
        $contenidoFormulario .= "<option value=\"{$p['id']}\">{$p['nombre']}</option>";
    }
    $contenidoFormulario .= '
            </select>
            <div class="invalid-feedback">Selecciona un país.</div>
        </div>

        <!-- Provincia -->
        <div class="col-6">
            <label class="form-label" for="provincia">Provincia</label>
            <select class="form-select" id="provincia" name="provincia" required>
                <option value="" disabled selected>Seleccione una provincia</option>';
    foreach ($provincias as $prov) {
        $contenidoFormulario .= "<option value=\"{$prov['id']}\">{$prov['Provincia']}</option>";
    }
    $contenidoFormulario .= '

            </select>
            <div class="invalid-feedback">Selecciona una provincia.</div>
        </div>

        <!-- Localidad -->
        <div class="col-6">
            <label class="form-label" for="localidad">Localidad</label>
            <select class="form-select" id="localidad" name="localidad" required>
                <option value="" disabled selected>Seleccione una localidad</option>
            </select>
            <div class="invalid-feedback">Selecciona una localidad.</div>
        </div>

        <!-- direccion -->
        <div class="col-6">
            <label class="form-label" for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion"
                   required maxlength="100">
            <div class="invalid-feedback">Introduce una dirección válida.</div>
        </div>

        <!-- codigo_postal -->
        <div class="col-6">
            <label class="form-label" for="codigo_postal">Código postal</label>
            <input type="text" class="form-control" id="codigo_postal" name="codigo_postal"
                   required pattern="^[0-9]{5}$">
            <div class="invalid-feedback">Introduce un código postal válido.</div>
        </div>

    </div>

    <div class="mt-3">
        <button class="btn btn-outline-success">Registrar</button>
    </div>
</form>
';
    $titulo = "Nuevo Cliente";
    $idModal = "modalCliente";
    ?>

    <nav aria-label="Page navigation">
        <ul class="pagination">

            <!-- Botón anterior -->
            <li id="btnAnterior" class="page-item <?= $pagina <= 1 ? 'disabled' : '' ?>">
                <a class="page-link paginar"  href="#" data-p="<?= $pagina - 1 ?>">Anterior</a>
            </li>

            <!-- Números -->
            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <li class="page-item <?= $i == $pagina ? 'active' : '' ?>">
                    <a class="page-link paginar" href="#" data-p="<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <!-- Botón siguiente -->
            <li id="btnSiguiente" class="page-item <?= $pagina >= $totalPaginas ? 'disabled' : '' ?>">
                <a class="page-link paginar" href="#" data-p="<?= $pagina + 1 ?>">Siguiente</a>
            </li>

        </ul>
    </nav>
    <!--Script de Clientes-->
    <script type="text/javascript" src="<?php echo ROOT_URL . "vistas/panel/clientes/index.js" ?>"></script>

    <script>
        clientes.paginaActual = <?= $pagina ?>;
        clientes.totalPaginas = <?= $totalPaginas ?>;
    </script>
</div>