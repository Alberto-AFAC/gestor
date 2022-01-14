<?php
	include("../conexion/conexion.php");
	session_start();
	$query = "SELECT * FROM personal P, cursos C, listacursos L
    WHERE P.gstIdper = C.idcoor
    AND P.estado in ('2','0','3') 
    AND C.estado = 0
    AND C.idmstr= L.gstIdlsc 
    GROUP BY C.codigo ORDER BY C.codigo ASC";
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