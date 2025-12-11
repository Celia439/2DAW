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
<p>16.Crear una página en PHP que, utilizando un array, muestre los números del
    20 al 300 y después muestre la suma de todos ellos.
</p>



<?php
// se puede poner un array con range(20, 300);
$array=[20,300];
$suma=0;
for($i=$array[0];$i<$array[1];$i++){
    echo $i." ";
    $suma=+$i;
}
echo "la suma del 20 al 300 es ".$suma;
?>
</body>

</html>
