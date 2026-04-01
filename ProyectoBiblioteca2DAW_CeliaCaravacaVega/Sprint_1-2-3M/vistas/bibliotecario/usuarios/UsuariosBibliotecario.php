<?php 
include_once __DIR__ . "/../../../bloques/headerBibliotecario.php";
?>

<!-- ========== CONTENIDO ========== -->
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div class="card-titulo">Gestión de Usuarios</div>
            <button class="btn-nuevo" data-bs-toggle="modal" data-bs-target="#modalNuevoUsuario">
                <i class="bi bi-plus-lg"></i> Nuevo Usuario
            </button>
        </div>

        <!-- Tabla de Usuarios -->
        <div class="table-responsive">
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
                    <!-- Los datos se cargarán dinámicamente con AJAX -->
                    <tr>
                        <td colspan="9" style="text-align: center; padding: 2rem;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Cargando...</span>
                            </div>
                            <p style="margin-top: 1rem;">Cargando usuarios...</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL NUEVO USUARIO -->
<div class="modal fade modal-biblioteca" id="modalNuevoUsuario" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-person-plus"></i> Nuevo Usuario
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formNuevoUsuario">
                    <div class="row g-3">
                        <!-- Nombre -->
                        <div class="col-md-6">
                            <label class="form-label">
                                <i class="bi bi-person label-icon"></i>Nombre *
                            </label>
                            <input type="text" class="form-control" id="usr_nom" required>
                        </div>

                        <!-- Apellido -->
                        <div class="col-md-6">
                            <label class="form-label">
                                <i class="bi bi-person label-icon"></i>Apellido
                            </label>
                            <input type="text" class="form-control" id="usr_ape">
                        </div>

                        <!-- DNI -->
                        <div class="col-md-6">
                            <label class="form-label">
                                <i class="bi bi-card-text label-icon"></i>DNI
                            </label>
                            <input type="text" class="form-control" id="usr_dni">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label class="form-label">
                                <i class="bi bi-envelope label-icon"></i>Email *
                            </label>
                            <input type="email" class="form-control" id="usr_cor" required>
                        </div>

                        <!-- Contraseña -->
                        <div class="col-md-6">
                            <label class="form-label">
                                <i class="bi bi-lock label-icon"></i>Contraseña *
                            </label>
                            <input type="password" class="form-control" id="usr_pass" required>
                        </div>

                        <!-- Teléfono -->
                        <div class="col-md-6">
                            <label class="form-label">
                                <i class="bi bi-telephone label-icon"></i>Teléfono
                            </label>
                            <input type="tel" class="form-control" id="usr_tel">
                        </div>

                        <!-- Dirección -->
                        <div class="col-md-12">
                            <label class="form-label">
                                <i class="bi bi-geo-alt label-icon"></i>Dirección
                            </label>
                            <input type="text" class="form-control" id="usr_dir">
                        </div>

                        <!-- Rol -->
                        <div class="col-md-6">
                            <label class="form-label">
                                <i class="bi bi-person-badge label-icon"></i>Rol
                            </label>
                            <select class="form-select" id="usr_rol">
                                <option value="lector" selected>Lector</option>
                                <option value="bibliotecario">Bibliotecario</option>
                                <option value="admin">Administrador</option>
                            </select>
                        </div>

                        <!-- Estado -->
                        <div class="col-md-6">
                            <label class="form-label">
                                <i class="bi bi-toggle-on label-icon"></i>Estado
                            </label>
                            <select class="form-select" id="usr_est">
                                <option value="activo" selected>Activo</option>
                                <option value="bloqueado">Bloqueado</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="button" class="btn-registrar">
                            <i class="bi bi-save"></i> Registrar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Cargar el JS específico de usuarios -->
<script src="usuario.js"></script>

<?php 
include_once __DIR__ . "/../../../bloques/footerBibliotecario.php";
?>