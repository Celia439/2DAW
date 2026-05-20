<?php

$clientesControl = new clientes();

function cargarPaginador()
{
    global $clientesControl;
    $pagina = isset($_POST["p"])
        ? intval($_POST["p"])
        : (isset($_SESSION["pagina_actual"])
            ? intval($_SESSION["pagina_actual"])
            : 1);

    // Recoger filtros
    $filtros = [
        "nombre" => $_POST["nombre"] ?? "",
        "telefono" => $_POST["telefono"] ?? "",
        "DNI" => $_POST["DNI"] ?? "",
        "email" => $_POST["email"] ?? ""
    ];

    $porPag = 25;
    $offset = ($pagina - 1) * $porPag;
    $clientes = $clientesControl->getClientesPaginado($porPag, $offset, $filtros);
    $total = $clientesControl->getTotalClientes($filtros);
    return [$clientes, $total, $pagina];
}

function renderizarFilas($clientes)
{
    ob_start();
    foreach ($clientes as $cliente) {
        include VISTA_FILA_CLIENTES;
    }
    return ob_get_clean();
}

function renderizarPaginador($pagina, $totalPaginas)
{
    ob_start();
    ?>
    <ul id="paginadorClientes" class="pagination">
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

$porPag = 25;

// Si NO es una petición AJAX con action, cargamos datos iniciales
if (empty($_POST["action"])) {
    $pagina = isset($_SESSION["pagina_actual"]) ? intval($_SESSION["pagina_actual"]) : 1;
    $offset = ($pagina - 1) * $porPag;
    $clientes = $clientesControl->getClientesPaginado($porPag, $offset);
    $total = $clientesControl->getTotalClientes();
    $columnas = $clientesControl->getColumnas();
    return;
}

switch ($_POST["action"]) {
    case "insert":
        parse_str($_POST["datos"], $form);
        $guardado = $clientesControl->guardarCliente($form);
        $datos = cargarPaginador();
        $totalPaginas = ceil($datos[1] / $porPag);
        echo json_encode([
            "ok" => !empty($guardado),
            "HTML" => renderizarFilas($datos[0]),
            "pagina" => $datos[2],
            "totalPaginas" => $totalPaginas,
            "paginadorHTML" => renderizarPaginador($datos[2], $totalPaginas)
        ]);
        exit;
    case "update":
        parse_str($_POST["datos"], $form);
        $clientesControl->editarCliente($form);
        $datos = cargarPaginador();
        $totalPaginas = ceil($datos[1] / $porPag);
        echo json_encode([
            "ok" => true,
            "HTML" => renderizarFilas($datos[0]),
            "pagina" => $datos[2],
            "totalPaginas" => $totalPaginas,
            "paginadorHTML" => renderizarPaginador($datos[2], $totalPaginas)
        ]);
        exit;
    case "delete":
        $id = $_POST["id"];
        $clientesControl->eliminarPorId($id);
        $datos = cargarPaginador();
        $totalPaginas = ceil($datos[1] / $porPag);
        echo json_encode([
            "HTML" => renderizarFilas($datos[0]),
            "pagina" => $datos[2],
            "totalPaginas" => $totalPaginas,
            "paginadorHTML" => renderizarPaginador($datos[2], $totalPaginas)
        ]);
        exit;
    case "listar":
        if (isset($_POST["p"])) {
            $_SESSION["pagina_actual"] = intval($_POST["p"]);
        }
        $datos = cargarPaginador();
        $totalPaginas = ceil($datos[1] / $porPag);
        echo json_encode([
            "pagina" => $datos[2],
            "totalPaginas" => $totalPaginas,
            "HTML" => renderizarFilas($datos[0]),
            "paginadorHTML" => renderizarPaginador($datos[2], $totalPaginas)
        ]);
        exit;
}
