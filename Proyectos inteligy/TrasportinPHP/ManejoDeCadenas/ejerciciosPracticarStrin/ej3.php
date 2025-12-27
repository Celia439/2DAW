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

            table {
                border-collapse: collapse;
                margin: 25%;
                border: white solid 1px;
            }

            th {
                background-color: yellowgreen;
                color: white;
                border-bottom: white solid 3px;
                padding: 2em;
            }

            td {
                background-color: palegreen;
                text-align: center;
                color: black;
                padding: 2em;

            }
        </style>
    </head>
    <body>
    <!--3. Codificar un documento PHP que partiendo de una cadena de
        caracteres cualquiera, la rellene con 5 “-“ por delante y 3 “,” por detrás.
        Después mostrará en una tabla la cadena antes de la transformación y
        después de la transformación.
    -->
    <?php
    $cadenas = "cadena para practicar";

    //$cadenasMod = str_pad($cadenas, (strlen($cadenas)+5), '-', STR_PAD_LEFT);
    //$cadenasMod = str_pad($cadenasMod, (strlen($cadenas)+3), ',', STR_PAD_RIGHT);
    $cadenasMod = str_pad($cadenas, 26, '-', STR_PAD_LEFT);
    $cadenasMod = str_pad($cadenasMod, (strlen($cadenasMod)+3), ',', STR_PAD_RIGHT);
    ?>
    <table>
        <tr>
            <th>Original</th>
            <th>Modificada</th>
        </tr>
        <tr>
            <td><?php echo $cadenas ?></td>
            <td><?php echo $cadenasMod ?></td>
        </tr>
    </table>
    </body>
    </html>
