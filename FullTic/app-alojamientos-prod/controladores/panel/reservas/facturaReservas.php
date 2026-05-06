<?php
// Usamos las constantes del sistema para las rutas
require_once LIBRERIA_PHP . 'fpdf/fpdf.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once LIBRERIA_PHP . 'vendor/autoload.php';
require_once LIBRERIA_PHP . 'comun.php';

$comun = new comun();
$id = $_POST["id"];

// 1. OBTENCIÓN DE DATOS (Entrando siempre en la posición [0])
$reservaArr = $comun->getReservaById($id);
$reserva = !empty($reservaArr) ? $reservaArr[0] : null;

$reservaHuespedes = $comun->getTitularReserva($id);
$titular = !empty($reservaHuespedes) ? $reservaHuespedes[0] : null;

// Si no hay reserva o titular, cortamos para no dar errores fatales
if (!$reserva || !$titular) {
    echo json_encode(["ok" => false, "error" => "No se ha encontrado la reserva o el titular para el ID: " . $id]);
    exit;
}

// Obtenemos la CASA 
$casaArr = $comun->getCasaById($titular['id_casa']);
$casa = !empty($casaArr) ? $casaArr[0] : [
    'nombre' => 'Alojamiento',
    'direccion' => '---',
    'localidad' => '---'
];

// Obtenemos los datos del CLIENTE
$clienteArr = $comun->getClienteById($titular['id_cliente']);
$cliente = !empty($clienteArr) ? $clienteArr[0] : [
    'nombre' => 'Cliente',
    'primer_apellido' => '',
    'dni' => '---',
    'correo' => '---'
];

// Obtenemos el listado completo de HUÉSPEDES (con el JOIN de nombres en comun.php)
$huespedes = $comun->getHuespedesByReserva($id);

//Calculamos la noches 
$fecha_entrada = new DateTime($reserva['fecha_entrada']);
$fecha_salida = new DateTime($reserva['fecha_salida']);
$interval = $fecha_entrada->diff($fecha_salida);
$noches = $interval->days;

// 2. GENERACIÓN DEL PDF
$pdf = new FPDF();
$pdf->AddPage();

// --- 1. CABECERA ---
$pdf->SetFont('Arial', 'B', 18);
$pdf->SetTextColor(33, 37, 41);
// Nombre de la App a la izquierda
$pdf->Cell(95, 10, iconv('UTF-8', 'windows-1252', 'Alojamientos Bambú'), 0, 0, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(120, 120, 120);
// Número de factura a la derecha
$facturaTexto = iconv('UTF-8', 'windows-1252', "FACTURA Nº: " . $reserva['num_reserva']);
$pdf->Cell(95, 10, $facturaTexto, 0, 1, 'R');

$pdf->Ln(5);

// --- 2. BLOQUE DE INFORMACIÓN (Lado a lado: Cliente y Casa) ---
$pdf->SetTextColor(0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(95, 7, 'DATOS DEL CLIENTE', 0, 0);
$pdf->Cell(95, 7, 'DATOS DEL ALOJAMIENTO', 0, 1);

$pdf->SetFont('Arial', '', 10);
// Línea 1: Nombre,  Nombre Casa y numero de noches
$pdf->Cell(95, 5, iconv('UTF-8', 'windows-1252', $cliente['nombre'] . ' ' . $cliente['primer_apellido']), 0, 0);
$pdf->Cell(95, 5, iconv('UTF-8', 'windows-1252', 'Alojamiento: ' . $casa['nombre'] . ' (' . $noches . ' noches)'), 0, 1);
// Línea 2: DNI y Dirección
$pdf->Cell(95, 5, iconv('UTF-8', 'windows-1252', 'DNI/ID: ' . $cliente['numero_documento_identidad']), 0, 0);
$pdf->Cell(95, 5, iconv('UTF-8', 'windows-1252', 'Dirección: ' . $casa['direccion']), 0, 1);
// Línea 3: Email y Localidad
$pdf->Cell(95, 5, iconv('UTF-8', 'windows-1252', 'Email: ' . $cliente['correo']), 0, 0);
$pdf->Cell(95, 5, iconv('UTF-8', 'windows-1252', $casa['localidad']), 0, 1);

$pdf->Ln(10);

// --- 3. TABLA DE CONCEPTOS ---
$pdf->SetFillColor(230, 230, 230);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(70, 8, 'Concepto', 1, 0, 'C', true);
$pdf->Cell(30, 8, 'Entrada', 1, 0, 'C', true);
$pdf->Cell(30, 8, 'Salida', 1, 0, 'C', true);
$pdf->Cell(30, 8, iconv('UTF-8', 'windows-1252', 'Huésp.'), 1, 0, 'C', true);
$pdf->Cell(30, 8, 'Importe', 1, 1, 'C', true);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(70, 8, iconv('UTF-8', 'windows-1252', 'Estancia en ' . $casa['nombre']), 1, 0, 'L');
$pdf->Cell(30, 8, (new DateTime($reserva['fecha_entrada']))->format("d/m/Y"), 1, 0, 'C');
$pdf->Cell(30, 8, (new DateTime($reserva['fecha_salida']))->format("d/m/Y"), 1, 0, 'C');
$pdf->Cell(30, 8, $reserva['total_huespedes'], 1, 0, 'C');
$pdf->Cell(30, 8, number_format($reserva['importe_final'], 2, ',', '.') . iconv('UTF-8', 'windows-1252', ' €'), 1, 1, 'R');

$pdf->Ln(10);

// --- 4. LISTADO DE INTEGRANTES ---
if (!empty($huespedes)) {
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 7, iconv('UTF-8', 'windows-1252', 'HUÉSPEDES REGISTRADOS:'), 0, 1);
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(80, 80, 80);

    foreach ($huespedes as $h) {
        $tit = ($h['es_titular'] == 1) ? ' (Titular)' : '';
        $lineaH = '- ' . $h['nombre'] . ' ' . $h['apellido'] . $tit;
        $pdf->Cell(0, 5, iconv('UTF-8', 'windows-1252', $lineaH), 0, 1);
    }
}

$pdf->SetTextColor(0);
$pdf->Ln(5);

// --- 5. TOTAL ---
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(160, 10, 'TOTAL A PAGAR: ', 0, 0, 'R');
$pdf->SetFillColor(255, 255, 200);
$pdf->Cell(30, 10, number_format($reserva['importe_final'], 2, ',', '.') . iconv('UTF-8', 'windows-1252', ' €'), 1, 1, 'C', true);

// --- 6. PIE DE PÁGINA (Legal) ---
$pdf->SetAutoPageBreak(false);
$pdf->SetY(-20);
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'Gracias por elegir Alojamientos Bambú. Documento justificante de pago.'), 0, 0, 'C');

$pdf->Output("Factura_reserva.pdf", "F");

// --- 7. ENVÍO POR EMAIL ---
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = "smtp.panel247.com";
    $mail->SMTPAuth = true;
    $mail->Username = 'test@infosocorrista.com';
    $mail->Password = '$qh-g]3v].;]:N';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('test@infosocorrista.com', 'Alojamientos Bambú');
    $mail->addAddress($cliente['correo']);

    $mail->Subject = iconv('UTF-8', 'windows-1252', "Tu factura de reserva");
    $mail->Body    = "Hola. Adjuntamos la factura de tu estancia. ¡Gracias!";
    $mail->addAttachment("Factura_reserva.pdf");
    $mail->send();
} catch (Exception $e) {
    // Error silencioso
}

echo json_encode([
    "ok" => true,
    "registro" => $titular
]);
