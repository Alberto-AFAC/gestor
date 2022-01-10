<?php
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT * 
    FROM personal, ejecutiva E, area A, subdireccion S, departamentos D
    WHERE personal.gstAreID = E.gstIdeje 
    and personal.gstIDara= A.id_area 
    and personal.gstAcReg= S.id_sub
    and personal.gstIDSub= D.id_departamentos
    and personal.estado=0
    and personal.estado = 0";
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
