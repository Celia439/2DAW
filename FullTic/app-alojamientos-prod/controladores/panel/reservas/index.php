<?php

require_once MODELOS_RESERVAS;
$reservasControl = new reservas();

$reservas = $reservasControl->getReservas();
$columnas = $reservasControl->getColums();
$resumen = $reservasControl->getResumenReservas();


switch ($_POST["action"]) {
    case "insert":

        //Gestionar formulario 
        parse_str($_POST["datos"], $form);



    case "update":

    case "delete":
        $id = $_POST["id"];

        $reservasControl->eliminarPorId($id);

        echo json_encode([
            "HTML" => "El registro con ID $id ha sido eliminado correctamente."
        ]);
        exit;
    case "actualizarResumen":
        $resumen = $reservasControl->getResumenReservas();
        ob_start();
        ?>
            <tr class="table-secondary fw-bold">
                    <td>TOTAL</td>
                    <td></td>
                    <td><?= $resumen["total_huespedes"] ?></td>
                    <td></td>
                    <td></td>
                    <td><?= $resumen["total_bruto"] ?></td>
                    <td><?= $resumen["total_descuento"] ?></td>
                    <td><?= $resumen["total_comision"] ?></td>
                    <td><?= $resumen["total_final"] ?></td>
                    <td></td>
                </tr>
        <?php
        $html = ob_get_clean();

        // devolvemos JSON
        echo json_encode([
            "HTML" => $html
        ]);
        exit;
}
