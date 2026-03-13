<?php

class reservas
{
    function getReservas()
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas";
        //Año actual 
        $anio = date('Y');
        $parametros->where = 'fecha_entrada LIKE "' . $anio . '-%%-%%"';
        return $dbControl->select($parametros);
    }

    function getColums()
    {

        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->campos = ["COLUMN_NAME"];
        $parametros->tabla = "INFORMATION_SCHEMA.COLUMNS";
        $parametros->whereArray = ["TABLE_SCHEMA = 'training'", "TABLE_NAME   = 'reservas'"];
        $parametros->order = "ORDINAL_POSITION";
        return $dbControl->select($parametros);
    }

    function getResumenReservas()
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $p->campos = [
            "SUM(total_huespedes) AS total_huespedes",
            "SUM(importe_bruto) AS total_bruto",
            "SUM(descuento) AS total_descuento",
            "SUM(comision) AS total_comision",
            "SUM(importe_final) AS total_final"
        ];
        $p->tabla = "reservas";
        return $db->select($p)[0];
    }

    function eliminarPorId($id)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla="reservas";
        $parametros->where="id = $id";
        $dbControl->delete($parametros);        

    }
}
