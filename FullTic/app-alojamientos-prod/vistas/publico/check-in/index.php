<?php
//obtener los datos por url
#$n_huespedes = $_GET['n_huespedes'] ?? 1; ahora se obtiene por el parametro $n_huespedes del controlador
$id_reserva = $_GET['id_reserva'];
$id_casa = $_GET["id_casa"];
//guardar las variables en session
$_SESSION['id_reserva'] = $id_reserva;
$_SESSION['id_casa'] = $id_casa;
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