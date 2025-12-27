<!doctype html>
<html>
<head>
    <style>
        body {
            background-color: lightblue;
        }

        table {
            border-collapse: collapse;
            margin: 5%;
        }

        th {
            background-color: cornflowerblue;
            color: white;
            border: cornflowerblue solid 2px;
            padding: 15px;
            text-align: center;
        }
        td{
            border: cornflowerblue solid 2px;
    background-color: white;
        }

    </style>
</head>
<body>
<h2>Ejercicio18</h2>

<form action="ej18.php" method="POST">
    <!-- Selección de color de fondo -->
    <label for="fondo">Elige el color de fondo:</label>
    <select name="fondo" id="fondo" required>
        <option value="">--Selecciona--</option>
        <option value="white">Blanco</option>
        <option value="lightblue">Azul claro</option>
        <option value="lightgreen">Verde claro</option>
        <option value="lightyellow">Amarillo claro</option>
    </select>
    <br><br>

    <!-- Selección de color de texto -->
    <label for="texto">Elige el color del texto:</label>
    <select name="texto" id="texto" required>
        <option value="">--Selecciona--</option>
        <option value="black">Negro</option>
        <option value="blue">Azul</option>
        <option value="green">Verde</option>
        <option value="red">Rojo</option>
    </select>
    <br><br>

    <!-- Selección de tipo de letra -->
    <label for="fuente">Elige el tipo de letra:</label>
    <select name="fuente" id="fuente" required>
        <option value="">--Selecciona--</option>
        <option value="Arial, sans-serif">Arial</option>
        <option value="'Times New Roman', serif">Times New Roman</option>
        <option value="'Courier New', monospace">Courier New</option>
    </select>
    <br><br>

    <!-- Selección de imagen -->
    <label>Elige una imagen:</label><br>
    <input type="radio" name="imagen" value="https://imgs.search.brave.com/rqm8jIYzN3W-vsgmRBR3wG-WBv_tWxFly87G9nzOiw0/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9tZWRp/YS5nZXR0eWltYWdl/cy5jb20vaWQvMTIw/MjA0NTM4OS9lcy9m/b3RvL2Rvcy1wZXJz/b25hcy1kJUMzJUEx/bmRvc2UtbGEtbWFu/by5qcGc_cz02MTJ4/NjEyJnc9MCZrPTIw/JmM9NWlvck1lMEJF/RlJqeHRpOTZ1bk5j/d254WjdTS0N5Y3pX/dk5MMnhrQ3NNWT0" id="img1" required>
    <label for="img1">Imagen 1</label><br>

    <input type="radio" name="imagen" value="https://imgs.search.brave.com/3WHCnYT2vSAm7nmO05yBguLC8N4C6VPa-zmE59OS0wM/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly93d3cu/ZGlhaW50ZXJuYWNp/b25hbGRlLmNvbS9p/bWFnZW5lcy9kaWFz/LzExLTIxX2RpYS1t/dW5kaWFsLXNhbHVk/by0yMDI0LmpwZw" id="img2">
    <label for="img2">Imagen 2</label><br>

    <input type="radio" name="imagen" value="https://imgs.search.brave.com/XSjuqOPfStMAX6YOVjoUXkRdGtUaT1AKlvD7JVsVyos/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9zdGF0/aWMudmVjdGVlenku/Y29tL3N5c3RlbS9y/ZXNvdXJjZXMvdGh1/bWJuYWlscy8wMjEv/NjAxLzk0MC9zbWFs/bC9jb25ncmF0cy1i/dXNpbmVzcy1wYXJ0/bmVyc2hpcC1wZW9w/bGUtdHdvLWFzaWFu/LWFuZC1jYXVjYXNp/YW4teW91bmctbWFu/LWZpc3QtYnVtcGlu/Zy1zaGFraW5nLWhh/bmRzLXRvZ2V0aGVy/LXdpdGgtcGFydG5l/cnNoaXAtY3VzdG9t/ZXItb3ItY29sbGVh/Z3VlLWFmdGVyLXdv/cmstaXMtZG9uZS1z/dWNjZXNzZnVsLXdv/cmtlci1tZWV0aW5n/LWZyZWUtcGhvdG8u/anBn" id="img3">
    <label for="img3">Imagen 3</label><br><br>

    <!-- Datos del usuario -->
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br><br>

    <label for="edad">Edad:</label>
    <input type="number" name="edad" id="edad" required>
    <br><br>

    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" id="email" required>
    <br><br>

    <input type="submit" value="Enviar">
</form>
<?php
//18. Programar una página en HTML – PHP que a través de formularios de a elegir al
//usuario el estilo de la página de bienvenida. Después se le pedirá al usuario los
//datos necesarios para configurar un mensaje a su medida. Dicho mensaje se
//mostrará en una página con la configuración elegida por él.
//a. El formulario dará a elegir entre:
//i. 4 colores para el fondo
//ii. 4 colores (distintos) para el texto
//iii. 3 tipos de letra.
//b. Además se le dará la opción de elegir entre tres imágenes para mostrar al
//lado de sus datos.

    if (
            !empty($_POST['fondo']) &&
            !empty($_POST['texto']) &&
            !empty($_POST['fuente']) &&
            !empty($_POST['imagen']) &&
            !empty($_POST['nombre']) &&
            !empty($_POST['edad']) &&
            !empty($_POST['email'])
    ) {
        // Todos los campos están completos
        $fondo = $_POST['fondo'];
        $texto = $_POST['texto'];
        $fuente = $_POST['fuente'];
        $imagen = $_POST['imagen'];
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $email = $_POST['email'];

        // Mostrar mensaje personalizado
        echo "<div class='contenedor' style='background-color:$fondo; color:$texto; font-family:$fuente; padding:20px; border-radius:10px;'>";
        echo "<img src='" . ($imagen) . "' class='imagen' alt='Imagen saludo'>";
        echo "<div class='mensaje'>";
        echo "<h1>¡Bienvenido, " . ($nombre) . "!</h1>";
        echo "<p>Edad: " . ($edad) . "</p>";
        echo "<p>Correo: " . ($email) . "</p>";
        echo "<p>¡Esperamos que disfrutes tu página personalizada!</p>";
        echo "</div></div><hr>";
    } else {
        echo "<p style='color:red;'>Por favor, completa todos los campos del formulario.</p><hr>";

}
?>
</body>
</html>