  <?php
  // El controlador ya preparó $registrados y $totalHuespedes
  // y ya guardó todo en $_SESSION. Aquí solo pintamos.
  ?>

<main class="flex-grow-1 py-4">
    <div class="container">
        <?php
        // comprobar si quedan huespedes que registrar
        if ($registrados < $totalHuespedes) {
            ?>
            <!--Para mensajes bootstrap (Errores, avisos, confirmaciones rápidas)-->
            <div id="alertas"></div>
            <!--Para mensajes de insección-->
            <div id="mensajeCheckin"></div>

            <?php
            include_once LIBRERIA_HTML . "form_clientes.html";


        } else if ($registrados == $_SESSION['total_huespedes']) {
            //mensaje de alerta de boostrap cuando terminar de rellenar los formularios.
            ?>
                <div class="alert alert-success alert-dismissible fade show m-5" role="alert">
                    <strong>¡Perfecto!</strong> Los datos se han guardado correctamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        }
        ?>
    </div>
</main>