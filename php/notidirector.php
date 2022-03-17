<?php
	include("../conexion/conexion.php");
	session_start();

	 	$id = $_SESSION['usuario']['id_usu'];

		$quer = "SELECT gstAreID,gstIDara FROM personal WHERE gstIdper = $id AND estado = 0 ";
		$resul = mysqli_query($conexion, $quer);

		$dato = mysqli_fetch_row($resul);
		$eje = $dato[1];

	// $Direje= $datos[1];
	$query = "SELECT * FROM personal WHERE gstAreID = $eje AND `gstCargo` = 'NUEVO INGRESO' AND estado = 0 ORDER BY gstCargo DESC";
	$resultado = mysqli_query($conexion, $query);
	if(!$resultado){
		die("error");
	}else{
		$ingreso = 0;
		while($data = mysqli_fetch_assoc($resultado)){

		if($_SESSION['usuario']['privilegios'] == "DIRECTOR" || $_SESSION['usuario']['privilegios'] == "DIRECTOR_CIAAC" || $_SESSION['usuario']['privilegios'] == "EJECUTIVO"){
			$ingreso++;			
		}else{
			$ingreso = 0;
		}	

		}


		$data['Nperson'] = $ingreso;
		$arreglo["data"][] = $data;

		if(isset($arreglo)&&!empty($arreglo)){

			echo json_encode($arreglo);
		}else{

			echo $arreglo='0';
		}
	}
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>