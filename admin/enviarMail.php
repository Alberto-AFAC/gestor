<?php
session_start();
if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
$id = $_SESSION['usuario']['id_usu'];
}

include("../conexion/conexion.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../php-mailer2/Exception.php';
require '../php-mailer2/PHPMailer.php';
require '../php-mailer2/SMTP.php';


	$idcurso = $_POST['codigoCurso'];

	historias($id,$idcurso,$conexion);	
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
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'notificaciones@afac-avciv.com';
$mail->Password = 'Aeronavegabilidad.2021.$';
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
// $mail->addAddress("jorge.mondragon@sct.gob.mx");
// $mail->addCC("jmondragonescamilla@gmail.com");
$mail->isHTML(true);                                  //Set email format to HTML
$mail->CharSet = 'UTF-8';
		$msg = "<center><img src='https://afac-avciv.com/dist/img/correo.png' width='320px;' alt='imagen de cabezera' disabled></center><table width='100%'><br>
				<tr><td bgcolor='#00A7B5' align='center'><span style='font-size: 19px; color: white'>".$curso['gstTitlo']."</span></td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>FOLIO: ".$curso['gstIdlsc']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>NOMBRE DEL PARTICIPANTE: ".$curso['gstNombr']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>TIPO DE CURSO: ".$curso['gstTipo']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>FECHA INICIO: ".$curso['inicia']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>HORA: ".$curso['hcurso']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>CARGO: ".$curso['gstCargo']." </td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>SEDE DEL CURSO: $sede </td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>MODALIDAD: ".$curso['modalidad']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'><a href='http://afac-avciv.com/'>CONFIRMAR ASISTENCIA</a></td></tr>
				<hr><center>
				<h2 style='font-color: red; font-size: 13px;'>NOTA IMPORTANTE: NO RESPONDER, ESTE CORREO SE GENERA AUTOMATICAMENTE.</h2>
				</center><hr>
				</table>";
			$mail->MsgHTML($msg);
			$mail->send();
			$mail->clearAddresses();
}

	function historias($id,$idcurso,$conexion){
	ini_set('date.timezone','America/Mexico_City');
	$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
	$query = "INSERT INTO historial VALUES (0,$id,'ENVIÓ CONVOCATORIA','FOLIO DEL CURSO: $idcurso','$fecha')";
	if(mysqli_query($conexion,$query)){
	return true;
	}else{
	return false;
	}
	}
	    
 ?>