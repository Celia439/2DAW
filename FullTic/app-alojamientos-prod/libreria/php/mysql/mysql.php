<?php

// Define configuration
define("DB_HOST", "localhost");
define("DB_USER", "training");
define("DB_PASS", "uf7S6!t40");
define("DB_NAME", "training");

class Database
{

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    private $dbh;
    private $error;
    private $stmt;

    public function __construct()
    {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        // Create a new PDO instanace
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Catch any errors
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function resultset()
    {
        $this->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $keyFila => $fila) {
            foreach ($fila as $key => $valor) {
                $result[$keyFila][$key] = $valor;
            }
        }

        return $result;
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    public function beginTransaction()
    {
        return $this->dbh->beginTransaction();
    }

    public function endTransaction()
    {
        return $this->dbh->commit();
    }

    public function cancelTransaction()
    {
        return $this->dbh->rollBack();
    }

    public function debugDumpParams()
    {
        return $this->stmt->debugDumpParams();
    }

    public function update($parametros)
    {
        //CADENA SET
        $cadenaSET = "SET ";
        if ($parametros->datosUpdate) {
            $i = 1;
            foreach ($parametros->datosUpdate as $nombreCampo => $valor) {
                $cadenaSET .= "$nombreCampo = :$nombreCampo";
                if ($i < count($parametros->datosUpdate)) {
                    $cadenaSET .= " , ";
                }
                $i++;
            }
        }

        //CADENA WHERE
        $cadenaWhere = "";
        if ($parametros->where) {
            $cadenaWhere = "WHERE " . $parametros->where;
        }
        $consulta = "UPDATE " . $parametros->tabla . " $cadenaSET $cadenaWhere";
        $this->query($consulta);

        //PREPARAMOS LOS CAMPOS
        if ($parametros->datosUpdate) {
            $i = 0;
            foreach ($parametros->datosUpdate as $nombreCampo => $valor) {
                $this->bind(":$nombreCampo", $valor);
                $i++;
            }
        }
        if ($parametros->imprimir) {
            echo $consulta;
        } else {
            $this->execute();
        }
    }

    public function insert($parametros)
    {
        $arrayIDs = [];
        $this->beginTransaction();
        $arrayCampos = $this->getCamposInsert($parametros->datosInsert);
        $cadenaCamposFormateados = (string) implode(", ", $this->formatearCamposInsert($arrayCampos));
        $consulta = "INSERT INTO " . $parametros->tabla . "(" . (implode(",", $arrayCampos)) . ") VALUES ($cadenaCamposFormateados)";
        $this->query($consulta);

        if (!$parametros->imprimir) {

            if ($parametros->datosInsert) {
                $cont = 0;
                foreach ($parametros->datosInsert as $key => $fila) {
                    $i = 0;
                    foreach ($fila as $nombreCampo => $valor) {
                        //                    echo ":$nombreCampo -> '".$valor."'";
                        $this->bind(":campo$i", $valor);
                        $i++;
                    }
                    $cont++;
                    $this->execute();
                    $arrayIDs[$key] = $this->lastInsertId();
                }
            }
            $this->endTransaction();
            return $arrayIDs;
        } else {
            echo $consulta;
        }
    }

    public function delete($parametros)
    {
        $consulta = "DELETE FROM " . $parametros->tabla;

        if ($parametros->where) {
            $consulta .= " WHERE " . $parametros->where;
        }

        if ($parametros->imprimir) {
            echo $consulta;
        } else {
            $this->query($consulta);
            $this->execute();
        }
    }

    public function select($parametros)
    {

        $campos = "*";
        if ($parametros->campos) {
            $campos = implode(",", $parametros->campos);
        }
        $cadenaWhere = "";
        if ($parametros->where) {
            $cadenaWhere = "WHERE " . $parametros->where;
        }

        if ($parametros->whereArray) {
            $cadenaWhere = "WHERE ";
            foreach ($parametros->whereArray as $key => $criterioWhere) {
                if ($key < (count($parametros->whereArray) - 1)) {
                    $criterioWhere .= " AND ";
                }
                $cadenaWhere .= $criterioWhere;
            }
        }

        $cadenaGroupBy = "";
        if ($parametros->groupby) {
            $cadenaGroupBy = "GROUP BY " . $parametros->groupby;
        }

        $cadenaOrder = "";
        if ($parametros->order) {
            $cadenaOrder = "ORDER BY " . $parametros->order;
        }
        $cadenaLimit = "";
        if ($parametros->limit) {
            $cadenaLimit = "LIMIT " . $parametros->limit;
        }

        $consulta = "SELECT $campos FROM $parametros->tabla $cadenaWhere $cadenaGroupBy $cadenaOrder $cadenaLimit";

        if ($parametros->imprimir) {
            echo $consulta;
        }
        $this->query($consulta);
        if ($parametros->valoresWhere) {
            foreach ($parametros->valoresWhere as $nombreCampo => $valor) {
                $this->bind(":$nombreCampo", $valor);
            }
        }

        return $this->resultset();
    }

    //v2 
    public function selectv2($parametros)
    {

        $campos = "*";
        if ($parametros->campos) {
            $campos = implode(",", $parametros->campos);
        }
        //para la consulta y parametros 
        $cadenaWhere = "";
        $binds = [];
        if ($parametros->whereArray) {
            //La consulta con condiciones 
            $cadenaWhere = "WHERE ";
            $condiciones = [];
            //Recorremos los campos y valores
            foreach ($parametros->whereArray as $campo => $valor) {
                //Dejamos las condiciones listas para establecer su valor con el bind
                $condiciones[] = "$campo = :$campo";
                //Guardamos el valor respecto al nombre de la variable
                $binds[$campo] = $valor;
            }
            // unimos con and (implode si solo tiene un elemento lo devuelve)
            $cadenaWhere .= implode(" AND ", $condiciones);
        }

        $cadenaGroupBy = "";
        if ($parametros->groupby) {
            $cadenaGroupBy = "GROUP BY " . $parametros->groupby;
        }

        $cadenaOrder = "";
        if ($parametros->order) {
            $cadenaOrder = "ORDER BY " . $parametros->order;
        }
        $cadenaLimit = "";
        if ($parametros->limit) {
            $cadenaLimit = "LIMIT " . $parametros->limit;
        }

        $consulta = "SELECT $campos FROM $parametros->tabla $cadenaWhere $cadenaGroupBy $cadenaOrder $cadenaLimit";

        if ($parametros->imprimir) {
            echo $consulta;
        }
        $this->query($consulta);
        // recorro los parametros para asignarlos
        foreach ($binds as $nombreCampo => $valor) {
            $this->bind(":$nombreCampo", $valor);
        }


        return $this->resultset();
    }
    private function formatearCamposInsert($campos)
    {
        $camposFormateados = array();
        $i = 0;
        foreach ($campos as $key => $value) {
            $camposFormateados[] = ":campo$i";
            $i++;
        }
        return $camposFormateados;
    }

    /**
     * Cogemos los campos del primer array, para no tener que en cada consulta
     * crear un parametro de campos. En la primera vuelta del FOR LO devolvermos 
     * porque ya lo tebnemos
     * @param type $arrayInsert
     * @return type
     */
    private function getCamposInsert($arrayInsert)
    {
        $arrayCampos = [];
        foreach ($arrayInsert as $key => $fila) {
            foreach ($fila as $campo => $valor) {
                $arrayCampos[] = $campo;
            }
            return $arrayCampos;
        }
    }

    /**
     * Consiste simplemente en extraer las claves para componer el BIND PDO
     * @param type $arrayWhere
     */
    private function getCamposWhere($arrayWhere)
    {
        foreach ($arrayWhere as $campo => $value) {

        }
    }

}
