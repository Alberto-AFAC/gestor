<?php
include('conexion/conexion.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php-mailer2/Exception.php';
require 'php-mailer2/PHPMailer.php';
require 'php-mailer2/SMTP.php';
$query = "SELECT * FROM personal WHERE gstNmpld = '7141684'";
	$resultado = mysqli_query($conexion, $query);
    while($prueba = mysqli_fetch_assoc($resultado)){
        $email = 'angel.canseco@afac.gob.mx';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'notificaciones@mesa-ayuda.afac-avciv.com';
$mail->Password = 'Aeronavegabilidad.2021.$';
$mail->setFrom('notificaciones@mesa-ayuda.afac-avciv.com', 'NOTIFICACIONES AFAC');
$mail->addReplyTo('notificaciones@mesa-ayuda.afac-avciv.com', 'NOTIFICACIONES AFAC');
$mail->addAddress($email, 'Usuario');
$mail->addCC('jmondragonescamilla@gmail.com', 'Usuario');
$mail->Subject = 'Testing PHPMailer';
$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->Body = 'ESTE ES UN MENSAJE DE PRUEBA EN SERVIDOR DE CORREOS FAVOR DE IGNORAR';
//$mail->addAttachment('test.txt');
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'EL MAIL SE HA ENVIADO CON ÉXITO.';
}
}
?>