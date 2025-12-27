<!Doctype html>
<html>
<head>
    <title>1ej</title>
</head>
<body>
<!--
 Crear un script PHP que utilice las siguientes cadenas de caracteres:
a. CADENA 1 = ‘Mi mamá me mima’
b. CADENA 2 = ‘Quiero mucho a mi mamá’
c. El script mostrará:
i. La unión de las dos cadenas en una sola (sin usar operador de
concatenación)
ii. La cantidad de veces que se repite cada letra del abecedario en cada
una de las cadenas.
iii. La cantidad de veces que se repite cada letra del abecedario en la
unión de las dos cadenas.
NOTA: Utilizar en este caso SOLO funciones de arrays.
 -->
<?php

$cadena1='Mi mamá me mima';
$cadena2='Quiero mucho a mi mamá';
//1
$cadena1Array = str_split($cadena1);
$cadena2Array = str_split($cadena2);
$unionArray = array_merge($cadena1Array, [' '], $cadena2Array);
$cadenaUnida = implode('', $unionArray);
echo "<h3>1) Unión sin operador de concatenación:</h3>";
echo $cadenaUnida . "<br><br>";
//2
function abcRepetido($cadena)
{
    $cadena=strtolower($cadena);
    $caracteres=[];
    for($a=0;$a<strlen($cadena);$a++){
        if(!(array_key_exists($cadena[$a],$caracteres))){
            $caracteres[$cadena[$a]]= 1;
        }else{
            $caracteres[$cadena[$a]]+= 1;
        }
    }
    foreach ($caracteres as $caracter=> $repericion){
        echo "el caracter " .$caracter." se repite ".$repericion." veces<br>";
    }
}
echo "<h3>2) Contar las letras repetidas:</h3>";

echo "<p>Cadena 1</p>";
abcRepetido($cadena1);
echo "<p>Cadena 2</p>";
abcRepetido($cadena2);
echo "<h3>3) Unión de las dos cadenas contando las repetidas:</h3>";

echo "<p>Cadena 1 y 2</p> ";
abcRepetido($cadenaUnida);

?>

</body>
</html>

