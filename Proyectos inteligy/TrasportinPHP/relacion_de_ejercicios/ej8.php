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


<h1>8. Simula que un usuario introduce un dato (por ejemplo: $entrada = "0";).</h1>
<?php
  $entrada = 3;
?>
a) ¿Está definida?<br>

<?php
echo isset($entrada) . "<br>";
?>
b) ¿Está vacía?<br>
<?php
echo empty($entrada) . "<br>";
?>
c) ¿Es numérica?<br>
<?php
echo is_nan($entrada) . "<br>";
?>
Según el tipo y valor de $entrada, muestra mensajes diferentes.<br>


</body>

</html>
