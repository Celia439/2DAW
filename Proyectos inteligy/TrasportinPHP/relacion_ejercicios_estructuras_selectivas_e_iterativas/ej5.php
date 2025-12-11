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
<p>5. Crea un archivo PHP que muestre los números del 1 al 100 en una tabla
    HTML con 10 columnas por fila. Aplica algo de CSS para darle formato a la
    tabla.
</p>
<table border="1" cellspacing="0" cellpadding="5">
<?php
$numAct=0;
for($i=0;$i<10;++$i){
   echo '<tr>';
   for ($j=0;$j<10;++$j){
       $numAct++;
       echo '<td>'.$numAct.'</td>';
   }
   echo '</tr>';
}

?>
</table>

</body>

</html>
