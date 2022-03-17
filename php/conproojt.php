<?php
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT * FROM prog_ojt INNER JOIN ojts ON ojts.id_spc = prog_ojt.id_esp
    WHERE prog_ojt.estado = 0 ORDER BY id_pers ASC";
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
