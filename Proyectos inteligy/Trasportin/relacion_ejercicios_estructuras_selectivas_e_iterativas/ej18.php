<!Doctype html>
<html>

<head>
    <title>Estructuras selectivas e iterativas</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }
        table{
            border-collapse: collapse;
        }
        th{
            background: black;
            color: white;
            border: solid white 2px;
            padding: 5em;
        }
        td{
            background: green;
            color: white;
            padding: 5em;
        }

    </style>
</head>

<body>
<p>18.Crear un documento PHP que cree un array de al menos 4 posiciones.
    Después el documento mostrará una tabla como la que se ve a
    continuación:
</p>


<table>
    <tr>
        <th>Número</th>
        <th>Cuadrado</th>
        <th>Cubo</th>
    </tr>
    <?php
//Array con numeros
$nums=array(26,20,16,14,25,29,9);
foreach ($nums as $num){
    echo "<tr>";
            echo "<td>".$num."</td>";
            echo "<td>".pow( $num,2 )."</td>";
            echo "<td>".pow( $num,3 )."</td>";
    echo "</tr>";
}
?>
</table>
</body>

</html>
