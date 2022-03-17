<?php
	include("../conexion/conexion.php");
	session_start();
	
	 $nemp = substr($_POST['datos'],2);

	 if(strlen($nemp)==6){
	 	$nemp = $nemp.'0';	
	 }else{
	 	$nemp;
	 }

	$query = "SELECT * FROM privilegio WHERE n_empleado = $nemp AND estado = 0";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

			// $data['privilegios'] = $priv;
			$arreglo["data"][] = $data; 
		}
		if(isset($arreglo)&&!empty($arreglo)){

			echo json_encode($arreglo);
		}else{

			echo $arreglo="0";
		}
	}
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>
