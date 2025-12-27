<doctype html>
    <html lang="">
    <head>
        <title>
            ej5 $cadena[1]
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
                background-color: mediumspringgreen;
                color: white;
                border-bottom: mediumspringgreen solid 1px;
                padding: 15px;
                text-align: center;
            }

            td {
                background-color: white;
                text-align: center;
                color: black;
                padding: 15px;
                border-bottom: solid mediumspringgreen 1px;
            }
        </style>
    </head>
    <body>
    <!--5. Crear un documento PHP que simule la función de reemplazo de los
    editores de texto. El documento contendrá un array de varias posiciones
    numéricas y alfanuméricas. Si la posición es una cadena, se
    reemplazarán todas las veces que aparezca una “a” por una “A” y todas
    las veces que aparezca una “b” por una “v”. Se deberán mostrar los
    cambios en una tabla en la que se vean las posiciones antes y después
    del cambio.
    -->
    <?php
    $miArray = [
            10,
            "Patata",
            "Celia",
            "bolatil",
            99,
            "2º DAW"
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
