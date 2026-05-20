<?php
/*
Ahora se realiza en comun.php por js 
require_once LIBRERIA_PHP . "comun.php";

$paises = getNacionalidades();
$provincias = getProvincias();
*/
require_once LIBRERIA_PHP . "comun.php";

$comun = new comun();
$checkinControl = new checkin();

// -------------------------------------------------
// 1. OBTENER id_reserva e id_casa (nuevo sistema o fallback)
// -------------------------------------------------
if (!empty($_GET['clave']) && !empty($_GET['id'])) {
    // --- NUEVO SISTEMA (5 capas de seguridad) ---

    // 1.1 Limpiar la clave: quitar los 5 primeros caracteres (basura/señuelo)
    $clave_limpia = substr($_GET['clave'], 5);

    // 1.2 Buscar la reserva en BD usando la clave_unica
    $reserva = $comun->getReservaByClave($clave_limpia);
    if (empty($reserva)) {
        die("Enlace no válido o expirado.");
    }

    // 1.3 Desencriptar el parámetro 'id' usando la clave_unica limpia
    $texto_desencriptado = $comun->desencriptarConClave($_GET['id'], $clave_limpia);
    if ($texto_desencriptado === false) {
        die("Enlace no válido o expirado.");
    }

    // 1.4 Extraer el ID real del texto "c4d1zf0rn14|10"
    $partes = explode("|", $texto_desencriptado);
    $id_reserva = $partes[1] ?? null;

    if (empty($id_reserva) || !is_numeric($id_reserva)) {
        die("Enlace no válido o expirado.");
    }

    // 1.5 Obtener id_casa del titular o del primer huésped registrado
    $titulares = $comun->getTitularReserva($id_reserva);
    if (!empty($titulares[0]['id_casa'])) {
        $id_casa = $titulares[0]['id_casa'];
    } else {
        $huespedes = $comun->getHuespedesByReserva($id_reserva);
        $id_casa = !empty($huespedes[0]['id_casa']) ? $huespedes[0]['id_casa'] : null;
    }
    if (empty($id_casa)) {
        die("No se encontró la casa asociada a esta reserva.");
    }
} else {
    // Fallback al comportamiento anterior (URLs abiertas sin token)
    $id_reserva = $_GET['id_reserva'] ?? null;
    $id_casa = $_GET['id_casa'] ?? null;
}

if (empty($id_reserva) || empty($id_casa)) {
    die("Faltan parámetros necesarios.");
}

// -------------------------------------------------
// 2. GUARDAR EN SESIÓN (para que el guardado posterior lo use)
// -------------------------------------------------
$_SESSION['id_reserva'] = $id_reserva;
$_SESSION['id_casa'] = $id_casa;

// -------------------------------------------------
// 3. CALCULAR CUÁNTOS HUÉSPEDES HAY Y CUÁNTOS FALTAN
// -------------------------------------------------
$resultado = $checkinControl->n_huespedes_registrados($id_reserva);
$registrados = $resultado[0]["total"];

$total = $checkinControl->n_huespedes_reserva($id_reserva);
$totalHuespedes = $total[0]["total_huespedes"];

$_SESSION['total_huespedes'] = $totalHuespedes;
