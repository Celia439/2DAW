<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location: login.php");
    exit();
}
$conexion = new mysqli("localhost", "root", "", "examen_php");
// dependiendo del tipo de rol se visualizará :
$user = "";
if ($_SESSION["rol"] == "usuario") {
    //propias incidencias por orden y fecha
    $sentencia = "
select
    i.titulo,
    i.prioridad,
    c.nombre as Categoria,
    u.nombre  as Técnico,
    i.resuelto
from incidencias i
inner join categorias c on c.id = i.id
inner join usuarios u on i.usuario_id=u.id
where u.id = ? 
order by fecha_creacion";
    $consulta = $conexion->prepare($sentencia);
    $consulta->bind_param("i", $_SESSION["id"]);
    $consulta->execute();
    $consulta->bind_result($titulo, $prioridad, $categoria, $tecnico, $resuelto);

} else if ($_SESSION["rol"] == "admin") {
    //incidencias de alta prioridad
    $sentencia = "select
    i.titulo,
    i.prioridad,
    c.nombre as Categoria,
    u.nombre  as Técnico,
    i.resuelto
from incidencias i
inner join categorias c on c.id = i.id
inner join usuarios u on i.usuario_id=u.id
where i.prioridad='alta'";

}
$consulta = $conexion->query($sentencia);


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard de Incidencias</title>
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

        .btn-del {
            background: #dc3545;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            margin: 10px 0;
        }
    </style>
</head>
<body>

<nav>
    <span>Usuario: <strong><?php echo $_SESSION["nombre"] ?></strong> (ROL:  <?php echo $_SESSION["rol"] ?>)</span>
    <a href="logout.php" style="color:white; text-decoration:none;">Cerrar Sesión</a>
</nav>

<div style="margin-top: 20px;">

    <div style="border: 1px solid #ccc; padding: 20px; background: #f9f9f9;">
        <h3>Nueva Incidencia</h3>
        <form method="POST">


            <input type="text" name="titulo" placeholder="Título incidencia" required>
            <select name="prioridad">
                <option>Baja</option>
                <option>Media</option>
                <option>Alta</option>
            </select>
            <select name="cat_id">
            </select>
            <button type="submit" name="add">Registrar Ticket</button>
        </form>
    </div>

    <h3 style="margin-top:30px;">Listado de Incidencias</h3>

    <form method="POST">
        <button type="submit" name="borrar" class="btn-del">Borrar seleccionados</button>

        <table>
            <thead>
            <tr>
                <th>Sel.</th>
                <th>Título</th>
                <th>Prioridad</th>
                <th>Categoría</th>
                <th>Técnico</th>
                <th>Estado / Acción</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                if ($_SESSION["rol"] == "admin") {
                    while ($file = $consulta->fetch_array(MYSQLI_ASSOC)) {
                        echo '<td><input type="checkbox" name="" value=""></td>
                <td>' . $file["titulo"] . '</td>
                <td>' . $file["prioridad"] . '</td>
                <td>' . $file["Categoria"] . '</td>
                <td>' . $file["Técnico"] . '</td>
                <td>' . $file["resuelto"] . '</td>
                <td>';
                    }
                }else{
                while ($consulta->fetch()) {
                    echo '<td><input type="checkbox" name="" value=""></td>
                <td>' .$titulo. '</td>
                <td>' .$prioridad. '</td>
                <td>' . $categoria . '</td>
                <td>' . $tecnico . '</td>
                <td>' . $resuelto . '</td>
                <td>';
                }
                ?>
                <button type="submit" name="resolver" class="btn-res">Resolver</button>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>