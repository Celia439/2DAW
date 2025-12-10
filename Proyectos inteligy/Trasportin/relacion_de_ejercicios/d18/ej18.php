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


        .libro {
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

        img {
            width: 20em;
        }
    </style>
</head>

<body>
<?php
// a) Array asociativo de libros
$libro1 = [
        "titulo" => "El diario de Greg",
        "autor" => "Jeff Kinney",
        "genero" => "Humor / Juvenil",
        "anio" => 2007,
        "imagen" => "https://m.media-amazon.com/images/I/91G2SItxkYL.jpg"
];

$libro2 = [
        "titulo" => "Cien Años de Soledad",
        "autor" => "Gabriel García Márquez",
        "genero" => "Realismo mágico",
        "anio" => 1967,
        "imagen" => "https://m.media-amazon.com/images/I/91TvVQS7loL._UF1000,1000_QL80_.jpg"
];

$libro3 = [
        "titulo" => "1984",
        "autor" => "George Orwell",
        "genero" => "Distopía",
        "anio" => 1949,
        "imagen" => "https://m.media-amazon.com/images/I/71sOSrd+JxL.jpg"
];

// c) Libro favorito
$favorito = $libro1["titulo"];
?>

<h1>Libros Recomendados</h1>
<div class="contenedor">
    <!-- Mostrar cada libro -->
    <div class="libro">
        <img src="<?php echo $libro1['imagen']; ?>" alt="<?php echo $libro1['titulo']; ?>">
        <h3><?php echo $libro1['titulo']; ?></h3>
        <p><strong>Autor:</strong> <?php echo $libro1['autor']; ?></p>
        <p><strong>Género:</strong> <?php echo $libro1['genero']; ?></p>
        <p><strong>Año:</strong> <?php echo $libro1['anio']; ?></p>
    </div>

    <div class="libro">
        <img src="<?php echo $libro2['imagen']; ?>" alt="<?php echo $libro2['titulo']; ?>">
        <h3><?php echo $libro2['titulo']; ?></h3>
        <p><strong>Autor:</strong> <?php echo $libro2['autor']; ?></p>
        <p><strong>Género:</strong> <?php echo $libro2['genero']; ?></p>
        <p><strong>Año:</strong> <?php echo $libro2['anio']; ?></p>
    </div>

    <div class="libro">
        <img src="<?php echo $libro3['imagen']; ?>" alt="<?php echo $libro3['titulo']; ?>">
        <h3><?php echo $libro3['titulo']; ?></h3>
        <p><strong>Autor:</strong> <?php echo $libro3['autor']; ?></p>
        <p><strong>Género:</strong> <?php echo $libro3['genero']; ?></p>
        <p><strong>Año:</strong> <?php echo $libro3['anio']; ?></p>
    </div>


</div>
<!-- Libro favorito -->
<div class="favorito">
    ¡Mi libro favorito es "<?php echo $favorito; ?>"! Nunca dejes de leer y descubrir nuevas historias.
</div>
</body>

</html>