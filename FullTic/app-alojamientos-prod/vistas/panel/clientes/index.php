<?php
//paginador
$totalPaginas = ceil($total / $porPag);
$pagina = isset($_POST["p"]) ? intval($_POST["p"]) : 1;

?>
<div class="container mt-5">
    <h3 class="d-flex justify-content-between p-3">Clientes<button class="btn btn-outline-success"
            data-bs-toggle="modal" data-bs-target="#modalCliente">Nuevo</button></h3>
    <table id="tablaClientes" class="table table-hover">
        <thead>
            <tr>
                <?php
                foreach ($columnas as $columna) {
                    foreach ($columna as $detalles) {
                        echo "<th>$detalles</th>";
                    }
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($clientes) {
                foreach ($clientes as $cliente) {
                    include ROOT . "vistas/panel/reservas/fila_cliente.php";
                }
            }
            ?>
        </tbody>
    </table>
    <!--Modal nueva casa-->
    <?php
    $contenidoFormulario = '
    <form id="formClientes" action="#" method="post" class="needs-validation" novalidate>
      <div class="row g-3">

    <!-- nombre -->
    <div class="col-6">
        <label class="form-label"><i class="bi bi-person label-icon"></i>Nombre</label>
        <input type="text" class="form-control" name="nombre">
    </div>

    <!-- primer_apellido -->
    <div class="col-6">
        <label class="form-label"><i class="bi bi-person label-icon"></i>Primer apellido</label>
        <input type="text" class="form-control" name="primer_apellido">
    </div>

    <!-- segundo_apellido -->
    <div class="col-6">
        <label class="form-label"><i class="bi bi-person label-icon"></i>Segundo apellido</label>
        <input type="text" class="form-control" name="segundo_apellido">
    </div>

    <!-- sexo -->
    <div class="col-6">
        <label class="form-label"><i class="bi bi-gender-ambiguous label-icon"></i>Sexo</label>
        <select class="form-select" name="sexo">
            <option value="" selected disabled></option>
            <option value="H">Hombre</option>
            <option value="M">Mujer</option>
            <option value="X">Otro</option>
        </select>
    </div>

    <!-- numero_documento_identidad -->
    <div class="col-6">
        <label class="form-label"><i class="bi bi-credit-card label-icon"></i>Número de documento</label>
        <input type="text" class="form-control" name="numero_documento_identidad">
    </div>

    <!-- tipo_documentacion -->
    <div class="col-6">
        <label class="form-label">Tipo de documentación</label>
        <select class="form-select" name="tipo_documentacion">
            <option value="" selected disabled></option>
            <option value="DNI">DNI</option>
            <option value="NIE">NIE</option>
            <option value="PASAPORTE">Pasaporte</option>
        </select>
    </div>

    <!-- numero_soporte_documento -->
    <div class="col-6">
        <label class="form-label">Número de soporte</label>
        <input type="text" class="form-control" name="numero_soporte_documento">
    </div>

    <!-- nacionalidad_id -->
    <div class="col-6">
        <label class="form-label">Nacionalidad</label>
        <input type="text" class="form-control" name="nacionalidad_id">
    </div>

    <!-- fecha_nacimiento -->
    <div class="col-6">
        <label class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" name="fecha_nacimiento">
    </div>

    <!-- telefono_fijo -->
    <div class="col-6">
        <label class="form-label">Teléfono fijo</label>
        <input type="text" class="form-control" name="telefono_fijo">
    </div>

    <!-- telefono_movil -->
    <div class="col-6">
        <label class="form-label">Teléfono móvil</label>
        <input type="text" class="form-control" name="telefono_movil">
    </div>

    <!-- correo -->
    <div class="col-6">
        <label class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" name="correo">
    </div>

    <!-- menores_de_edad -->
    <div class="col-6">
        <label class="form-label">¿Menor de edad?</label>
        <select class="form-select" name="menores_de_edad">
            <option value="" selected disabled></option>
            <option value="0">No</option>
            <option value="1">Sí</option>
        </select>
    </div>

  <!-- País -->
<div class="col-6">
    <label class="form-label">País</label>
    <select class="form-select" name="pais">
        <option value="" selected disabled>Seleccione un país</option>
    </select>
</div>

  <!-- Provincia -->
<div class="col-6">
    <label class="form-label">Provincia</label>
    <select class="form-select" name="provincia">
        <option value="" selected disabled>Seleccione una provincia</option>
    </select>
</div>

<!-- Localidad -->
<div class="col-6">
    <label class="form-label">Localidad</label>
    <select class="form-select" name="localidad">
        <option value="" selected disabled>Seleccione una localidad</option>
    </select>
</div>
    <!-- direccion -->
    <div class="col-6">
        <label class="form-label">Dirección</label>
        <input type="text" class="form-control" name="direccion">
    </div>

    <!-- codigo_postal -->
    <div class="col-6">
        <label class="form-label">Código postal</label>
        <input type="text" class="form-control" name="codigo_postal">
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
            <li class="page-item <?= $pagina <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="?p=<?= $pagina - 1 ?>">Anterior</a>
            </li>

            <!-- Números -->
            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <li class="page-item <?= $i == $pagina ? 'active' : '' ?>">
                    <a class="page-link" href="?p=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <!-- Botón siguiente -->
            <li class="page-item <?= $pagina >= $totalPaginas ? 'disabled' : '' ?>">
                <a class="page-link" href="?p=<?= $pagina + 1 ?>">Siguiente</a>
            </li>

        </ul>
    </nav>
</div>