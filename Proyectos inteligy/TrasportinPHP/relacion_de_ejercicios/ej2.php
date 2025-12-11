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
<h1> 2. Declara una variable string con valor "123.45".</h1>
<?php
$cadena = "123.45";
?>
a) Muestra su tipo.<br>
<?php
echo gettype($cadena) . "<br>";
?>
b) Convierte la variable a tipo float, int y booleano usando settype().<br>
c) Después de cada conversión, muestra su tipo y su nuevo valor.<br>
<?php
Settype($cadena, "float");
echo gettype($cadena) . "<br>";
Settype($cadena, "int");
echo gettype($cadena) . "<br>";
Settype($cadena, "boolean");
echo gettype($cadena) . "<br>";
?>


</body>

</html>
