<?php
	include("../conexion/conexion.php");
	session_start();
	$idResp = $_POST['idResp'];
	$query = "SELECT gstNombr,gstApell,gstTitlo,id_tare,evalua
			  FROM tareas 
			  INNER JOIN tarearealizar ON idtarea = id_tar  
			  INNER JOIN personal ON idiva = gstIdper
			  INNER JOIN listacursos ON idcur = gstIdlsc 
			  WHERE idtarea = $idResp";
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
