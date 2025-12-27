<!doctype html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
        }

        th {
            font-family: cursive;
            padding: 1em;
        }

        td {
            padding: 1em;
        }
    </style>
</head>
<body>
<h2>Ejercicio12</h2>

<form action="ej12.php" method="get">

    <input type="text" name="nombre1" placeholder="nombre">
    <input type="text" name="apellido1"  placeholder="apellido">
    <input type="text" name="nombre2"  placeholder="nombre">
    <input type="text" name="apellido2" placeholder="apellido">
    <input type="text" name="nombre3"  placeholder="nombre">
    <input type="text" name="apellido3" placeholder="apellido">
    <input type="text" name="nombre4"  placeholder="nombre">
    <input type="text" name="apellido4" placeholder="apellido">
    <input type="text" name="nombre5"  placeholder="nombre">
    <input type="text" name="apellido5" placeholder="apellido">
    <input type="submit" value="Comprobar">
</form>
<?php
//12. Programar una página en HTML – PHP que a través de formularios pida al
//usuario los nombres y apellidos de 5 personas, y los mostrará ordenados por
//orden alfabético (se entiende que por apellidos)
//(Perguntar por el orden de array con mas de una dimension)
if (
        !empty($_GET["nombre1"]) && !empty($_GET["apellido1"]) &&
        !empty($_GET["nombre2"]) && !empty($_GET["apellido2"]) &&
        !empty($_GET["nombre3"]) && !empty($_GET["apellido3"]) &&
        !empty($_GET["nombre4"]) && !empty($_GET["apellido4"]) &&
        !empty($_GET["nombre5"]) && !empty($_GET["apellido5"])
) {
    $personas = [
            ["nombre" => $_GET["nombre1"], "apellido" => $_GET["apellido1"]],
            ["nombre" => $_GET["nombre2"], "apellido" => $_GET["apellido2"]],
            ["nombre" => $_GET["nombre3"], "apellido" => $_GET["apellido3"]],
            ["nombre" => $_GET["nombre4"], "apellido" => $_GET["apellido4"]],
            ["nombre" => $_GET["nombre5"], "apellido" => $_GET["apellido5"]]
    ];
    $personasAux=$personas;
    usort($personasAux, function($a, $b) {
        // si la persona a va antes -1 si la persona b va antes 1 si son iguales 0
        return strcmp($a["apellido"], $b["apellido"]);
    });
    echo "<ol>";
    foreach ($personasAux as $persona ){
        echo "<li>".$persona["nombre"] ." ". $persona["apellido"] ."</li>";
    }
    echo "</ol>";
}

?>


</body>
</html>