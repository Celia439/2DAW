<?php

    interface Rendible {
        public function calcularRendimiento();
        public function esMVP();
        public function nivelJugador();
    }

    abstract class Jugador implements Rendible {
        private $nick;
        protected $rol;
        protected $kills;
        protected $assists;
        protected $deaths;
        protected $fechaIngreso;
        protected $skills;
        protected static $totalJugadores = 0;

        public function __construct($nick, $rol, $kills, $assists, $deaths, $fechaIngreso, $skills) {
            $this->nick = $nick;
            $this->rol = $rol;
            $this->kills = $kills;
            $this->assists = $assists;
            $this->deaths = $deaths;
            $this->fechaIngreso = $fechaIngreso;
            $this->skills = $skills;

            if (!$this->validarNick($this->nick)) {
                $this->nick = "NickInvalido";
            }

            if (!$this->validarFecha($this->fechaIngreso)) {
                $this->fechaIngreso = "0000-00-00";
            }

            if ($this->kills < 0) {
                $this->kills = 0;
            }
            if ($this->assists < 0) {
                $this->assists = 0;
            }
            if ($this->deaths < 0) {
                $this->deaths = 0;
            }

            self::$totalJugadores = self::$totalJugadores + 1;
        }

        private function validarNick($nick) {
            $valido = false;
            if (preg_match('/^[a-zA-Z0-9_]+$/', $nick)) {
                $valido = true;
            }
            return $valido;
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

        public function kda() {
            $resultado = 0;
            $divisor = $this->deaths;
            if ($divisor <= 0) {
                $divisor = 1;
            }
            $resultado = ($this->kills + $this->assists) / $divisor;
            return $resultado;
        }

        public function __toString() {
            $fecha = $this->formatearFecha($this->fechaIngreso);
            $texto = "[" . $this->nick . "] (Rol: " . $this->rol . ") | Ingreso: " . $fecha;
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

        public static function getTotalJugadores() {
            $t = self::$totalJugadores;
            return $t;
        }

        public function esMVP() {
            $mvp = false;
            if ($this->calcularRendimiento() > 80) {
                $mvp = true;
            }
            return $mvp;
        }

        public function nivelJugador() {
            $nivel = "Novato";
            $rend = $this->calcularRendimiento();

            if ($rend >= 40 && $rend < 80) {
                $nivel = "Intermedio";
            } else {
                if ($rend >= 80) {
                    $nivel = "Experto";
                }
            }

            return $nivel;
        }

        abstract public function bonusRol();

        public function getSkills() {
            $s = $this->skills;
            return $s;
        }
    }

    class Tirador extends Jugador {

        public function bonusRol() {
            $bonus = $this->kills * 0.5;
            return $bonus;
        }

        public function calcularRendimiento() {
            $rend = ($this->kda() * 20) + $this->bonusRol();
            return $rend;
        }
    }

    class Soporte extends Jugador {

        public function bonusRol() {
            $bonus = $this->assists * 0.7;
            return $bonus;
        }

        public function calcularRendimiento() {
            $rend = ($this->kda() * 15) + $this->bonusRol();
            return $rend;
        }
    }

    class Tanque extends Jugador {

        public function bonusRol() {
            $bonus = $this->deaths * -0.3;
            return $bonus;
        }

        public function calcularRendimiento() {
            $rend = ($this->kda() * 25) + $this->bonusRol();
            return $rend;
        }
    }
