<?php

include("../conexion/conexion.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../php-mailer2/Exception.php';
require '../php-mailer2/PHPMailer.php';
require '../php-mailer2/SMTP.php';


	$idcurso = $_POST['codigoCurso'];
	$correoRs = $_POST['correoResponsable'];
	
	$query = "SELECT codigo, gstTitlo,gstIdlsc,gstNombr,gstTipo, gstCorro, gstCinst, gstProvd,DATE_FORMAT(fcurso,'%d/%m/%Y') AS inicia,hcurso,gstCargo,sede,modalidad, gstCorro FROM listacursos 
			  INNER JOIN cursos ON idmstr = gstIdlsc
			  INNER JOIN personal ON gstIdper = idinsp
			  WHERE codigo = '$idcurso'";
	$resultado = mysqli_query($conexion, $query);
    while($curso = mysqli_fetch_assoc($resultado)){
		if($curso['gstCinst'] == ''){
			$to = $curso['gstCorro'];
		} else{
			$to = $curso['gstCinst'];
		}
       
	 //$curso[1];

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
// $mail->Host = 'smtp.hostinger.com';
$mail->Host = 'smtp.gmail.com';
$mail->SMTPSecure = 'tls';                          
$mail->Port = 587;
// $mail->SMTPSecure = 'ssl';                          
// $mail->Port = 465;
$mail->SMTPAuth = true;
// $mail->Username = 'notificaciones@afac-avciv.com';
$mail->Username = 'notificacionesafacmx@gmail.com';
$mail->Password = 'Agencia.SCT2021.';
// $mail->setFrom('notificaciones@afac-avciv.com', 'Notificaciones AFAC');
$mail->setFrom('notificacionesafacmx@gmail.com', 'NOTIFICACIONES AFAC');
$mail->addAddress('jmondragonescamilla@gmail.com', 'Alberto Escamilla');
// $mail->addAddress("{$to}");
$mail->addCC("{$correoRs}");
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
				<tr><td style='text-align: center; font-size: 15px;'>FOLIO: ".$curso['gstIdlsc']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>NOMBRE DEL PARTICIPANTE: ".$curso['gstNombr']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>TIPO DE CURSO: ".$curso['gstTipo']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>FECHA INICIO: ".$curso['inicia']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>HORA: ".$curso['hcurso']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>CARGO: ".$curso['gstCargo']." </td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>SEDE DEL CURSO: ".$curso['sede']." </td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>MODALIDAD: ".$curso['modalidad']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'><a href='http://afac-avciv.com/'>CONFIRMAR ASISTENCIA</a></td></tr>
				<hr><center>
				<h2 style='font-color: red; font-size: 13px;'>AQUI VA EL CORREO: ".$correoRs." NOTA IMPORTANTE: NO RESPONDER, ESTE CORREO SE GENERA AUTOMATICAMENTE.</h2>
				</center><hr>
				</table>";
			$mail->MsgHTML($msg);
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'The email message was sent.';
}
    }
 ?>
  
    