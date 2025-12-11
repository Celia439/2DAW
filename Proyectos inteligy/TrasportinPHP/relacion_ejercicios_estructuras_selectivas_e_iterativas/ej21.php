<!Doctype html>
<html>

<head>
    <title>Estructuras selectivas e iterativas</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }
    </style>
</head>

<body>
<p>21.Crear un documento PHP que cree un vector con 15 posiciones. El vector
    contendrá valores entre 0 y 10. Mostrar después una tabla con las notas
    reales obtenidas por los alumnos: 0 – 4 = Suspenso, 5 = Aprobado, 6 = Bien,
    7 – 8 = Notable, 9 = Sobresaliente, 10 = Matrícula de honor.
</p>



<?php
$vectores = array(rand(0,10), rand(0,10), rand(0,10), rand(0,10), rand(0,10),rand(0,10), rand(0,10), rand(0,10), rand(0,10), rand(0,10),rand(0,10), rand(0,10), rand(0,10), rand(0,10), rand(0,10));
?>
<table>
    <tr>
        <th>Notas obtenidas por los alumnos</th>
        <th>Resultado</th>
    </tr>

    <?php
    foreach ($vectores as $vector){
        echo "<tr>";
        echo "<td>$vector</td>";
        if($vector>=0 && $vector<=4){
            echo "<td>Suspenso</td>";
        }elseif ($vector==5){
            echo "<td>Aprobado</td>";
        }elseif ($vector==6){
            echo "<td>Bien</td>";
        }elseif ($vector==7 || $vector==8){
            echo "<td>Notable</td>";
        }elseif ($vector==9){
            echo "<td>Sobresaliente</td>";
        }else{
            echo "<td>Matrícula de honor</td>";
        }
        echo "</tr>";
    }
    ?>

</table>
</body>

</html>
