<?php
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT gstNombr,gstApell,id_codigocurso,gstCargo,gstIdper,id,listregis,lisasisten,listreportein,cartdescrip,regponde,infinal,evreaccion,confirmar,evaluacion,codigo FROM constancias 
	INNER JOIN personal ON gstIdper=id_persona 
	INNER JOIN cursos ON cursos.idinsp=constancias.id_persona and cursos.codigo=constancias.id_codigocurso
	WHERE gstCargo = 'INSPECTOR' OR gstCargo = 'ADMINISTRATIVO' OR gstCargo = 'DIRECTOR'";

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