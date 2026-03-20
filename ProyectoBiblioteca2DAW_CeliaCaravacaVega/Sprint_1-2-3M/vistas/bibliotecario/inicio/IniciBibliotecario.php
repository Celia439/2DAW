<?php
include_once __DIR__ . "/../../../bloques/headerBibliotecario.php";
?>

<!-- Contenido principal -->
<div class="contenido-principal">
    <div class="row g-4">

        <!-- Resumen Dashboard -->
        <div class="col-lg-5">
            <div class="card-biblioteca">
                <div class="text-center mb-3">
                    <h5 class="card-titulo" style="font-size: 1.15rem;">Resumen General</h5>
                </div>

                <!-- Libros -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span style="font-weight: 600; font-size: 0.92rem;">Libros: <strong>50</strong></span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: 70%;"></div>
                    </div>
                </div>

                <!-- Usuarios -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span style="font-weight: 600; font-size: 0.92rem;">Usuarios: <strong>10</strong></span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-info" style="width: 45%;"></div>
                    </div>
                </div>

                <!-- Reservas -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span style="font-weight: 600; font-size: 0.92rem;">Reservas: <strong>18</strong></span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-warning" style="width: 55%;"></div>
                    </div>
                </div>

                <!-- Préstamos -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span style="font-weight: 600; font-size: 0.92rem;">Préstamos: <strong>15</strong></span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-info" style="width: 50%;"></div>
                    </div>
                </div>

                <!-- Multas -->
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <span style="font-weight: 600; font-size: 0.92rem;">Multas: <strong>0</strong></span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-secondary" style="width: 5%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Accesos rápidos -->
        <div class="col-lg-7">
            <div class="card-biblioteca">
                <div class="card-titulo">Accesos Rápidos</div>
                <div class="row g-2" style="margin-top: 0.5rem;">
                    <div class="col-md-6">
                        <a href="<?= $baseUrl ?>/vistas/bibliotecario/usuarios/UsuariosBibliotecario.php" class="btn btn-outline-primary w-100">
                            <i class="bi bi-people"></i> Usuarios
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="<?= $baseUrl ?>/vistas/bibliotecario/libros/LibrosBibliotecario.php" class="btn btn-outline-primary w-100">
                            <i class="bi bi-book"></i> Libros
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="<?= $baseUrl ?>/vistas/bibliotecario/prestamos/PrestamosBibliotecario.php" class="btn btn-outline-primary w-100">
                            <i class="bi bi-plus-lg"></i> Préstamos
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="<?= $baseUrl ?>/vistas/bibliotecario/reservas/ReservasBibliotecario.php" class="btn btn-outline-primary w-100">
                            <i class="bi bi-calendar"></i> Reservas
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="<?= $baseUrl ?>/vistas/bibliotecario/multas/MultasBibliotecario.php" class="btn btn-outline-primary w-100">
                            <i class="bi bi-clock"></i> Multas
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="<?= $baseUrl ?>/vistas/bibliotecario/empresa/EmpresaBibliotecario.php" class="btn btn-outline-primary w-100">
                            <i class="bi bi-building"></i> Empresa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include_once __DIR__ . "/../../../bloques/footerBibliotecario.php";
?>
                                        <span class="item-icon"><i class="bi bi-clock"></i></span>
                                    </li>
                                    <li>
                                        <div class="item-info">
                                            <div class="item-nombre">Menu Label</div>
                                            <div class="item-fecha">Menu description</div>
                                        </div>
                                        <span class="item-icon"><i class="bi bi-clock"></i></span>
                                    </li>
                                    <li>
                                        <div class="item-info">
                                            <div class="item-nombre">Menu Label</div>
                                            <div class="item-fecha">Menu description</div>
                                        </div>
                                        <span class="item-icon"><i class="bi bi-clock"></i></span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
