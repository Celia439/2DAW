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
    <!-- [A-Z][a-z][0-9][/|#|$|%|]
    -->
    <?php
    $cadenas =["cadena para practicar255", "Cadena252","Ao8#"];
    echo "Cadenas que cumplen la condicón<br>";
    foreach ($cadenas as $cadena){
        if(preg_match("`([A-Z][a-z][0-9][/|#|$|%|])`",$cadena)){
            echo "$cadena ";
        }
    }

    ?>
    </body>
    </html>
