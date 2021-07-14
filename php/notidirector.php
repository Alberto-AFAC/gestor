<?php
	include("../conexion/conexion.php");
	session_start();

	$id = $_SESSION['usuario']['id_usu'];
	// $Direje= $datos[1];
	$query = "SELECT * FROM personal WHERE gstCargo = 'NUEVO INGRESO'  AND estado = 0 ORDER BY gstCargo DESC";
	$resultado = mysqli_query($conexion, $query);
	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

			$arreglo["data"][] = $data; 
		}
		if(isset($arreglo)&&!empty($arreglo)){

			echo json_encode($arreglo);
		}else{

			echo $arreglo='0';
		}
	}
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>