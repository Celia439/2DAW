<!Doctype html>
<html>
<head>
    <title>Ej3 adulto o cumpleaños</title>
</head>
<body>
<form action="ej3.php" method="post">
    <label>Introduce tu fecha de nacimiento
        <input name="fecha" type="date">
    </label>
    <input type="submit" value="enviar">
</form>
<?php
//Ejercicio 3
//Programar una página en HTML – PHP que pida al usuario su día, mes y año de
//nacimiento, la página le dirá si es mayor de edad o no. En caso de que hoy sea su
//cumpleaños le mostrará una felicitación
/**
 * La fecha que se le pase por parametro debe empezar por año
 * mes y día
 * @param mixed $fechastr
 * @return array
 */
function fechaToString(mixed $fechastr): array
{
    $anio = substr($fechastr, 0, 4);
    $mes = substr($fechastr, 5, 2);
    $dia = substr($fechastr, 8, 2);
    return array($anio, $mes, $dia);
}

if (isset($_POST["fecha"])) {
    $fechastr = $_POST["fecha"];
    // sacar la fecha con substrin y pasarlo a variables
    [$anio, $mes, $dia] = fechaToString($fechastr);
    //comprobar que la fecha sea valida
    if (checkdate($mes, $dia, $anio)) {
        echo "fecha valida<br>";
        $anio = (int)$anio;
        $mes = (int)$mes;
        $dia = (int)$dia;
        $anioH = (int)date("Y");
        $mesH = (int)date("m");
        $diaH = (int)date("d");
        //Calcular edad
        $edad = $anioH - $anio;
        if ($mesH < $mes || ($mesH === $mes && $diaH < $dia)) {
            $edad--; // aún no ha cumplido años este año
        }
        if ($mesH === $mes && $diaH === $dia) {
            echo "¡Feliz cumpleaños! 🎉<br>";
        }
        if ($edad >= 18) {
            echo "Eres mayor de edad.<br>";
        } else {
            echo "No eres mayor de edad.<br>";
        }
    }else{
        echo "Fecha no valida";
    }
}
?>
</body>
</html>