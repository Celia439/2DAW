<?php 
$paginaActual = 'devoluciones';
include '../../bloques/headerWeb.php';
?>
<main class="container my-5">
    <!-- Título Principal -->
    <div class="mb-4">
        <h1 class="text-dark fw-bold" style="font-size: 2.5rem;">Devoluciones</h1>
    </div>

    <!-- Guía de Devoluciones (Contenedor Morado) -->
    <section class="agrupacion-contenido">
        <h2 class="fs-4 mb-3">Guía de Devoluciones – Biblioteca Central</h2>
        <p class="mb-4 text-white opacity-75">Devolver tus libros a tiempo es muy importante para que otros usuarios también puedan disfrutarlos. Sigue estos pasos para hacer una devolución correcta:</p>

        <ol class="fs-5 text-white opacity-75 ps-4" style="line-height: 1.8;">
            <li class="mb-3">
                <strong class="text-white">Verifica la fecha de entrega:</strong><br>
                Revisa la fecha límite anotada en tu carnet o en el recibo de préstamo. Las devoluciones tardías pueden generar multas o restricciones temporales.
            </li>

            <li class="mb-3">
                <strong class="text-white">Prepara el libro:</strong><br>
                Antes de devolverlo, asegúrate de que el libro esté en buen estado:
                <ul class="mt-2">
                    <li>Sin páginas arrancadas ni dobladas</li>
                    <li>Sin marcas excesivas ni subrayados</li>
                    <li>Limpio y seco</li>
                </ul>
            </li>

            <li class="mb-3">
                <strong class="text-white">Entrega en el mostrador:</strong><br>
                Lleva el libro al mostrador de recepción de la biblioteca. El personal verificará tu carnet de usuario y el estado del libro.
            </li>

            <li class="mb-3">
                <strong class="text-white">Registro de devolución:</strong><br>
                El bibliotecario anotará la devolución en el libro de control o en el sistema de la biblioteca, actualizando tu historial de préstamos.
            </li>

            <li class="mb-3">
                <strong class="text-white">Recibe confirmación:</strong><br>
                Una vez registrado, te entregarán un comprobante de devolución. Conserva este documento hasta tu próxima reserva o préstamo.
            </li>

            <li class="mb-3">
                <strong class="text-white">Multas y retrasos:</strong>
                <ul class="mt-2">
                    <li>Si devuelves el libro después de la fecha límite, se aplicará una multa proporcional a los días de retraso.</li>
                    <li>Para reactivar tu acceso a nuevas reservas, deberás pagar cualquier multa pendiente.</li>
                </ul>
            </li>

            <li class="mb-3">
                <strong class="text-white">Recomendación:</strong><br>
                Siempre revisa tus préstamos antes de salir de la biblioteca. Esto evita olvidos y garantiza que puedas seguir disfrutando de nuestros libros sin problemas.
            </li>
        </ol>
    </section>

    <!-- Sección de Consejos y Ayuda -->
    <div class="row g-4 mt-2">
        <!-- Consejos Importantes -->
        <div class="col-md-6">
            <div class="tarjeta-item h-100">
                <h3 class="mb-3">Consejos Importantes</h3>
                <ul class="text-white opacity-75 ps-3" style="line-height: 1.8; font-size: 1.1rem;">
                    <li>Cuida los libros mientras estén en tu poder</li>
                    <li>No realices marcas ni anotaciones en los libros</li>
                    <li>Devuelve los libros en perfectas condiciones</li>
                    <li>Respeta las fechas de devolución</li>
                </ul>
            </div>
        </div>

        <!-- ¿Necesitas Ayuda? -->
        <div class="col-md-6">
            <div class="tarjeta-item h-100 d-flex flex-column justify-content-center">
                <h3 class="mb-3">¿Necesitas Ayuda?</h3>
                <p class="text-white opacity-75 mb-4" style="font-size: 1.1rem;">Si tienes dudas sobre el proceso de devolución o necesitas asistencia, nuestro personal está disponible en el mostrador de atención.</p>
                <div>
                    <button class="btn-naranja rounded-pill px-4 py-2">Contactar al Personal</button>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include '../../bloques/footerWeb.php'; ?>