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
        $query2="SELECT
        gstIdper as idIns,
        gstNombr as nombreIns,
        gstApell as apellidoIns
    FROM
        prog_ojt
        INNER JOIN personal ON gstIdper = id_insojt
        WHERE 
        prog_ojt.estado = 0 
	AND id_pers = $idper 
	AND id_proojt = $idojt";
    $resultado2 = mysqli_query($conexion, $query2);
    $prueba2 = mysqli_fetch_assoc($resultado2);
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
        $mail->Username = 'c31a6579f87c66';
        $mail->Password = '7d41ddfac8c2b0';
        $mail->setFrom('notificaciones@afac-avciv.com', 'NOTIFICACIONES AFAC');
        $mail->addReplyTo('notificaciones@afac-avciv.com', 'NOTIFICACIONES AFAC');
        $mail->Subject = 'ENTRENAMIENTO OJT';
        $mail->addAddress("{$to}");
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->CharSet = 'UTF-8';
                $msg .="<body style='background: url('https://afac-avciv.com/images-web/fondocoree.png');'><div>
                <img src='https://afac-avciv.com/images-web/logoafac.png' alt='' srcset=''>
        
                <img src='https://afac-avciv.com/images-web/CIAAC%20logo.png' align='right' alt='' srcset=''>
            </div>
            <br >        
            <div style='position: absolute; width: 100%; height: 130px; background: #93291e; background: -webkit-linear-gradient(to right, #c90d23, #c90d23);background: linear-gradient(to right, #93291e, #c90d23);'>
                <br><b><label style='font-size:24px; font-family:Montserrat; color:#FEFDFD;  margin-left: 35%;float:none;' for=''>PROGRAMACIÓN</label></b>
                <b><label style='font-size:23px; font-family:Montserrat; color:#FEFDFD;  margin-left: 15%;float:none;' for=''>ENTRENAMIENTO EN EL PUESTO DE TRABAJO</label></b>
                <b><label style='font-size:25px; font-family:Montserrat; color:#FEFDFD;  margin-left: 47%;float:none;' for=''>OJT</label></b>
            </div>
            <br><br><br><br><br><br><br><br>
            <!-- COMISION -->
            <div style='margin-left: 40px; font-size:14px; font-family:Montserrat'>
                <b><label for=''>COMISIÓN:</label></b> <label id='comisiontxt' name='comisiontxt' for=''>".$prueba['comision']."</label>
            </div>
            <!-- LUGAR -->
            <div style='margin-left: 40px; font-size:14px; font-family:Montserrat'>
                <b><label for=''>LUGAR:</label></b> <label id='lugartxt' name='lugartxt' for=''>".$prueba['lugar']."</label>
            </div>
            <!-- FECHA DE INICIO-->
            <div style='margin-left: 40px; font-size:14px; font-family:Montserrat'>
                <b><label for=''>FECHA DE INICIO:</label></b> <label id='fecinitxt' name='fecinitxt' for=''>".$prueba['fec_inioj']."</label>
            </div>
            <!-- FECHA DE FIN-->
            <div style='margin-left: 40px; font-size:14px; font-family:Montserrat'>
                <b><label for=''>FECHA DE FIN:</label></b> <label id='fecfintxt' name='fecfintxt' for=''>".$prueba['fec_finoj']."</label>
            </div>
            <!-- NOMBRE DEL IVA APRENDIZ:-->
            <div style='margin-left: 40px; font-size:14px; font-family:Montserrat'>
                <b><label for=''>NOMBRE DEL IVA APRENDIZ:</label></b> <label id='nameiva' name='nameiva' for=''>".$prueba['gstNombr']." ".$prueba['gstApell']."</label>
            </div>
            <!-- NOMBRE DEL INSTRUCTOR:-->
            <div style='margin-left: 40px; font-size:14px; font-family:Montserrat'>
                <b><label for=''>NOMBRE DEL INSTRUCTOR OJT:</label></b> <label id='nameinsojt' name='nameinsojt' for=''>".$prueba2['nombreIns']." ".$prueba2['apellidoIns']."</label>
            </div><br>
            <div style='margin-left: 40%; font-size:14px; font-family:Montserrat'>
                <a  align='center' href='https://afac-avciv.com/'>CONFIRMAR ASISTENCIA</a>
            </div><br>
            <div style='margin-left: 39%; font-size:14px; font-family:Montserrat'>
                <b><label for=''>RESUMEN DE ACTIVIDADES:</label></b> <label id='nameinsojt' name='nameinsojt' for=''></label>
            </div><br>
            <div style='margin-left: 40px; font-size:14px; font-family:Montserrat'>
                <b><label for=''>NIVEL:</label></b> <label id='comisiontxt' name='comisiontxt' for=''>".$prueba['nivel']."</label>
            </div>
            <div style='margin-left: 40px; font-size:14px; font-family:Montserrat'>
                <b><label for=''>TAREA:</label></b> <label id='comisiontxt' name='comisiontxt' for=''>".$prueba['ojt_principal']."</label>
            </div>
            <div style='margin-left: 40px; font-size:14px; font-family:Montserrat'>
                <b><label for=''>SUBTAREA:</label></b> <label id='comisiontxt' name='comisiontxt' for=''> ".$prueba['ojt_subtarea']."</label>
            </div></body>";
                    $mail->MsgHTML($msg);
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo '';
        }
        
            }
        
        
                
         ?>