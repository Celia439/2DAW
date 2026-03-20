
<?php 
include_once __DIR__ . "/../../../bloques/headerBibliotecario.php";
?>

<!-- ========== CONTENIDO ========== -->
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div class="card-titulo">Gestión de Usuarios</div>

        <!-- Tabla de Usuarios -->
        <div class="table-responsive" style="margin-top: 1rem;">
            <table class="tabla-biblioteca">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th style="width: 80px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Celia</td>
                        <td>Vega</td>
                        <td>44589762T</td>
                        <td>celia@ejemplo.com</td>
                        <td>678542315</td>
                        <td>Usuario</td>
                        <td><span class="estado-badge estado-activo">Activo</span></td>
                        <td>
                            <div class="acciones-tabla">
                                <button class="btn-editar" title="Editar"><i class="bi bi-pencil"></i></button>
                                <button class="btn-eliminar" title="Eliminar"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Juan</td>
                        <td>Pérez</td>
                        <td>12345678A</td>
                        <td>juan@ejemplo.com</td>
                        <td>645123456</td>
                        <td>Bibliotecario</td>
                        <td><span class="estado-badge estado-activo">Activo</span></td>
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