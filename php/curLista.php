<?php
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT * FROM cursos 
			  INNER JOIN personal ON idinsp = gstIdper 
			  INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat
			  WHERE cursos.estado=0";
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
