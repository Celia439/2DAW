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
<p>15.Codificar una página web que cree un array de al menos 7 posiciones y
    muestre todos los valores que tenga el array. Al final, también deberá
    mostrarse la suma y la media de todos los valores numéricos que haya en el
    array, indicando cuántos valores numéricos se han encontrado.
</p>



<?php
    //Declarar array con valores
    $array=[ "aceitunas","lehuga" ,"tomate" , "mayonesa","atun",1,2,3,4 ];
    //Declarar la variable para contar numeros y la cantidad de números
    $suma=0;
    $cantidad=0;
    //Mostrar los valores del array
foreach ($array as $ingredientes){
    echo "- ".$ingredientes."<br>";
    if(is_numeric($ingredientes)){
        $suma+=$ingredientes;
        $cantidad++;
    }
}
echo "Se ha encontrado $cantidad números en el array";
echo "Y su media es ".($resultado=$suma/$cantidad);

?>
</body>

</html>
