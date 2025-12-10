<!DOCTYPE html>
<html>
<head>
    <title>ej1</title>
    <style>
        body {
            background-color: lightblue;
        }

        table {
            margin-top: 2em;
            margin-left: 25%;
            background-color: palevioletred;
            color: white;
            border-collapse: collapse;
        }

        th {
            background-color: palevioletred;
            color: #333333;
            padding: 2em;
            border: papayawhip dashed 2px;

        }

        td {
            text-align: center;
            border: papayawhip solid 2px;
            padding: 1em;
        }
    </style>
</head>
<body>
<?php
// declarar los arrays nesesarios

// secuencial a)
$nums = [];

for ($i = 0; $i <= 30; $i++) {
    try {
        $nums[$i] = random_int(0, 15);
    } catch (\Random\RandomException $e) {

    }
}
//asociativo
$num_repeticiones = [];
//ordenar array (ir almacenando en otras variables para no perder el original)
sort($nums);

// ir recorriendo y encontrando cuanto se repiten para
//  meterlo en array asociativo b)

$repeticiones = 0;
$numAct = $nums[0];
echo "<br>";
foreach ($nums as $num) {
    if ($num === $numAct) {
        $repeticiones++;
    } else {
        $num_repeticiones[$numAct] = $repeticiones;
        $numAct = $num;
        $repeticiones = 1;
    }
}
// guardar el ultimo num
$num_repeticiones[$numAct] = $repeticiones;

// Mostrar los numeros y sus tepeticiones en una tabla c)
echo "<table>";
echo "<tr> <th>Número</th><th>Repeticiones</th>";
foreach ($num_repeticiones as $numero => $repetido) {
    echo "<tr><td>$numero</td><td>$repetido</td></tr>";
}
echo "</table>";
// d)e) ordenar por valor el array asociativo
$num_repeticionesOrd=$num_repeticiones;
asort($num_repeticionesOrd);
// recorrer el array para obtener los minimos y meterlos en un array secuencial
$minimos = [];
$cambio = true;
$min_repetido = current($num_repeticionesOrd);
$indice = 0;
while ($cambio) {
    $valor = current($num_repeticionesOrd);
    if ($valor === $min_repetido) {
        $minimos[$indice] = key($num_repeticionesOrd);
        $indice++;
        next($num_repeticionesOrd);
    } else {
        $cambio = false;
    }

}
// print_r y otro que es doom
// recorer el array pero al reves para pillar los maximos
$num_repeticionesR =$num_repeticionesOrd;
arsort($num_repeticionesR);
$maximos = [];
$cambio = true;
$max_repetido = current($num_repeticionesR);
$indice = 0;
while ($cambio) {
    $valor = current($num_repeticionesR);
    if ($valor === $max_repetido) {
        $maximos[$indice] = key($num_repeticionesR);
        next($num_repeticionesR);
        $indice++;
    } else {
        $cambio = false;
    }
}
// e imprimirlos
if(count($maximos)===1){
    echo "<p> El num que más se repite es";
    }else {
    echo "<p> Los num que más se repiten son";
}
foreach ($maximos as $max) {
    echo " $max ";
}
echo "</p>";
if(count($minimos)===1){
    echo "<p> El num que menos se repite es";
}else {
    echo "<p> Los num que menos se repiten son";
}
foreach ($minimos as $min) {
    echo " $min ";
}
echo "</p>";
/*
echo "<br>prueba tonta<br>";
$array=[1=>2,3=>4,5=>2,];
$arrayR=array_reverse($array, true);
foreach ($arrayR as $x =>$y){
    echo "-".key($arrayR)." => $y-";
    next($arrayR);
}
*/
?>

</body>
</html>
