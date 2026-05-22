<div class="container mt-5">
    <main>
        <h3 class="d-flex justify-content-between p-3">Huéspedes<button id="btnNuevoHuesped"
                class="btn btn-outline-success">Nuevo</button></h3>

        <form id="filtrosHuespedes" novalidate>
            <fieldset class="p-3">
                <legend>
                    <h4>Filtros</h4>
                </legend>
                <hr>
                <div class="row g-3">

                    <div class="col-12 col-md-3">
                        <label for="idF">ID</label>
                        <input id="idF" class="form-control" type="number" placeholder="ID" min="0">
                    </div>

                    <div class="col-12 col-md-3">
                        <label for="idReservaF">ID Reserva</label>
                        <select id="idReservaF" class="form-control">
                            <?php
                            foreach ($reservas as $reserva) {
                                echo "<option value='" . $reserva->id . "'>" . $reserva->nombre . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-12 col-md-3">
                        <label for="idCasaF">ID Casa</label>
                        <select id="idCasaF" class="form-control">
                            <?php
                            foreach ($casas as $casa) {
                                echo "<option value='" . $casa->id . "'>" . $casa->nombre . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-12 col-md-3">
                        <label for="idClienteF">ID Cliente</label>
                        <select id="idClienteF" class="form-control">
                            <?php
                            foreach ($clientes as $cliente) {
                                echo "<option value='" . $cliente->id . "'>" . $cliente->nombre . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="mt-4">
                    <button id="buscar" type="submit" class="btn btn-success me-2">Buscar</button>
                    <button id="resetF" type="reset" class="btn btn-secondary">Restablecer Filtros</button>
                </div>
            </fieldset>
        </form>

        <!--Tabla de huéspedes -->
        <table id="tablaHuespedes" class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Reserva</th>
                    <th>ID Casa</th>
                    <th>ID Cliente</th>
                    <th>Es Titular</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($huespedes) {
                    foreach ($huespedes as $huesped) {
                        include ROOT . "vistas/panel/huespedes/fila_huesped.php";
                    }
                }
                ?>
            </tbody>
        </table>
    </main>
</div>

<script type="text/javascript" src="<?php echo ROOT_URL . "vistas/panel/huespedes/index.js" ?>"></script>