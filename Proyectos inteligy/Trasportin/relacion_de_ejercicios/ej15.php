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
$numeros = array(3, 2, 8, 123, 5, 1);
sort($numeros);
?>
<table>
    <tr>
        <td><?php echo $numeros[0]; ?></td>
    </tr>
    <tr>
        <td><?php echo $numeros[1]; ?></td>
    </tr>
    <tr>
        <td><?php echo $numeros[2]; ?></td>
    </tr>
    <tr>
        <td><?php echo $numeros[3]; ?></td>
    </tr>
    <tr>
        <td><?php echo $numeros[4]; ?></td>
    </tr>
    <tr>
        <td><?php echo $numeros[5]; ?></td>
    </tr>
  
</table>
</body>

</html>