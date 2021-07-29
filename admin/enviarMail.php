<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../php-mailer2/Exception.php';
require '../php-mailer2/PHPMailer.php';
require '../php-mailer2/SMTP.php';
if($_POST['action'] == 'call_this') {

   $mail = new PHPMailer(true);
	try {
		//Server settings
		$mail->SMTPDebug = 0;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     	//Set the SMTP server to send through
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "tls";                                //Enable SMTP authentication
		$mail->Username   = 'jmondragonescamilla@gmail.com';                     //SMTP username
		$mail->Password   = 'ELVIS_wolf97';                               //SMTP password
		$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
		//Recipients
		$mail->setFrom('jmondragonescamilla@gmail.com', 'NOTIFICACIONES AFAC');
		$mail->addAddress('jmondragonescamilla@gmail.com', 'Alberto');     //Add a recipient
		// $mail->addReplyTo('info@example.com', 'Information');
		// $mail->addCC('jessica.soto928@gmail.com');
		// $mail->addBCC('bcc@example.com');
		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'CURSO PROGRAMADO';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$msg = "<center><img src='https://www.aeropuertodetoluca.com.mx/en/admin/images/iconos-autoridad/autoridad-aeronautica.png' width='320px;' alt='imagen de cabezera' disabled></center><table width='100%'><br>
				<tr><td bgcolor='#00A7B5' align='center'><span style='font-size: 19px; color: white'>INSCRITO CON EXITO!</span></td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Folio:</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Nombre del participante:</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Tipo de curso:</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Fecha Inicio:</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Hora: Hrs</td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Cargo: </td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Sede del curso: </td></tr>
				<tr><td style='text-align: center; font-size: 15px;'>Modalidad:</td></tr>
				<hr><center>
				<font color='#a1a1a1'>NOTA IMPORTANTE: Este correo se genera automaticamente. Por favor no responda o reenvie correos a de esta cuenta de e-mail.
				</center><hr>
				</table>";
			$mail->MsgHTML($msg);
	
		$mail->send();
		echo 'El correo se envió con exito';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
  }




?>