<?php

//--Una clase evento que encapsule su loguica
//- * Atributos: (Titulo STR,Descripción TEXT,Fecha date? o str,Hora str,Categoria( supongo que un select o array(ej.: trabajo, estudio, ocio, personal) ) )
class   Evento
{
    private string $titulo;
    private string $descripcion;
    private string $fecha;
    private string $hora;
    private string $categoria;

    /**
     * Cosntructor de evento
     * @param $categoria
     * @param $hora
     * @param $fecha
     * @param $descripcion
     * @param $titulo
     */
    public function __construct($categoria, $hora, $fecha, $descripcion, $titulo)
    {
        $this->categoria = $categoria;
        $this->hora = $hora;
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
        $this->titulo = $titulo;
    }


    /**
     * Si faltan menos de 24 horas a este evento dará true o false
     *
     * @return true|false
     */
    function esProximo(): bool
    {
        $ahora=time();
        $evento=$this->getFechaCompleta();
        return ($evento > $ahora) && (($evento - $ahora) <= (24*60*60)/*24h*/);
    }


    /**
     *  Devuelve la fecha como DateTime para realizar operaciones con ella
     * @return int
     */
    function getFechaCompleta(): int
    {
        $fechaS = explode("-", $this->fecha);
        $hora = explode(":", $this->hora);
        return mktime((int)$hora[0],(int)$hora[1],0,(int)$fechaS[1],(int)$fechaS[2],(int)$fechaS[0]);
    }

}