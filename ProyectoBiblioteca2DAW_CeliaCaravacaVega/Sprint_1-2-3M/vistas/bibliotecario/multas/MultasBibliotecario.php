<?php
include_once __DIR__ . "/../../../bloques/headerBibliotecario.php";
    ?>
<!-- ========== CONTENIDO ========== -->
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div class="card-titulo">Gestión de Multas</div>

        <!-- Tabla de Multas -->
        <div class="table-responsive" style="margin-top: 1rem;">
            <table class="tabla-biblioteca">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                        <th>Usuario</th>
                        <th>Motivo</th>
                        <th>Estado</th>
                        <th style="width: 80px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>10/11/2025</td>
                        <td>€3,00</td>
                        <td>Celia Vega</td>
                        <td>Retraso devolución</td>
                        <td><span class="estado-badge estado-pagada">Pagada</span></td>
                        <td>
                            <div class="acciones-tabla">
                                <button class="btn-editar" title="Editar"><i class="bi bi-pencil"></i></button>
                                <button class="btn-eliminar" title="Eliminar"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>12/11/2025</td>
                        <td>€5,00</td>
                        <td>Juan Pérez</td>
                        <td>Daño en libro</td>
                        <td><span class="estado-badge estado-sin-pagar">Sin pagar</span></td>
                        <td>
                            <div class="acciones-tabla">
                                <button class="btn-editar" title="Editar"><i class="bi bi-pencil"></i></button>
                                <button class="btn-eliminar" title="Eliminar"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
include_once __DIR__ . "/../../../bloques/footerBibliotecario.php";
?>