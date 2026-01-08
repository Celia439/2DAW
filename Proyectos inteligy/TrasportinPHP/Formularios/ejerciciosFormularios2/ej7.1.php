<?php

if (!empty($_POST["nombre"]) && isset($_FILES["foto"]) && $_FILES["foto"]["error"] === 0) {

    $nombreUsuario = $_POST["nombre"];
    $archivoTmp = $_FILES['foto']['tmp_name'];
    $nombreOriginal = $_FILES['foto']['name'];
    $tamanoBytes = $_FILES['foto']['size'];

    // Obtener extensión y forzar minúsculas
    $extension = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));

    $extValidas = ["jpg", "jpeg", "png", "gif"];

    if (in_array($extension, $extValidas)) {

        // Crear carpeta si no existe
        if (!is_dir("./img")) {
            mkdir("./img", 0777, true);
        }

        // Nuevo nombre de archivo
        $nuevoNombre = "./img/" . $nombreUsuario . "." . $extension;

        if (move_uploaded_file($archivoTmp, $nuevoNombre)) {

            // Convertir tamaño a MB
            $tamanoMB = number_format($tamanoBytes / (1024 * 1024), 2);

            echo "<h3>Imagen subida correctamente</h3>";
            echo "<table border='1' cellpadding='5'>";
            echo "<tr>
                    <th>Nombre original</th>
                    <th>Nuevo nombre</th>
                    <th>Tamaño (MB)</th>
                    <th>Tipo de imagen</th>
                  </tr>";
            echo "<tr>
                    <td>$nombreOriginal</td>
                    <td>$nuevoNombre</td>
                    <td>$tamanoMB</td>
                    <td>$extension</td>
                  </tr>";
            echo "</table>";

        } else {
            echo "Error al mover el archivo.";
        }

    } else {
        echo "Extensión inválida. Solo se permiten jpg, jpeg, png o gif.";
    }

} else {
    echo "Debe rellenar todos los parámetros correctamente.";
}
?>
