<doctype html>
    <html lang="">
    <head>
        <title>
            ej1 strstr
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
                padding: 8px;
            }

            td {
                background-color: palegreen;
                text-align: center;
                color: black;
                padding: 8px;
            }

        </style>
    </head>
    <body>
    <!--1. Escribir una página en PHP que tenga un array de 5 cadenas. La página
        deberá mostrar en una tabla cada cadena indicando de alguna forma si
        dicha cadena contiene dentro el símbolo ‘p’.
    -->
    <?php
    $cadenas = ['p hola soy celia', 'tengo que esforzarme mas p ', 'aun no es suficiente', 'a la proxima dejare de dudar', 'voy a ser alguien util'];
    ?>
    <table>
        <tr>
            <th><?php echo $cadenas[0] ?></th>
            <th><?php echo $cadenas[1] ?></th>
            <th><?php echo $cadenas[2] ?></th>
            <th><?php echo $cadenas[3] ?></th>
            <th><?php echo $cadenas[4] ?></th>
        </tr>
        <tr>
            <?php
            //primera forma

            foreach ($cadenas as $cadena){
                //srtstr lo que hace es buscar si esta dentro devuelve desde lo encontrado al final
                $encontrado=strstr($cadena,'p');
                if(!empty($encontrado)){
                  echo "<td>$cadena</td>";
                  $encontrado='';
                }

            }

                ?>
        </tr>
    </table>
    </body>
    </html>
