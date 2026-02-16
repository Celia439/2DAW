<?php

// Conexión a la base de datos
$mysqli = new mysqli("localhost", "root", "", "biblioteca");
$mysqli->set_charset("utf8");

// Agregar libro
if (isset($_POST['titulo']) && $_POST['titulo'] != "") {

    $titulo = $_POST['titulo'];

    $stmt = $mysqli->prepare("INSERT INTO libros (titulo) VALUES (?)");
    $stmt->bind_param("s", $titulo);
    $stmt->execute();
}

// Borrar libro
if (isset($_GET['borrar'])) {

    $id = intval($_GET['borrar']);

    $stmt = $mysqli->prepare("DELETE FROM libros WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Consultar libros
$resultado = $mysqli->query("SELECT * FROM libros");
$libros = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Biblioteca</title>
</head>
<body>

<h1>Lista de Libros</h1>

<ul>

<?php
foreach ($libros as $libro) {
?>
    <li>
        <?php echo $libro['titulo']; ?>
        <a href="?borrar=<?php echo $libro['id']; ?>">Borrar</a>
    </li>
<?php
}
?>

</ul>

<h2>Agregar Libro</h2>

<form method="post">
    <input type="text" name="titulo" required>
    <button type="submit">Agregar</button>
</form>

</body>
</html>
