<?php
	include("../conexion/conexion.php");
	session_start();
	
	$query = "
		SELECT * FROM personal 
		INNER JOIN codigo ON personal.gstIdpst = codigo.gstIdpst
		INNER JOIN puesto ON personal.gstPstID = puesto.gstIdpus
		-- INNER JOIN especialidad ON personal.gstSpcID = especialidad.gstSpcld
        INNER JOIN ejecutiva ON personal.gstAreID = ejecutiva.gstIdeje
		INNER JOIN area ON personal.gstIDara = area.id_area
		INNER JOIN subdireccion ON personal.gstAcReg = subdireccion.id_sub
		INNER JOIN departamentos ON personal.gstIDsub= departamentos.id_departamentos
		WHERE personal.estado = 0 ORDER BY gstIdper DESC
		";
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


