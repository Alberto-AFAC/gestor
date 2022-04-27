<?php

include("../conexion/conexion.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../php-mailer2/Exception.php';
require '../php-mailer2/PHPMailer.php';
require '../php-mailer2/SMTP.php';


	$idcurso = $_POST['codigoCurso'];
	// $correoRs = $_POST['correoResponsable'];
	$query = "SELECT codigo, gstTitlo,gstIdlsc,gstNombr,gstTipo, gstCorro, gstCinst, gstProvd,DATE_FORMAT(fcurso,'%d/%m/%Y') AS inicia,hcurso,gstCargo,sede,modalidad, gstCorro FROM listacursos 
			  INNER JOIN cursos ON idmstr = gstIdlsc
			  INNER JOIN personal ON gstIdper = idinsp
			  WHERE codigo = '$idcurso'";
	$resultado = mysqli_query($conexion, $query);
	$resultado2 = mysqli_query($conexion, $query);
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.mailtrap.io';
$mail->Port = 2525;
$mail->SMTPAuth = true;
$mail->Username = '2e29f140ad45a5';
$mail->Password = 'e063fd8f4c603a';
$mail->setFrom('notificaciones@afac-avciv.com', 'NOTIFICACIONES AFAC');
$mail->addReplyTo('notificaciones@afac-avciv.com', 'NOTIFICACIONES AFAC');
$mail->Subject = 'NUEVO CURSO PROGRAMADO';
while($curso = mysqli_fetch_assoc($resultado)){
	if($curso['gstCinst'] == '0' || $curso['gstCinst'] == ''){
		$to = $curso['gstCorro'];
	} else{
		$to = $curso['gstCinst'];
	}
	if($curso['sede'] == '0'){
		$sede = "SIN SEDE";
	}
$mail->addAddress("{$to}");
}

// $mail->addAddress("jorge.mondragon@sct.gob.mx");
// $mail->addCC("jmondragonescamilla@gmail.com");
$mail->isHTML(true);                                  //Set email format to HTML
$mail->CharSet = 'UTF-8';
$curso2 = mysqli_fetch_assoc($resultado2);
		$msg .= "<center><img src='https://afac-avciv.com/dist/img/correo.png' width='320px;' alt='imagen de cabezera' disabled></center><table width='100%'><br>
				<tr><td bgcolor='#00A7B5' align='center'><span style='font-size: 19px; color: white'>".$curso2['gstTitlo']."</span></td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>FOLIO: ".$curso2['gstIdlsc']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>NOMBRE DEL PARTICIPANTE: ".$curso2['gstNombr']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>TIPO DE CURSO2: ".$curso2['gstTipo']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>FECHA INICIO: ".$curso2['inicia']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>HORA: ".$curso2['hcurso2']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>CARGO: ".$curso2['gstCargo']." </td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>SEDE DEL CURSO: $sede </td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>MODALIDAD: ".$curso2['modalidad']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'><a href='http://afac-avciv.com/'>CONFIRMAR ASISTENCIA</a></td></tr>
				<hr><center>
				<h2 style='font-color: red; font-size: 13px;'>NOTA IMPORTANTE: NO RESPONDER, ESTE CORREO SE GENERA AUTOMATICAMENTE.</h2>
				</center><hr>
				</table>";
			$mail->MsgHTML($msg);
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'The email message was sent.';
}



	    
 ?>