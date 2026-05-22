<?php

class checkin
{
   /* function getMunicipiosPorProvincia($provincia = false)
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
    }*/

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

   /* function getNacionalidades()
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "nacionalidades";
        //$parametros->whereArray = array();
        $result = $dbControl->select($parametros);
        return $result;
    }*/

   /* function getProvincias()
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "provincias";
        $parametros->whereArray = array();
        $result = $dbControl->select($parametros);
        return $result;
    }*/

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

    function getReservaHuespedByReserva($id_reserva)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas_huespedes";
        $parametros->where = "id_reserva = $id_reserva";
        $parametros->order = "id ASC";
        return $dbControl->select($parametros);
    }

    function actualizarReservasHuespedes($id, $id_cliente, $es_titular)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas_huespedes";
        $parametros->where = "id = $id";
        $parametros->datosUpdate = [
            "id_cliente" => $id_cliente,
            "es_titular" => $es_titular
        ];
        return $dbControl->update($parametros);
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
                "primer_apellido" => $form["primer_apellido"],
                "segundo_apellido" => $form["segundo_apellido"],
                "sexo" => $form["sexo"],
                "numero_documento_identidad" => $form["numero_documento_identidad"],
                "tipo_documentacion" => $form["tipo_documentacion"],
                "numero_soporte_documento" => $form["numero_soporte_documento"],
                "nacionalidad_id" => $form["nacionalidad_id"],
                "fecha_nacimiento" => $form["fecha_nacimiento"],
                "telefono_fijo" => $form["telefono_fijo"],
                "telefono_movil" => $form["telefono_movil"],
                "correo" => $form["correo"],
                "menores_de_edad" => $form["menores_de_edad"],
                "pais" => $form["pais"],
                "provincia" => $form["provincia"],
                "localidad" => $form["localidad"],
                "direccion" => $form["direccion"],
                "codigo_postal" => $form["codigo_postal"]
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
