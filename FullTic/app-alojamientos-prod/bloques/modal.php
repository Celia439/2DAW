<!--Modal nuevo/editar-->
<div class="modal fade" id="<?= $idModal ?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    <?= $titulo ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <?= $contenidoFormulario ?>
            </div>

        </div>
    </div>
</div>