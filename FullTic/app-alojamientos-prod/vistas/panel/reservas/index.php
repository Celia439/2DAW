<?php

if (!$_SESSION["id_user"]) {
    header("Location: login");
    exit;
}

//paginador
$totalPaginas = ceil($total / $porPag);


?>
<div class="container mt-5">
    <main>
        <h3 class="d-flex justify-content-between p-3">Reservas<button id="btnNuevaReserva"
                class="btn btn-outline-success">Nuevo</button></h3>


        <form id="filtrosReservas" novalidate>
            <fieldset class="p-3">
                <legend>
                    <h4>Filtros</h4>
                </legend>
                <hr>
                <div class="row g-3">

                    <div class="col-12 col-md-3">
                        <label for="numeroF">Número</label>
                        <input id="numeroF" class="form-control" type="number" placeholder="Número" min="0">
                    </div>

                    <div class="col-12 col-md-3">
                        <label for="anioF">Año</label>
                        <select id="anioF" class="form-control">
                            <option value="">Seleccione un año</option>

                            <?php
                            $anio = 2022;
                            $anioAct = date("Y");

                            for ($i = $anio; $i <= $anioAct; $i++) {
                                echo "<option value='" . $i . "'> " . $i . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-12 col-md-3">
                        <label for="desdeF">Desde</label>
                        <input id="desdeF" class="form-control" type="date">
                    </div>

                    <div class="col-12 col-md-3">
                        <label for="hastaF">Hasta</label>
                        <input id="hastaF" class="form-control" type="date">
                    </div>

                </div>

                <div class="mt-4">
                    <button id="buscar" type="submit" class="btn btn-success me-2">Buscar</button>
                    <button id="resetF" type="reset" class="btn btn-secondary">Restablecer Filtros</button>
                </div>
            </fieldset>
        </form>




        <!--Tabla de reservas -->
        <table id="tablaReservas" class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número</th>
                    <th>Canal</th>
                    <th>Huéspedes</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th>Bruto</th>
                    <th>Descuento</th>
                    <th>Comisión</th>
                    <th>Importe final</th>
                    <th>Link</th>
                    <th></th>
                    <th></th>
                    <?php
                    /*
                    foreach ($columnas as $columna) {
                        foreach ($columna as $detalle) {
                            echo "<th>$detalle</th>";
                        }
                    }*/
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once LIBRERIA_PHP . "comun.php";
                $comun = new comun();
                if ($reservas) {
                    foreach ($reservas as $reserva)
                        include ROOT . "vistas/panel/reservas/fila_reserva.php";
                }
                ?>
            </tbody>
            <tfoot>
                <tr class="table-secondary fw-bold">
                    <td>TOTAL</td>
                    <td></td>
                    <td></td>
                    <td id="total_huespedes_resumen"><?= $resumen["total_huespedes"] ?></td>
                    <td></td>
                    <td></td>
                    <td id="total_bruto_resumen"><?= $resumen["total_bruto"] ?>€</td>
                    <td id="total_descuento_resumen"><?= $resumen["total_descuento"] ?>%</td>
                    <td id="total_comision_resumen"><?= $resumen["total_comision"] ?>%</td>
                    <td id="total_final_resumen"><?= $resumen["total_final"] ?>€</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </main>
    <nav aria-label="Page navigation">
        <ul id="paginadorReservas" class="pagination">

            <!-- Botón anterior -->
            <li id="btnAnterior" class="page-item <?= $pagina <= 1 ? 'disabled' : '' ?>">
                <a class="page-link paginar" href="#" data-p="<?= $pagina - 1 ?>">Anterior</a>
            </li>

            <!-- Números -->
            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <li class="page-item <?= $i == $pagina ? 'active' : '' ?>">
                    <a class="page-link paginar" href="#" data-p="<?= $i ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>

            <!-- Botón siguiente -->
            <li id="btnSiguiente" class="page-item <?= $pagina >= $totalPaginas ? 'disabled' : '' ?>">
                <a class="page-link paginar" href="#" data-p="<?= $pagina + 1 ?>">Siguiente</a>
            </li>

        </ul>
    </nav>
    <!--Script de reservas-->
    <script type="text/javascript" src="<?php echo ROOT_URL . "vistas/panel/reservas/index.js" ?>"></script>
    
    <script>
        reservas.paginaActual = <?= $pagina ?>;
        reservas.totalPaginas = <?= $totalPaginas ?>;
    </script>
</div>