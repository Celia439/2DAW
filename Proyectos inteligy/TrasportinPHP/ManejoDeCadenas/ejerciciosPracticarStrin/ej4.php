<doctype html>
    <html lang="">
    <head>
        <title>
            ej4 $cadena[0]
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
                background-color: white;
                color: black;
                border: purple solid 2px;
                padding: 15px;
                text-align: center;
            }

        </style>
    </head>
    <body>
    <!--4 Escribir una página en PHP que contenga 5 cadenas de caracteres. El
    código PHP deberá comprobar si las cadenas de caracteres comienzan
    igual en parejas de 2. Para considerar que empiezan igual deberán tener
    al menos los 3 primeros caracteres iguales. Mostrar el resultado en una
    tabla de colores
    -->
    <?php
    $cadena1 = "agua";
    $cadena2 = "azul";
    $cadena3 = "aguacero";
    $cadena4 = "azucar";
    $cadena5 = "romero";
    /**
     * Comprueba si las cadenas pasadas por parametro son iguales
     * en el caso de que las tres primeras letras sean iguales devuelve true
     * el en caso contrario false
     *
     * @param $parametro1
     * @param $parametro2
     * @return bool
     */
    function soniguales($parametro1, $parametro2): bool
    {
        $iguales = false;
        if ($parametro1[0] === $parametro2[0] && $parametro1[1] === $parametro2[1] && $parametro1[2] === $parametro2[2]) {
            $iguales = true;
        }
        return $iguales;
    }

    /**
     * Le pasamos un array de cadenas y compara una por una con entre si
     * utiliza el metodo son iguales para compararlas y pintar la celda de
     * una tabla verde si son iguales y roja si no lo son
     *
     * @param $cadenas
     * @return void
     */
    function compararCadenas($cadenas): void
    {
        foreach ($cadenas as $cadenaComparar) {
            echo "<tr>";
            echo "<th>$cadenaComparar</th>";
            foreach ($cadenas as $cadena) {
                if (soniguales($cadenaComparar, $cadena)) {
                    echo "<th style='background-color: green'></th>";
                } else {
                    echo "<th style='background-color: red'></th>";
                }
            }
            echo "</tr>";
        }
    }

    $cadenas = [$cadena1, $cadena2, $cadena3, $cadena4, $cadena5];
    ?>
    <table>
        <tr>
            <th></th>
            <?php
            foreach ($cadenas as $cadena) {
                echo "<th>$cadena</th>";
            }
            ?>

        </tr>
        <?php compararCadenas($cadenas); ?>

    </table>
    </body>
    </html>
