<?php
// getReservaById y getReservas se encuentra en comun.php
class reservas
{


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
            "ROUND(SUM(importe_bruto), 2) AS total_bruto",
            "ROUND(AVG(descuento), 2) AS total_descuento",
            "ROUND(AVG(comision), 2) AS total_comision",
            "ROUND(SUM(importe_final), 2) AS total_final"
        ];
        $parametros->tabla = "reservas";
        return $db->select($parametros)[0];
    }

    function getTotalReservas($filtros = [])
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->campos = ["COUNT(*) as total"];
        $parametros->tabla = "reservas";
        $where = $this->buildWhereReservas($filtros);
        if (!empty($where)) {
            $parametros->whereArray = $where;
        }
        $total = $dbControl->select($parametros);
        return $total[0]["total"];
    }

    function getReservasPaginado($porPag = null, $offset = null, $filtros = [])
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas";
        $where = $this->buildWhereReservas($filtros);
        if (!empty($where)) {
            $parametros->whereArray = $where;
        }
        $parametros->order = "fecha_entrada DESC";
        if (isset($offset) && isset($porPag) && $porPag > 0) {
            $parametros->limit = "$offset,$porPag";
        }
        return $dbControl->select($parametros);
    }

    private function buildWhereReservas($filtros)
    {
        $where = [];
        $esBusqueda = false;
        if (!empty($filtros) && is_array($filtros)) {
            $esBusqueda = true;
            if (!empty($filtros["numero"])) {
                $where[] = "num_reserva LIKE '%" . $filtros["numero"] . "%'";
            }
            if (!empty($filtros["anio"])) {
                $where[] = "fecha_entrada LIKE '" . $filtros["anio"] . "-%%-%%'";
            }
            if (!empty($filtros["desde"])) {
                $where[] = "fecha_entrada >= '" . $filtros["desde"] . "'";
            }
            if (!empty($filtros["hasta"])) {
                $where[] = "fecha_entrada <= '" . $filtros["hasta"] . "'";
            }
        }
        if (!$esBusqueda) {
            $anio = date('Y');
            $where[] = "fecha_entrada LIKE '" . $anio . "-%%-%%'";
        }
        return $where;
    }

    function guardarReserva($form)
    {
        require_once CONSULTAS;
        require_once LIBRERIA_PHP . "comun.php";
        $comun = new comun();
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
                "num_reserva" => $form["num_reserva"],
                "clave_unica" => $comun->cadenaAleatoria(64)
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
