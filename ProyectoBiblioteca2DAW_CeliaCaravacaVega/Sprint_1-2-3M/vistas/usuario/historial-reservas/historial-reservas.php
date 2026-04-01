<?php 
$paginaActual = 'historial-reservas';
include '../../../bloques/headerWeb.php';
?>
<main class="container my-5">
    
    <!-- Puntos de navegación superior (simulado) -->
    <div class="d-flex align-items-center justify-content-center mb-4 carrusel-puntos">
        <a href="<?= $baseUrl ?>/vistas/usuario/cuenta/cuenta.php" class="text-decoration-none me-3">
            <button class="btn btn-sm btn-secondary rounded-circle" style="width: 32px; height: 32px; background-color: var(--color-header); border:none;">
                <i class="bi bi-chevron-left" style="color:white; font-size:16px;"></i>
            </button>
        </a>
        <span class="punto activo mx-2"></span><span class="fs-6 me-3 fw-bold" style="color:var(--color-header)">Recientes</span>
        <span class="punto mx-2"></span><span class="fs-6 me-3 text-muted">Completadas</span>
        <span class="punto mx-2"></span><span class="fs-6 me-3 text-muted">Canceladas</span>
        <span class="punto mx-1"></span><span class="punto mx-1"></span><span class="punto mx-1"></span><span class="punto mx-1"></span>
    </div>

    <!-- Sección de Reservas -->
    <section class="agrupacion-contenido">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="mb-1">Reservas Realizadas</h2>
                <p class="subtitulo text-white opacity-75 mb-0" style="font-size: 0.95rem;">Estado: Activas</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Ejemplo Tarjeta Reserva 1 -->
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="tarjeta-item">
                    <div class="tarjeta-imagen">
                        <i class="bi bi-image text-white opacity-25 fs-1"></i>
                    </div>
                    <h3>Title</h3>
                    <p>Reserva programada para el <strong>15/10/2026</strong>. Disponible para recoger en mostrador durante 48h.</p>
                    <button class="btn-favorito"><i class="bi bi-clock-history"></i></button>
                </div>
            </div>
            
            <!-- Ejemplo Tarjeta Reserva 2 -->
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="tarjeta-item">
                    <div class="tarjeta-imagen">
                        <i class="bi bi-image text-white opacity-25 fs-1"></i>
                    </div>
                    <h3>Title</h3>
                    <p>Reserva programada para el <strong>20/10/2026</strong>. Disponible para recoger en mostrador durante 48h.</p>
                    <button class="btn-favorito"><i class="bi bi-clock-history"></i></button>
                </div>
            </div>

            <!-- Ejemplo Tarjeta Reserva 3 -->
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="tarjeta-item">
                    <div class="tarjeta-imagen">
                        <i class="bi bi-image text-white opacity-25 fs-1"></i>
                    </div>
                    <h3>Title</h3>
                    <p>Reserva programada para el <strong>22/10/2026</strong>. Disponible para recoger en mostrador durante 48h.</p>
                    <button class="btn-favorito"><i class="bi bi-clock-history"></i></button>
                </div>
            </div>

            <!-- Ejemplo Tarjeta Reserva 4 -->
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="tarjeta-item">
                    <div class="tarjeta-imagen">
                        <i class="bi bi-image text-white opacity-25 fs-1"></i>
                    </div>
                    <h3>Title</h3>
                    <p>Reserva programada para el <strong>01/11/2026</strong>. Disponible para recoger en mostrador durante 48h.</p>
                    <button class="btn-favorito"><i class="bi bi-clock-history"></i></button>
                </div>
            </div>

        </div>

        <!-- Puntos navegación inferior -->
         <div class="d-flex justify-content-center mt-5">
            <span class="punto activo border-0 me-2" style="background-color: var(--color-texto-claro);"></span>
            <span class="punto border-0 me-2" style="background-color: rgba(255,255,255,0.2);"></span>
            <span class="punto border-0 me-2" style="background-color: rgba(255,255,255,0.2);"></span>
            <span class="punto border-0" style="background-color: rgba(255,255,255,0.2);"></span>
         </div>
    </section>
</main>
<?php include '../../../bloques/footerWeb.php'; ?>
