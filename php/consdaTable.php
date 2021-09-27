<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();



	$query = "SELECT * FROM listacursos 
	WHERE estado = 0
	GROUP BY gstIdlsc DESC";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

		//	$arreglo["data"][] = $data; 

if($data["gstVignc"] == 101){

	$vigencia = 'ÚNICA VEZ';
}else{
	$vigencia = $data["gstVignc"].' AÑOS';
}

if($data['gstTmrio'] == '0'){
    $temario = 'FALTA AGREGAR';
} else {
  
	// $query = "SELECT * FROM temario 
	// WHERE idtem = gstIdlsc";
	// $resultado = mysqli_query($conexion, $query);
	// while($data = mysqli_fetch_assoc($resultado))
	// {
	// 	$data[2];
	// }
	$temario = "<center><a href='#' onclick='temario({$data["gstIdlsc"]})' data-toggle='modal' data-target='#exampleModal'><img src='../dist/img/temario.svg' width='30px;'></a></center>";	
	}



	 $caledario[] = [ $data["gstIdlsc"],$data["gstTitlo"],$data["gstTipo"],$data["gstPrfil"],$data["gstDrcin"],$data["gstCntnc"],$vigencia,$temario];

		}


		// if(isset($arreglo)&&!empty($arreglo)){

		// 	echo json_encode($arreglo, JSON_PRETTY_PRINT);
		// }else{

		// 	echo $arreglo='0';
		// }
	}


	$json_string = json_encode(array( 'data' => $caledario ));
	echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>