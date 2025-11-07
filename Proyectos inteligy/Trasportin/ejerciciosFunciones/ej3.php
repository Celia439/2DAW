<!DOCTYPE html>
<html>

<head>
    <title>ej3</title>

</head>

<body>
<?php
function contar_letra_a($cadena)
{
//97 a
//122 z
    $indice=0;
    $contA=0;
    for (;strlen($cadena)>$indice;$indice++){
        //ctype_upper() devuelve true si la letra esta en mayusculas y false si esta en minuscula
        if(ord($cadena[$indice])==97 || ord($cadena[$indice])==65){
            $contA++;
        }
    }

    echo "La cadena '". $cadena."' contiene $contA  A";

}

contar_letra_a("Hola Alejandro :D");
?>

</body>

</html>