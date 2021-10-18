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

			$idtem = $data['gstIdlsc'];
	
			$queri = "
			SELECT * FROM temario WHERE idcurso = $idtem";
			$resul = mysqli_query($conexion, $queri);


			if($res = mysqli_fetch_array($resul)){
$temario = "<center><a href='#' onclick='temario({$data["gstIdlsc"]})' data-toggle='modal' data-target='#exampleModal'><img src='../dist/img/temario.svg' width='30px;'></a> </center>";
			}else{
				$temario = 'SIN TEMARIO';
			}

 	
	 $caledario[] = [ $data["gstIdlsc"],$data["gstTitlo"],$data["gstTipo"],$data["gstPrfil"],$data["gstDrcin"],$data["gstCntnc"],$vigencia,$temario];

		}

	}


	$json_string = json_encode(array( 'data' => $caledario ));
	echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>