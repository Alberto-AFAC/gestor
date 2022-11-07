<?php
	include("../conexion/conexion.php");
	session_start();
    //$cat = $_GET["cat"];
	$query = "SELECT * FROM subespecojt s, categorias c where s.estado='0' AND s.id_especialidad=c.gstIdcat  ORDER BY s.id_subesp ASC";
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