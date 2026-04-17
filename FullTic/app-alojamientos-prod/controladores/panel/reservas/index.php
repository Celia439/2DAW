<?php

$reservasControl = new reservas();
/**
 * Summary of actualizarResumen
 * Esta función es para recoger los datos más 
 * recientes despues de cada operación del CRUD
 * @return array
 */
function actualizar()
{
    global $reservasControl;
    $reservas = $reservasControl->getReservas();
    $resumen = $reservasControl->getResumenReservas();
    $contenido = [$reservas, $resumen];
    return $contenido;
}



//Para la primera vez que se carge la página.
$reservas = $reservasControl->getReservas();
$columnas = $reservasControl->getColums();
$resumen = $reservasControl->getResumenReservas();


switch ($_POST["action"]) {
    case "insert":

        //Gestionar formulario 
        parse_str($_POST["datos"], $form);

        //Guardar la reserva creada.
        $guardado = $reservasControl->guardarReserva($form);

        //Actualizamos el contenido 
        $contenido = actualizar();

        echo json_encode([
            "ok" => !empty($guardado),
            "reservas" => $contenido[0],
            "resumen" => $contenido[1],
            "error" => $guardado ? null : "no se pudo gurardar"
        ]);
        break;
    case "update":

        parse_str($_POST["datos"], $form);
        //TODO: Es ineficiente debo pensar en otra cosa.
        $reservaNoActualizada = $reservasControl->getReservaById($form["id"]);

        $reservasControl->editarReserva($form);

        $reservaActualizada = $reservasControl->getReservaById($form["id"]);

        //Actualizamos el contenido 
        $contenido = actualizar();

        $ok = $reservaActualizada === $reservaNoActualizada ? false : true;
        echo json_encode([
            "ok" => $ok,
            "reserva" => $reservaActualizada,
            "reservas" => $contenido[0]
        ]);

        break;

    case "delete":
        $id = $_POST["id"];
        //Eliminamos el id que nos pasan de js 
        $reservasControl->eliminarPorId($id);

        //Actualizamos el contenido 
        $contenido = actualizar();

        echo json_encode([
            "HTML" => "El registro con ID $id ha sido eliminado correctamente.",
            "reservas" => $contenido[0],
            "resumen" => $contenido[1]
        ]);
        break;

    /*
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
    exit;*/
}
