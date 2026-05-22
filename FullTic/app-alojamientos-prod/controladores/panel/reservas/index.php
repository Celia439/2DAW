<?php
require_once LIBRERIA_PHP . "comun.php";
$comun = new comun();

$reservasControl = new reservas();
$porPag = 25;

function cargarPaginador()
{
    global $comun, $reservasControl;

    $pagina = isset($_POST["p"])
        ? max(1, intval($_POST["p"]))
        : (isset($_SESSION["pagina_actual_reservas"])
            ? max(1, intval($_SESSION["pagina_actual_reservas"]))
            : 1);
    $porPag = 25;

    $numero = $_POST["numero"] ?? "";
    $anio = $_POST["anio"] ?? "";
    $desde = $_POST["desde"] ?? "";
    $hasta = $_POST["hasta"] ?? "";

    $whereArray = [];

    if (!empty($numero)) {
        $whereArray[] = "num_reserva LIKE '%" . $numero . "%'";
    }
    if (!empty($anio)) {
        $whereArray[] = "fecha_entrada LIKE '" . $anio . "-%%-%%'";
    }
    if (!empty($desde)) {
        $whereArray[] = "fecha_entrada >= '" . $desde . "'";
    }
    if (!empty($hasta)) {
        $whereArray[] = "fecha_entrada <= '" . $hasta . "'";
    }

    $offset = ($pagina - 1) * $porPag;
    $reservas = $comun->getPaginado("reservas", $whereArray, $porPag, $offset);

    foreach ($reservas as &$res) {
        $res['url_checkin'] = $comun->Get_url_customer_booking($res['id']);
    }
    unset($res);

    $total = $comun->getTotal("reservas", $whereArray);
    $resumen = $reservasControl->getResumenReservas();
    return [$reservas, $total, $pagina, $resumen];
}

function renderizarFilas($reservas)
{
    global $comun;
    ob_start();
    foreach ($reservas as $reserva) {
        include ROOT . "vistas/panel/reservas/fila_reserva.php";
    }
    return ob_get_clean();
}

function renderizarPaginador($pagina, $totalPaginas)
{
    ob_start();
    ?>
    <ul id="paginadorReservas" class="pagination">
        <li id="btnAnterior" class="page-item <?= $pagina <= 1 ? 'disabled' : '' ?>">
            <a class="page-link paginar" href="#" data-p="<?= $pagina - 1 ?>">Anterior</a>
        </li>
        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
            <li class="page-item <?= $i == $pagina ? 'active' : '' ?>">
                <a class="page-link paginar" href="#" data-p="<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
        <li id="btnSiguiente" class="page-item <?= $pagina >= $totalPaginas ? 'disabled' : '' ?>">
            <a class="page-link paginar" href="#" data-p="<?= $pagina + 1 ?>">Siguiente</a>
        </li>
    </ul>
    <?php
    return ob_get_clean();
}

function renderizarResumen($resumen)
{
    ob_start();
    ?>
    <tr class="table-secondary fw-bold">
        <td>TOTAL</td>
        <td></td>
        <td></td>
        <td><?= $resumen["total_huespedes"] ?></td>
        <td></td>
        <td></td>
        <td><?= $resumen["total_bruto"] ?>€</td>
        <td><?= $resumen["total_descuento"] ?>%</td>
        <td><?= $resumen["total_comision"] ?>%</td>
        <td><?= $resumen["total_final"] ?>€</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php
    return ob_get_clean();
}

// Carga inicial (sin action)
if (empty($_POST["action"])) {
    $pagina = isset($_SESSION["pagina_actual_reservas"]) ? max(1, intval($_SESSION["pagina_actual_reservas"])) : 1;
    $offset = ($pagina - 1) * $porPag;
    $reservas = $comun->getPaginado("reservas", [], $porPag, $offset);
    foreach ($reservas as &$res) {
        $res['url_checkin'] = $comun->Get_url_customer_booking($res['id']);
    }
    unset($res);
    $total = $comun->getTotal("reservas", []);
    $totalPaginas = ceil($total / $porPag);
    $resumen = $reservasControl->getResumenReservas();
 //  $columnas = $reservasControl->getColums();
    return;
}

