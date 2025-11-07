<!Doctype html>
<html>

<head>
    <title>Suma</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }
    </style>
</head>

<body>


<h1>5. Declara una variable $num = 0; y otra variable sin valor.</h1>
<?php
$num = 0;
$sinValor = null;
?>
a) Usa isset() y empty() con ambas y muestra los resultados.<br>
<?php
echo 'isset()<br>';
echo isset($num) . "<br>";
echo isset($sinValor) . "<br>";
echo 'empty()<br>';
echo empty($num) . "<br>";
echo empty($sinValor) . "<br>";
?>

b) Usa unset() para destruir $num.<br>
<?php
unset($num);
?>
c) Intenta comprobar su estado otra vez después de usar unset().<br>
<?php
echo isset($num) . "<br>";
echo empty($num) . "<br>";
?>


</body>

</html>
