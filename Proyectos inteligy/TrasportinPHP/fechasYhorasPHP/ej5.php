<!Doctype html>
<html>
<head>
    <title>Ej5 biblioteca devoluciones</title>
    <style>
        table {
            border-collapse: collapse;
            font-family: Comic Sans MS, serif;
        }

        td, th {
            padding: 10px;
            text-align: center;
            border: 1px solid mediumspringgreen;
        }

        #mes {
            font-weight: bold;
            font-size: 1.2em;
            background-color: darkgray;
        }
    </style>

</head>
<body>
<form action="ej5.php" method="post" enctype="multipart/form-data">
    <label>Introduzca un día para todos los meses que sea importante
        <input name="fecha" type="date">
    </label>
    <input type="submit" value="enviar">
</form>
<?php
//Ejercicio 5
//Programar una página en HTML – PHP que a través de formularios pida al usuario
//día, mes y año.
//La página le mostrará al usuario el calendario del mes y el año que se le haya pasado,
//resaltando el día que el usuario eligió.
//Además la página (utilizando una casilla de verificación) preguntará si se quiere
//visualizar el mes anterior y (con otra casilla de verificación) el mes siguiente.
//Mostrando, por tanto, lo que ase le indique.


/**
 * Está funcion imprime un calendario con la fecha que se le pasa por parámetro.
 * @param $mesInput
 * @param $anioInput
 * @param $diaInput
 * @return void
 */
function crearCalendario($mesInput, $anioInput, $diaInput): void
{
    //pasar la fecha como timestamp
    $timeStamp = mktime(0, 0, 0, $mesInput, $diaInput, $anioInput);
    // sacar el mes en string
    $mesStr = date("F", $timeStamp);
    //sacar los dias del mes
    $diasStr = date("t", $timeStamp);
    //año para mostrar
    $anio = date("Y", $timeStamp);
    //Dias de la semana en español
    $diasSemana = array("Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom");
    //creamos un timestamp de el mes y año pasado por parámetro pero  con el dia a 1
    $timeStampPuntero = mktime(0, 0, 0, $mesInput, 1, $anioInput);
    //puntero del dia de la semana del 1 al 7
    $punteroDia = date("N", $timeStampPuntero);
    // variable auxiliar para poder situarnos y modificar sin usar el original
    $diaSemanaActual = $punteroDia;
    // dia auxiliar que se va a mostrar
    $diaAux = 1;
    echo "<table border='1px'>";
    //mostrar mes
    echo "<tr><th colspan='3' class='mes'>$mesStr</th><th colspan='4'>$anio</th></tr>";
    echo "<tr>";
    //Imprimir dias de la semana
    foreach ($diasSemana as $diaS) {
        echo "<th>$diaS</th>";
    }
    echo "</tr>";

    echo "<tr>";

    // Imprimir celdas vacías antes del primer día del mes
    for ($i = 1; $i < $punteroDia; $i++) {
        echo "<td></td>";
    }
    //imprimir los dias del mes
    for ($dia = $diaAux; $dia <= $diasStr; $dia++) {
        //en caso de que sea el que marco el user pintarlo
        if ($dia == $diaInput) {
            echo "<td id='mes'>$dia</td>";
            $diaSemanaActual++;

            // Si es domingo, cerrar la fila y empezar otra
            if ($diaSemanaActual == 8) {
                echo "</tr>";

                echo "<tr>";
                $diaSemanaActual = 1;
            }
        } else {
            echo "<td>$dia</td>";
            $diaSemanaActual++;

            // Si es domingo, cerrar la fila y empezar otra
            if ($diaSemanaActual == 8) {
                echo "</tr>";

                echo "<tr>";
                $diaSemanaActual = 1;
            }
        }

    }

    // Rellenar celdas vacías si el mes no termina en domingo
    if ($diaSemanaActual !== 0) {
        for ($i = $diaSemanaActual; $i < 7; $i++) {
            echo "<td></td>";
        }
        echo "</tr>";
    }

    echo "</table>";
    echo "
<form action='ej5.php' method='post' enctype='multipart/form-data'>
    <label>Mes anterior
    <!--Entiendo que el ejercicio fuera así con checkbox, pero hablando de tema de utilidad.
    ¿Cuál es la función de que el usuario pueda pulsar las dos casillas a la vez?
    Pues puse un radio para que el usuario elija uno u otro y dependiendo del valor avanzamos 
    retrocedemos.    
    -->
        <input name='anterior' value='anterior' type='checkbox'>
    </label>
    <label>
        Mes siguiente
        <input name='siguiente' value='siguiente' type='checkbox'>
    </label>
    <input type='hidden' name='dia_guardado' value='" . $diaInput . "'>
    <input type='hidden' name='mes_guardado' value='" . $mesInput . "'>
    <input type='hidden' name='anio_guardado' value='" . $anioInput . "'>
    <input type='submit'>
</form>";

}

//Si introducimos una fecha
if (isset($_POST["fecha"]) && $_POST["fecha"] !== "") {
    $fechastr = $_POST["fecha"];// te devuelve la fecha con guiones "-"
    // sacar la fecha con substring y
    // pasarlo a variables
    $anio = substr($fechastr, 0, 4);
    $mes = substr($fechastr, 5, 2);
    $dia = substr($fechastr, 8, 2);
    //comprobar que la fecha sea valida
    if (checkdate($mes, $dia, $anio)) {
        echo "fecha valida<br>";
        //crear el calendario
        crearCalendario($mes, $anio, $dia);
        //Si le decimos que avance o retroceda al calendario imprimido

    } else {
        echo "La fecha introducida es errónea";
    }
} elseif (isset($_POST["anio_guardado"])) {
    $anioAct = $_POST["anio_guardado"];
    $diaAct = $_POST["dia_guardado"];
    $mesAct = $_POST["mes_guardado"];
    //Comprobar que quiere
    $fechaTimeStamp = "";
    if (isset($_POST["siguiente"], $_POST["anterior"])) {
        echo "No puede retroceder y avanzar a la vez";
        $fechaTimeStamp = mktime(0, 0, 0, $mesAct, $diaAct, $anioAct);
    } else if (isset($_POST["siguiente"])) {
        $fechaTimeStamp = mktime(0, 0, 0, $mesAct + 1, $diaAct, $anioAct);

    } else if (isset($_POST["anterior"])) {
        $fechaTimeStamp = mktime(0, 0, 0, $mesAct - 1, $diaAct, $anioAct);

    } else {
        echo "El botón enviar solo funciona si le das a mes anterior o siguiente";
        $fechaTimeStamp = mktime(0, 0, 0, $mesAct, $diaAct, $anioAct);
    }
    //sacamos el año y el mes actualizado
    $anioAct = date("Y", $fechaTimeStamp);
    $mesAct = date("m", $fechaTimeStamp);
    crearCalendario($mesAct, $anioAct, $diaAct);
}

?>
</body>
</html>