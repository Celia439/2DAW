<?php

require_once MODELOS_CHECKIN . "/index.php";

// Recoger provincia desde AJAX ((null coalescing) Sí provincia no está vacío o null o si no "")
$provincia = $_REQUEST["seleccionado"] ?? "";

// Crear instancia del modelo
$checkin = new checkin();

// Obtener municipios filtrados
$municipios = $checkin->getMunicipiosPorProvincia_v2($provincia);

//VOY A MONTAR EL HTML AQUÍ Y LE DEVUELVO YA.
$json = [];
$json["HTML_municipios"] = "";
if ($municipios) {
    foreach ($municipios as $key => $fila) {
        $json["HTML_municipios"].= "<option value=".$fila["id"].">".$fila["Municipio"]."</option>";
    }
}

// Devolver JSON limpio
echo json_encode($json);
exit;
