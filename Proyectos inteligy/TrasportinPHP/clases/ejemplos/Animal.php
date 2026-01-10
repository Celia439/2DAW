<!Doctype html>
<html>
<head>
    <title>Ej1 clase</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="Animal.php">
    <input name="nombre" type="text" placeholder="nombre">
    <input name="color" type="text" placeholder="color">
    <input name="fecha" type="date">
    <input type="submit" value="enviar">
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
            $this->nombre = $nombre;
            $this->color = $color;
            $this->fechaNac = $fechaNac;
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
        $fechastr = $this->fechaNac;
        $anio = (int)substr($fechastr, 0, 4);
        $mes = (int)substr($fechastr, 5, 2);
        $dia = (int)substr($fechastr, 8, 2);
        $anioH = (int)date("Y");
        $mesH = (int)date("m");
        $diaH = (int)date("d");
        $edad = $anioH - $anio;
        if ($mesH < $mes || ($mesH === $mes && $diaH < $dia)) {
            $edad--; // aún no ha cumplido años este año
        }
        return $edad;
    }
}

if (isset($_POST["nombre"], $_POST["color"], $_POST["fecha"])
        && !empty($_POST["nombre"])
        && !empty($_POST["color"])
        && !empty($_POST["fecha"])) {
    $animal = new Animal($_POST["nombre"], $_POST["color"], $_POST["fecha"]);
    $animal->__set("color", "negro");
    echo $animal . " y tiene " . $animal->edadAnimal() . " años";
}
?>
</body>
</html>