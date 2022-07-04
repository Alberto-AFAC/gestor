<?php
	include("../conexion/conexion.php");
	session_start();
	$cursos1 = $_GET["cursos1"];
	$query = "SELECT * FROM cursos c, personal p where c.idinsp = p.gstIdper and c.estado='0' and c.idinsp!=c.idcoor and c.idinsp!=c.idinst and c.codigo='$cursos1'";
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