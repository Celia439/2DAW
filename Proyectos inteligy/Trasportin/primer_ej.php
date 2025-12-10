<!DOCTYPE html>
<html lang="">
<head>
    <title>Ej1</title>
    <style>
        body {
            background-color: red;
            font-size: 3em;
            color: green;
        }
    </style>
</head>
<body><!-- Comentario en HTML -->

<?php
/**
 * @param array $matriz
 * @param array $matriz2
 * @return void
 */
function recorrerlos(array $matriz, array $matriz2): void
{
//recorrerlos
//posicional
    echo "<p>posicional</p>";
    foreach ($matriz as $p) {
        echo $p . ' ';
    }
    echo "<p>asociativo</p>";
//asociativo
    foreach ($matriz2 as $c => $v) {
        echo '<br>' . $c . " => " . $v . '.';
    }
}

echo 'Hola';
//crear array
//posicional
$matriz = [1,2,3,4,5,6,7,8,9,10];
//asociativo
$matriz2=['marcos'=>18,'julia'=>5];

recorrerlos($matriz, $matriz2);

echo "<h3>añadir o modificar</h3>";
//posicional
$matriz[]='nuevo elemento';
$matriz[0]=15;
//asociativo
$matriz2 ['carlos']=6;
$matriz2 ['julia']=15;
recorrerlos($matriz, $matriz2);
echo "<h3>eliminar</h3>";
unset($matriz[0]);

?>
</body>
</html>
