<?php
	include("../conexion/conexion.php");
	session_start();

 	$query = "SELECT * FROM ojts ";

	// $query = "SELECT * FROM ojts INNER JOIN ojts_subs ON  `id_ojt` = `idtarea` WHERE ojts_subs.estado = 0";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

			$idOjt = $data['id_ojt'];

		$query2 = "SELECT * FROM ojts_subs WHERE idtarea = $idOjt AND estado = 0";
		$result = mysqli_query($conexion, $query2);
		if($datas = mysqli_fetch_array($result)){

			$data["ojt"] = 'SUB TAREAS';

			}else{
			$data["ojt"] = 'SIN SUB TAREAS';
			}

//			$idOjt = $data['ojt'] = 'OK';
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