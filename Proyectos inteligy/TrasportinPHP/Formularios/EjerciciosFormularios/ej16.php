<!doctype html>
<html>
<head>
    <style>
        body {
            background-color: lightblue;
        }

        table {
            border-collapse: collapse;
            margin: 5%;
        }

        th {
            background-color: purple;
            color: white;
            border: purple solid 2px;
            padding: 15px;
            text-align: center;
        }
        td{
            border: purple solid 2px;

        }

    </style>
</head>
<body>
<h2>Ejercicio16</h2>

<form action="ej16.php" method="get">
    <input type="text" name="pal1" placeholder="Introduce frases">
    <input type="submit" value="Comprobar">
</form>
<?php
//16. Diseñar una página en PHP que reciba un párrafo de texto codificado. La página
//deberá descodificar el párrafo y mostrar el texto real que se quería transmitir. Lo
//mostrará de la siguiente forma:
// Párrafo recibido:
//Ipmb rvfsjep bnjhp. Dpnp uf fñdvfñusbt. Uf nbñep nvdipt cftpt. Ibtub qspñup.
// Párrafo real:
//Hola querido amigo. Como te encuentras. Te mando muchos besos. Hasta pronto.
//Nota: El usuario introducirá todo el párrafo de una vez. Dividir el párrafo en frases,
//cada frase será una posición de un array.
//Nota2: La codificación a utilizar será: cada carácter se va a sustituir por el siguiente
//en el abecedario.
//Nota3: Utilizar la función strtr para hacer todos los cambio de una sola vez en cada
//una de las frases.
//Nota4: Respetar el formato anterior, dando además forma al párrafo introduciendo
//puntos (.) entre cada frase y respetando las mayúsculas que puedan aparecer.
if (
        !empty($_GET["pal1"])
) {
    $parrafo = explode(".", $_GET["pal1"]);
    function decodificador($parrafo)
    {
        $parrafoReal=[];
        foreach ($parrafo as $frase) {

            //strstr puede buscar y devolver la cadena buscada a partir de un indice y puede buscar carcter por caracter para buscar y reeemplazar la frase original
            $parrafoReal[]= strtr($frase, "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", "zabcdefghijklmnopqrstuvwxyZABCDEFGHIJKLMNOPQRSTUVWXY");
        }
        return $parrafoReal;
    }

    echo "<ol><li style='font-size: 20px'><u><b>Párrafo recibido:</b></u></li></ol>";
    echo $_GET["pal1"];
    echo "<ol><li style='font-size: 20px'><u><b>Párrafo real</b></u></li></ol>";
    echo implode(".",(decodificador($parrafo)));

}
?>
</body>
</html>