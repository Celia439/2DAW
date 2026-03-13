<?php

class clientes
{
    function getClientesPaginado($porPag,$offset){
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();

        $parametros->tabla="clientes";
        $parametros->limit="$offset,$porPag";
        return $dbControl->select($parametros);
    }
   function getTotalClientes()
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->campos=["COUNT(*) as total"];
        $parametros->tabla = "clientes";
        $total=$dbControl->select($parametros);
        return $total[0]["total"];
    }
     
    function getColumnas(){
            require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->campos = ["COLUMN_NAME"];
        $parametros->tabla = "INFORMATION_SCHEMA.COLUMNS";
        $parametros->whereArray = ["TABLE_SCHEMA = 'training'","TABLE_NAME   = 'clientes'"];
        $parametros->order="ORDINAL_POSITION";
        return $dbControl->select($parametros);
    }
   function eliminarPorId($id)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla="clientes";
        $parametros->where="id = $id";
        $dbControl->delete($parametros);        

    }
}
