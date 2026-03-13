<?php

class reservas
{
    function getReservas()
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas";
        return $dbControl->select($parametros);
    }

    function getColums()
    {

        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->campos = ["COLUMN_NAME"];
        $parametros->tabla = "INFORMATION_SCHEMA.COLUMNS";
        $parametros->whereArray = ["TABLE_SCHEMA = 'training'","TABLE_NAME   = 'reservas'"];
        $parametros->order="ORDINAL_POSITION";
        return $dbControl->select($parametros);
    }

}
