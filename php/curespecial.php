<?php
	include("../conexion/conexion.php");
	session_start();
	$query = "SELECT * FROM curs_especial e, categorias c WHERE e.especial=c.gstIdcat ORDER BY id_espcur ASC";
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