<doctype html>
    <html lang="">
    <head>
        <title>
            ej7 preg_match()
        </title>
        <style>
            body {
                background-color: lightblue;
            }
            table {
                border-collapse: collapse;
                margin: 25%;
                border: white solid 1px;
            }

            table {
                border-collapse: collapse;
                margin: 25%;
                border: white solid 1px;
            }
            th{
             background-color: skyblue;
                border: solid cornflowerblue 2px;
                border-bottom: cornflowerblue double;
                text-align: center;
                padding-left: 5px;
                padding-right: 5px;
            }
            td {
                background-color: white;
                color: black;
                border: cornflowerblue solid 2px;
                padding-left: 5px;
                padding-right:5px;
            }
        </style>
    </head>
    <body>
    <!-- 7. Codificar un documento PHP que tenga un array de varias cadenas. El
        documento comprobará si dichas cadenas:
    a. Tienen dentro varias “r” seguidas (rojo)
    b. Tienen el carácter “h” 6 veces o el carácter “b” 3 veces (verde)
    c. Contienen la cadena “aba” (azul)
    d. Contienen sólo números (amarillo)
    -->
    <?php
    $cadenasMixta = [
            "Moto",
            "arrtr",
            "32156486541",
            "Hablaba",
            "bbbbb",
    ];
    ?>
    <table>
        <?php
        echo '<tr><th>Cadena</th><th>Resultado</th></tr>';

        foreach($cadenasMixta as $cadena){
            echo "<tr><td>$cadena</td>";

                if(preg_match("`(rr+)`",$cadena)){
                    echo "<td style='background-color: red'></td></tr>";

                }elseif (preg_match("(aba)",$cadena)){
                    echo "<td style='background-color: blue'></td></tr>";
                }elseif (preg_match("(\d+)",$cadena)){
                    //[0-9]+
                    echo "<td style='background-color: yellow'></td></tr>";

                }elseif (preg_match('(h{6}|b{3})',$cadena)){
                    echo "<td style='background-color: green'></td></tr>";
                }else{
                    echo "<td></td></tr>";

                }


        }
    ?>
    </table>
    </body>
    </html>
