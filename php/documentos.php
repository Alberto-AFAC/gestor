<?php
	include("../conexion/conexion.php");
	session_start();
	
	$idper = 1321;

	$query = "	SELECT * FROM listadoc WHERE estado = 0";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

			$doc = $data['id_doc'];
	$queri = "
	SELECT *,
	DATE_FORMAT(fecactual, '%d/%m/%Y') AS fecactual 
	FROM personaldoc WHERE documento = $doc AND idperdoc = $idper AND estado = 0";
	$resul = mysqli_query($conexion, $queri);

	if($res = mysqli_fetch_array($resul)){
		$data['docajunto'] = $res['docajunto'];
		$data['fecactual'] = $res['fecactual'];	
		$data["documentos"] = 'SI EXISTE';		
		$arreglo["data"][] = $data; 
	}else{
		$data["documentos"] = 'NO EXISTE';	
		$arreglo["data"][] = $data; 
	}

			}

		}
		if(isset($arreglo)&&!empty($arreglo)){

			echo json_encode($arreglo);
		}else{

			echo $arreglo='0';
		}
	
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>