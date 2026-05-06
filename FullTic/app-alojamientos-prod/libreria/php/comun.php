<?php
class comun
{


    function getReservaById($id)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas";
        $parametros->where = "id = " . $id;
        return $dbControl->select($parametros);
    }
    function getClienteById($id)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "clientes";
        $parametros->where = "id = $id";
        return $dbControl->select($parametros);
    }
    function getCasaById($id)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "casas";
        $parametros->where = "id = $id";
        return $dbControl->select($parametros);
    }
    function getTitularReserva($id)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas_huespedes";
        $parametros->where = "id_reserva = $id AND es_titular = 1";
        return $dbControl->select($parametros);
    }
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
    function getClientes()
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "clientes";
        $parametros->order = "id DESC";
        return $dbControl->select($parametros);
    }
    function getReservas()
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas";
        //Año actual 
        $anio = date('Y');
        //Ordenar por fecha de entrada
        $parametros->order = "fecha_entrada";
        $parametros->where = 'fecha_entrada LIKE "' . $anio . '-%%-%%"';
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
            $res = $this->getClienteById($parametros->idClienteMarcado);
            if (!empty($res)) {
                $clienteMarcado = $res[0];
                $seleccionado = $clienteMarcado["nombre"] . " " . $clienteMarcado["primer_apellido"];
            }
        }
        require_once LIBRERIA_HTML . "busqueda-cliente-vivo.php";
    }

    function getHuespedesByReserva($idReserva)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas_huespedes";
        $parametros->where = "id_reserva = $idReserva";
        $parametros->order = "es_titular DESC";
        return $dbControl->select($parametros);
    }
}
