<doctype html>
    <html lang="">
    <head>
        <title>
            ej3 .
        </title>
        <style>
            body {
                background-color: lightblue;
            }
        </style>
    </head>
    <body>
    <!-- comprobar si las cadenas del array cumplen el patron ^[A-Z][a-z]{2,}[0-9]{3}$
    empieza por dos letras o mas y termina con tres numeros
    -->
    <?php
    $cadenas =["cadena para practicar255", "C  adena252","cadena3"];
    echo "Cadenas que cumplen la condicón<br>";
    foreach ($cadenas as $cadena){
        if(preg_match("`^([A-Z][a-z]{2,})([0-9]{3})$`",$cadena)){
            echo "$cadena, ";
        }
    }

    ?>
    </body>
    </html>
