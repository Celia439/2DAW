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
/* se puede hacer uno por uno
$persona [0]= "uno";
$persona[]="dos";
*/
$persona = array("Jorge", "Perez", 35, 1.77, 80, "Moreno", "Soltero");
?>
<table>
    <tr>
        <th>0</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
    </tr>
    <tr>
        <td><?php echo $persona[0]; ?></td>
        <td><?php echo $persona[1]; ?></td>
        <td><?php echo $persona[2]; ?></td>
        <td><?php echo $persona[3]; ?></td>
        <td><?php echo $persona[4]; ?></td>
        <td><?php echo $persona[5]; ?></td>
    </tr>
</table>
</body>

</html>