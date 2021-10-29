<?php
	include("../conexion/conexion.php");
	session_start();
		
	$res = $_POST['result'];

		$f = explode('.', $res);
		$gstIDins = intval($f[0]);
		$gesEvalu = intval($f[1]);

$query = "
SELECT * FROM evaluacion 
INNER JOIN parametros ON parametros.gstIdprm = evaluacion.gstIDprm
WHERE evaluacion.gstIDins = $gstIDins AND evaluacion.gesEvalu = $gesEvalu AND evaluacion.estado = 0";
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