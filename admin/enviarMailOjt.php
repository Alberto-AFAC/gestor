<?php

include("../conexion/conexion.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../php-mailer2/Exception.php';
require '../php-mailer2/PHPMailer.php';
require '../php-mailer2/SMTP.php';


	$idojt = $_POST['idojt'];
	$idper = $_POST['idper'];
	$query = "SELECT
	*
FROM
	prog_ojt
	INNER JOIN personal ON gstIdper = id_pers
    INNER JOIN ojts ON prog_ojt.id_tarea = ojts.id_ojt
    INNER JOIN ojts_subs ON prog_ojt.id_subtarea = ojts_subs.id_subojt
WHERE
	prog_ojt.estado = 0 
	AND id_pers = $idper 
	AND id_proojt = $idojt
ORDER BY
	id_proojt ASC";
	$resultado = mysqli_query($conexion, $query);
    while($prueba = mysqli_fetch_assoc($resultado)){
        if($prueba['gstCinst'] == '0' || $prueba['gstCinst'] == ''){
			$to = $prueba['gstCorro'];
		} else{
			$to = $prueba['gstCinst'];
		}
   
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.mailtrap.io';
        $mail->Port = 2525;
        $mail->SMTPAuth = true;
        $mail->Username = '48f2c0fd8f1380';
        $mail->Password = 'd82ef1999618b4';
        $mail->setFrom('notificaciones@afac-avciv.com', 'NOTIFICACIONES AFAC');
        $mail->addReplyTo('notificaciones@afac-avciv.com', 'NOTIFICACIONES AFAC');
        $mail->Subject = 'OJT PENDIENTES';
        $mail->addAddress("{$to}");
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->CharSet = 'UTF-8';
                $msg .= "<center><img src='https://afac-avciv.com/dist/img/correo.png' width='320px;' alt='imagen de cabezera' disabled></center><table width='100%'><br>
				<tr><td bgcolor='#00A7B5' align='center'><span style='font-size: 16px; color: white'>TAREA PROGRAMADA</span></td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>TAREA: ".$prueba['ojt_principal']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>SUBTAREA PROGRAMADA: ".$prueba['ojt_subtarea']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>NIVEL: ".$prueba['nivel']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>FECHA INICIO: ".$prueba['fec_inioj']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>FECHA FIN: ".$prueba['fec_finoj']."</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>ESTATUS: ".$prueba['confirojt']."</td></tr>
				<hr><center>
				<h2 style='font-color: red; font-size: 13px;'>NOTA IMPORTANTE: NO RESPONDER, ESTE CORREO SE GENERA AUTOMATICAMENTE.</h2>
				</center><hr>
				</table>";
                    $mail->MsgHTML($msg);
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo '';
        }
        
            }
        
        
                
         ?>