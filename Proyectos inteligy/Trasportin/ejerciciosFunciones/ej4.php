<!DOCTYPE html>
<html>

<head>
    <title>ej4</title>

</head>

<body>
<?php
function contar_letra($cadena, $letra)
{
//97 a
//122 z
    $indice=0;
    $contMay=0;
    for (;strlen($cadena)>$indice;$indice++){
        if(ctype_upper($cadena[$indice])){
            $contMay++;
        }
    }

    echo "La cadena '". $cadena."' contiene $contMay Mayusculas   ";

}

contar_letra("Hola Alejandro :D" ,'a');
?>

</body>

</html>