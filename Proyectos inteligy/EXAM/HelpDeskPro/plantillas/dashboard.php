<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard de Incidencias</title>
    <style>
        body { font-family: sans-serif; margin: 20px; background: #fdfdfd; }
        nav { background: #333; color: white; padding: 15px; display: flex; justify-content: space-between; align-items: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        .btn-res { background: #28a745; color: white; border: none; padding: 5px 10px; cursor: pointer; border-radius: 4px; }
        .btn-del { background: #dc3545; color: white; padding: 10px; border: none; cursor: pointer; margin: 10px 0; }
    </style>
</head>
<body>

<nav>
    <span>Usuario: <strong>[NOMBRE]</strong> ([ROL])</span>
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
                    <td><input type="checkbox" name="" value=""></td>
                    
                    <td>[Título]</td>
                    <td>[Prioridad]</td>
                    <td>[Nombre Categoría]</td>
                    <td>[Nombre Técnico]</td>
                    <td>
                        <button type="submit" name="resolver" class="btn-res">Resolver</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>