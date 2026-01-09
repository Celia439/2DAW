<!Doctype html>
<html>
<head>
    <title>Ej1 clase</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="ej1.php">

</form>
<?php

class Animal
{
    public $nombre;
    public $color;
    public $fechaNac;

    public function __construct($nombre, $color, $fechaNac)
    {
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $fechaNac)) {
            $this->$nombre = $nombre;
            $this->$color = $color;
            $this->$fechaNac = $fechaNac;
        } else {
            echo "Fecha nacimiento invalida";
        }
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function __toString()
    {
        return "
        --------Animal-------<br>
        Nombre: $this->nombre<br>
        Color: $this->color<br>
        Fecha de Nacimiento: $this->fechaNac<br>
        ";
    }
    public function edadAnimal()
    {
        $fecha=$this->fechaNac;
        $hoy=
        $edad=;

        return $edad;
    }
}

?>
</body>
</html>