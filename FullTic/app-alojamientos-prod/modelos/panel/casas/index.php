<?php

class casas
{
    //Ahora casas se consultan desde comunAjax y getCasaById está en comun

    function getColumnas()
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->campos = ["COLUMN_NAME"];
        $parametros->tabla = "INFORMATION_SCHEMA.COLUMNS";
        $parametros->whereArray = ["TABLE_SCHEMA = 'training'", "TABLE_NAME   = 'casas'"];
        $parametros->order = "ORDINAL_POSITION";
        return $dbControl->select($parametros);
    }

    function eliminarPorId($id)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "casas";
        $parametros->where = "id = $id";
        $dbControl->delete($parametros);
    }
    function guardarCasas($form)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "casas";
        $parametros->datosInsert = [
            [
                "nombre" => $form["nombre"],
                "max_huespedes" => $form["max_huespedes"],
                "hab" => $form["hab"],
                "banios" => $form["banios"],
                "direccion" => $form["direccion"],
                "localidad" => $form["localidad"],
                "provincia" => $form["provincia"],
                "descripcion" => $form["descripcion"],
                "precio_noche" => $form["precio_noche"]
            ]
        ];
        $ids = $dbControl->insert($parametros);
        return $ids[0];
    }




    function editarCasa($form)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "casas";
        $parametros->where = "id = " . $form["id"];
        $parametros->datosUpdate = [
            "nombre" => $form["nombre"],
            "max_huespedes" => $form["max_huespedes"],
            "hab" => $form["hab"],
            "banios" => $form["banios"],
            "direccion" => $form["direccion"],
            "localidad" => $form["localidad"],
            "provincia" => $form["provincia"],
            "descripcion" => $form["descripcion"],
            "precio_noche" => $form["precio_noche"]
        ];
        return $dbControl->update($parametros);
    }
}
