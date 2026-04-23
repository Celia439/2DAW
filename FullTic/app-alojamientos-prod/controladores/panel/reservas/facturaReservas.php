<?php
require_once(LIBRERIA_PHP . '/fpdf/fpdf.php');

// usar de la versión moderna
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
// Cargas el "autocargador" de Composer que invoca a PHPMailer automáticamente
require_once(LIBRERIA_PHP . '/vendor/autoload.php');

$reserva = new reservas();

$id = $_POST["id"];


$registro = $reserva->getReservaById($id);

$pdf = new FPDF();
$pdf->AddPage();
//Rellenar el pfd con los datos de la factura de la reserva.
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, '¡Mi primera página pdf con FPDF!');
$pdf->Output("prueba", "F");



//Configuración para enviar el email.
//Crear el objeto mail (true es para ver errores)
$mail = new PHPMailer(true);
try {
    //Configuración del servidor SMTP
    $mail->isSMTP(); //protocolo
    $mail->Host = 'smtp.panel1247.com';
    $mail->SMTPAuth = true; //autenticación
    $mail->Username = 'test@infosocorrista.com';
    $mail->Password = '$qh-g]3v].;]:N';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    //  -    Configurar remitente y destinatario   -
    $mail->setFrom('acreditaciones@registronacionalsocorristas.es', 'RNSOS Registro Nacional Socorristas');
    $mail->addAddress($registro[0]->email); //Destinatario
    //  -   Configurar asunto cuerpo y adjunto    -
    $mail->Subject = "Factura de reserva";
    $mail->Body = "Adjunto factura de reserva";
    $mail->addAttachment("prueba");
    $mail->send();
} catch (Exception $e) {

    echo "Fallo al enviar correo. Error de Mailer: {$mail->ErrorInfo}";
};


echo json_encode([
    "ok" => !empty($registro),
    "registro" => $registro[0]
]);
