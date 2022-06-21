<?php
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT c.*,u.*, concat((select gstNombr from personal where gstIdper = c.id_persona)) AS PARTICIPANTE_NOMBRE,concat((select gstApell from personal where gstIdper = c.id_persona)) AS PARTICIPANTE_APELLIDO,concat((select gstTitlo from listacursos where gstIdlsc = u.idmstr)) AS NOMBRE_CURSO FROM constancias c, cursos u where c.id_persona=u.idinsp and c.id_codigocurso=u.codigo and u.estado=0";
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
