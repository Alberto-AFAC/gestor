<?php
	include("../conexion/conexion.php");
	
	$query = "SELECT * FROM especialidadcat
INNER JOIN categorias ON especialidadcat.gstIDcat = categorias.gstIdcat
INNER JOIN listacursos ON listacursos.gstPrfil = categorias.gstCsigl";


// SELECT * FROM `listacursobliga` INNER JOIN listacursos ON listacursos.gstIdlsc = listacursobliga.gstIDlsc 
// INNER JOIN categorias ON categorias.gstIdcat = listacursobliga.gstIcatg
	// "SELECT * FROM `listacursobliga` 
	// INNER JOIN listacursos ON listacursos.gstIdlsc = listacursobliga.gstIDlsc
	// INNER JOIN categorias ON categorias.gstIdcat = listacursobliga.gstIDcat 
	// INNER JOIN personal ON   personal.gstIDCat = categorias.gstIdcat";
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


