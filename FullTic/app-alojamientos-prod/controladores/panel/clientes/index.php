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

$columnas = $clientesControl->getColumnas();

$pagina = isset($_POST["p"])
    ? intval($_POST["p"])
    : (isset($_SESSION["pagina_actual"])
        ? intval($_SESSION["pagina_actual"])
        : 1);

$porPag = 25;
$offset = ($pagina - 1) * $porPag;
$clientes = $clientesControl->getClientesPaginado($porPag, $offset);
$total = $clientesControl->getTotalClientes();


switch ($_POST["action"]) {
    case "insert":

        //Gestionar formulario 
        parse_str($_POST["datos"], $form);

        //guardar el cliente 
        $guardado = $clientesControl->guardarCliente($form);
        //Actualizar contenido 
        $datos = cargarPaginador();

        echo json_encode([
            "ok" => !empty($guardado),
            "HTML" => renderizarFilas($datos[0]),
            "pagina" => $datos[2],
            "totalPaginas" => ceil($datos[1] / $porPag)
        ]);
        exit;
    case "update":
        parse_str($_POST["datos"], $form);
        $clientesControl->editarCliente($form);
        $datos = cargarPaginador();
        echo json_encode([
            "ok" => true,
            "HTML" => renderizarFilas($datos[0]),
            "pagina" => $datos[2],
            "totalPaginas" => ceil($datos[1] / $porPag)
        ]);
        exit;
    case "delete":
        $id = $_POST["id"];

        $clientesControl->eliminarPorId($id);

        $datos = cargarPaginador();

        echo json_encode([
            "HTML" => renderizarFilas($datos[0]),
            "pagina" => $datos[2],
            "totalPaginas" => ceil($datos[1] / $porPag),

        ]);
        exit;

    case "listar":
        if (isset($_POST["p"])) {
            $_SESSION["pagina_actual"] = intval($_POST["p"]);
        }
        $datos = cargarPaginador();
        echo json_encode([
            "pagina" => $datos[2],
            "totalPaginas" => ceil($datos[1] / $porPag),
            "HTML" => renderizarFilas($datos[0]),
        ]);
        exit;
}
