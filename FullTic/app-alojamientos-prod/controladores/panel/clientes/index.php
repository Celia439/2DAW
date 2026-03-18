<?php


$clientesControl = new clientes();

function cargarPaginador()
{
    global $clientesControl;
    $pagina = isset($_POST["p"]) ? intval($_POST["p"]) : 1;
    $porPag = 25;
    $offset = ($pagina - 1) * $porPag;
    $clientes = $clientesControl->getClientesPaginado($porPag, $offset);
    $total = $clientesControl->getTotalClientes();
    return [$clientes, $total, $pagina];
}

$columnas = $clientesControl->getColumnas();

$pagina = isset($_POST["p"]) ? intval($_POST["p"]) : 1;
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
            "cliente" => $guardado,//ultimo cliente insertado
            "pagina" => $datos[2],
            "clientes" => $datos[0],
            "totalPaginas" => ceil($datos[1] / $porPag)
        ]);

    case "update":

    case "delete":
        $id = $_POST["id"];

        $clientesControl->eliminarPorId($id);

        $datos = cargarPaginador();

        echo json_encode([
            "HTML" => "El  con ID $id ha sido eliminado correctamente.",
            "pagina" => $datos[2],
            "clientes" => $datos[0],
            "totalPaginas" => ceil($datos[1] / $porPag)
        ]);
        exit;
    case "listar":
        $datos = cargarPaginador();
        echo json_encode([
            "pagina" => $datos[2],
            "totalPaginas" => ceil($datos[1] / $porPag),
            "HTML" => renderizarFilas($datos[0])
        ]);
        exit;
}
