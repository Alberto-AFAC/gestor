<?php
	include("../conexion/conexion.php");
	session_start();

	$id = $_SESSION['usuario']['id_usu'];

	$query = "SELECT * FROM cursos 
	INNER JOIN listacursos ON idmstr = gstIdlsc
	WHERE idinsp = $id AND evaluacion = 0 ORDER BY id_curso DESC";
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


