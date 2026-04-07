<?php
include_once __DIR__ . "/../../../bloques/headerBibliotecario.php";
?>

<!-- ========== CONTENIDO ========== -->
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div class="card-titulo">Gestión de Préstamos</div>

        <!-- Tabla de Préstamos -->
        <div class="table-responsive" style="margin-top: 1rem;">
            <table class="tabla-biblioteca">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libro</th>
                        <th>Usuario</th>
                        <th>Fecha Préstamo</th>
                        <th>Fecha Devolución</th>
                        <th>Estado</th>
                        <th style="width: 80px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>El Principito</td>
                        <td>Celia Vega</td>
                        <td>10/11/2025</td>
                        <td>01/12/2025</td>
                        <td><span class="estado-badge estado-devuelto">Devuelto</span></td>
                        <td>
                            <div class="acciones-tabla">
                                <button class="btn-editar" title="Editar"><i class="bi bi-pencil"></i></button>
                                <button class="btn-eliminar" title="Eliminar"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Don Quijote</td>
                        <td>Juan Pérez</td>
                        <td>15/11/2025</td>
                        <td>15/12/2025</td>
                        <td><span class="estado-badge estado-prestado">Prestado</span></td>
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