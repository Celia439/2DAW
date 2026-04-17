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
        //Ordenar por fecha de entrada
        $parametros->order = "fecha_entrada";
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
        $db = new Database();
        $parametros = new stdClass();
        $parametros->campos = [
            "SUM(total_huespedes) AS total_huespedes",
            "SUM(importe_bruto) AS total_bruto",
            "SUM(descuento) AS total_descuento",
            "SUM(comision) AS total_comision",
            "SUM(importe_final) AS total_final"
        ];
        $parametros->tabla = "reservas";
        return $db->select($parametros)[0];
    }
    function guardarReserva($form)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas";
        $parametros->datosInsert = [
            [
                "canal" => $form["canal"],
                "total_huespedes" => $form["total_huespedes"],
                "fecha_entrada" => $form["fecha_entrada"],
                "fecha_salida" => $form["fecha_salida"],
                "importe_bruto" => $form["importe_bruto"],
                "descuento" => $form["descuento"],
                "comision" => $form["comision"],
                "num_reserva" => $form["num_reserva"]
            ]
        ];

        $ids = $dbControl->insert($parametros);
        return $ids[0];
    }
    function eliminarPorId($id)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas";
        $parametros->where = "id = $id";
        $dbControl->delete($parametros);
    }
    function editarReserva($form)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas";
        $parametros->where = "id = " . $form["id"];
        $parametros->datosUpdate = [
            "canal" => $form["canal"],
            "total_huespedes" => $form["total_huespedes"],
            "fecha_entrada" => $form["fecha_entrada"],
            "fecha_salida" => $form["fecha_salida"],
            "importe_bruto" => $form["importe_bruto"],
            "descuento" => $form["descuento"],
            "comision" => $form["comision"],
            "importe_final" => $form["importe_final"],
            "num_reserva" => $form["num_reserva"],
        ];
        return $dbControl->update($parametros);
    }
    function getReservaById($id)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas";
        $parametros->where = "id = " . $id;
        return $dbControl->select($parametros);
    }
    function consultarReservas($datos)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas";

        $where = [];
        if (!empty($datos["numero"])) {
            $where[] = "num_reserva = '" . $datos["numero"] . "'";
        }
        if (!empty($datos["anio"])) {
            $where[] = "fecha_entrada LIKE '" . $datos["anio"] . "-%'";
        }
        if (!empty($datos["desde"])) {
            $where[] = "fecha_entrada >= '" . $datos["desde"] . "'";
        }
        if (!empty($datos["hasta"])) {
            $where[] = "fecha_entrada <= '" . $datos["hasta"] . "'";
        }

        if (!empty($where)) {
            $parametros->whereArray = $where;
        }

        return $dbControl->select($parametros);
    }

}
