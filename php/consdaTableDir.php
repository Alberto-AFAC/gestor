<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
	
	$query = "SELECT * FROM listacursos 
	WHERE estado = 0
	ORDER BY gstIdlsc DESC";
	$resultado = mysqli_query($conexion, $query);
	$contador = 0;

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$contador++;

		//	$arreglo["data"][] = $data; 

if($data["gstVignc"] == 101){

	$vigencia = 'ÚNICA VEZ';
}else{
	$vigencia = $data["gstVignc"].' AÑOS';
}

if($data['gstTmrio'] == '0'){
    $temario = 'N/A';
} else {
    $temario = "<a href='{$data['gstTmrio']}' target='_blanck'><img src='../dist/img/pdf.svg' alt='PDF' width='30px;' cursor: pointer;' ></a>";
}



	 $caledario[] = [ $contador,$data["gstTitlo"],$data["gstTipo"],$data["gstPrfil"],$data["gstDrcin"],$data["gstCntnc"],$vigencia,$temario];

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