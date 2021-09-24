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
    $temario = 'N/A';
} else {
    $temario = "<img data-toggle='modal' data-target='#exampleModal{$data['gstIdlsc']}' src='../dist/img/pdf.svg' alt='PDF' width='30px;' cursor: pointer;'>
	<div class='modal fade' id='exampleModal{$data['gstIdlsc']}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
	  <h5 style='font-size: 28px;' class='modal-title col-11 text-center'><span style='font-weight: bold;'>TEMARIO</span><br>{$data['gstTitlo']}</h5>
      </div>
      <div class='modal-body'>
	  <div class='jumbotron'>
	  <div class='container'>
	  <p class='lead'>AQUI VA EL NOMBRE</p>
	  </div>
	  <hr class='my-4'>
	</div>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-primary' data-dismiss='modal'>CERRAR</button>
      </div>
    </div>
  </div>
</div>";
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