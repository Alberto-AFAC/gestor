<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
	
	$query = "SELECT * FROM listacursos 
	WHERE estado = 0
	ORDER BY gstIdlsc DESC";
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




	 $caledario[] = [ $data["gstIdlsc"],$data["gstTitlo"],$data["gstTipo"],$data["gstPrfil"],$data["gstDrcin"],$data["gstTmrio"],$data["gstDrcin"],$data["gstCntnc"],$data["gstObjtv"],$data["gstFalta"],$data["gstProvd"],$data["gstCntro"] ];

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