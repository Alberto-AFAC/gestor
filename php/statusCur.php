
<?php
	include("../conexion/conexion.php");
	session_start();
		ini_set('date.timezone','America/Mexico_City');

	$query = "SELECT *,COUNT(*) AS prtcpnts,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') AS inicio,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') AS fin FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE cursos.estado = 0 GROUP BY cursos.codigo ORDER BY id_curso DESC ";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{

	$vencidos = 0;
	$progrmas = 0;
	$acreditar = 0;
	$declina = 0;
	$finalizado = 0;
	$vencido = 0;
	$porvencer = 0;
	while($data = mysqli_fetch_assoc($resultado)){
				
	$nuevafecha = strtotime ( '-3 month' , strtotime ( $data["fechaf"] ) ) ;
	$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
	$finaliza = strtotime(Date($nuevafecha));

	$factualv = strtotime(Date("Y-m-d"));
	$fcursov = strtotime(Date($data["fcurso"]));

	$hactual = date('H:i:s');

	$factual = strtotime(Date("Y-m-d").''.$hactual);
	$fcurso = strtotime(Date($data["fcurso"]).''.$data['hcurso']);


			if ($factualv > $fcursov && $data["proceso"] == "PENDIENTE") {
			$vencido++;
			}

			if ($factualv <= $fcursov && $data["proceso"] == "PENDIENTE") {

			if ($factualv >= $finaliza && $data["proceso"] == "PENDIENTE") {
			$porvencer++;
			}
			}

	if ($factual <= $fcurso AND $data['proceso']=='PENDIENTE') {
		$acreditar++;
	}


	if($data['proceso']=='FINALIZADO'){ 
	$finalizado++;
	}
	$progrmas++;

		}

	$data['vencido'] = $vencido;
	$data['porvencer'] = $porvencer;
	$data['progrmas'] = $progrmas;	
	$data['finalizado'] = $finalizado;	
	$data['acreditar'] = $acreditar;
	// $data['totalv'] = $totalv;
	$arreglo["data"][] = $data;

		if(isset($arreglo)&&!empty($arreglo)){

			echo json_encode($arreglo);
		}else{

			echo $arreglo='0';
		}
	}
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>


