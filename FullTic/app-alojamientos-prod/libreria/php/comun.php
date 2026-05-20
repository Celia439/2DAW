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


    function getReservaByClave($clave_unica)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas";
        $parametros->where = "clave_unica = '" . $clave_unica . "'";
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
    function getNombreLoc($id)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "municipios";
        $parametros->where = "id = $id";
        return $dbControl->select($parametros);
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
    function getNombreProv($id)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "provincias";
        $parametros->where = "id = $id";
        return $dbControl->select($parametros);
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
    function getReservas($datos = [])
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->tabla = "reservas";

        $where = [];
        $esBusqueda = false;

        // Si $datos no está vacío, es que el usuario ha interactuado con los filtros
        if (!empty($datos) && is_array($datos)) {
            $esBusqueda = true;
            if (!empty($datos["numero"])) {
                $where[] = "num_reserva LIKE '%" . $datos["numero"] . "%'";
            }
            if (!empty($datos["anio"])) {
                $where[] = "fecha_entrada LIKE '" . $datos["anio"] . "-%%-%%'";
            }
            if (!empty($datos["desde"])) {
                $where[] = "fecha_entrada >= '" . $datos["desde"] . "'";
            }
            if (!empty($datos["hasta"])) {
                $where[] = "fecha_entrada <= '" . $datos["hasta"] . "'";
            }
        }

        // Si NO es una búsqueda (carga inicial), filtramos por el año actual
        if (!$esBusqueda) {
            $anio = date('Y');
            $where[] = "fecha_entrada LIKE '" . $anio . "-%%-%%'";
        }

        if (!empty($where)) {
            $parametros->whereArray = $where;
        }

        $parametros->order = "fecha_entrada DESC";
        return $dbControl->select($parametros);
    }
    function getCasas($datos = [])
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();

        // Pasamos los campos como ARRAY 
        $parametros->campos = [
            "c.*",
            "p.Provincia as provinciaN",
            "m.Municipio as localidadN"
        ];

        // Definimos la tabla principal y los JOINs
        $parametros->tabla = "casas c 
            LEFT JOIN provincias p ON c.provincia = p.id 
            LEFT JOIN municipios m ON c.localidad = m.id";

        $where = [];
        // Comprobamos que el array no esté vacío y que sea realmente un array
        if (!empty($datos) && is_array($datos)) {
            if (!empty($datos["id"])) {
                $where[] = "c.id = '" . $datos["id"] . "'";
            }
            if (!empty($datos["alojamiento"])) {
                $where[] = "c.nombre LIKE '%" . $datos["alojamiento"] . "%'";
            }
            if (!empty($datos["provincia"])) {
                $where[] = "c.provincia = '" . $datos["provincia"] . "'";
            }
            if (!empty($datos["localidad"])) {
                $where[] = "c.localidad = '" . $datos["localidad"] . "'";
            }
        }

        if (!empty($where)) {
            $parametros->whereArray = $where;
        }

        $parametros->order = "c.id DESC";
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
    //-------------Paginador compartido entre reservas y clientes
    function getPaginado($tabla, $whereArray, $porPag, $offset)
    {

        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();

        $parametros->campos = $tabla == "clientes" ? [
            "c.*",
            "p.Provincia as provinciaN",
            "m.Municipio as localidadN"
        ] : "*";

        $parametros->tabla = $tabla == "clientes" ? " c
         LEFT JOIN provincias p ON c.provincia = p.id 
         LEFT JOIN municipios m ON c.localidad = m.id" : "reservas";

        $parametros->order = $tabla == "clientes" ? "id DESC" : "fecha_entrada DESC";

        if (isset($offset) && isset($porPag) && $porPag > 0) {
            $parametros->limit = "$offset,$porPag";
        }

        if (!empty($whereArray)) {
            $parametros->whereArray = $whereArray;
        }

        return $dbControl->select($parametros);
    }

    //Regoger el total de registros de una tabla
    function getTotal($tabla, $whereArray)
    {
        require_once CONSULTAS;
        $dbControl = new Database();
        $parametros = new stdClass();
        $parametros->campos = ["COUNT(*) as total"];
        $parametros->tabla = $tabla;

        if (!empty($whereArray)) {
            $parametros->whereArray = $whereArray;
        }

        $total = $dbControl->select($parametros);
        return $total[0]["total"];

    }


    //----------------------------------------------------------------------------------------------------(Para encriptar la url de la reserva para ingresar clientes)
    function cadenaAleatoria(int $longitud = 16): string
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $cadena = '';
        for ($i = 0; $i < $longitud; $i++) {
            // random_int es seguro criptográficamente 
            $cadena .= $caracteres[random_int(0, strlen($caracteres) - 1)];
        }
        return $cadena;
    }
    function Get_url_customer_booking($ID_reserva)
    {

        $param_false = ["v" => 1, "book" => 2, "tree" => 3, "wc" => 4, "ls" => 5, "grep" => 6, "nano" => 7, "sh" => 8];
        $reserva = $this->getReservaById($ID_reserva);
        if (empty($reserva)) {
            return false;
        }

        $clave_unica = $reserva[0]['clave_unica'];

        foreach ($param_false as $nombre => $long) {
            $cadenaURL[] = "$nombre=" . $this->cadenaAleatoria($long);
        }

        // Parámetro real: clave (5 caracteres falsos + clave_unica de la BD)
        $cadenaURL[] = "clave=" . ($this->cadenaAleatoria(5) . $clave_unica);

        // Parámetro real: id (encriptar "c4d1zf0rn14|ID" con la clave_unica)
        $textoAEncriptar = 'c4d1zf0rn14|' . $ID_reserva;
        $id_encriptado = $this->encriptarConClave($textoAEncriptar, $clave_unica);
        $cadenaURL[] = "id=" . $id_encriptado;
        //mexclar 
        shuffle($cadenaURL);

        return ROOT_URL . "publico/check-in/?" . implode("&", $cadenaURL);


    }
    function encriptarConClave($textoPlano, $clave)
    {
        $metodo = "AES-256-CBC";//Cipher Block Chaining(cifrado simétrico clave de 256bits)
        // Generar un IV (Vector de Inicialización) aleatorio
        $ivLength = openssl_cipher_iv_length($metodo);
        $iv = openssl_random_pseudo_bytes($ivLength);
        // Cifrar
        $cifrado = openssl_encrypt($textoPlano, $metodo, $clave, OPENSSL_RAW_DATA, $iv);
        $textoCifradoBase64 = base64_encode($iv . $cifrado); // IV se guarda junto al texto
        // Convertir a base64url para que sea seguro en URLs (sin +, /, =)
        return rtrim(strtr($textoCifradoBase64, '+/', '-_'), '=');
    }
    function desencriptarConClave($textoCifradoBase64, $clave)
    {
        $metodo = "AES-256-CBC";
        $ivLength = openssl_cipher_iv_length($metodo);
        // Convertir de base64url a base64 estándar
        $textoCifradoBase64 = str_pad(strtr($textoCifradoBase64, '-_', '+/'), strlen($textoCifradoBase64) % 4, '=', STR_PAD_RIGHT);
        $datosCifradosRaw = base64_decode($textoCifradoBase64);
        if ($datosCifradosRaw === false || strlen($datosCifradosRaw) < $ivLength) {
            return false;
        }
        $ivDesencriptar = substr($datosCifradosRaw, 0, $ivLength);
        $textoCifradoRaw = substr($datosCifradosRaw, $ivLength);
        return openssl_decrypt($textoCifradoRaw, $metodo, $clave, OPENSSL_RAW_DATA, $ivDesencriptar);
    }
}