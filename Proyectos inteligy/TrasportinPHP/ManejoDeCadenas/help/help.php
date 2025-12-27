<doctype html>
    <html lang="">
    <head>
        <title>
            ej1 help
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
                padding: 3px;
            }

            td {
                text-align: center;
                color: black;
                padding: 3px;
            }

        </style>
    </head>
    <body>
    <?php
    $cadena = "Saludos";
    echo '<table>';
    echo "<tr><th>Caracter</th><th>Posicion</th></tr>";
    $a = 1;
    extracted($cadena, $a);
    echo '</table>';
    ?>
    </body>
    </html>