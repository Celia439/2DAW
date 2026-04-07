<?php 
$paginaActual = 'multas';
include '../../../bloques/headerWeb.php';
?>
<main class="container my-5">
    <!-- Título de Sección -->
    <div class="mb-4">
        <h1 class="text-dark fw-bold" style="font-size: 2.5rem;">Multas</h1>
    </div>

    <!-- Contenedor Principal Morado -->
    <section class="agrupacion-contenido p-3 p-md-5">
        
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <p class="subtitulo text-white opacity-75 mb-0" style="font-size: 1rem;">Historial de multas y recargos por retrasos.</p>
            </div>
            
            <div class="d-flex align-items-center bg-white bg-opacity-25 rounded-pill px-3 py-1">
                 <span class="text-white fw-bold me-2">Estado:</span>
                 <select class="form-select border-0 bg-transparent text-white fw-bold py-0" style="box-shadow: none; width: auto; background-image: none;">
                    <option class="text-dark" value="todas">Todas</option>
                    <option class="text-dark" value="pendientes">Pendientes</option>
                 </select>
                 <i class="bi bi-chevron-down text-white"></i>
            </div>
        </div>

        <!-- Lista de Multas (Horizontal Cards) -->
        <div class="d-flex flex-column gap-4">
            
            <!-- Item de Multa 1 -->
            <div class="tarjeta-item p-3 d-flex flex-column flex-md-row align-items-md-center gap-4 position-relative">
                <!-- Imagen (opcional para no dejar vacío el placeholder de diseño) -->
                <div class="bg-white bg-opacity-10 rounded d-flex align-items-center justify-content-center flex-shrink-0" style="width: 120px; height: 120px;">
                    <i class="bi bi-exclamation-triangle-fill text-danger opacity-75 fs-1"></i>
                </div>
                <!-- Información -->
                <div class="flex-grow-1">
                    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-start mb-2">
                        <h3 class="fs-5 mb-0 text-white fw-bold">Libro: Title</h3>
                        <div class="text-end">
                            <span class="badge bg-danger bg-opacity-75 fs-6 mt-2 mt-md-0 fw-normal">Pendiente</span>
                            <div class="fw-bold mt-1 text-white fs-5 mt-2">15,00 €</div>
                        </div>
                    </div>
                    <div class="text-white opacity-75 mb-3" style="font-size: 0.9rem;">
                        <span class="me-3"><strong>Fecha Límite Original:</strong> 10/07/2026</span>
                        <span><strong>Días de retraso:</strong> 5 días</span>
                    </div>
                    <p class="text-white opacity-50 mb-0" style="font-size: 0.85rem; max-width: 600px;">Multa generada por la devolución tardía del ejemplar. Por favor, regularice su situación en el mostrador para seguir utilizando los servicios de préstamo.</p>
                </div>
            </div>

            <!-- Item de Multa 2 -->
             <div class="tarjeta-item p-3 d-flex flex-column flex-md-row align-items-md-center gap-4 position-relative">
                <div class="bg-white bg-opacity-10 rounded d-flex align-items-center justify-content-center flex-shrink-0" style="width: 120px; height: 120px;">
                     <i class="bi bi-check-circle-fill text-success opacity-75 fs-1"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-start mb-2">
                        <h3 class="fs-5 mb-0 text-white fw-bold">Libro: Title</h3>
                        <div class="text-end">
                            <span class="badge bg-success bg-opacity-75 fs-6 mt-2 mt-md-0 fw-normal">Pagada</span>
                             <div class="fw-bold mt-1 text-white fs-5 mt-2">6,00 €</div>
                        </div>
                    </div>
                    <div class="text-white opacity-75 mb-3" style="font-size: 0.9rem;">
                        <span class="me-3"><strong>Fecha Límite Original:</strong> 01/02/2026</span>
                        <span><strong>Días de retraso:</strong> 2 días</span>
                    </div>
                    <p class="text-white opacity-50 mb-0" style="font-size: 0.85rem; max-width: 600px;">Multa solventada en el mostrador. Gracias por su colaboración.</p>
                </div>
            </div>

             <!-- Item de Multa 3 -->
             <div class="tarjeta-item p-3 d-flex flex-column flex-md-row align-items-md-center gap-4 position-relative">
                <div class="bg-white bg-opacity-10 rounded d-flex align-items-center justify-content-center flex-shrink-0" style="width: 120px; height: 120px;">
                     <i class="bi bi-check-circle-fill text-success opacity-75 fs-1"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-start mb-2">
                        <h3 class="fs-5 mb-0 text-white fw-bold">Libro: Title</h3>
                        <div class="text-end">
                            <span class="badge bg-success bg-opacity-75 fs-6 mt-2 mt-md-0 fw-normal">Pagada</span>
                             <div class="fw-bold mt-1 text-white fs-5 mt-2">3,00 €</div>
                        </div>
                    </div>
                    <div class="text-white opacity-75 mb-3" style="font-size: 0.9rem;">
                        <span class="me-3"><strong>Fecha Límite Original:</strong> 15/12/2025</span>
                        <span><strong>Días de retraso:</strong> 1 día</span>
                    </div>
                    <p class="text-white opacity-50 mb-0" style="font-size: 0.85rem; max-width: 600px;">Multa solventada en el mostrador. Gracias por su colaboración.</p>
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
