<doctype html>
    <html lang="">
    <head>
        <title>
            ej2 strpbrk()
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
    <!--2. Codificar un documento PHP que tenga un array de varias cadenas. El
        documento mostrará para cada una de las cadenas si contienen alguno
        de los siguientes caracteres: $, C, / o @. Con que la cadena contenga
        uno de ellos es suficiente.
    -->
    <?php
    $cadenas = [' @hola soy celia', 'tengo que esforzarme mas  ', '/aun no@ es suficiente', 'a/ la proxima dejare de dudar', 'voy a ser alguien uti$l'];
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
                $caracteres='$C/@';
            foreach ($cadenas as $cadena){
                // strpbrk lo que hace es comprobar si en la cadena aparece el caracter
                $encontrado=strpbrk($cadena,$caracteres);
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
