<?php
	include("../conexion/conexion.php");
	session_start();
	
	$query = "
	SELECT gstIdspc,categorias.gstIdcat,gstCsigl,gstCatgr,especialidadcat.gstIDper FROM personal INNER JOIN especialidadcat ON personal.gstIdper = especialidadcat.gstIDper INNER JOIN categorias ON categorias.gstIdcat = especialidadcat.gstIDcat WHERE especialidadcat.estado=0 ORDER BY especialidadcat.gstIdspc ASC
	";
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