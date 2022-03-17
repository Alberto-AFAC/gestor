<?php
	include("../conexion/conexion.php");
	session_start();

	$id = $_SESSION['usuario']['id_usu'];
	
	$query = "SELECT * FROM semanal WHERE id_per = $id AND id_curso = 0 AND estado = 0";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

			$folio = $data['id_curso'];

			$data['folio'] = $folio;
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