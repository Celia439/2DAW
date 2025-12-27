<?php
//La página PHP deberá:
//1. Guardar todos los archivos en imgs/.
//2. Mostrar una tabla con:
//▪ Nombre original
//▪ Nuevo nombre (puede agregar un número para
//diferenciar) como se puede cambiar el nombre a varios archivos ??
//▪ Tamaño en MB
//▪ Tipo de archivo
if ( isset($_FILES["archivos"]) && $_FILES["archivos"]["error"] === 0) {
    $archivoTmp = $_FILES['archivos']['tmp_name'];
    $nombreOriginal = $_FILES['archivos']['name'];
    $tamanoBytes = $_FILES['archivos']['size'];
    $tamanoMB = round($tamanoBytes / (1024 * 1024), 2);

    // Obtener extensión y forzar minúsculas
    $extension = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));

    if ($extension === "archivos" && $tamanoMB <= 2) {

        // Crear carpeta si no existe
        if (!is_dir("./docs")) {
            mkdir("./docs", 0777, true);
        }

        // Nuevo nombre de archivo
        $nuevoNombre = "./docs/" . $nombreUsuario . "." . $extension;

        if (move_uploaded_file($archivoTmp, $nuevoNombre)) {

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
        echo "Extensión inválida o tamaño maximo superdado";
    }

} else {
    echo "Debe rellenar todos los parámetros correctamente.";
}
?>
