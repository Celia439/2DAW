<?php
class comun
{


    function getNacionalidades()
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "nacionalidades";
        //$parametros->whereArray = array();
        $result = $dbControl->select($parametros);
        return $result;
    }

    function getProvincias()
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "provincias";
        $parametros->whereArray = array();
        $result = $dbControl->select($parametros);
        return $result;
    }




    function getMunicipiosPorProvincia($provincia = false)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        // enlazamos las tablas
        $parametros->tabla = "municipios m INNER JOIN provincias p ON m.idProvincia = p.id";
        // el campo municipio y su ID
        $parametros->campos = ["m.id", "m.Municipio"];
        // Si provincia no esta vacia 
        if ($provincia) {
            //comparamos por el nombre de provincia
            $parametros->where = "p.id = :id";
            $parametros->valoresWhere = ["id" => "$provincia"];
        }
        // y regresamos la consulta
        return $dbControl->select($parametros);
    }
}
