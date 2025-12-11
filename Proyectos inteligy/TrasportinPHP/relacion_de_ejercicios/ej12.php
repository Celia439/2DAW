<!Doctype html>
<html>

<head>
    <title>Suma</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
            font-family: cursive;
        }
        table {
            margin: 1em;
            border: 1px black solid;
            background-color: red;
            border-collapse: collapse;

        }

        td {
            border: 1px white solid;
            padding: 1em;
            background-color: rgb(167, 249, 206);
            color: black;
        }

        th {
            color: white;
            border: 1px white solid;
            padding: 1em;
            background-color: rgb(155,187,89);
        }
    </style>
</head>

<body>
<?php
$datos=array("Nombre"=>"Celia","Apellidos"=>"Caravava Vega","Edad"=>19,"Salario"=>0.50,"Fecha nacimiento"=>"30/10/2005");
?>
<table>
    <tr>
        <th>Nombre</th>
        <td><?php echo $datos["Nombre"]; ?></td>
    </tr>
    <tr>
        <th>Apellidos</th>
        <td><?php echo $datos["Apellidos"]; ?></td>
    </tr>
    <tr>
        <th>Edad</th>
        <td><?php echo $datos["Edad"]; ?></td>
    </tr>
    <tr>
        <th>salario</th>
        <td><?php echo $datos["Salario"]; ?></td>
    </tr>
    <tr>
        <th>Fecha de nacimiento</th>
        <td><?php echo $datos["Fecha nacimiento"]; ?></td>
    </tr>
</table>
</body>

</html>
