<?php
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT * FROM personal 
			  INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat
			  INNER JOIN area ON personal.gstIDara = area.id_area
			  INNER JOIN departamentos ON departamentos.id_departamentos = personal.gstIDSub
			  WHERE personal.estado = 0 ORDER BY gstIdper DESC";
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


