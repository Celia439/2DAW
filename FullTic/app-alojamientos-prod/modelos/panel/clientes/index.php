<?php

class clientes
{
    function getClientesPaginado($porPag, $offset, $filtros = [])
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();

        $parametros->tabla = "clientes";
        $parametros->order = "id DESC";
        $parametros->limit = "$offset,$porPag";

        $where = [];
        if (!empty($filtros["nombre"])) {
            $where[] = "nombre LIKE '%" . $filtros["nombre"] . "%'";
        }
        if (!empty($filtros["telefono"])) {
            $where[] = "(telefono_fijo LIKE '%" . $filtros["telefono"] . "%' OR telefono_movil LIKE '%" . $filtros["telefono"] . "%')";
        }
        if (!empty($filtros["DNI"])) {
            $where[] = "numero_documento_identidad LIKE '%" . $filtros["DNI"] . "%'";
        }
        if (!empty($filtros["email"])) {
            $where[] = "correo LIKE '%" . $filtros["email"] . "%'";
        }

        if (!empty($where)) {
            $parametros->whereArray = $where;
        }

        return $dbControl->select($parametros);
    }
    function getTotalClientes($filtros = [])
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->campos = ["COUNT(*) as total"];
        $parametros->tabla = "clientes";

        $where = [];
        if (!empty($filtros["nombre"])) {
            $where[] = "nombre LIKE '%" . $filtros["nombre"] . "%'";
        }
        if (!empty($filtros["telefono"])) {
            $where[] = "(telefono_fijo LIKE '%" . $filtros["telefono"] . "%' OR telefono_movil LIKE '%" . $filtros["telefono"] . "%')";
        }
        if (!empty($filtros["DNI"])) {
            $where[] = "numero_documento_identidad LIKE '%" . $filtros["DNI"] . "%'";
        }
        if (!empty($filtros["email"])) {
            $where[] = "correo LIKE '%" . $filtros["email"] . "%'";
        }

        if (!empty($where)) {
            $parametros->whereArray = $where;
        }

        $total = $dbControl->select($parametros);
        return $total[0]["total"];
    }

    function getColumnas()
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->campos = ["COLUMN_NAME"];
        $parametros->tabla = "INFORMATION_SCHEMA.COLUMNS";
        $parametros->whereArray = ["TABLE_SCHEMA = 'training'", "TABLE_NAME   = 'clientes'"];
        $parametros->order = "ORDINAL_POSITION";
        return $dbControl->select($parametros);
    }
    function guardarCliente($form)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "clientes";
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

        $ids = $dbControl->insert($parametros);
        return $ids[0];
    }

    function eliminarPorId($id)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "clientes";
        $parametros->where = "id = $id";
        $dbControl->delete($parametros);
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

    function editarCliente($form)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "clientes";
        $parametros->where = "id = " . $form["id"];
        $parametros->datosUpdate = [
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
        ];
        return $dbControl->update($parametros);
    }

}
