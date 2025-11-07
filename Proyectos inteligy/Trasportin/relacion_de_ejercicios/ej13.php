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
            background-color: rgb(204, 192, 217);
            color: black;
            width: 7em;

        }

        th {
            width: 10em;
            text-align: left;
            color: white;
            border: 1px white solid;
            padding: 1em;
            background-color: rgb(112, 48, 160);
        }
    </style>
</head>

<body>
<?php
$datos = ["X", "Y", "Z", "X+Y", "Y*Z", "X/Z", "X+Y+Z", "(Y+Z/X)"];
?>
<table>
    <tr>
        <th>Posición 0:</th>
        <td><?php echo $datos[0]; ?></td>
    </tr>
    <tr>
        <th>Posición 1:</th>
        <td><?php echo $datos[1]; ?></td>
    </tr>
    <tr>
        <th>Posición 2:</th>
        <td><?php echo $datos[2]; ?></td>
    </tr>
    <tr>
        <th>Posición 3:</th>
        <td><?php echo $datos[3]; ?></td>
    </tr>
    <tr>
        <th>Posición 4:</th>
        <td><?php echo $datos[4]; ?></td>
    </tr>
    <tr>
        <th>Posición 5:</th>
        <td><?php echo $datos[5]; ?></td>
    </tr>
    <tr>
        <th>Posición 6:</th>
        <td><?php echo $datos[6]; ?></td>
    </tr>
    <tr>
        <th>Posición 7:</th>
        <td><?php echo $datos[7]; ?></td>
    </tr>
</table>
</body>

</html>