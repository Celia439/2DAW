<?php

class huespedes
{
    function getHuespedes()
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas_huespedes";

        return $dbControl->select($parametros);
    }

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
                "es_titular" => $form["es_titular"]
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

    function editarHuesped($form)
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
            "es_titular" => $form["es_titular"]
        ];
        return $dbControl->update($parametros);
    }
}
