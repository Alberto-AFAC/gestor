<?php
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT gstNombr,gstApell,id_codigocurso,gstCargo,gstIdper,id,listregis,lisasisten,listreportein,cartdescrip,regponde,infinal,evreaccion,confirmar,evaluacion,codigo,idinsp,idcoor FROM constancias 
	INNER JOIN personal ON gstIdper=id_persona 
	INNER JOIN cursos ON cursos.idinsp=constancias.id_persona and cursos.codigo=constancias.id_codigocurso
	  ORDER BY gstNombr ASC ";

	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

		$idinsp = $data['idinsp'];
		$codigoid = $data['codigo'];

		$queriy = "SELECT * FROM instructor WHERE codigoInst = '$codigoid' AND id_per = $idinsp AND estado = 0";
		$result = mysqli_query($conexion, $queriy);

		if($rest = mysqli_fetch_array($result)){	
				$cargo = 'INSTRUCTOR';	
		}else{
				$cargo = 'INSPECTOR';
		}

		if($data['idcoor']==$data['idinsp']){	}else

		if($cargo == 'INSPECTOR'){
				$arreglo["data"][] = $data; 
			}
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