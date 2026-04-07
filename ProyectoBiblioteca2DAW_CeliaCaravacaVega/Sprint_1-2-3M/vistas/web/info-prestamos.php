<?php 
$paginaActual = 'prestamos';
include '../../bloques/headerWeb.php';
?>
<main class="container my-5">
    <!-- Título Principal -->
    <div class="mb-4">
        <h1 class="text-dark fw-bold" style="font-size: 2.5rem;">Prestamos</h1>
    </div>

    <!-- Guía de Préstamos (Contenedor Morado) -->
    <section class="agrupacion-contenido">
        <h2 class="fs-4 mb-3">Guía de Préstamos – Biblioteca Central</h2>
        <p class="mb-4 text-white opacity-75">En nuestra biblioteca puedes llevarte libros a casa siguiendo estos pasos sencillos:</p>

        <ol class="fs-5 text-white opacity-75 ps-4" style="line-height: 1.8;">
            <li class="mb-3">
                <strong class="text-white">Revisión del catálogo:</strong><br>
                Busca el libro que deseas en el catálogo físico o digital. Anota el código de estantería o número de referencia.
            </li>

            <li class="mb-3">
                <strong class="text-white">Solicita el préstamo:</strong><br>
                Acércate al mostrador de atención con tu carnet de biblioteca y el libro seleccionado. Entrega ambos al bibliotecario para iniciar el préstamo.
            </li>

            <li class="mb-3">
                <strong class="text-white">Registro del préstamo:</strong><br>
                El personal registrará el libro en el sistema o en el libro de control de préstamos, indicando:
                <ul class="mt-2">
                    <li>Nombre del usuario</li>
                    <li>Fecha de préstamo</li>
                    <li>Fecha límite de devolución</li>
                </ul>
            </li>

            <li class="mb-3">
                <strong class="text-white">Recibe tu comprobante:</strong><br>
                Te entregarán un recibo o ticket con la fecha de devolución. Conserva este comprobante hasta devolver el libro.
            </li>

            <li class="mb-3">
                <strong class="text-white">Plazo de préstamo:</strong>
                <ul class="mt-2">
                    <li>Por lo general, los libros se prestan por 15 días hábiles.</li>
                    <li>Algunos libros especiales pueden tener plazos más cortos o solo estar disponibles para consulta dentro de la biblioteca.</li>
                </ul>
            </li>

            <li class="mb-3">
                <strong class="text-white">Renovación:</strong><br>
                Si no has terminado de leer el libro y no hay reservas pendientes, puedes solicitar una renovación antes de la fecha de entrega para extender el préstamo.
            </li>

            <li class="mb-3">
                <strong class="text-white">Devolución:</strong><br>
                Entrega el libro en el mostrador de la biblioteca antes de la fecha límite. Si devuelves tarde, podrías recibir una multa o restricción temporal en tu cuenta.
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
                <p class="text-white opacity-75 mb-4" style="font-size: 1.1rem;">Si tienes dudas sobre el proceso de préstamo o necesitas asistencia, nuestro personal está disponible en el mostrador de atención.</p>
                <div>
                    <button class="btn-naranja rounded-pill px-4 py-2">Contactar al Personal</button>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include '../../bloques/footerWeb.php'; ?>
