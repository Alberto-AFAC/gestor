<?php
	include("../conexion/conexion.php");
	session_start();
	
	$idper = $_POST['gstIdper'];

	$quer = "SELECT *,
	DATE_FORMAT(fecactual, '%d/%m/%Y') AS fecactual 
	FROM inspectordoc WHERE idperdoc = $idper";

	$resultado = mysqli_query($conexion, $quer);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

		
		$arreglo["data"][] = $data; 


			}

		}
		if(isset($arreglo)&&!empty($arreglo)){

			echo json_encode($arreglo);
		}else{

			echo $arreglo='0';
		}
	
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>