<doctype html>
    <html lang="">
    <head>
        <title>
            ej6 $cadena[1]
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

            th {
                background-color: yellowgreen;
                color: white;
                border-bottom: white solid 3px;
                padding: 15px;
            }

            td {
                background-color: palegreen;
                text-align: center;
                color: black;
                padding: 15px;
                border: dashed thistle 2px;
            }
        </style>
    </head>
    <body>
    <!--6. Codificar un documento PHP que tenga un array de 10 cadenas.
    Se mostrará en una tabla cuantas veces aparece la letra “r” en cada
    cadena. No se tendrán en cuenta mayúsculas ni minúsculas.

    -->
    <?php
    $miArray = [
            "helloR",
            "PatataR",
            "Celia",
            "volatil",
            "Bye",
            "2º DAW",
        "Recorrer",
        "Trepar",
        "Carro",
        "Carpintero",
        "Tomate"
    ];
    $miArrayAux=$miArray;
    ?>
    <table>
        <?php
        echo '<tr><th>Cadena</th><th>Ocurrencias "r"</th></tr>';

        foreach($miArrayAux as $indice =>$valor){
            echo "<tr><td><b>$valor</b></td>";
            $repeticionesR=0;
            for($i=0; $i < (strlen($valor));$i++){
                if($valor[$i] === 'r'||$valor[$i] === 'R'){
                    $repeticionesR++;
                }

            }
            echo "<td>$repeticionesR</td></tr>";
        }
    ?>
    </table>
    </body>
    </html>
