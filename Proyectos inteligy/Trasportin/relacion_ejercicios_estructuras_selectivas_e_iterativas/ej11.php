<!Doctype html>
<html>

<head>
    <title>Estructuras selectivas e iterativas</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }
        .azul{
            background: blue;
            color: white;
        }
        .verde{
            background: green;
            color: white;
        }
        .rojo{
            background: red;
            color: white;
        }
    </style>
</head>

<body>
<p>11Crea un array con 7 temperaturas de la semana.
    • Si la temperatura < 10º, color azul.
    • Entre 10 y 25, color verde.
    • Mayor a 25, rojo.
</p>



<?php
//Temperaturas de la semana
    $temperaturas=array('lunes'=>26,'martes'=>20,'miercoles'=>16,'jueves'=>14,'viernes'=>25,'sabado'=>29,'domingo'=>9);
foreach ($temperaturas as $clave => $valor) {
    if ($valor < 10) {
    echo '<div class="azul">'.$clave.$valor.'</div>';
    }elseif($valor >= 10 && $valor < 25){
        echo '<div class="verde">'.$clave.$valor.'</div>';
    }else{
        echo '<div class="rojo">'.$clave.$valor.'</div>';
    }
}
?>
</body>

</html>
