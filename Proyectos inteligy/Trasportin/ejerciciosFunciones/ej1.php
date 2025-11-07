<!DOCTYPE html>
<html>

<head>
    <title>ej1</title>

</head>

<body>
<?php
function corregir_primera_letra($cadena)
{
    //ord() convierte en num assci el caracter
    //y cht pilla ese assci y lo combierte en caracter
    $cadenaAux = $cadena;
    $caracterAux = chr(ord($cadenaAux[0])-32);
    $cadena[0]=$caracterAux;
    echo $cadena;

}

corregir_primera_letra("hola mundo");
?>

</body>

</html>