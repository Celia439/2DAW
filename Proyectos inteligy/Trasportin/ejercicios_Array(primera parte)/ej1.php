<!DOCTYPE html>
<html>
<head>
    <title>array1</title>
    <style>
        table {
            background-color: white;
            font-family: cursive;
            text-align: left;
            border-collapse: collapse;
        }

        th {
            background-color: blueviolet;
            color: white;
            width: 28em;
        }

        td {
            border: blueviolet solid 2px;
            width: 28em;
        }
    </style>
</head>
<body>
<?php
//declarar el array donde se introduceran 12 num aleatorios
$nums = [];
for ($i = 0; $i <= 12; $i++) {
    $nums[$i] = mt_rand(0, 10);
}
?>
<table>
    <tr>
        <th>Vector original</th>

        <th><?php
            // implode hace que entre elementos pone un caracter implode("-","$num");
            $indice=0;
            foreach ($nums as $num) {
                if($indice === count($nums)-1){
                    echo  $num ;
                }else {
                echo  $num . "-";
                $indice++;
                }
            }
            ?></th>
    </tr>
    <tr>
        <td>Mayor</td>
        <?php
        $mayor = 0;
        for ($i = 0, $iMax = count($nums); $i < $iMax; $i++) {
            if ($nums [$i] > $mayor) {
                $mayor = $nums[$i];
            }
        }
        echo "<td>$mayor</td>";
        ?>
    </tr>
    <tr>
        <td>Menor</td>
        <?php

        $menor = 10;
        for ($i = 0, $iMax = count($nums); $i < $iMax; $i++) {
            if ($nums [$i] < $menor) {
                $menor = $nums[$i];
            }
        }
        echo "<td>$menor</td>";
        ?>
    </tr>
    <tr>
        <td>Vector inverso</td>
        <td>
            <?php
            $indice=0;
            $rev= array_reverse($nums);
            foreach ($rev as $i) {
                if($indice === count($nums)-1){
                    echo  $i ;
                }else {
                    echo  $i . "-";
                    $indice++;
                }
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>Vector ordenado</td>
        <td>
            <?php
            sort($nums);
            foreach ($nums as $num) {
                echo  $num . "-";
            }
            ?>
        </td>
    <tr>
        <td>Vectores solo pares</td>
        <td>
            <?php
            foreach ($nums as $num) {
                if (($num % 2) === 0) {
                    echo  $num . "-";
                }
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>Vectores solo impares</td>
        <td>
            <?php
            foreach ($nums as $num) {
                if (($num % 2) !== 0) {
                    echo $num . "-";
                }
            }
            ?>
        </td>
    </tr>
</table>

</body>
</html>
