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
    
		

		$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.hostinger.com';
$mail->SMTPSecure = 'ssl';                          
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = 'notificaciones@afac-avciv.com';
$mail->Password = 'Agencia.SCT.2021.';
$mail->setFrom('notificaciones@afac-avciv.com', 'NOTIFICACIONES AFAC');

$mail->Subject = 'NUEVO CURSO PROGRAMADO';
$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'NUEVO CURSO PROGRAMADO';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->CharSet = 'UTF-8';
        while($curso = mysqli_fetch_assoc($resultado)){
            $to_array = explode(',', $correoRs);
            foreach($to_array as $address)
            {
                $mail->addAddress($address, 'Usuario');
            }
		$msg .= "<p>".$curso['gstTitlo']."</p>
        <p>FOLIO: ".$curso['gstIdlsc']."</p>
        <p>NOMBRE DEL PARTICIPANTE: ".$curso['gstNombr']."</p>
        <p>TIPO DE CURSO: ".$curso['gstTipo']."</p>
        <p>FECHA INICIO: ".$curso['inicia']."</p>
        <p>HORA: ".$curso['hcurso']."</p>
        <p>CARGO: ".$curso['gstCargo']."</p>
        <p>SEDE DEL CURSO: ".$curso['sede']." </p>
        <p>MODALIDAD: ".$curso['modalidad']."</p>";
        
			$mail->MsgHTML($msg);
        $mail->send();
    }
 ?>