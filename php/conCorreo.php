<?php
include("../conexion/conexion.php");
 $correo = $_POST['correo'];

 if($valor = conCorreo($correo,$conexion)){

 	if(actCorreo($valor,$conexion)){	echo "0";	}else{	echo   "1";   }

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