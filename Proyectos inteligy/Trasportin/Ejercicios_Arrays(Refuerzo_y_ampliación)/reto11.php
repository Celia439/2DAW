<!DOCTYPE html>
<html>
<head>
    <title>ej1</title>
    <style>
        body {
            background-color: lightblue;
        }

        table {
            margin-top: 2em;
            margin-left: 25%;
            background-color: palevioletred;
            color: white;
            border-collapse: collapse;
        }

        th {
            background-color: palevioletred;
            color: #333333;
            padding: 2em;
            border: papayawhip dashed 2px;

        }

        td {
            text-align: center;
            border: papayawhip solid 2px;
            padding: 1em;
        }
    </style>
</head>
<body>
<?php
//declarar array
$alumnos=[];
$modulos=[];
//a) mostar en una tala el modulo y los tres trismestres sin importar el alumno
//(no creo que sea así pero no tengo el enunciuado)
echo "<table>";
    echo "<tr><th>1º</th><th>2º</th><th>3º</th><th>Modulo</th></tr>";
$filas=0;
foreach($modulos as $modulo){

foreach($alumnos as $alumno => $modulos){
foreach($modulos as $moduloAct=>$notas){
if($moduloAct==$modulo){
$filas++;
echo "<tr>";
    foreach($notas as $nota){
    echo "<td>$nota<td>";
    }
echo "</tr>";
}
echo "<tr>$modulo<tr>";

}

}

}
echo "</table>";


?>
</body>
</html>
