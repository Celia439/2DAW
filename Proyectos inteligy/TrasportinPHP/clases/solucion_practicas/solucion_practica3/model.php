<?php

    interface Dramaturgico {
        public function resumenArgumento();
        public function esLarga();
        public function publicoObjetivo();
    }

    abstract class Obra implements Dramaturgico {
        protected $titulo;
        protected $genero;
        protected $duracion;
        protected $fechaEstreno;
        protected $personajes;
        protected static $totalObras = 0;

        public function __construct($titulo, $genero, $duracion, $fechaEstreno, $personajes) {
            $this->titulo = $titulo;
            $this->genero = $genero;
            $this->duracion = $duracion;
            $this->fechaEstreno = $fechaEstreno;
            $this->personajes = $personajes;

            if ($this->duracion <= 0) {
                $this->duracion = 0;
            }

            if (!$this->validarFecha($this->fechaEstreno)) {
                $this->fechaEstreno = "0000-00-00";
            }

            self::$totalObras = self::$totalObras + 1;
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

        public function diasHastaEstreno() {
            $dias = 0;
            if ($this->fechaEstreno !== "0000-00-00") {
                $hoy = time();
                $estreno = strtotime($this->fechaEstreno);
                if ($estreno !== false) {
                    $diferencia = $estreno - $hoy;
                    $dias = floor($diferencia / (60 * 60 * 24));
                }
            }
            return $dias;
        }

        public function __toString() {
            $texto = "\"" . $this->titulo . "\" — Género: " . $this->genero . " — Estreno: " . $this->formatearFecha($this->fechaEstreno);
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

        public function esLarga() {
            $larga = false;
            if ($this->duracion >= 120) {
                $larga = true;
            }
            return $larga;
        }

        public static function getTotalObras() {
            $t = self::$totalObras;
            return $t;
        }

        abstract public function nivelProduccion();

        public function getPersonajes() {
            $p = $this->personajes;
            return $p;
        }

        public function getDuracion() {
            $d = $this->duracion;
            return $d;
        }
    }

    class ObraComedia extends Obra {

        public function nivelProduccion() {
            $nivel = count($this->personajes) * 1000;
            return $nivel;
        }

        public function resumenArgumento() {
            $texto = "Una historia ligera con situaciones humorísticas.";
            return $texto;
        }

        public function publicoObjetivo() {
            $texto = "Apto para todos los públicos.";
            return $texto;
        }
    }

    class ObraDrama extends Obra {

        public function nivelProduccion() {
            $nivel = count($this->personajes) * 1500;
            return $nivel;
        }

        public function resumenArgumento() {
            $texto = "Relato intenso cargado de emociones.";
            return $texto;
        }

        public function publicoObjetivo() {
            $texto = "Adultos y jóvenes.";
            return $texto;
        }
    }
