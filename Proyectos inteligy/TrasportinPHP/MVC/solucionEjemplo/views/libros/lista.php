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
