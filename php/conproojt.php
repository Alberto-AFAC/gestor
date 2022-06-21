<?php
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT p.*,o.*,s.*,c.*, i.gstNombr as instructor FROM prog_ojt p, ojts o, ojts_subs s, categorias c, personal i where p.id_tarea=o.id_ojt and p.id_subtarea=s.id_subojt and p.id_esp=c.gstIdcat and i.gstIdper=p.id_insojt";
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
