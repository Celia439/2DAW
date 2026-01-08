<!Doctype html>
<html>
<head>
    <title>Ej4 biblioteca devoluciones</title>
</head>
<body>
<form action="ej4.php" method="post" enctype="multipart/form-data">
    <label>Fecha de devolucion de libro prestado
        <input name="fecha" type="date">
    </label>
    <input type="submit" value="enviar">
</form>
<?php
//Ejercicio 4
//Programar una página en HTML – PHP que pida al usuario la fecha en la que tendría
//que devolver el libro que tiene prestado.
//Teniendo en cuenta que por cada día de retraso el usuario tendrá que pagar 3€,
//mostrar un mensaje indicando si todavía le quedan días de préstamo, si lo está
//devolviendo el día exacto y si no es así, la multa que tendrá que pagar.
if ( !empty($_POST["fecha"]) && isset($_POST["fecha"]) ) {
    $fechastr = $_POST["fecha"];// te devuelve la fecha con guiones
    // sacar la fecha con substring
    echo "La fecha sacada tal cual del formulario: " . $fechastr;
    echo "<br>" . "Año sacado:" . substr($fechastr, 0, 4), "<br>";
    echo "Mes sacado:" . substr($fechastr, 5, 2), "<br>";
    echo "Día sacado:" . substr($fechastr, 8, 2), "<br>";
    // pasarlo a variables
    $anio = substr($fechastr, 0, 4);
    $mes = substr($fechastr, 5, 2);
    $dia = substr($fechastr, 8, 2);
    // el dia de hoy tambien
    $anioH = (int)date("Y");
    $mesH = (int)date("m");
    $diaH = (int)date("d");
    //comprobar que la fecha sea valida
    if (checkdate($mes, $dia, $anio)) {
        //Calcular si tiene tiempo o tiene multa
        echo "fecha valida<br>";
        $fechaDevolucion = mktime(0, 0, 0, $mes, $dia, $anio);
        $hoy = mktime(0, 0, 0, $mesH, $diaH, $anioH);

        $diferenciaSegundos = $hoy - $fechaDevolucion;
        //redodndear para arriba
        $diasExactos = ceil($diferenciaSegundos / (60 * 60 * 24)); // Convertir a días
        // si los dias es mayor a 0 quiere decir que tiene dias de retraso.
        if ($diasExactos > 0) {
            // si los dias es igual a cero lo tiene que entregar hoy a tiempo.
            echo "Te quedan " . abs($diasExactos) . " días para devolver el libro.";
        } elseif ($diasExactos == 0) {
            echo "¡Entrega el libro justo a tiempo!";
        } else {
            // si los dias es menor a 0 quiere decir que aun le quedan días para entregar.
            // abs valor absoluto(positivo)
            echo "Tienes $diasExactos días de retraso, multa: " . ($diasExactos * 3) . "€";

        }
    } else {
        echo "La fecha introducida es erronea";
    }
}
?>
</body>
</html>