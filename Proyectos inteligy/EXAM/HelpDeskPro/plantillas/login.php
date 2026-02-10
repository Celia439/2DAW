<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Soporte - Login</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; padding-top: 100px; background: #eee; }
        .login-box { background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { display: block; width: 250px; margin-bottom: 10px; padding: 8px; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="login-box">
        <h3>Acceso Técnicos</h3>
        <form method="POST">
            <input type="email" name="email" value="" placeholder="Email" required>
            <input type="password" name="pass" placeholder="Contraseña" required>
            <button type="submit" name="login">Entrar</button>
        </form>
        
        </div>
</body>
</html>