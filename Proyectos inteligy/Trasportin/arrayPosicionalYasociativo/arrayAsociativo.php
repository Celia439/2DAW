<!Doctype html>
<html>

<head>
    <title>Array Posicional</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;

            table {
                margin: 1em;
                border: 1px black solid;
                background-color: red;
                color: white;
                font-family: monospace;
                border-collapse: collapse;

            }

            td {
                border: 1px black solid;
                padding: 1em;
                background-color: rgb(255, 182, 182);
                color: black;
            }

            th {
                border: 1px black solid;
                padding: 1em;
            }
        }
    </style>
</head>

<body>
<?php
/* la forma de declararlo de seguido
$persona =array( 'nombre' => "Jorge",
        'Apellido' => "Perez");
*/
$persona  ['nombre'] = "Jorge";
$persona  ['Apellido'] = "Perez";
$persona  ['Edad'] = 35;
$persona  ['Altura'] = 1.77;
$persona  ['Peso'] = 80;
$persona  ['Pelo'] = "Moreno";
$persona  ['Estado'] = "Soltero";
?>
<table>
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Edad</th>
        <th>Altura</th>
        <th>Peso</th>
        <th>Pelo</th>
        <th>Estado</th>
    </tr>
    <tr>
        <td><?php echo $persona['nombre']; ?></td>
        <td><?php echo $persona['Apellido']; ?></td>
        <td><?php echo $persona['Edad']; ?></td>
        <td><?php echo $persona['Altura']; ?></td>
        <td><?php echo $persona['Peso']; ?></td>
        <td><?php echo $persona['Pelo']; ?></td>
        <td><?php echo $persona['Estado']; ?></td>
    </tr>
</table>
</body>

</html>