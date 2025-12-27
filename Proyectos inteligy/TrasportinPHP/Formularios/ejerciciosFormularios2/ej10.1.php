<?php
// • La página PHP deberá:
//1. Validar que el archivo tiene extensión permitida (jpg, png, gif,
//pdf, txt).
//2. Validar que el archivo no supere 5 MB.
//3. Guardar el archivo en un directorio files/.
//4. Mostrar un mensaje indicando si la subida fue exitosa o si falló,
//indicando la causa.
if (isset($_FILES["archivos"]) && $_FILES["archivos"]["error"] === 0) {
    $archivoTmp = $_FILES['archivos']['tmp_name'];
    $nombreOriginal = $_FILES['archivos']['name'];
    $tamanoBytes = $_FILES['archivos']['size'];
    $tamanoMB = round($tamanoBytes / (1024 * 1024), 2);

    // Obtener extensión y forzar minúsculas
    $extension = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));
    $extValidas = ["jpg", "png", "gif", "pdf", "txt"];
    if (!in_array($extension, $extValidas)) {
        echo "Extenxión del archivo invalida";
    } else if ($tamanoMB >= 5) {
        echo "Tamaño limite del archivo superdado " . $tamanoMB . " no puede superar los 5MB";
    } else {
        // Crear carpeta si no existe
        if (!is_dir("./files")) {
            mkdir("./files", 0777, true);
        } else {
            echo "No se a podido crear la carpeta files";
        }

        // Nuevo nombre de archivo
        $nuevoNombre = "./files/" . $nombreUsuario . "." . $extension;

        if (move_uploaded_file($archivoTmp, $nuevoNombre)) {
            echo "<h3>Imagen subida correctamente</h3>";
        } else {
            echo "Error al mover el archivo.";
        }

    }

} else {
    echo "Debe rellenar todos los parámetros correctamente.";
}
?>
