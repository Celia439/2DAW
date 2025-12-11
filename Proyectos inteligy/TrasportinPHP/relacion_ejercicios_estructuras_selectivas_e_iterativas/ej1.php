<!Doctype html>
<html>

<head>
    <title>Estructuras selectivas e iterativas</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }
        .par{
            background: red;
            color: white;
        }
        .impar{
            background: blue;
            color: white;
        }
    </style>
</head>

<body>
<p>1. Muestra del 1 al 50 indicando si cada número es par o impar. Usa etiquetas
"< div >" con diferente color de fondo para pares e impares</p>
<?php
for($i=0;$i<=50;++$i){
    if($i%2==0){
    echo '<div class="par">'.$i.'</div>';
    }else{
        echo '<div class="impar">'.$i.'</div>';
    }
}

?>


</body>

</html>
