<!doctype html>
<html>
<head>
    <style>
        body {
            background-color: lightblue;
        }

        table {
            border-collapse: collapse;
            margin: 5%;
        }

        th {
            background-color: purple;
            color: white;
            border: purple solid 2px;
            padding: 15px;
            text-align: center;
        }
        td{
            border: purple solid 2px;

        }

    </style>
</head>
<body>
<h2>Ejercicio15</h2>

<form action="ej15.php" method="get">
    <input type="text" name="pal1" placeholder="Introduce nombre">
    <input type="text" name="pal2" placeholder="Introduce nombre">
    <input type="text" name="pal3" placeholder="Introduce nombre">
    <input type="text" name="pal4" placeholder="Introduce nombre">
    <input type="text" name="pal5" placeholder="Introduce nombre">
    <input type="submit" value="Comprobar">
</form>
<?php
//15. Se necesita comprobar que un determinado grupo de usuarios no ha utilizado en
//su nombre los caracteres ‘&’, ‘!’, ‘?’ o ‘*’. Crear un sitio Web que pida al
//administrador que introduzca los 5 nombres de usuario nuevos. Comprobar si
//cada uno de los nombres de usuario contienen alguno de los caracteres citados.
//La página PHP deberá mostrar un cuadro de la siguiente forma:
if (
        !empty($_GET["pal1"]) &&
        !empty($_GET["pal2"]) &&
        !empty($_GET["pal3"]) &&
        !empty($_GET["pal4"]) &&
        !empty($_GET["pal5"])
) {
$usuarios = [$_GET["pal1"], $_GET["pal2"], $_GET["pal3"], $_GET["pal4"], $_GET["pal5"]];

function nombresValidos($usuarios)
{
    $caracteres = "&!?*";
    echo "<table>";
    echo "<tr><th colspan='2' style='text-align: left'>USUARIOS</th></tr>";

    $fila = 1; // contador para alternar colores

    foreach ($usuarios as $usuario) {

        // Alternancia de color
        $color = ($fila % 2 == 0) ? "#ffffff" : "#e8d4ff";
        // blanco - violeta muy clarito

        echo "<tr style='background-color: $color;'>";

        echo "<td><b>$usuario</b></td>";

        if (strpbrk($usuario, $caracteres)) {
            echo "<td style='color: red'>Incorrecto</td>";
        } else {
            echo "<td style='color: green'>Correcto</td>";
        }

        echo "</tr>";

        $fila++; // avanzar contador
    }

    echo "</table>";
}

nombresValidos($usuarios);
}
        ?>
</body>
</html>