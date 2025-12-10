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

<h1>4. Declara tres variables:</h1>
$var1 = 5;<br>
$var2 = "5";<br>
$var3 = 10;<br>
<?php
$var1 = 5;
$var2 = "5";
$var3 = 10;
?>
a) Compara $var1 y $var2 usando == y === y explica la diferencia.<br>
<?php
echo $var1 == $var2 . "<br>";
echo $var1 === $var2 . "<br>";
?>
<p> En el primer caso usando == estas comparando solo por contenido por lo que será true.</p>
<p>En el segundo caso usando === dara false ya que a parte de comparar lo primero comprobará el tipo.</p>
b) Compara $var1 con $var3 usando operadores: >, <, >=, <=<br>

c) Muestra un mensaje para cada comparación, indicando si la
condición se cumple o no.<br>
<<br>
<?php
echo $var1 < $var3 . "<br>";
?>
><br>
<?php
echo $var1 > $var3 . "<br>";
?>
<=<br>
<?php
echo $var1 <= $var3 . "<br>";
?>
>=<br>
<?php
echo $var1 >= $var3 . "<br>";
?>


</body>

</html>
