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
    function getCasas()
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "casas";
        $parametros->order = "id DESC";
        return $dbControl->select($parametros);
    }
    function mostrarBusquedaClienteenVivo($parametros = null)
    {
        $seleccionado = "";
        if (is_object($parametros) && isset($parametros->idClienteMarcado) && !empty($parametros->idClienteMarcado)) {
            // Aquí llamas a tu modelo de Clientes
            require_once ROOT . "modelos/panel/clientes/index.php";
            $clientesControl = new clientes();
            $res = $clientesControl->getClienteById($parametros->idClienteMarcado);
            if (!empty($res)) {
                $clienteMarcado = $res[0];
                $seleccionado = $clienteMarcado["nombre"] . " " . $clienteMarcado["primer_apellido"];
            }
        }
        require_once LIBRERIA_HTML . "busqueda-cliente-vivo.php";
    }
}
