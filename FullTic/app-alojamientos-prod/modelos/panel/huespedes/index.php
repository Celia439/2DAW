<?php

class huespedes
{

    function guardarHuesped($form)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas_huespedes";
        $parametros->datosInsert = [
            [

                "id_reserva" => $form["id_reserva"],
                "id_casa" => $form["id_casa"],
                "id_cliente" => $form["id_cliente"],
                "esTitular" => $form["esTitular"]
            ]
        ];

        $ids = $dbControl->insert($parametros);
        return $ids[0];
    }

    function eliminarPorId($id)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas_huespedes";
        $parametros->where = "id = $id";
        $dbControl->delete($parametros);
    }

    function getHuespedById($id)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas_huespedes";
        $parametros->where = "id = $id";
        return $dbControl->select($parametros);
    }

    function editarCliente($form)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas_huespedes";
        $parametros->where = "id = " . $form["id"];
        $parametros->datosUpdate = [
            "id_reserva" => $form["id_reserva"],
            "id_casa" => $form["id_casa"],
            "id_cliente" => $form["id_cliente"],
            "esTitular" => $form["esTitular"]
        ];
        return $dbControl->update($parametros);
    }
}
