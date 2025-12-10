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
<h1>Declara cinco variables que contengan los siguientes valores:</h1>
• Un número entero<br>
• Un número decimal<br>
• Una cadena de texto<br>
• Un valor booleano<br>
• Un valor null<br>

<p>
    <?php
    $num1 = 1;
    $num2 = 3.14;
    $num3 = "Cadena de texto";
    $num4 = true;
    $num5 = null;
    echo $num1 . "<br>";
    echo $num2 . "<br>";
    echo $num3 . "<br>";
    echo $num4 . "<br>";
    echo $num5 . "<br>";
    ?>
</p>
<h3>Para cada variable:</h3>
a) Muestra su valor y su tipo usando gettype().<br>
<?php
echo gettype($num1) . "<br>";
echo gettype($num2) . "<br>";
echo gettype($num3) . "<br>";
echo gettype($num4) . "<br>";
echo gettype($num5) . "<br>";
?>
b) Usa funciones is_int(), is_float(), is_string(), is_bool() para identificar
su tipo<br>
is_int()<br>
<?php
echo is_int($num1) . "<br>";
echo is_int($num2) . "<br>";
echo is_int($num3) . "<br>";
echo is_int($num4) . "<br>";
echo is_int($num5) . "<br>"; ?>
is_float()<br>
<?php
echo is_float($num1) . "<br>";
echo is_float($num2) . "<br>";
echo is_float($num3) . "<br>";
echo is_float($num4) . "<br>";
echo is_float($num5) . "<br>"; ?>
is_string()<br>
<?php
echo is_string($num1) . "<br>";
echo is_string($num2) . "<br>";
echo is_string($num3) . "<br>";
echo is_string($num4) . "<br>";
echo is_string($num5) . "<br>"; ?>
is_bool()<br>
<?php
echo is_bool($num1) . "<br>";
echo is_bool($num2) . "<br>";
echo is_bool($num3) . "<br>";
echo is_bool($num4) . "<br>";
echo is_bool($num5) . "<br>"; ?>

c) Indica si están definidas (isset()) y si están vacías (empty())<br>
isset()<br>
<?php
echo isset($num1) . "<br>";
echo isset($num2) . "<br>";
echo isset($num3) . "<br>";
echo isset($num4) . "<br>";
echo isset($num5) . "<br>"; ?>
empty()<br>
<?php
echo empty($num1) . "<br>";
echo empty($num2) . "<br>";
echo empty($num3) . "<br>";
echo empty($num4) . "<br>";
echo empty($num5) . "<br>"; ?>


</body>

</html>

