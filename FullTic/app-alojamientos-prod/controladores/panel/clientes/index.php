<?php


$clientesControl = new clientes();

$columnas = $clientesControl->getColumnas();

//recibir la página actual
$pagina = isset($_GET["p"]) ? intval($_GET["p"]) : 1;
$porPag=25;
$offset= ($pagina-1) * $porPag;
$clientes = $clientesControl->getClientesPaginado($porPag,$offset);
$total=$clientesControl->getTotalClientes();


switch ($_POST["action"]) {
    case "insert":

        //Gestionar formulario 
        parse_str($_POST["datos"], $form);

        //guardar el cliente 
        $guardado= $clientesControl->guardarCliente($form);

        //Actualizar contenido 
        

    case "update":

    case "delete":
        $id = $_POST["id"];

        $clientesControl->eliminarPorId($id);

        echo json_encode([
            "HTML" => "El  con ID $id ha sido eliminado correctamente."
        ]);
        exit;
}
