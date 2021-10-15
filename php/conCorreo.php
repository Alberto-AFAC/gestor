<?php
include("../conexion/conexion.php");
 $correo = $_POST['correo'];

 if($valor = conCorreo($correo,$conexion)){

 	if(actCorreo($valor,$conexion)){	
	
		ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "notificaciones@afac-avciv.com";
    $to = "jmondragonescamilla@gmail.com";
    $subject = "RESTABLECER CONTRASEÑA";
    $message = '<html><body>';
	$message .= '<h1>La contraseña de acceso es la siguiente: '.$res[22].'</h1>';
	$message .= "</body></html>";
    $headers = "From:" . $from;
    $headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

     if (mail($to, $subject, $message, $headers)) {
              echo 'El mensaje ha sido enviado con exito.';
            } else {
              echo 'El mensaje falló.';
            }
	
 	    
 	    
 	}else{	echo   "1";   }

 }else{
 	echo "2";
 }

 function conCorreo($correo,$conexion){

$query="SELECT * FROM personal 
		WHERE gstCorro = '$correo' AND estado = 0 
		OR gstCinst = '$correo' AND estado = 0
		OR gstSpcID = '$correo' AND estado = 0
		";
$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
		return '0';
		}else{
			 $res = mysqli_fetch_row($resultado);

			  return $res[22];
		}
		$this->conexion->cerrar();
} 
function actCorreo($valor,$conexion){


//$nemple = base64_encode($valor);
$nemple = $valor;
$query = "UPDATE accesos INNER JOIN personal ON id_usu = gstIdper SET password = '$nemple' WHERE gstNmpld = '$valor' AND estado = 0";


	if(mysqli_query($conexion,$query)){
		return true;
	}else{
		return false;
	}	
	$this->conexion->cerrar();
}



?>