<?php
	include("../conexion/conexion.php");
	session_start();
	$query = "SELECT id_subojt, idtarea, ojt_subtarea, numsubt, ojts_subs.estado from ojts_subs
	INNER JOIN ojts ON ojts.id_ojt = ojts_subs.idtarea 
	WHERE ojts_subs.estado = 0 AND numsubt = 3";
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