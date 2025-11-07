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
<p>4. Dada una nota numérica del 0 al 10,
    muestra el resultado textual:
    "Suspenso"
    "Aprobado"
    "Notable"
    "Sobresaliente".
</p>
<?php
$nota = 5;
switch ($nota) {
    case ($nota >= 0 && $nota <= 4):
        echo "Suspenso";
        break;
    case $nota == 5:
        echo "Aprobado";
        break;
    case $nota == 6:
        echo "Notable";
        break;
    case ($nota >= 7 && $nota <= 10):
        echo "Sobresaliente";
        break;
    default:
        echo "Nota no válida";
        break;
}
?>

</body>

</html>
