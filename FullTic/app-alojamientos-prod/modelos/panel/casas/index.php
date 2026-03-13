<?php

class casas
{
    function getCasas()
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "casas";
        return $dbControl->select($parametros);
    }

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
        $parametros->tabla="casas";
        $parametros->where="id = $id";
        $dbControl->delete($parametros);        

    }
    function insert($id, $nombre, $maxH, $hab, $banios, $dic, $local, $pro, $desc, $precio)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "casas";
        $parametros->datosInsert = [$id, $nombre, $maxH, $hab, $banios, $dic, $local, $pro, $desc, $precio];
        return $dbControl->insert($parametros);
    }
    function update($id, $nombre, $maxH, $hab, $banios, $dic, $local, $pro, $desc, $precio)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "casas";
        $parametros->where = "id = $id";
        $parametros->datosUpdate=["id"=>$id,"nombre"=>$nombre,"max_huespedes"=>$maxH,"hab"=>$hab,"banios"=>$banios,"direccion"=>$dic,"localidad"=>$local,"provincia"=>$pro,"descripcion"=>$desc,"precio_noche"=>$precio];
        return $dbControl->update($parametros);
    }
}
