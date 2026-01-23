<?php

    interface Procesable {
        public function desencriptar();
        public function extraerMetadatos();
        public function origen();
    }

    abstract class Mensaje implements Procesable {
        protected $contenidoOriginal;
        protected $fechaRecepcion;
        protected $prioridad;
        protected $marcas;
        protected static $totalMensajes = 0;

        public function __construct($contenidoOriginal, $fechaRecepcion, $prioridad, $marcas) {
            $this->contenidoOriginal = $contenidoOriginal;
            $this->fechaRecepcion = $fechaRecepcion;
            $this->prioridad = $prioridad;
            $this->marcas = $marcas;

            if (!$this->validarFecha($this->fechaRecepcion)) {
                $this->fechaRecepcion = "0000-00-00";
            }

            if ($this->prioridad < 1 || $this->prioridad > 5) {
                $this->prioridad = 1;
            }

            self::$totalMensajes = self::$totalMensajes + 1;
        }

        private function validarFecha($fecha) {
            $valida = false;
            $partes = explode("-", $fecha);
            if (count($partes) === 3) {
                $anio = (int)$partes[0];
                $mes = (int)$partes[1];
                $dia = (int)$partes[2];
                if (checkdate($mes, $dia, $anio)) {
                    $valida = true;
                }
            }
            return $valida;
        }

        public function esUrgente() {
            $urgente = false;
            if ($this->prioridad >= 4) {
                $urgente = true;
            }
            return $urgente;
        }

        public function __toString() {
            $fecha = $this->formatearFecha($this->fechaRecepcion);
            $texto = "Mensaje recibido el " . $fecha . " | Prioridad: " . $this->prioridad;
            return $texto;
        }

        private function formatearFecha($fecha) {
            $resultado = $fecha;
            $partes = explode("-", $fecha);
            if (count($partes) === 3) {
                $resultado = $partes[2] . "/" . $partes[1] . "/" . $partes[0];
            }
            return $resultado;
        }

        public static function getTotalMensajes() {
            $t = self::$totalMensajes;
            return $t;
        }

        abstract public function analizarPatrones();

        public function getMarcas() {
            $m = $this->marcas;
            return $m;
        }
    }

    class MensajeCifradoBasico extends Mensaje {

        public function desencriptar() {
            $texto = strrev($this->contenidoOriginal);
            return $texto;
        }

        public function extraerMetadatos() {
            $texto = $this->desencriptar();
            $palabras = str_word_count($texto);
            $caracteres = strlen($texto);
            $simbolos = preg_match_all('/[^a-zA-Z0-9\s]/u', $texto);

            $resultado = array(
                "palabras" => $palabras,
                "caracteres" => $caracteres,
                "simbolos" => $simbolos
            );
            return $resultado;
        }

        public function origen() {
            $o = "Canal Alfa";
            return $o;
        }

        public function analizarPatrones() {
            $texto = $this->desencriptar();
            $numeros = preg_match_all('/\d+/', $texto);
            $simbolos = preg_match_all('/[^\w\s]/u', $texto);
            $repeticiones = preg_match_all('/(.)\1{2,}/u', $texto);

            $resultado = array(
                "numeros" => $numeros,
                "simbolos" => $simbolos,
                "repeticiones" => $repeticiones
            );
            return $resultado;
        }
    }

    class MensajeCifradoAvanzado extends Mensaje {

        public function desencriptar() {
            $resultado = "";
            $i = 0;
            $longitud = strlen($this->contenidoOriginal);

            while ($i < $longitud) {
                $car = $this->contenidoOriginal[$i];
                $nuevo = chr(ord($car) - 2);
                $resultado = $resultado . $nuevo;
                $i = $i + 1;
            }

            return $resultado;
        }

        public function extraerMetadatos() {
            $texto = $this->desencriptar();
            $palabras = str_word_count($texto);
            $caracteres = strlen($texto);
            $simbolos = preg_match_all('/[^a-zA-Z0-9\s]/u', $texto);

            $resultado = array(
                "palabras" => $palabras,
                "caracteres" => $caracteres,
                "simbolos" => $simbolos
            );
            return $resultado;
        }

        public function origen() {
            $o = "Canal Omega";
            return $o;
        }

        public function analizarPatrones() {
            $texto = $this->desencriptar();
            $xyz = preg_match_all('/XYZ/', $texto);
            $repetitivos = preg_match_all('/(.{2,})\1+/', $texto);
            $clave = preg_match_all('/(ALFA|BETA|OMEGA)/i', $texto);

            $resultado = array(
                "patronesXYZ" => $xyz,
                "repetitivos" => $repetitivos,
                "palabrasClave" => $clave
            );
            return $resultado;
        }
    }
