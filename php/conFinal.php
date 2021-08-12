<?php
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT 
				personal.gstIdper,
				personal.gstNombr,
				cursos.id_curso,
				cursos.codigo,
				reaccion.id_curso,
				listacursos.gstTitlo,
				constancias.listregis,
				constancias.lisasisten,
				constancias.listreportein,
				constancias.cartdescrip,
				constancias.regponde,
				constancias.infinal,
				constancias.evreaccion,
				constancias.copias,
				constancias.estado_cer
				FROM personal 
				INNER JOIN cursos ON personal.gstIdper = cursos.idinsp 
				INNER JOIN listacursos ON cursos.idmstr = listacursos.gstIdlsc 
				INNER JOIN constancias ON constancias.id_persona = personal.gstIdper 
				INNER JOIN reaccion ON reaccion.id_curso = cursos.id_curso";
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

