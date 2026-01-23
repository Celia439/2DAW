<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Práctica 3 - StageMaster Studio</title>
    </head>
    <body>
        <h1>Práctica 3 - Registro de Obras de Teatro</h1>

        <p>Introduce las obras siguiendo este formato, separadas por una línea en blanco:</p>

        <pre>
            COMEDIA
            El gran lío
            2025-04-10
            90
            Ana,Beto,Carlos

            DRAMA
            La caída del rey
            2025-06-01
            150
            Rey,Consejero,General,Esclavo
        </pre>

        <form action="resultado.php" method="post">
            <textarea name="obras" rows="15" cols="80" required></textarea><br><br>
            <button type="submit">Procesar obras</button>
        </form>
    </body>
</html>
