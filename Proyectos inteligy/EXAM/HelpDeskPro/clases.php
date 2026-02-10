<?php

interface IInformable
{
    function getResumen();
}

abstract class Ticket implements IInformable
{
    private string $titulo;
    private string $email;

    /**
     * @param string $titulo
     * @param string $email
     */
    public function __construct($titulo, $email)
    {
        $this->titulo = $titulo;
        $this->email = $email;
    }

    function __set($variable, $valor)
    {
        //en caso de email invalido lanzar excepción
        try {
            if (!preg_match("/^[a-z0-9.]+@[a-z0-9.]+\.[a-z]{2,3}$/i", $valor) && $variable === "email") {
                throw new Exception("Formato email invalido");
            }
            $this->$variable = $valor;
        } catch (Exception $e) {
            echo $e->getMessage();
        }


    }

    abstract function getResumen();

}

class Incidencia
{

    private string $prioridad;


    function getResume()
    {
        $prioridadM = "NUEVA INCIDENCIA:" . $this->titulo . " [" . strtoupper($this->prioridad) . "]";
        return $prioridadM;
    }

    function getEstilo($resuelto)
    {
        if ($resuelto == true) {
            //Estilos para la incidencia resuelta:
            $estilo = "background - color: #d4edda; color: #155724;";
        } else {
            //Estilos para la incidencia con prioridad alta:
            $estilo = "background - color: #ffe6e6; color: #721c24; font-weight: bold;";
        }
        return $estilo;

    }
}