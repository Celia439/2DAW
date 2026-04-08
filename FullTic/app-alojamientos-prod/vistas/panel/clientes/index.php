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
                <th></th>
                <th></th>
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
    <!--Modal nuevo cliente (html de libreria)-->
    <?php
    // file_get_contents es para cargar el HTML como texto.
    $contenidoFormulario = file_get_contents(LIBRERIA_HTML . "form_clientes.html");

    $titulo = "Nuevo Cliente";
    $idModal = "modalCliente";
    ?>

    <nav aria-label="Page navigation">
        <ul class="pagination">

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