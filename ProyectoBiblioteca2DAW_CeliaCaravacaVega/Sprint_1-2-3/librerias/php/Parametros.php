<?php
class Parametros
{

    public $tabla;        // Nombre de la tabla
    public $campos;       // Array de campos (SELECT)
    public $where;        // Condición WHERE
    public $arrayCampos;  // Array de columnas (INSERT)
    public $valores;      // Array de valores (INSERT)
    public $camposUpdate; // String con campos para UPDATE
    public $orden;

    public function __construct($datos = [])
    {
        // Si existe, lo asigna. Si no, lo deja en null.
        $this->tabla = $datos["tabla"] ?? null;
        $this->campos = $datos["campos"] ?? null;
        $this->where = $datos["where"] ?? null;
        $this->arrayCampos = $datos["arrayCampos"] ?? null;
        $this->valores = $datos["valores"] ?? null;
        $this->camposUpdate = $datos["camposUpdate"] ?? null;
        $this->orden = $datos["orden"]??null;
    }
}