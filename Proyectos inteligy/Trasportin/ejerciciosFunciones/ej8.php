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
            background-color: rgb(255,0,0);
            text-align: center;
            border: papayawhip solid 2px;
            padding: 1em;
        }
    </style>
</head>
<body>
<?php
//
function imprimirCalendarColorido($colorF,$colorL,$colorFdS,$mes, $diasFestivos){
//Creamos un array asociativo que contiene mes dias del mes y espacios en blanco
$mesYdias=array( "Enero" => [31,0], "Febrero" => [28,0], "Marzo" => [31,0], "Abril" => [30,0],
            "Mayo" => [31,0], "Junio" => [30,0], "Julio" => [31,0], "Agosto" => [31,0],
            "Septiembre" => [30,0], "Octubre" => [31,2], "Noviembre" => [30,0], "Diciembre" => [31,0]
          );
        // Mostrar el mes con los dias de la semana
          echo '<table> <tr><th colspan="7">'.$mes.'</th></tr><tr><th>Lunes</th><th>Martes</th><th>Miercoles</th><th>Jueves</th><th>Viernes</th><th>Sabado</th><th>Domingo</th></tr>';
           $dias7=2;
           echo "<tr>";
               // imprimir dias en blanco dependiendo del mes
           for($i=0;$i<$mesYdias["Octubre"][1];$i++){
                 echo "<td style='background-color: palegoldenrod'></td>";
           }
           // imprimir dias del mes
        for($i=1;$i<=$mesYdias["Octubre"][0];$i++){
            //Depende del dia el color de la celda
           if(in_array($i, $diasFestivos, true)){
                 echo '<td style = "background-color: rgb('.$colorF.');">'.$i.'</td>';
                 $dias7++;
                 //por que 5?
           }else if($dias7=== 6||$dias7 === 5){
               echo '<td style = "background-color: rgb('.$colorFdS.');">'.$i.'</td>';
               $dias7++;
           }else{
               echo '<td style = "background-color: rgb('.$colorL.');">'.$i.'</td>';
               $dias7++;
           }
           if($dias7===7){
               echo "</tr>";
               $dias7=0;
           }
            if($dias7===0){
                echo "<tr>";
            }
       }
        //imprimir dias faltantes si no aparecen
        if($dias7 !== 7){
            for(;$dias7 < 7 ;$dias7++){
                echo "<td style='background-color: palegoldenrod'></td>";
            }
        }

          echo "</table";

}

$festivos=[5,6,8,18] ;
imprimirCalendarColorido("255,0,0","0,0,255","0,255,0","Octubre", $festivos);
?>
</body>
</html>
