<?php
include_once __DIR__ . "/../../../bloques/headerBibliotecario.php";
?>
<!-- ========== CONTENIDO ========== -->
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div class="card-titulo">Gestión de Libros</div>

        <!-- Tabla de Libros -->
        <div class="table-responsive" style="margin-top: 1rem;">
            <table class="tabla-biblioteca">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ISBN</th>
                        <th>Título</th>
                        <th>Cantidad</th>
                        <th>Autor</th>
                        <th>Géneros</th>
                        <th>Estado</th>
                        <th style="width: 80px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>978-84-1107-123-9</td>
                        <td>El Principito</td>
                        <td>5</td>
                        <td>Antoine de Saint-Exupéry</td>
                        <td>Infantil, Aventura</td>
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
                        <td>978-84-1107-456-1</td>
                        <td>Don Quijote</td>
                        <td>3</td>
                        <td>Miguel de Cervantes</td>
                        <td>Clásico, Aventura</td>
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