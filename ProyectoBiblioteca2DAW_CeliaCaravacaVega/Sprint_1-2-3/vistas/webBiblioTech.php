<?php $paginaActual = 'webBibliotech';
include '../bloques/headerWeb.php';
?>
<main>
    <!-- Banner Principal -->

    <section id="carouselExampleIndicators" class="carousel slide banner-principal container">
        <!--Ejemplo de carrusel-->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <!--Ejemplo de carrusel-->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="banner-contenido p-5">
                    <div class="banner-imagen"></div>
                    <div class="banner-descripcion">
                        <p>En libros seleccionados</p>
                        <h1 class="banner-descuento">X%</h1>
                    </div>
                    <div class="promo-button">
                        <p class="banner-promo">¡Tu próxima aventura te espera! </p>
                        <button class="btn-general">Ver Ofertas</button>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../librerias/img/ImagenAnuncioEj.png" class="d-block w-100 rounded" alt="Ejemplo de anuncio">
            </div>
        </div>
        <!--Botones de siguiente y anterior-->
        <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>

    <!-- Panel con Imagen y Contenido -->
    <section class="panel-imagen-contenido">
        <div class="panel-imagen"></div>
        <div class="panel-texto">
            <h2>1º Libro</h2>
            <p class="subtitulo">Subheading</p>
            <p class="descripcion">Body text for your whole article or post. We'll put in some lorem ipsum to show
                how a
                filled-out page might look:</p>
            <p class="texto-completo">Excepteur efficient emerging, minim veniam anim aute carefully curated Ginza
                conversation exquisite perfect nostrud nisi intricate Content. Qui international first-class nulla
                ut.
                Punctual adipisicing, essential lovely queen tempor eiusmod irure.</p>
        </div>
    </section>
    <div class="carrusel-puntos">
        <span class="punto activo"></span>general
        <span class="punto"></span>Miedo
        <span class="punto"></span>Acción
        <span class="punto"></span>...........
        <a href="./generos.html"><button class="btn-siguiente">›</button></a>
    </div>
    <!-- Sección de Géneros Limite 9 libros-->
    <section class="seccion-generos">

        <div class="header-generos">
            <h2>Genero</h2>
            <p class="subtitulo">Subheading</p>
        </div>

        <div class="grid-tarjetas">
            <div class="tarjeta">
                <div class="tarjeta-imagen"></div>
                <div class="tarjeta-contenido">
                    <h3>Title</h3>
                    <p>Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or
                        even a
                        very short story.</p>
                    <button class="btn-favorito">♥</button>
                </div>
            </div>
    </section>
</main>
<?php
include '../bloques/footerWeb.php';
?>