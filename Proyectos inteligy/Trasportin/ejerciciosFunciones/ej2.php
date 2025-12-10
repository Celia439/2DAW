<!DOCTYPE html>
<html>

<head>
    <title>ej2</title>

</head>

<body>
<?php
function corregir_mayusculas($cadena)
{
//97 a
//122 z
    $cadenaAux = $cadena;
    $caracterAux = chr(ord($cadenaAux[0]) - 32);
    $cadena[0] = $caracterAux;
    $indice=1;
    //strlen longirud de un string devuelve num de caracteres de la cadena
    for (;strlen($cadena)>$indice;$indice++){
        //ctype_upper() devuelve true si la letra esta en mayusculas y false si esta en minuscula
        if(ctype_upper($cadena[$indice])){
            $cadena[$indice] = chr(ord($cadena[$indice]) + 32);
        }
    }
    echo $cadena;

}

corregir_mayusculas("hoLa MunDo");
?>

</body>

</html>