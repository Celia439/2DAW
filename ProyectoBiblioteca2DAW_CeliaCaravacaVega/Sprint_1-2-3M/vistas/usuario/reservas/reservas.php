<?php 
$paginaActual = 'reservas';
include '../../../bloques/headerWeb.php';
?>
<main class="container my-5">
    
    <!-- Título Principal -->
    <div class="mb-4">
        <h1 class="text-dark fw-bold" style="font-size: 2.5rem;">Reservas</h1>
    </div>

    <!-- Sección: Libros a reservar (Contenedor Morado) -->
    <section class="agrupacion-contenido">
        <h2 class="fs-4 mb-4">Libros a reservar</h2>

        <form>
            <!-- Nota de Entrega -->
            <div class="mb-4">
                <label for="notaEntrega" class="form-label text-white">Delivery note</label>
                <div class="input-group">
                    <input type="text" id="notaEntrega" class="form-control form-control-lg" placeholder="Value">
                    <button class="btn btn-light d-flex align-items-center justify-content-center" type="button" style="width: 50px;">
                        <i class="bi bi-plus-lg text-dark fs-5"></i>
                    </button>
                </div>
            </div>

            <!-- Checkbox -->
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="terminos">
                <label class="form-check-label text-white" for="terminos">
                    I accept the terms
                </label>
            </div>
            <a href="#" class="text-white-50 text-decoration-underline d-inline-block mb-4" style="font-size: 0.9rem;">Read our T&Cs</a>
        </form>
    </section>

    <!-- Sección: Calendario (Días) -->
    <section class="agrupacion-contenido mt-4">
        <h2 class="fs-4 mb-4">Días</h2>

        <!-- Selector mes y año (Mockup simple) -->
        <div class="d-flex align-items-center justify-content-between mb-3 rounded-top p-3" style="background-color: var(--color-tarjeta);">
            <button class="btn btn-sm btn-outline-light border-0"><i class="bi bi-chevron-left"></i></button>
            
            <div class="d-flex gap-2 w-50 justify-content-center">
                <select class="form-select form-select-sm w-50">
                    <option>Sep</option>
                </select>
                <select class="form-select form-select-sm w-50">
                    <option>2026</option>
                </select>
            </div>

            <button class="btn btn-sm btn-outline-light border-0"><i class="bi bi-chevron-right"></i></button>
        </div>

        <!-- Grilla de Calendario -->
        <div class="bg-white rounded-bottom p-3">
            <div class="row text-center fw-bold mb-3 text-secondary" style="font-size: 0.9rem;">
                <div class="col">Lu</div>
                <div class="col">Ma</div>
                <div class="col">Mi</div>
                <div class="col">Ju</div>
                <div class="col">Vi</div>
                <div class="col">Sa</div>
                <div class="col">Do</div>
            </div>

            <!-- Semana 1 -->
            <div class="row text-center mb-3">
                <div class="col"><div class="p-2 border rounded bg-light text-muted">26</div></div>
                <div class="col"><div class="p-2 border rounded bg-light text-muted">27</div></div>
                <div class="col"><div class="p-2 border rounded bg-light text-muted">28</div></div>
                <div class="col"><div class="p-2 border rounded bg-light text-muted">29</div></div>
                <div class="col"><div class="p-2 border rounded bg-light text-muted">30</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">1</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">2</div></div>
            </div>

            <!-- Semana 2 -->
            <div class="row text-center mb-3">
                <div class="col"><div class="p-2 border rounded text-dark">3</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">4</div></div>
                <div class="col"><div class="p-2 border rounded bg-dark text-white">5</div></div>
                <div class="col"><div class="p-2 rounded" style="background-color: var(--color-btn-primario); color: white;">6</div></div>
                <div class="col"><div class="p-2 rounded" style="background-color: var(--color-btn-primario); color: white;">7</div></div>
                <div class="col"><div class="p-2 rounded" style="background-color: var(--color-btn-primario); color: white;">8</div></div>
                <div class="col"><div class="p-2 border rounded bg-dark text-white">9</div></div>
            </div>

            <!-- Semana 3 -->
            <div class="row text-center mb-3">
                <div class="col"><div class="p-2 border rounded text-dark">10</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">11</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">12</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">13</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">14</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">15</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">16</div></div>
            </div>
            
            <!-- Semana 4 -->
            <div class="row text-center mb-3">
                <div class="col"><div class="p-2 border rounded text-dark">17</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">18</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">19</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">20</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">21</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">22</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">23</div></div>
            </div>
        </div>
    </section>

    <!-- Botón final -->
    <section class="mt-4">
        <button class="btn btn-naranja btn-lg px-5">Enviar</button>
    </section>

</main>
<?php include '../../../bloques/footerWeb.php'; ?>
