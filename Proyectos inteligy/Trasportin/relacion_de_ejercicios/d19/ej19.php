<!Doctype html>
<html>

<head>
    <title>16</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }

        h1 {
            font-family: "JetBrains Mono ExtraLight";
        }


        .videojuego {
            text-align: center;
            width: 50%;
            background-color: coral;
            padding: 1em;
            margin: 1em;
            border-radius: 2em;
            border: cadetblue solid 1px;
        }

        .contenedor {
            background-color: lightgreen;
            width: 95%;
            display: flex;
            border-radius: 2em;
            padding: 1em;
        }


    </style>
</head>

<body>
<?php
// a) Array asociativo de videojuegos
$titulos = ["Pou", "Tetris", "Minecraft"];
$desarrolladores = ["Paul Salameh", "Paul Salameh", "Markus Persson"];
$anioLanzamiento = [2012, 1984, 2011];
$precio = ["Pou" => 5.99, "Tetris" => 1.99, "Minecraft" => 30.99];
$disponivilidad1 = true;
$disponivilidad2 = false;
$disponivilidad3 = true;
?>

<h1>Video juegos :D</h1>
<div class="contenedor">
    <!-- Mostrar cada videjuego -->
    <div class="videojuego">
        <h3><?php echo $titulos[0]; ?></h3>
        <p><strong>Desarrollador:</strong> <?php echo $desarrolladores[0]; ?></p>
        <p><strong>Año de lanzamiento:</strong> <?php echo $anioLanzamiento[0]; ?></p>
        <p><strong>Precio</strong> <?php echo $precio['Pou']; ?></p>
        <p><?php
            if ($disponivilidad1 == true) {
                echo "<p>Esta disponible</p>";
            } else {
                echo "<p> No esta disponible</p>";
            }
            ?></p>
    </div>

    <div class="videojuego">
        <h3><?php echo $titulos[1]; ?></h3>
        <p><strong>Desarrollador:</strong> <?php echo $desarrolladores[1]; ?></p>
        <p><strong>Año de lanzamiento:</strong> <?php echo $anioLanzamiento[1]; ?></p>
        <p><strong>Precio</strong> <?php echo $precio['Tetris']; ?></p>
        <p><?php
            if ($disponivilidad2 == true) {
                echo "<p>Esta disponible</p>";
            } else {
                echo "<p> No esta disponible</p>";
            }
            ?></p>
    </div>

    <div class="videojuego">
        <h3><?php echo $titulos[2]; ?></h3>
        <p><strong>Desarrollador:</strong> <?php echo $desarrolladores[2]; ?></p>
        <p><strong>Año de lanzamiento:</strong> <?php echo $anioLanzamiento[2]; ?></p>
        <p><strong>Precio</strong> <?php echo $precio['Minecraft']; ?></p>
        <p>
            <?php
            if ($disponivilidad3 == true) {
                echo "<p>Esta disponible</p>";
            } else {
                echo "<p> No esta disponible</p>";
            }
            ?>
        </p>


</div>

</body>

</html>