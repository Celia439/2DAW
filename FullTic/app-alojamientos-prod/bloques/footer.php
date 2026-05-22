<footer class="pie mt-auto container-fluid p-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img id="logoF" src="<?php echo LIBRERIA_IMG . "/LogoBambuM.png" ?>" class="img-fluid"
                    alt="Logo bambu casas rurales blanco" />
            </div>
            <div class="col-md-6">

            </div>
            <div class="col-md-3">
                <ul class="list-unstyled">
                    <li><a href="#">Aviso legal</a></li>
                    <li><a href="#">Política de privacidad</a></li>
                    <li><a href="#">Política de cookies</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--Scripts-->

<script>
    ROOT = "<?php echo PROTOCOLO ?>://<?php echo $_SERVER["HTTP_HOST"] . "/"; ?>"
    ROOT_AJAX = "<?php echo ROOT_URL . "config/rootAJAX.php"; ?>"
</script>

<!--Boostrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!--Libreria js-->
<script src="<?php echo LIBRERIA_JS ?>/comun.js"></script>


<!--LoadingOverlay-->
<script
    src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>


<!-- Modal de notificación -->
<div class="modal fade" id="modalCheckin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title">Check-in</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="modalCheckinBody">
                <!--El mensaje se inserta desde index.js-->
            </div>
            <div class="modal-footer py-2">
                <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal genérico para mostrar contenido con mostrarModal_v2 -->
<div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- El contenido se inserta desde mostrarModal_v2 -->
            </div>
            <div class="modal-footer py-2">
                <div id="botones-extras"></div>
                <button type="button" class="btn btn-primary btn-sm" id="modal-button-aceptar" style="display:none">Aceptar</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

</body>

</html>