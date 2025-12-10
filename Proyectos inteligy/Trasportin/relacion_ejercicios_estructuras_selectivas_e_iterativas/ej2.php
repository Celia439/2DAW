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
<p>Dada una variable $edad, muestra en qué grupo entra:
    • Niño (0-12)
    • Adolescente (13-17)
    • Adulto (18-64)
    • Jubilado (65+)
</p>
<?php
$edad=18;
echo $edad."\n";
switch ($edad){
    case $edad>0 && $edad<12:
        echo "Niño";
        break;
    case $edad>13 && $edad>17:
        echo "Adolescente";
        break;
    case $edad>18 && $edad<64:
        echo "Adulto";
        break;
    case $edad>65:
        echo "Jubilado";
        break;



}


?>


</body>

</html>
