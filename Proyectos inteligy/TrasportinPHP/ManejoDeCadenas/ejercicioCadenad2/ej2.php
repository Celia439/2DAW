<!Doctype html>
<html>
<head>
    <title>2ej</title>
    <style>
        table {
            border-collapse: collapse;
            margin-left: 35%;
            margin-top: 15%;
            border: darkslateblue solid 2px ;

        }
        th{
            border: darkslateblue solid 2px ;
            background-color: darkviolet;
            color: white;
        }
        td{
           padding-left: 5px;
            padding-right: 5px;

            border-bottom: darkslateblue solid 2px ;

        }

    </style>
</head>
<body>
<!--2. Se necesita comprobar que un determinado grupo de usuarios no ha utilizado en su
nombre los caracteres ‘&’, ‘!’, ‘?’ o ‘*’. Suponer que todos los nombres están en un
array llamado Usuarios. Comprobar si cada uno de los nombres de usuario contienen
alguno de los caracteres citados. La página PHP deberá mostrar un cuadro de la
siguiente forma:
Nota: Con que haya uno solo de los caracteres ya se considera nombre incorrecto
Nota1: Se deberán respetar los tipos de letra, colores y diseño de la tabla
Nota2: Utilizar la función strpbrk(cadena, lista_caracteres)
 -->
<?php
$usuarios = ["Nombre1&", "PEPE", "#Imprenta2029", "#@!$&?", "Señor Director"];

function nombresValidos($usuarios)
{
    $caracteres = "&!?*";
    echo "<table>";
    echo "<tr><th colspan='2' style='text-align: left'>USUARIO</th></tr>";

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
?>

</body>
</html>

