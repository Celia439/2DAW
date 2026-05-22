<?php
//paginador
$totalPaginas = ceil($total / $porPag);

?>
<div class="container mt-5">
    <h3 class="d-flex justify-content-between p-3">Clientes<a href="<?= PANEL_URL ?>clientes/formulario" class="btn btn-outline-success">Nuevo</a></h3>

    <form id="filtrosClientes" novalidate>
        <fieldset class="p-3">
            <le>
                <h4>Filtros</h4>
            </le
            end>
            <hr>
            <div class="row g-3">

                <div class="col-12 col-md-3">
                    <label for="nombreF">Nombre</label>
                    <input id="nombreF" class="form-control" type="text" placeholder="Nombre">
                </div>

                <div class="col-12 col-md-3">
                    <label for="telefonoF">Telefono</label>
                    <input id="telefonoF" pattern="^[0-9]{9}$" class="form-control" type="tel" placeholder="Telefono">
                </div>

                <div class="col-12 col-md-3">
                    <label for="DNIF">DNI</label>
                    <input id="DNIF" type="text" pattern="^[0-9]{8}[A-Z]$" class="form-control" maxlength="9"
                        minlength="9" placeholder="Ej: 12345678A">
                </div>

                <div class="col-12 col-md-3">
                    <label for="emailF">email</label>
                    <input id="emailF" class="form-control" type="email" placeholder="Ej: cliente@email.com">
                </div>

            </div>

            <div class="mt-4">
                <button id="buscar" type="submit" class="btn btn-success me-2">Buscar</button>
                <button id="resetF" type="reset" class="btn btn-secondary">Restablecer Filtros</button>
            </div>
        </fieldset>
    </form>
    <table id="tablaCliente" class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre y apellidos</th>
                <th>DNI/NIE</th>
                <th>Tlf. fijo</th>
                <th>Tlf. móvil</th>
                <th>Email</th>
                <th>Acciones</th>
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
    <?php
    // file_get_contents es para cargar el HTML como texto.
    $contenidoFormulario = file_get_contents(LIBRERIA_HTML . "form_clientes.html");

    $titulo = "Nuevo Cliente";
    $idModal = "modalCliente";
    ?>

    <nav aria-label="Page navigation">
        <ul id="paginadorClientes" class="pagination">

            <!-- Botón anterior -->
            <li id="btnAnterior" class="page-item <?= $pagina <= 1 ? 'disabled' : '' ?>">
                <a class="page-link paginar" href="#" data-p="<?= $pagina - 1 ?>">Anterior</a>
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