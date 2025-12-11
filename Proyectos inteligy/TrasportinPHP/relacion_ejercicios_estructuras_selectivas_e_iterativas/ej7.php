<!Doctype html>
<html>

<head>
    <title>Estructuras selectivas e iterativas</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }
        .rojo{
            background: red;
            color: white;
        }
        .rosa{
            background: pink;
            color: white;
        }
        table{
            border-collapse: collapse;
            border: red solid 1px;
        }
        td{
            width: 5em;
            border: red solid 1px;
            text-align: center;
        }
    </style>
</head>

<body>
<p>7. Crear una página en PHP que muestre las tablas de multiplicar. Mostrará
    cada una en una tabla del tipo:
</p>
<table>
<?php
$tabla=1;
$numMul=1;
$uno = 1;
for($i=0;$i<9;$i++){
    echo '<tr>';
    for($j=0;$j<10;$j++){
        if ($uno == 1) {
            echo '<td class="rosa"><strong>' . $tabla . 'x' . $numMul . '</strong></td>';
            echo '<td class="rosa" >' . ($tabla * $numMul) . '</td>';

            $numMul++;
            $uno = 0;
        }else{

            echo '<td class="rojo"><strong>' . $tabla . 'x' . $numMul . '</strong></td>';
            echo '<td class="rojo">' . ($tabla * $numMul) . '</td>';
            $numMul++;
            $uno = 1;
        }

    }
    echo '</tr>';
    $numMul=1;
    $tabla++;
}
?>
</table>
</body>

</html>

