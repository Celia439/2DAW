<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios - Docker</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        .content {
            padding: 30px;
        }
        .info-box {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .success {
            background: #d4edda;
            border-left-color: #28a745;
            color: #155724;
        }
        .error {
            background: #f8d7da;
            border-left-color: #dc3545;
            color: #721c24;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        thead {
            background: #667eea;
            color: white;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        tbody tr:hover {
            background: #f5f5f5;
        }
        tbody tr:nth-child(even) {
            background: #f9f9f9;
        }
        .db-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        .db-card {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 8px;
            border-left: 3px solid #2196F3;
        }
        .db-card strong {
            display: block;
            color: #1976D2;
            margin-bottom: 5px;
            font-size: 0.9em;
        }
        .db-card span {
            font-size: 1.1em;
            font-weight: 600;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🗄️ Gestión de Usuarios</h1>
            <p>Aplicación PHP + MariaDB en Docker</p>
        </div>
        
        <div class="content">
            <h2>Información de Conexión</h2>
            <div class="db-info">
                <div class="db-card">
                    <strong>Host de Base de Datos:</strong>
                    <span><?php echo getenv('DB_HOST') ?: 'No configurado'; ?></span>
                </div>
                <div class="db-card">
                    <strong>Base de Datos:</strong>
                    <span><?php echo getenv('DB_NAME') ?: 'No configurado'; ?></span>
                </div>
                <div class="db-card">
                    <strong>Usuario:</strong>
                    <span><?php echo getenv('DB_USER') ?: 'No configurado'; ?></span>
                </div>
            </div>

            <?php
            // Leer credenciales desde variables de entorno
            $host = getenv('DB_HOST');
            $user = getenv('DB_USER');
            $pass = getenv('DB_PASS');
            $db = getenv('DB_NAME');

            // Intentar conectar a la base de datos
            $conn = new mysqli($host, $user, $pass, $db);

            if ($conn->connect_error) {
                echo '<div class="info-box error">';
                echo '<h3>❌ Error de Conexión</h3>';
                echo '<p><strong>Error:</strong> ' . htmlspecialchars($conn->connect_error) . '</p>';
                echo '<p><strong>Código:</strong> ' . $conn->connect_errno . '</p>';
                echo '</div>';
            } else {
                echo '<div class="info-box success">';
                echo '<h3>✅ Conexión Exitosa</h3>';
                echo '<p>Conectado correctamente a la base de datos MariaDB</p>';
                echo '</div>';

                // Consultar usuarios
                $sql = 'SELECT * FROM users';
                $users = [];

                if ($result = $conn->query($sql)) {
                    while ($data = $result->fetch_object()) {
                        $users[] = $data;
                    }
                    $result->free();
                }

                if (count($users) > 0) {
                    echo '<h2>Lista de Usuarios</h2>';
                    echo '<table>';
                    echo '<thead><tr><th>ID</th><th>Usuario</th><th>Email</th><th>Fecha Registro</th></tr></thead>';
                    echo '<tbody>';
                    foreach ($users as $user) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($user->id) . '</td>';
                        echo '<td>' . htmlspecialchars($user->username) . '</td>';
                        echo '<td>' . htmlspecialchars($user->email) . '</td>';
                        echo '<td>' . htmlspecialchars($user->created_at ?? 'N/A') . '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                    echo '<div class="info-box">';
                    echo '<p><strong>Total de usuarios:</strong> ' . count($users) . '</p>';
                    echo '</div>';
                    // Acceder a agregar.php para añadir nuevos usuarios
                echo '<div style="text-align: center; margin-top: 20px;">';
                echo '<a href="agregar.php" style="display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 12px 30px; border-radius: 5px; text-decoration: none; font-weight: 600;">➕ Agregar Nuevo Usuario</a>';
                echo '</div>';
                } else {
                    echo '<div class="info-box">';
                    echo '<p>⚠️ No hay usuarios registrados en la base de datos.</p>';
                    echo '</div>';
                }

                mysqli_close($conn);
            }
            ?>

            <div class="info-box" style="margin-top: 30px; background: #fff3cd; border-left-color: #ffc107;">
                <h3>ℹ️ Información Técnica</h3>
                <p><strong>PHP Version:</strong> <?php echo phpversion(); ?></p>
                <p><strong>Extensión MySQLi:</strong> <?php echo extension_loaded('mysqli') ? '✓ Cargada' : '✗ No cargada'; ?></p>
                <p><strong>Servidor:</strong> <?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
