<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard de Libros</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            background: #fdfdfd;
        }

        nav {
            background: #333;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .btn-res {
            background: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-dev {
            background: #ffc107;
            color: #212529;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<nav>
    <span>Usuario: <strong>[NOMBRE]</strong> ([ROL])</span>
    <a href="logout.php" style="color:white; text-decoration:none;">Cerrar Sesión</a>
</nav>

<div style="margin-top: 20px;">

    <div style="border: 1px solid #ccc; padding: 20px; background: #f9f9f9;">
        <h3>Nuevo Libro</h3>
        <form method="POST">
            <input type="text" name="titulo" placeholder="Título del libro" required>
            <input type="text" name="autor" placeholder="Autor" required>
            <button type="submit" name="add">Registrar Libro</button>
        </form>
    </div>

    <h3 style="margin-top:30px;">Listado de Libros</h3>

    <table>
        <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Estado / Acción</th>
        </tr>
        </thead>
        <!-- Mostrar un listado completo: título, autor y estado.-->
        <tbody>
        <?php
        try {
            //Aquí se comprobaria si el usuario es admin o no comprobando el email y dependiendo del resultado la query cambiaria a like disponibles o todos
            $conexion = new mysqli('localhost', 'root', '', 'examen2_php', '3306');
            $query = "SELECT * FROM libros";
            $consulta = $conexion->prepare($query);
            $consulta->execute();
            $rows = $consulta->fetch();
            echo "<tr>";

            while ($rows) {
                echo "<td>" . $rows["titulo"] . "</td>";
                echo "<td>" . $rows["autor"] . "</td>";
                echo '<td>
                <button type="submit" name="reservar" class="btn-res">Reservar</button>
                <button type="submit" name="devolver" class="btn-dev">Devolver</button>
            </td>';
            }
            echo "</tr>";

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
