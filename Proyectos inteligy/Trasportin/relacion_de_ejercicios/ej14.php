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
$mascota =array("nombre"=>"Piki", "familia"=> "yo","raza"=>"Agaporni","color"=>"Verde", "peso"=>"1kg", "altura"=>"5cm","edad"=>"?");
?>
<table>
    <tr>
        <th>nombre</th>
        <th>familia</th>
        <th>raza</th>
        <th>color</th>
        <th>peso</th>
        <th>altura</th>
        <th>edad</th>

    </tr>
    <tr>
        <td><?php echo $datos["nombre"]; ?></td>
        <td><?php echo $datos["familia"]; ?></td>
        <td><?php echo $datos["raza"]; ?></td>
        <td><?php echo $datos["color"]; ?></td>
        <td><?php echo $datos["peso"]; ?></td>
        <td><?php echo $datos["altura"]; ?></td>
        <td><?php echo $datos["edad"]; ?></td>
    </tr>
</table>
</body>

</html>