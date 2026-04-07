<?php 
$paginaActual = 'cuenta';
include '../../../bloques/headerWeb.php';
?>
<main class="container my-5">
    <div class="agrupacion-contenido p-0 overflow-hidden">
        
        <!-- Sección de Información Personal -->
        <div class="row g-0 p-4 border-bottom border-secondary">
            <!-- Columna Izquierda: Avatar -->
            <div class="col-md-3 d-flex flex-column align-items-center justify-content-center border-end border-secondary border-opacity-50 pe-md-4 mb-4 mb-md-0">
                <div class="bg-white bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mb-3 text-white opacity-75" style="width: 150px; height: 150px;">
                    <i class="bi bi-person-circle" style="font-size: 6rem;"></i>
                </div>
                <button class="btn btn-naranja rounded-pill px-4 py-2 w-75 fw-bold d-flex align-items-center justify-content-center gap-2">
                    Editar <i class="bi bi-pencil-fill" style="font-size: 0.9rem;"></i>
                </button>
            </div>

            <!-- Columna Derecha: Datos de usuario -->
            <div class="col-md-9 ps-md-4">
                <div class="row g-4 text-white">
                    <div class="col-md-12">
                        <span class="fs-5 fw-bold">Nombre completo:</span> <span class="fs-5 opacity-75">Celia Caravaca Vega</span>
                    </div>

                    <div class="col-md-12">
                        <span class="fs-5 fw-bold mb-2 d-block">Dirección de residencia:</span>
                    </div>

                    <div class="col-md-12">
                        <span class="fs-5 fw-bold mb-2 d-block">TLF:</span>
                    </div>

                    <div class="col-md-12">
                        <span class="fs-5 fw-bold mb-2 d-block">Correo:</span>
                    </div>

                    <div class="col-md-12">
                        <span class="fs-5 fw-bold mb-2 d-block">Fecha de nacimiento:</span>
                    </div>

                    <div class="col-md-12">
                        <span class="fs-5 fw-bold mb-2 d-block">DNI:</span>
                    </div>
                    
                    <div class="col-md-6 mt-4">
                        <span class="fs-6 fw-bold">Fecha de alta:</span>
                    </div>
                    <div class="col-md-6 mt-4 text-start">
                        <span class="fs-6 fw-bold">Fecha de vencimiento del carnet:</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección Historial de Préstamos -->
        <div class="p-4 border-bottom border-secondary position-relative" style="min-height: 200px;">
            <h3 class="text-white fs-5 fw-bold mb-4">Historial de prestamos:</h3>
            <div class="d-flex align-items-center justify-content-center h-100 mt-4 mb-5">
                <p class="text-white text-center fs-5 opacity-75 m-0 position-absolute top-50 start-50 translate-middle w-100">
                    ¡Tu historia lectora aún no ha comenzado!
                </p>
            </div>
            <button class="btn btn-naranja position-absolute bottom-0 end-0 m-4 px-4 py-2 rounded-3 me-5">Ver más</button>
        </div>

        <!-- Sección Historial de Reservas -->
        <div class="p-4 border-bottom border-secondary position-relative" style="min-height: 200px;">
            <h3 class="text-white fs-5 fw-bold mb-4">Historial de reservas</h3>
            <div class="d-flex align-items-center justify-content-center h-100 mt-4 mb-5">
                <p class="text-white text-center fs-5 opacity-75 m-0 position-absolute top-50 start-50 translate-middle w-100">
                    No se encontraron reservas activas ni completadas.
                </p>
            </div>
            <button class="btn btn-naranja position-absolute bottom-0 end-0 m-4 px-4 py-2 rounded-3 me-5">Ver más</button>
        </div>

        <!-- Sección Multas -->
        <div class="p-4 border-bottom border-secondary position-relative" style="min-height: 200px;">
            <h3 class="text-white fs-5 fw-bold mb-4">Multas</h3>
            <div class="d-flex align-items-center justify-content-center h-100 mt-4 mb-5 flex-column">
                <p class="text-white text-center fs-5 opacity-75 m-0 position-absolute top-50 start-50 translate-middle w-100">
                    ¡Felicitaciones! Tu cuenta está en 0,00 €. Eres un ejemplo de puntualidad (o simplemente no has sacado nada aún).
                </p>
            </div>
            <button class="btn btn-naranja position-absolute bottom-0 end-0 m-4 px-4 py-2 rounded-3 me-5">Ver más</button>
        </div>

        <!-- Sección Favoritos -->
        <div class="p-4 position-relative" style="min-height: 200px;">
            <h3 class="text-white fs-5 fw-bold mb-4 d-flex align-items-center gap-2">
                Favoritos <i class="bi bi-heart text-white opacity-75 fs-4"></i>
            </h3>
            <div class="d-flex align-items-center justify-content-center h-100 mt-4 mb-5">
                <p class="text-white text-center fs-5 opacity-75 m-0 position-absolute top-50 start-50 translate-middle w-100">
                    Aun no tienes favoritos
                </p>
            </div>
            <button class="btn btn-naranja position-absolute bottom-0 end-0 m-4 px-4 py-2 rounded-3 me-5">Ver más</button>
        </div>

    </div>
</main>
<?php include '../../../bloques/footerWeb.php'; ?>
