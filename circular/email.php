<?php

$nombre = $_POST['nombre'];
$persona = $_POST['persona'];
$correo_usuario = $_POST['correo'];
$asunto = utf8_decode('Opinión');
$mensaje = $_POST['comentario'];
$destinatario = $_POST['correodes'];

$cuerpo = ''.utf8_decode('
<p> Persona: '.$persona.'</p>
<p> Nombre: '.$nombre.'</p>
<p> Correo usuario: '.$correo_usuario.'</p>
<hr>
<p>'.$mensaje.'</p>');

 
//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: $nombre <$correo_usuario>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
//$headers .= "Reply-To: angelcanseco.c@gmail.com\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibián copia 
$headers .= "Cc: lsanchra@cst.gob.mx\r\n"; 
//$headers .= "Cc: amagall@cst.gob.mx\r\n";
//direcciones que recibirán copia oculta 
$headers .= "Bcc: amagall@sct.gob.mx\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers) 
?>
