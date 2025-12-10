<!DOCTYPE html>
<html>

<head>
    <title>ej5</title>

</head>

<body>
<?php
function contar_letra($cadena, $letra, $casesensitive = true)
{
    $indice = 0;
    $contLetra = 0;

    // Si no es sensible a mayúsculas/minúsculas, convertimos todo a minúsculas con strlower()
    if (!$casesensitive) {
        $cadena = strtolower($cadena);
        $letra = strtolower($letra);
    }

    // Recorremos la cadena carácter por carácter
    for (; $indice < strlen($cadena); $indice++) {
        if ($cadena[$indice] === $letra) {
            $contLetra++;
        }
    }

    echo "La cadena '$cadena' contiene la letra '$letra' $contLetra veces.<br>";
}

// Ejemplos:
contar_letra("Hola Alejandro :D", 'a', true);   // sensible a mayúsculas
contar_letra("Hola Alejandro :D", 'a', false);  // no sensible a mayúsculas
?>


</body>

</html>