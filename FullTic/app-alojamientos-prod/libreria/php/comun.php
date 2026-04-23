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
    function getClientesPaginado($porPag = null, $offset = null, $filtros = [])
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();

        $parametros->tabla = "clientes";
        $parametros->order = "id DESC";


        if (!empty($offset) && !empty($porPag)) {
            $parametros->limit = "$offset,$porPag";
        }

        $where = [];

        if (!empty($filtros)) {
            $searchTerms = [];
            if (!empty($filtros["nombre"])) {
                $searchTerms[] = "nombre LIKE '%" . $filtros["nombre"] . "%'";
            }
            if (!empty($filtros["primer_apellido"])) {
                $searchTerms[] = "primer_apellido LIKE '%" . $filtros["primer_apellido"] . "%'";
            }
            if (!empty($filtros["segundo_apellido"])) {
                $searchTerms[] = "segundo_apellido LIKE '%" . $filtros["segundo_apellido"] . "%'";
            }
            if (!empty($filtros["telefono"])) {
                $searchTerms[] = "telefono_fijo LIKE '%" . $filtros["telefono"] . "%'";
                $searchTerms[] = "telefono_movil LIKE '%" . $filtros["telefono"] . "%'";
            }
            if (!empty($filtros["email"])) {
                $searchTerms[] = "correo LIKE '%" . $filtros["email"] . "%'";
            }
            if (!empty($filtros["DNI"])) {
                $searchTerms[] = "numero_documento_identidad LIKE '%" . $filtros["DNI"] . "%'";
            }

            if (!empty($searchTerms)) {
                $where[] = "(" . implode(" OR ", $searchTerms) . ")";
            }
        }

        if (!empty($where)) {
            $parametros->whereArray = $where;
        }

        return $dbControl->select($parametros);
    }
}
