<doctype html>
    <html lang="">
    <head>
        <title>
            ej8 str_replace()
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
    <!-- 8. Codificar un documento PHP que contenga una serie de cadenas. El
    documento eliminará de cada cadena los espacios que haya en blanco,
    mostrando en una tabla la cadena antes y después del cambio.
    -->
    <?php
    $cadenas = [
            "Moto cro",
            "hola mundo ",
            "que pasa ?",
            "saca corcho ",
    ];
    ?>
    <table>
        <?php
        echo '<tr><th>Antes</th><th>Despues</th></tr>';
        $cadenasAux=$cadenas;
        foreach($cadenasAux as $cadena){
            echo "<tr><td>$cadena</td>";
           $cadena= str_replace(' ','',$cadena);
            echo "<td>".$cadena."</td></tr>";

        }
    ?>
    </table>
    </body>
    </html>
