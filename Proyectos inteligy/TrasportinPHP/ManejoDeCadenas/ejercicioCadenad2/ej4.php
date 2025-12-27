<!Doctype html>
<html>
<head>
    <title>4ej</title>
</head>
<body>
<!--4. Diseñar una página en PHP que reciba un párrafo de texto codificado. La página deberá
descodificar el párrafo y mostrar el texto real que se quería transmitir. Lo mostrará de
la siguiente forma:
 Párrafo recibido:
Ipmb rvfsjep bnjhp. Dpnp uf fñdvfñusbt. Uf nbñep nvdipt cftpt. Ibtub qspñup.
 Párrafo real:
Hola querido amigo. Como te encuentras. Te mando muchos besos. Hasta pronto.
Nota: El párrafo irá dividido en frases, cada frase será una posición de un array.
Nota2: La codificación a utilizar será: cada carácter se va a sustituir por el siguiente en el
abecedario.
Nota3: Utilizar la función strtr para hacer todos los cambio de una sola vez en cada una de
las frases.
Nota4: Respetar el formato anterior, dando además forma al párrafo introduciendo puntos
(.) entre cada frase y respetando las mayúsculas que puedan aparecer.
 -->
<?php
//parrafo sin codificar
$parrafo = ["Ipmb rvfsjep bnjhp", "Dpnp uf fñdvfñusbt", "Uf nbñep nvdipt cftpt", "Ibtub qspñup"];
function decodificador($parrafo)
{
    foreach ($parrafo as $frase) {

        //strstr puede buscar y devolver la cadena buscada a partir de un indice y puede buscar carcter por caracter para buscar y reeemplazar la frase original
        $copia = strtr($frase, "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", "zabcdefghijklmnopqrstuvwxyZABCDEFGHIJKLMNOPQRSTUVWXY");
        echo $copia . "<br>";
    }
}

echo "<p>Párrafo descodificado</p>";
decodificador($parrafo);
?>

</body>
</html>

