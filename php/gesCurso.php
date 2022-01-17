<?php
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT *,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as fcursof FROM cursos
			   INNER JOIN listacursos
			   ON gstIdlsc = idmstr WHERE idinsp != idcoor and idinsp != idinst and cursos.estado='0'";
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


