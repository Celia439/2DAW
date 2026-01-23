<?php

    interface Evaluable {
        public function esRentable();
        public function impactoAmbiental();
        public function descripcionTecnica();
    }

    abstract class Invento implements Evaluable {
        protected $nombre;
        protected $proposito;
        protected $fechaPrototipo;
        protected $coste;
        protected $materiales;
        protected static $totalInventos = 0;

        public function __construct($nombre, $proposito, $fechaPrototipo, $coste, $materiales) {
            $this->nombre = $nombre;
            $this->proposito = $proposito;
            $this->fechaPrototipo = $fechaPrototipo;
            $this->coste = $coste;
            $this->materiales = $materiales;

            if (!$this->validarFecha($this->fechaPrototipo)) {
                $this->fechaPrototipo = "0000-00-00";
            }

            if ($this->coste <= 0) {
                $this->coste = 0;
            }

            self::$totalInventos = self::$totalInventos + 1;
        }

        private function validarFecha($fecha) {
            $esValida = false;
            $partes = explode("-", $fecha);
           
            if (count($partes) === 3) {
                $anio = (int)$partes[0];
                $mes = (int)$partes[1];
                $dia = (int)$partes[2];
                if (checkdate($mes, $dia, $anio)) {
                    $esValida = true;
                }
            }
            return $esValida;
        }

        public function añosDesdePrototipo() {
            $anios = 0;
            
            if ($this->fechaPrototipo !== "0000-00-00") {
                $timestampPrototipo = strtotime($this->fechaPrototipo);
                $timestampHoy = time();
                
                if ($timestampPrototipo !== false && $timestampHoy !== false) {
                    $segundos = $timestampHoy - $timestampPrototipo;
                    
                    if ($segundos > 0) {
                        $anios = floor($segundos / (365 * 24 * 60 * 60));
                    }
                }
            }
            return $anios;
        }

        public function __toString() {
            $texto = "Invento: " . $this->nombre . " | Prototipo: " . $this->formatearFecha($this->fechaPrototipo) . " | Coste: " . $this->coste . "€";
            
            return $texto;
        }

        private function formatearFecha($fecha) {
            $resultado = $fecha;
            $partes = explode("-", $fecha);
            
            if (count($partes) === 3) {
                $anio = $partes[0];
                $mes = $partes[1];
                $dia = $partes[2];
                $resultado = $dia . "/" . $mes . "/" . $anio;
            }
            return $resultado;
        }

        public static function getTotalInventos() {
            $total = self::$totalInventos;
           
            return $total;
        }

        public function esRentable() {
            $esRentable = false;
            
            if ($this->coste < 5000) {
                $esRentable = true;
            }
            return $esRentable;
        }

        abstract public function calcularComplejidad();

        public function getMateriales() {
            $m = $this->materiales;
            return $m;
        }

        public function getNombre() {
            $n = $this->nombre;
            return $n;
        }

        public function getProposito() {
            $p = $this->proposito;
            return $p;
        }

        public function getFechaPrototipo() {
            $f = $this->fechaPrototipo;
            return $f;
        }

        public function getCoste() {
            $c = $this->coste;
            return $c;
        }
    }

    class InventoMecanico extends Invento {

        public function calcularComplejidad() {
            $complejidad = count($this->materiales) * 2;
            return $complejidad;
        }

        public function impactoAmbiental() {
            $impacto = count($this->materiales) * 5;
            return $impacto;
        }

        public function descripcionTecnica() {
            $texto = "Sistema mecánico basado en engranajes y piezas móviles.";
            return $texto;
        }
    }

    class InventoElectronico extends Invento {

        public function calcularComplejidad() {
            $complejidad = count($this->materiales) * 3;
            return $complejidad;
        }

        public function impactoAmbiental() {
            $impacto = $this->coste / 100;
            return $impacto;
        }

        public function descripcionTecnica() {
            $texto = "Circuitería avanzada con componentes electrónicos.";
            return $texto;
        }
    }
