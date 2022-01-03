<?php

include("../conexion/conexion.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../php-mailer2/Exception.php';
require '../php-mailer2/PHPMailer.php';
require '../php-mailer2/SMTP.php';


	$idcurso = $_POST['codigoCurso'];
	$correoRs = $_POST['correoResponsable'];
	$query = "SELECT codigo, gstTitlo,gstIdlsc,gstNombr,gstApell, gstTipo, gstCorro, gstCinst, gstProvd,DATE_FORMAT(fcurso,'%d/%m/%Y') AS inicia,hcurso,gstCargo,sede,modalidad, gstCorro FROM listacursos 
			  INNER JOIN cursos ON idmstr = gstIdlsc
			  INNER JOIN personal ON gstIdper = idinsp
			  WHERE codigo = '$idcurso'";
	$resultado = mysqli_query($conexion, $query);
    $curso = mysqli_fetch_assoc($resultado);
    $x = 0;
		

		$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.hostinger.com';
$mail->SMTPSecure = 'ssl';                          
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = 'notificaciones@afac-avciv.com';
$mail->Password = 'Agencia.SCT.2021.';
	// $mail = new PHPMailer();
	// 	$mail->isSMTP();
	// 	$mail->Host = 'smtp.mailtrap.io';
	// 	$mail->SMTPAuth = true;
	// 	$mail->Port = 2525;
	// 	$mail->Username = '10a376e8596ee9';
	// 	$mail->Password = 'c2aeed30f4cf96';
	// 	$mail->SMTPSecure = 'tls'; 
$mail->setFrom('notificaciones@afac-avciv.com', 'NOTIFICACIONES AFAC');

$mail->Subject = 'NUEVO CURSO PROGRAMADO';
$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'NUEVO CURSO PROGRAMADO';
$mail->CharSet = 'UTF-8';
$body = '<p>NOMBRE DEL CURSO: <span style="font-weight: bold;">'.$curso['gstTitlo'].'</span></p>
<p>FECHA DE IMPARTICIÓN: <span style="font-weight: bold;">'.$curso['inicia'].'</span></p>
<p>MODALIDAD: <span style="font-weight: bold;">'.$curso['modalidad'].'</span></p>
EL CURSO ESTÁ DIRIGIDO AL PERSONAL QUE A CONTINUACIÓN SE ENLISTA:<br><br>
<table style="border-collapse: collapse; width: 100%; border: 1px solid black";><tr><th style="border-collapse: collapse; border: 1px solid black";>No.</th><th style="border-collapse: collapse; border: 1px solid black";>PARTICIPANTES DEL CURSO</th></tr>';
        while($curso = mysqli_fetch_assoc($resultado)){
            $x++;
            $to_array = explode(',', $correoRs);
            foreach($to_array as $address)
            {
                $mail->addAddress($address, 'Usuario');
            }
            $body .= "<tr><td style='border-collapse: collapse; border: 1px solid black';>".$x.".-</td><td style='border-collapse: collapse; border: 1px solid black';>".$curso['gstNombr']." ".$curso['gstApell']."</td></tr>"; 

		// $msg .= "MENSAJE DE PRUEBA PARA CORREOS AL RESPONSABLE";
    }
    $mail->Body = $body.'</table>';
            $mail->MsgHTML($body);
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'The email message was sent.';
            }
 ?>