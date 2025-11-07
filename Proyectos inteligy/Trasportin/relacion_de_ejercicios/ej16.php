<!Doctype html>
<html>

<head>
    <title>16</title>
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
$numeros =array(5 => 1, 12 => 2, 13 => 56, 'x' => 42 );
?>
<table>
    <tr>
        <td><?php echo $numeros[5]; ?></td>
    </tr>
    <tr>
        <td><?php echo $numeros[12]; ?></td>
    </tr>
    <tr>
        <td><?php echo $numeros[13]; ?></td>
    </tr>
    <tr>
        <td><?php echo $numeros['x']; ?></td>
    </tr>
  
</table>
<p><?php echo "hay ". count($numeros)." numeros en el array";
    unset($numeros[5]);
    ?></p>
<table>
    <tr>
        <td><?php echo $numeros[5]; ?></td>
    </tr>
    <tr>
        <td><?php echo $numeros[12]; ?></td>
    </tr>
    <tr>
        <td><?php echo $numeros[13]; ?></td>
    </tr>
    <tr>
        <td><?php echo $numeros['x']; ?></td>
    </tr>
</table>
</body>

</html>