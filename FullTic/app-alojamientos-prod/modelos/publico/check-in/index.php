<?php

class checkin
{
    function getMunicipiosPorProvincia($provincia = false)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        // enlazamos las tablas
        $parametros->tabla = "municipios m INNER JOIN provincias p ON m.idProvincia = p.id";
        // el campo municipio
        $parametros->campos = ["m.Municipio"];
        // Si provincia no esta vacia 
        if ($provincia) {
            //comparamos por el nombre de provincia
            $parametros->where = "p.id = :id";
            $parametros->valoresWhere = ["id" => "$provincia"];
        }
        // y regresamos la consulta
        return $dbControl->select($parametros);
    }

    function getMunicipiosPorProvincia_v2($ID_provincia = false)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        // enlazamos las tablas
        $parametros->tabla = "municipios";
        // el campo municipio
        //$parametros->imprimir = true;
        // Si provincia no esta vacia 
        if ($ID_provincia) {
            //comparamos por el nombre de provincia
            $parametros->whereArray = [];
            $parametros->whereArray[] = "idProvincia = $ID_provincia";
        }
        // y regresamos la consulta
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

    function guardarReservasHuespedes($id_reserva, $id_casa, $id_cliente, $es_titular)
    {

        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas_huespedes";
        $parametros->datosInsert = [
            [
                "id_reserva" => $id_reserva,
                "id_casa" => $id_casa,
                "id_cliente" => $id_cliente,
                "es_titular" => $es_titular
            ]
        ];


        return $dbControl->insert($parametros);
    }
    function guardarCliente($form)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "clientes";
        //debug
        //$parametros->imprimir = true;
        $parametros->datosInsert = [
            [
                "nombre" => $form["nombre"],
                "primer_apellido" => $form["primerApellido"],
                "sexo" => $form["sexo"],
                "numero_documento_identidad" => $form["nIdentidad"],
                "tipo_documentacion" => $form["tipoDocumentacion"],
                "numero_soporte_documento" => $form["nSoporteDocumento"],
                "nacionalidad_id" => $form["nacionalidad"],
                "fecha_nacimiento" => $form["fechaNacimiento"],
                "telefono_fijo" => $form["telFijo"],
                "telefono_movil" => $form["telMovil"],
                "correo" => $form["correo"],
                "menores_de_edad" => $form["parentescoEntreViajeros"],
                "pais" => $form["paises"],
                "provincia" => $form["provincia"],
                "localidad" => $form["localidades"],
                "direccion" => $form["direccion"],
                "codigo_postal" => $form["codigoP"]
            ]
        ];
        
      $ids= $dbControl->insert($parametros);
        return $ids[0];
    }
    function n_huespedes_registrados($id_reserva)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas_huespedes";
        $parametros->campos = ["COUNT(*) as total"];

        if ($id_reserva) {
            $parametros->whereArray = [];
            $parametros->whereArray[] = "id_reserva = $id_reserva";
        }

        return $dbControl->select($parametros);
    }
    function n_huespedes_reserva($id_reserva){
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas";
        $parametros->campos = ["total_huespedes"];

        if ($id_reserva) {
            $parametros->whereArray = [];
            $parametros->whereArray[] = "id = $id_reserva";
        }

        return $dbControl->select($parametros);

    }
}
