<?php 
$paginaActual = 'historial-prestamos';
include '../../../bloques/headerWeb.php';
?>
<main class="container my-5">
    <!-- Título de Sección -->
    <div class="mb-4">
        <h1 class="text-dark fw-bold" style="font-size: 2.5rem;">Historial de Préstamos</h1>
    </div>

    <!-- Contenedor Principal Morado -->
    <section class="agrupacion-contenido p-3 p-md-5">
        
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <p class="subtitulo text-white opacity-75 mb-0" style="font-size: 1rem;">Estás viendo tu historial de préstamos pasados y actuales.</p>
            </div>
        </div>

        <!-- Lista de Préstamos (Horizontal Cards) -->
        <div class="d-flex flex-column gap-4">
            
            <!-- Item de Préstamo 1 -->
            <div class="tarjeta-item p-3 d-flex flex-column flex-md-row align-items-md-center gap-4 position-relative">
                <!-- Imagen -->
                <div class="bg-white bg-opacity-10 rounded d-flex align-items-center justify-content-center flex-shrink-0" style="width: 120px; height: 120px;">
                    <i class="bi bi-image text-white opacity-25 fs-1"></i>
                </div>
                <!-- Información -->
                <div class="flex-grow-1">
                    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-start mb-2">
                        <h3 class="fs-5 mb-0 text-white fw-bold">Title</h3>
                        <span class="badge bg-success bg-opacity-75 fs-6 mt-2 mt-md-0 fw-normal">Devuelto</span>
                    </div>
                    <div class="text-white opacity-75 mb-3" style="font-size: 0.9rem;">
                        <span class="me-3"><strong>Fecha Préstamo:</strong> 05/10/2023</span>
                        <span><strong>Fecha Devolución:</strong> 20/10/2023</span>
                    </div>
                    <p class="text-white opacity-50 mb-0" style="font-size: 0.85rem; max-width: 600px;">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes.</p>
                </div>
            </div>

            <!-- Item de Préstamo 2 -->
            <div class="tarjeta-item p-3 d-flex flex-column flex-md-row align-items-md-center gap-4 position-relative">
                <!-- Imagen -->
                <div class="bg-white bg-opacity-10 rounded d-flex align-items-center justify-content-center flex-shrink-0" style="width: 120px; height: 120px;">
                    <i class="bi bi-image text-white opacity-25 fs-1"></i>
                </div>
                <!-- Información -->
                <div class="flex-grow-1">
                    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-start mb-2">
                        <h3 class="fs-5 mb-0 text-white fw-bold">Title</h3>
                        <span class="badge bg-warning text-dark bg-opacity-75 fs-6 mt-2 mt-md-0 fw-normal">En Préstamo</span>
                    </div>
                    <div class="text-white opacity-75 mb-3" style="font-size: 0.9rem;">
                        <span class="me-3"><strong>Fecha Préstamo:</strong> 01/11/2023</span>
                        <span><strong>Fecha Devolución:</strong> 15/11/2023</span>
                    </div>
                    <p class="text-white opacity-50 mb-0" style="font-size: 0.85rem; max-width: 600px;">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes.</p>
                </div>
            </div>

            <!-- Item de Préstamo 3 -->
            <div class="tarjeta-item p-3 d-flex flex-column flex-md-row align-items-md-center gap-4 position-relative">
                <!-- Imagen -->
                <div class="bg-white bg-opacity-10 rounded d-flex align-items-center justify-content-center flex-shrink-0" style="width: 120px; height: 120px;">
                    <i class="bi bi-image text-white opacity-25 fs-1"></i>
                </div>
                <!-- Información -->
                <div class="flex-grow-1">
                    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-start mb-2">
                        <h3 class="fs-5 mb-0 text-white fw-bold">Title</h3>
                        <span class="badge bg-danger bg-opacity-75 fs-6 mt-2 mt-md-0 fw-normal">Retrasado</span>
                    </div>
                    <div class="text-white opacity-75 mb-3" style="font-size: 0.9rem;">
                        <span class="me-3"><strong>Fecha Préstamo:</strong> 15/09/2023</span>
                        <span><strong>Fecha Devolución:</strong> 30/09/2023</span>
                    </div>
                    <p class="text-white opacity-50 mb-0" style="font-size: 0.85rem; max-width: 600px;">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes.</p>
                </div>
            </div>

        </div>
        
        <!-- Puntos navegación inferior (paginación mock) -->
        <div class="d-flex justify-content-center mt-5">
            <span class="punto activo border-0 me-2" style="background-color: var(--color-texto-claro);"></span>
            <span class="punto border-0 me-2" style="background-color: rgba(255,255,255,0.2);"></span>
            <span class="punto border-0 me-2" style="background-color: rgba(255,255,255,0.2);"></span>
            <span class="punto border-0" style="background-color: rgba(255,255,255,0.2);"></span>
        </div>
    </section>

</main>
<?php include '../../../bloques/footerWeb.php'; ?>
