<!doctype html>
<html>
<head>
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
<h2>Ejercicio14</h2>

<form action="ej14a.php" method="get">
    <input type="text" name="pal1" placeholder="Introduce palabra">
    <input type="text" name="pal2" placeholder="Introduce palabra">
    <input type="text" name="pal3" placeholder="Introduce palabra">
    <input type="text" name="pal4" placeholder="Introduce palabra">
    <input type="text" name="pal5" placeholder="Introduce palabra">
    <input type="number" name="letras" placeholder="Num letras a comparar">
    <input type="submit" value="Comprobar">
</form>
<?php
//1. Programar una página en HTML – PHP que pida al usuario 5 palabras y un
//número. El código PHP deberá comprobar si las cadenas de caracteres comienzan
//igual en parejas de 2. Para considerar que empiezan igual deberán tener al menos
//iguales el número de caracteres indicado por el usuario. Mostrar el resultado en
//una tabla de colores (NOTA: controlar que el usuario no haya introducido un
//número de caracteres erróneo)
if (
        !empty($_GET["pal1"]) &&
        !empty($_GET["pal2"]) &&
        !empty($_GET["pal3"]) &&
        !empty($_GET["pal4"]) &&
        !empty($_GET["pal5"]) &&
        !empty($_GET["letras"])
) {
$cadenas = [$_GET["pal1"], $_GET["pal2"], $_GET["pal3"], $_GET["pal4"], $_GET["pal5"]];
$numC=$_GET["letras"];
/**
     * Comprueba si las cadenas pasadas por parametro son iguales
     *a partir del numero de caracters pasados por parametro
     * si el numero de caracteres se pasa devuelve false
     *
     * @param $parametro1
     * @param $parametro2
     * @return bool
     */
    function sonIguales($parametro1, $parametro2, $numC)
    {
if (strlen($parametro1) >= $numC && strlen($parametro2) >= $numC){
            $iguales=true;
            $a=0;
            //strcmp()
            while ($iguales && $a<$numC){
                if($parametro1[$a]!==$parametro2[$a]){
                    $iguales=false;
                }
                $a++;
            }
        }else{
            return false;// cambiar en una variable
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
    function compararCadenas($cadenas,$numC=3)
    {
        foreach ($cadenas as $cadenaComparar) {
            echo "<tr>";
            echo "<th>$cadenaComparar</th>";
            foreach ($cadenas as $cadena) {
                if (sonIguales($cadenaComparar, $cadena,$numC)) {
                    echo "<th style='background-color: green'></th>";
                } else {
                    echo "<th style='background-color: red'></th>";
                }
            }
            echo "</tr>";
        }
    }


echo "<table><tr><th></th>";

        foreach ($cadenas as $cadena) {
            echo "<th>$cadena</th>";
        }

    echo "</tr>";
     compararCadenas($cadenas,$numC);

echo "</table>";
}
        ?>
</body>
</html>