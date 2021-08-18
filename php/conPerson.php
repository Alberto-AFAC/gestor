<?php
	include("../conexion/conexion.php");
	session_start();

		// if(isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])){
			
		// 	$id = $_SESSION['usuario']['id_usu'];
		
		// 	$sql = "SELECT gstAreID FROM personal 
		// 	WHERE personal.gstIdper = '".$id."' && personal.estado = 0 ";
		// 	$persona = mysqli_query($conexion,$sql);
		// 	$datos = mysqli_fetch_row($persona);

		// 	$query = "SELECT * FROM personal WHERE gstAreID=$datos[0] AND estado = 0 || gstCargo='COORDINADOR' AND estado = 0 || gstCargo='INSTRUCTOR' AND estado = 0 ORDER BY gstIdper DESC";
		// 	$resultado = mysqli_query($conexion, $query);

		// 	if(!$resultado){
		// 	die("error");
		// 	}else{
		// 	while($data = mysqli_fetch_assoc($resultado)){

		// 	$arreglo["data"][] = $data; 
		// 	}
		// 	if(isset($arreglo)&&!empty($arreglo)){

		// 	echo json_encode($arreglo);
		// 	}else{

		// 	echo $arreglo='0';
		// 	}
		// 	}

		// }else{

			$query = "SELECT * FROM personal WHERE estado = 0 ORDER BY gstIdper DESC";
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


		//}

	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>


