<!Doctype html>
<html>

<head>
    <title>Estructuras selectivas e iterativas</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }

    </style>
</head>

<body>
<p>17.Crear una página en PHP que tenga 3 cadenas de caracteres y las muestre
    en una tabla ordenadas en orden alfabético.
</p>
<?php
// el simbolo < > se puede usar pero cuidado que pilla assci y strcrt() otra funcion
$cadena1="Hola estoy en casa";
$cadena2="Porque el profe no fue a clase";
$cadena3="Así que me puse a hacer su tarea";
$cadenas=array($cadena1,$cadena2,$cadena3);
sort($cadenas);
?>

<table>
    <tr>
        <td><?php echo $cadenas[0];?></td>
    </tr>
    <tr>
        <td><?php echo $cadenas[1];?></td>
    </tr>
    <tr>
        <td><?php echo $cadenas[2];?></td>
    </tr>
</table>
</body>

</html>
