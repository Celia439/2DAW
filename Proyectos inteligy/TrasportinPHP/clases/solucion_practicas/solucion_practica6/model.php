<?php

    interface AnalisisDeportivo {
        public function indiceEsfuerzo();
        public function analizarSuperficie();
        public function sensacionFinal();
    }

    abstract class Recorrido implements AnalisisDeportivo {
        protected $nombre;
        protected $distancia;
        protected $tiempo;
        protected $fecha;
        protected $superficies;
        protected $sensaciones;
        protected static $totalRecorridos = 0;

        public function __construct($nombre, $distancia, $tiempo, $fecha, $superficies, $sensaciones) {
            $this->nombre = $nombre;
            $this->distancia = $distancia;
            $this->tiempo = $tiempo;
            $this->fecha = $fecha;
            $this->superficies = $superficies;
            $this->sensaciones = $sensaciones;

            if ($this->distancia <= 0) {
                $this->distancia = 0;
            }
            if ($this->tiempo <= 0) {
                $this->tiempo = 0;
            }
            if (!$this->validarFecha($this->fecha)) {
                $this->fecha = "0000-00-00";
            }

            self::$totalRecorridos = self::$totalRecorridos + 1;
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

        public function ritmo() {
            $ritmo = 0;
            if ($this->distancia > 0) {
                $ritmo = $this->tiempo / $this->distancia;
            }
            return $ritmo;
        }

        public function velocidadMedia() {
            $velocidad = 0;
            if ($this->tiempo > 0) {
                $horas = $this->tiempo / 60;
                if ($horas > 0) {
                    $velocidad = $this->distancia / $horas;
                }
            }
            return $velocidad;
        }

        public function __toString() {
            $fechaFormateada = $this->formatearFecha($this->fecha);
            $texto = "Recorrido: " . $this->nombre . " | Distancia: " . $this->distancia . " km | Tiempo: " . $this->tiempo . " min | Fecha: " . $fechaFormateada;
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

        public static function getTotalRecorridos() {
            $t = self::$totalRecorridos;
            return $t;
        }

        abstract public function calcularCarga();

        public function getSuperficies() {
            $s = $this->superficies;
            return $s;
        }

        public function getSensaciones() {
            $s = $this->sensaciones;
            return $s;
        }
    }

    class RecorridoUrbano extends Recorrido {

        public function calcularCarga() {
            $carga = $this->distancia * 1.2;
            return $carga;
        }

        public function indiceEsfuerzo() {
            $indice = $this->ritmo() * 0.8;
            return $indice;
        }

        public function analizarSuperficie() {
            $texto = "Sin datos de superficie.";
            if (count($this->superficies) > 0) {
                $soloAsfalto = true;
                $i = 0;
                $total = count($this->superficies);
                while ($i < $total) {
                    $sup = $this->superficies[$i];
                    if ($sup !== "Asfalto") {
                        $soloAsfalto = false;
                    }
                    $i = $i + 1;
                }

                if ($soloAsfalto) {
                    $texto = "Terreno muy estable (principalmente asfalto).";
                } else {
                    $texto = "Terreno urbano variado.";
                }
            }
            return $texto;
        }

        public function sensacionFinal() {
            $mensaje = "Recorrido urbano completado con sensaciones moderadas.";
            $ritmo = $this->ritmo();
            if ($ritmo < 5) {
                $mensaje = "Buen control del ritmo en entorno urbano.";
            } else {
                $i = 0;
                $total = count($this->sensaciones);
                $hayFatigaIntensa = false;
                while ($i < $total) {
                    if ($this->sensaciones[$i] === "Fatiga intensa") {
                        $hayFatigaIntensa = true;
                    }
                    $i = $i + 1;
                }
                if ($hayFatigaIntensa) {
                    $mensaje = "Recorrido exigente, posible sobreesfuerzo en entorno urbano.";
                }
            }
            return $mensaje;
        }
    }

    class RecorridoMixto extends Recorrido {

        public function calcularCarga() {
            $carga = $this->distancia * 1.6;
            return $carga;
        }

        public function indiceEsfuerzo() {
            $indice = $this->ritmo() * 1.3;
            return $indice;
        }

        public function analizarSuperficie() {
            $texto = "Terreno mixto con variaciones moderadas.";
            $sup = $this->superficies;

            $hayNatural = false;
            $i = 0;
            $total = count($sup);
            while ($i < $total) {
                if ($sup[$i] === "Césped" || $sup[$i] === "Tierra compacta" || $sup[$i] === "Sendero natural") {
                    $hayNatural = true;
                }
                $i = $i + 1;
            }

            $hayAsfalto = false;
            $hayTierraOGrava = false;
            $j = 0;
            while ($j < $total) {
                if ($sup[$j] === "Asfalto") {
                    $hayAsfalto = true;
                }
                if ($sup[$j] === "Tierra compacta" || $sup[$j] === "Grava") {
                    $hayTierraOGrava = true;
                }
                $j = $j + 1;
            }

            if ($hayNatural) {
                $texto = "Terreno irregular con tramos naturales.";
            } else {
                if ($hayAsfalto && $hayTierraOGrava) {
                    $texto = "Terreno mixto equilibrado.";
                }
            }

            return $texto;
        }

        public function sensacionFinal() {
            $mensaje = "Recorrido mixto completado con buenas sensaciones.";
            if ($this->distancia > 15 || $this->tiempo > 120) {
                $mensaje = "Recorrido exigente con variaciones de terreno.";
            } else {
                $i = 0;
                $total = count($this->sensaciones);
                $hayFatigaModerada = false;
                while ($i < $total) {
                    if ($this->sensaciones[$i] === "Fatiga moderada") {
                        $hayFatigaModerada = true;
                    }
                    $i = $i + 1;
                }
                if ($hayFatigaModerada) {
                    $mensaje = "Recorrido mixto con esfuerzo controlado.";
                }
            }
            return $mensaje;
        }
    }
