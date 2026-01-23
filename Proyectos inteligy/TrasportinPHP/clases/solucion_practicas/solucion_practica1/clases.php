<?php
    // clases.php
    interface Certificable {
        public function obtenerEtiqueta();
    }

    abstract class Vehiculo implements Certificable {
        private string $id;
        protected string $nombre;
        protected string $fechaAdquisicion;
        protected float $kilometraje;
        protected array $extras;
        
        public static int $contador = 0;

        public function __construct($id, $nombre, $fecha, $km, $extras = []) {
            // Normalización del ID usando el método estático
            $idNormalizado = self::formatearCodigo($id);

            // Validación con Expresiones Regulares
            if (!preg_match('/^[A-Z]{3}-\d{4}[A-Z]$/', $idNormalizado)) {
                throw new Exception("Error: El ID '$idNormalizado' no sigue el patrón XXX-0000X");
            }
            
            if (!preg_match('/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/', $fecha)) {
                throw new Exception("Error: El formato de fecha '$fecha' es incorrecto (AAAA-MM-DD)");
            }

            $this->id = $idNormalizado;
            $this->nombre = trim($nombre);
            $this->fechaAdquisicion = $fecha;
            $this->kilometraje = (float)$km;
            $this->extras = $extras;

            // Incremento del contador cada vez que se declara un objeto
            self::$contador++;
        }

        public static function formatearCodigo(string $cadena) {
            // Eliminar todos los espacios y pasar a mayúsculas
            $resultado = str_replace(' ', '', $cadena);

            return strtoupper($resultado);
        }

        public function calcularSalud() {
            $puntos = 100;
            
            // Cálculo de antigüedad
            $segundosAdquisicion = strtotime($this->fechaAdquisicion);
            $segundosCincoAnios = 5 * 365 * 24 * 60 * 60;
            
            if ((time() - $segundosAdquisicion) > $segundosCincoAnios) {
                $puntos -= 25;
            }

            // Penalización por kilometraje
            if ($this->kilometraje > 20000) {
                $puntos -= 25;
            }

            return max(0, $puntos);
        }

        public function __toString() {
            // Formatear fecha de AAAA-MM-DD a DD/MM/AAAA
            $partes = explode('-', $this->fechaAdquisicion);
            $fechaFormateada = "{$partes[2]}/{$partes[1]}/{$partes[0]}";
            
            if (empty($this->extras)) {
                $listaExtras = "Ninguno";
            } else {
                $listaExtras = implode(", ", $this->extras);
            }
            
            return "<strong>{$this->nombre}</strong> (ID: {$this->id}) | Adquirido: $fechaFormateada | Extras: $listaExtras";
        }

        // Método abstracto que se implementa en las hijas
        abstract public function calcularAutonomia();
    }

    class Electrico extends Vehiculo {
        public function obtenerEtiqueta() {
            return "Etiqueta 0 Emisiones - Exento de restricciones";
        }

        public function calcularAutonomia() {
            return 400;
        }
    }

    class Hidrogeno extends Vehiculo {
        public function obtenerEtiqueta() {
            return "Etiqueta ECO - Acceso permitido a centro ciudad";
        }

        public function calcularAutonomia() {
            return 650;
        }
    }
?>