<?php
//La página PHP deberá:
//1. Guardar todos los archivos en imgs/.
//2. Mostrar una tabla con:
//▪ Nombre original
//▪ Nuevo nombre (puede agregar un número para
//diferenciar) como se puede cambiar el nombre a varios archivos ??
//▪ Tamaño en MB
//▪ Tipo de archivo
if (isset($_FILES["archivos"])) {
    // Creamos la carpeta si no existe
    $directorio = "./imgs/";
    if (!is_dir($directorio)) {
        mkdir($directorio, 0777, true);
    }

    echo "<h3>Resumen de subida</h3>";
    echo "<table border='1' cellpadding='5'>
            <tr>
                <th>Nombre Original</th>
                <th>Nuevo Nombre</th>
                <th>Tamaño (MB)</th>
                <th>Tipo</th>
            </tr>";

    // Recorremos el array de archivos
    // PHP organiza $_FILES['archivos']['name'] como un array si hay múltiples
    foreach ($_FILES["archivos"]["name"] as $indice => $nombreOriginal) {

        $error = $_FILES["archivos"]["error"][$indice];

        if ($error === UPLOAD_ERR_OK) {
            $archivoTmp = $_FILES["archivos"]["tmp_name"][$indice];
            $tipoOriginal = $_FILES["archivos"]["type"][$indice];
            $tamanoBytes = $_FILES["archivos"]["size"][$indice];
            $tamanoMB = number_format($tamanoBytes / (1024 * 1024), 2);

            $extension = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));

            // Filtro: Solo imágenes o PDFs (por ejemplo)
            $permitidos = ["jpg", "jpeg", "png", "gif", "pdf", "txt"];

            if (in_array($extension, $permitidos) && $tamanoMB <= 2) {

                // GENERAR NUEVO NOMBRE: Usamos timestamp + índice para que sean únicos
                $nuevoNombreSinRuta = "archivo_" . time() . "_" . $indice . "." . $extension;
                $rutaFinal = $directorio . $nuevoNombreSinRuta;

                if (move_uploaded_file($archivoTmp, $rutaFinal)) {
                    echo "<tr>
                            <td>$nombreOriginal</td>
                            <td>$nuevoNombreSinRuta</td>
                            <td>$tamanoMB</td>
                            <td>$extension</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Archivo $nombreOriginal no permitido o muy pesado.</td></tr>";
            }
        }
    }
    echo "</table>";
} else {
    echo "No se han seleccionado archivos.";
}
?>