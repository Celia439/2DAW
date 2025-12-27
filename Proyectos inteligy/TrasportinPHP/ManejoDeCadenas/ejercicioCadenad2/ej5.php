<!Doctype html>
<html>
<head>
    <title>5ej</title>
    <style>
        table {
            border-collapse: collapse;
            margin-left: 35%;
            margin-top: 15%;
            border: yellowgreen solid 2px;

        }

        th {
            text-align: left;
            background-color: yellowgreen;
            color: white;
            padding-left: 5px;
            padding-right: 5px;
        }

        td {
            padding-left: 5px;
            padding-right: 5px;

            border-bottom: yellowgreen solid 2px;

        }

    </style>
</head>
<body>
<!--Queremos hacer un documento PHP que sirva para comprobar la calidad de un texto.
La calidad de un texto se mide en el número de veces que el escritor repite
determinadas palabras. Hacer una página en PHP que reciba un texto y una palabra. El
sitio Web dará una puntuación al texto dependiendo el número de veces que se repita
la palabra en el texto:
 -->
<?php
//array con los textos
$textos = ["Lorem ipsum", "Hola holita veninillo", "y tu y tu y tu y solamente tuuu", "matematicas al cuadrado"];
function clasificador($textos)
{
    $palabrasRep=[];
    foreach ($textos as $texto){

    }
}

echo "<p>Párrafo descodificado</p>";
clasificador($textos);
?>

</body>
</html>

