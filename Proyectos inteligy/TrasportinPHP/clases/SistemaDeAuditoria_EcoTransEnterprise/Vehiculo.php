<?php
//todo debes implementar index.php y lo de la matriz tridimensional
abstract class Vehiculo implements certificable
{
    //Atributos de la clase
    //texto
    private $id;
    protected $name;
    protected $fechAd;
    //double
    protected $kilometraje;
    //array
    protected $extras;
    //int
    static $contador = 0;

    /**
     * Constructor
     * @param $id
     * @param $name
     * @param $fechAd
     * @param $kilometraje
     * @param $extras
     * @throws Exception
     */
    public function __construct($id, $name, $fechAd, $kilometraje, $extras)
    {
        $id = self::formatear($id);

        try {
            //Comprobar que el id sea correcto
            if (!preg_match('/[A-Za-z]{3}-[0-9]{4}X/', $id)) {
                throw new Exception("<h2 style='color: red'>Error: El id $id es incorrecto patron: XXX0000X</h2>");
                //Comprobar que el la fecha sea correcta
            } else if (!preg_match('/[0-9]{4}[0-9]{2}[0-9]{2}/', $fechAd)) {
                throw new Exception("<h2 style='color: red'>Error: La fehca $fechAd es incorrecto patron: AAAA-MM-DD</h2>");
                //Si va bien crear el vehículo
            } else {
                $this->id = $id;
                $this->name = $name;
                $this->fechAd = $fechAd;
                $this->kilometraje = $kilometraje;
                $this->extras = $extras;
                self::$contador++;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Este metodo recibe un código del vehiculo, le quita espacios y
     * lo pasa a mayusculas.
     * @param $cadena
     * @return array|string|string[]
     */
    static function formatear($cadena)
    {
        return str_replace("  ", "", strtoupper($cadena));
    }

    /**
     * Te devuelve la salud del vehículo,
     * empieza en 100, en caso de tenga más
     * de 5 años -25 de salud.
     * Si tiene un mas de 20.000km -25 de salud.
     * @return int
     */
    function calcularSalud()
    {
        $salud = 100;
        $anio = substr($this->fechAd, 0, 4);
        $anio = date("Y") - $anio;
        if ($anio > 5) {
            $salud = -25;
        }
        if ($this->kilometraje > 20000) {
            $salud = -25;
        }
        return $salud;
    }

    /**
     * Muestra todos los datos del vehiuculo mas la salud del motor
     * @return string
     */
    function __toString()
    {
        $datos="Estado: ";
        if( $this->calcularSalud()>=75){
            $datos.="<b>OPTIMO</b>";
        }else{
            $datos.="<b>REVISIÓN</b>";
        }
        $datos.= "<ul>$this->name ($this->id) |  Adquirido: " . substr($this->fechAd, 5, 2) . "-" .
            substr($this->fechAd, 8, 2) . "-" . substr($this->fechAd, 0, 4) . " |";
        $datos.= "Extras:" . implode(", ", $this->extras) . ".<br>";
        //el ul sigue en las hijas
        $datos.= "<ul><li>Salud: " . $this->calcularSalud() . "%</li>";
        return $datos;
    }

}