switch ($_POST["action"]) {
    case "insert":
        parse_str($_POST["datos"], $form);
        $guardado = $reservasControl->guardarReserva($form);

        if (!empty($guardado) && !empty($form["casa"])) {
            require_once ROOT . "modelos/panel/huespedes/index.php";
            $huespedesControl = new huespedes();
            $huespedesControl->guardarHuesped([
                "id_reserva" => $guardado,
                "id_casa" => $form["casa"],
                "id_cliente" => $form["id_cliente"] ?? null,
                "es_titular" => 1
            ]);
        }

        $datos = cargarPaginador();
        $totalPaginas = ceil($datos[1] / $porPag);

        echo json_encode([
            "ok" => !empty($guardado),
            "HTML" => renderizarFilas($datos[0]),
            "pagina" => $datos[2],
            "totalPaginas" => $totalPaginas,
            "paginadorHTML" => renderizarPaginador($datos[2], $totalPaginas),
            "resumenHTML" => renderizarResumen($datos[3]),
            "resumen" => $datos[3],
            "error" => $guardado ? null : "no se pudo gurardar"
        ]);
        exit;

    case "update":
        try {
            parse_str($_POST["datos"], $form);
            $reservasControl->editarReserva($form);

            if (!empty($form["casa"])) {
                $titular = $comun->getTitularReserva($form["id"]);
                require_once ROOT . "modelos/panel/huespedes/index.php";
                $huespedesControl = new huespedes();
                
                if (!empty($titular)) {
                    $huespedesControl->editarHuesped([
                        "id" => $titular[0]["id"],
                        "id_reserva" => $form["id"],
                        "id_casa" => $form["casa"],
                        "id_cliente" => $form["id_cliente"] ?? null,
                        "es_titular" => 1
                    ]);
                } else {
                    $huespedesControl->guardarHuesped([
                        "id_reserva" => $form["id"],
                        "id_casa" => $form["casa"],
                        "id_cliente" => $form["id_cliente"] ?? null,
                        "es_titular" => 1
                    ]);
                }
            }

            $datos = cargarPaginador();
            $totalPaginas = ceil($datos[1] / $porPag);

            echo json_encode([
                "ok" => true,
                "HTML" => renderizarFilas($datos[0]),
                "pagina" => $datos[2],
                "totalPaginas" => $totalPaginas,
                "paginadorHTML" => renderizarPaginador($datos[2], $totalPaginas),
                "resumenHTML" => renderizarResumen($datos[3]),
                "resumen" => $datos[3]
            ]);
            exit;
        } catch (Exception $e) {
            echo json_encode([
                "ok" => false,
                "error" => "No se pudo actualizar la reserva: " . $e->getMessage()
            ]);
        }
        break;

    case "delete":
        $id = $_POST["id"];
        $reservasControl->eliminarPorId($id);

        $datos = cargarPaginador();
        $totalPaginas = ceil($datos[1] / $porPag);

        echo json_encode([
            "HTML" => "El registro con ID $id ha sido eliminado correctamente.",
            "HTMLtabla" => renderizarFilas($datos[0]),
            "pagina" => $datos[2],
            "totalPaginas" => $totalPaginas,
            "paginadorHTML" => renderizarPaginador($datos[2], $totalPaginas),
            "resumenHTML" => renderizarResumen($datos[3]),
            "resumen" => $datos[3]
        ]);
        exit;

    case "listar":
        if (isset($_POST["p"])) {
            $_SESSION["pagina_actual_reservas"] = intval($_POST["p"]);
        }
        $datos = cargarPaginador();
        $totalPaginas = ceil($datos[1] / $porPag);
        echo json_encode([
            "pagina" => $datos[2],
            "totalPaginas" => $totalPaginas,
            "HTML" => renderizarFilas($datos[0]),
            "paginadorHTML" => renderizarPaginador($datos[2], $totalPaginas),
            "resumenHTML" => renderizarResumen($datos[3]),
            "resumen" => $datos[3]
        ]);
        exit;
}
