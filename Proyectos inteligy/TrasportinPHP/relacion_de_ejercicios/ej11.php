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
$datos=["Nombre","Apellidos","Edad","Salario","Fecha nacimiento"];
?>
<table>
    <tr>
        <th>0</th>
        <td><?php echo $datos[0]; ?></td>
    </tr>
    <tr>
        <th>1</th>
        <td><?php echo $datos[1]; ?></td>
    </tr>
    <tr>
        <th>2</th>
        <td><?php echo $datos[2]; ?></td>
    </tr>
    <tr>
        <th>3</th>
        <td><?php echo $datos[3]; ?></td>
    </tr>
    <tr>
        <th>4</th>
        <td><?php echo $datos[4]; ?></td>
    </tr>
</table>
</body>

</html>
