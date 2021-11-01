<?php

include("../conexion/conexion.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../php-mailer2/Exception.php';
require '../php-mailer2/PHPMailer.php';
require '../php-mailer2/SMTP.php';


	$idcurso = $_POST['gstIdlsc'];
	
	$query = "SELECT gstTitlo,gstIdlsc,gstNombr,gstTipo, gstCorro, gstCinst, gstProvd,DATE_FORMAT(fcurso,'%d/%m/%Y') AS inicia,hcurso,gstCargo,sede,modalidad, gstCorro FROM listacursos 
			  INNER JOIN cursos ON idmstr = gstIdlsc
			  INNER JOIN personal ON gstIdper = idinsp
			  WHERE gstIdlsc = $idcurso";
	$resultado = mysqli_query($conexion, $query);
    while($curso = mysqli_fetch_assoc($resultado)){
        $to = $curso['gstCinst'];
	 //$curso[1];

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.hostinger.com';
$mail->SMTPSecure = 'ssl';                          
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = 'notificaciones@afac-avciv.com';
$mail->Password = 'Agencia.SCT2021.';
$mail->setFrom('notificaciones@afac-avciv.com', 'Notificaciones AFAC');
// $mail->addAddress('jmondragonescamilla@gmail.com', 'Alberto Escamilla');
$mail->addAddress("{$to}");
$mail->addBCC('jmondragonescamilla@gmail.com');
$mail->Subject = 'CURSO PROGRAMADO';
$mail->msgHTML(file_get_contents('message.html'), __DIR__);
//$mail->addAttachment('test.txt');
	$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'CURSO PROGRAMADO';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$mail->CharSet = 'UTF-8';
		$msg = "<center><img src='https://www.aeropuertodetoluca.com.mx/en/admin/images/iconos-autoridad/autoridad-aeronautica.png' width='320px;' alt='imagen de cabezera' disabled></center><table width='100%'><br>
				<tr><td bgcolor='#00A7B5' align='center'><span style='font-size: 19px; color: white'>".$curso['gstTitlo']."</span></td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Folio: ".$curso['gstIdlsc']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Nombre del participante: ".$curso['gstNombr']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Tipo de curso: ".$curso['gstTipo']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Fecha Inicio: ".$curso['inicia']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Hora: ".$curso['hcurso']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Cargo: ".$curso['gstCargo']." </td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Sede del curso: ".$curso['sede']." </td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Modalidad: ".$curso['modalidad']."</td></tr>
				<hr><center>
				<font color='#a1a1a1'>NOTA IMPORTANTE: Este correo es de prueba, por favor ignorarlo.
				</center><hr>
				</table>";
			$mail->MsgHTML($msg);
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'The email message was sent.';
}

// SE GENERA SIN PHP MAILER
    // ini_set( 'display_errors', 1 );
    // error_reporting( E_ALL );
    // $from = "notificaciones@afac-avciv.com";
    // $to = "jmondragonescamilla@gmail.com";
    // $subject = "Pruebas de correo";
    // $message = '<html><body>';
	// $message .= '<center><img src="https://www.aeropuertodetoluca.com.mx/en/admin/images/iconos-autoridad/autoridad-aeronautica.png" width="320px;" alt="imagen de cabezera" disabled></center><table width="100%"><br>';
	// $message .= '<tr><td bgcolor="#00A7B5" align="center"><span style="font-size: 19px; color: white">'.$curso[0].'</span></td></tr>';
	// $message .= '<tr><td style="text-align: center; font-size: 15px;">Folio: '.$curso[1].'</td></tr>';
	// $message .= '<tr><td style="text-align: center; font-size: 15px;">Nombre del participante: '.$curso[2].'</td></tr>';
	// $message .= '<tr><td style="text-align: center; font-size: 15px;">Tipo de curso: '.$curso[3].'</td></tr>';
	// $message .= '<tr><td style="text-align: center; font-size: 15px;">Fecha Inicio: '.$curso[5].'</td></tr>';
	// $message .= '<tr><td style="text-align: center; font-size: 15px;">Hora: '.$curso[6].'</td></tr>';
	// $message .= '<tr><td style="text-align: center; font-size: 15px;">Cargo: '.$curso[7].' </td></tr>';
	// $message .= '<tr><td style="text-align: center; font-size: 15px;">Sede del curso: '.$curso[8].' </td></tr>';
	// $message .= '<tr><td style="text-align: center; font-size: 15px;">Modalidad: '.$curso[9].'</td></tr>';
	// $message .= "</body></html>";
    // $headers = "From:" . $from;
    // $headers .= "MIME-Version: 1.0\r\n";
	// $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    //  if (mail($to, $subject, $message, $headers)) {
    //           echo 'El mensaje ha sido enviado con exito.';
    //         } else {
    //           echo 'El mensaje falló.';
    //         }
            
    }
 ?>
  
    