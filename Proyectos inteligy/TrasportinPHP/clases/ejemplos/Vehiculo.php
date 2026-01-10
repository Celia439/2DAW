<?php

/**
 * Clase vehiculo que representa un vehiculo concreto con
 * las variables nombre tipo(C camión M moto T turismo) y peso(toneladas)
 */
class Vehiculo
{
    public $nombre;
    private $tipo;
    private $peso;

    /**
     * Costructor de vehiculo
     * En caso de introducir algo erroneo en tipo o peso.
     * Devería crear una exepcion dependiendo del error.
     * por ahora solo tengo un if que controle el tipo.
     * @param $nombre
     * @param $tipo
     * @param $peso
     */
    public function __construct($nombre, $tipo, $peso)
    {
        if (preg_match('/^[CcMmTt]$/', $tipo)) {
            $this->nombre = $nombre;
            $this->tipo = $tipo;
            $this->peso = $peso;
        } else {
            echo "Tipo de vehículo debe ser C camión, M moto T turismo.";
        }
    }

    /**
     * Metodo set para cambiar las propiedades
     * (Falta implementar el control de tipo y peso)
     * @param $propiedad
     * @param $valor
     * @return void
     */
    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    /**
     * Metodo get para obtener información individual
     * @param $propiedad
     * @return mixed
     */
    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    /**
     * Metodo to_String para dar toda la información del vehículo.
     * @return string
     */
    public function __toString()
    {
        $datos = "
        --------Vehiculo-------<br>
        Nombre: $this->nombre<br> Tipo:";
        // es mas ideal usar switch
        if ($this->tipo === "C") {
            $datos .= "Camión";
        } else if ($this->tipo === "M") {
            $datos .= "Moto";
        } else {
            $datos .= "Turismo";
        }
        $datos .= "<br>Peso: $this->peso Toneladas<br>";
        return $datos;
    }

}

?>
