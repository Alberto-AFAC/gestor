<?php
	include("../conexion/conexion.php");
	session_start();
    //$query = "SELECT MAX(gstNmpld) as gstNmpld FROM personal WHERE gstCargo = 'COMISIONADO' AND gstNmpld >99000000 OR gstCargo = 'INSPECTOR EXTERNO' AND gstNmpld >99000000";
    $query = "SELECT MAX(gstNmpld) as gstNmpld FROM personal WHERE gstNmpld >99000000";
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