<!Doctype html>
<html>

<head>
    <title>vehiculo</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }
    </style>
</head>

<body>

<?php
$kmRecorridos = 50;
$combustibleConsumido = 20;
?>
<p>Km Recorridos<?php echo $kmRecorridos ?></p>
<p>Combustible consumido<?php echo $combustibleConsumido ?></p>
<h3>Consumo por medio Km</h3>
<p><?php echo $consumoMedioKm =  $combustibleConsumido/ $kmRecorridos; ?></p>
</body>

</html>
