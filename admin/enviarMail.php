<?php

include("../conexion/conexion.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../php-mailer2/Exception.php';
require '../php-mailer2/PHPMailer.php';
require '../php-mailer2/SMTP.php';


	$idcurso = $_POST['gstIdlsc'];
	
	$query = "SELECT gstTitlo,gstIdlsc,gstNombr,gstTipo, gstProvd,DATE_FORMAT(fcurso,'%d/%m/%Y'),hcurso,gstCargo,sede,modalidad FROM listacursos 
			  INNER JOIN cursos ON idmstr = gstIdlsc
			  INNER JOIN personal ON gstIdper = idinsp
			  WHERE gstIdlsc = $idcurso";
	$resultado = mysqli_query($conexion, $query);
    while($curso = mysqli_fetch_row($resultado)){
	 //$curso[1];
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'notificaciones@afac-avciv.com';
$mail->Password = 'Agencia.SCT2021';
$mail->setFrom('notificaciones@afac-avciv.com', 'Notificaciones AFAC');
$mail->addAddress('jmondragonescamilla@gmail.com', 'Alberto Escamilla');
// $mail->addBCC('laura.soto@sct.gob.mx', 'Jessica Soto');
$mail->Subject = 'CURSO PROGRAMADO';
$mail->msgHTML(file_get_contents('message.html'), __DIR__);
//$mail->addAttachment('test.txt');
	$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'CURSO PROGRAMADO';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$msg = "<center><img src='https://www.aeropuertodetoluca.com.mx/en/admin/images/iconos-autoridad/autoridad-aeronautica.png' width='320px;' alt='imagen de cabezera' disabled></center><table width='100%'><br>
				<tr><td bgcolor='#00A7B5' align='center'><span style='font-size: 19px; color: white'>".$curso[0]."</span></td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Folio: ".$curso[1]."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Nombre del participante: ".$curso[2]."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Tipo de curso: ".$curso[3]."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Fecha Inicio: ".$curso[5]."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Hora: ".$curso[6]."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Cargo: ".$curso[7]." </td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Sede del curso: ".$curso[8]." </td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Modalidad: ".$curso[9]."</td></tr>
				<hr><center>
				<font color='#a1a1a1'>NOTA IMPORTANTE: Este correo se genera automaticamente. Por favor no responda o reenvie correos a de esta cuenta de e-mail.
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