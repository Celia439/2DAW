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


<h1>6. Declara tres variables:</h1>
$edad = 20;<br>
$es_estudiante = true;<br>
$tiene_dni = false;<br>
<?php
$edad = 20;
$es_estudiante = true;
$tiene_dni = false;
?>
<h3>Usa operadores lógicos para evaluar:</h3>
a) ¿Puede entrar en una discoteca si tiene más de 18 y tiene DNI?<br>
<?php
if ($edad > 18 && $tiene_dni) {
    echo "puedes entrar a la discoteca<br>";
} else {
    echo "no puedes entrar<br>";
}
?>
b) ¿Tiene algún beneficio si es estudiante o menor de 25?<br>
<?php
if ($es_estudiante || $edad < 25) {
    echo "Tiene beneficio<br>";
} else {
    echo "no tiene beneficio<br>";
}
?>
c) ¿Es válida la combinación si no tiene DNI?<br>
<?php
if ($tiene_dni) {
    echo "Si <br>";
} else {
    echo "no<br>";
}
?>


</body>

</html>
