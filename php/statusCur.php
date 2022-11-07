
<?php
	include("../conexion/conexion.php");
	session_start();
		ini_set('date.timezone','America/Mexico_City');

	$query = "SELECT *,COUNT(*) AS prtcpnts,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') AS inicio,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') AS fin,cursos.fechaf AS final FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE cursos.estado = 0 GROUP BY cursos.codigo ORDER BY id_curso DESC ";
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
	$recuVen = 0;
	$recuPorv = 0;
	while($data = mysqli_fetch_assoc($resultado)){
				
	// $nuevafecha = strtotime ( '-3 month' , strtotime ( $data["fechaf"] ) ) ;
	// $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
	// $finaliza = strtotime(Date($nuevafecha));

	$factualv = strtotime(Date("Y-m-d"));
	$fcursov = strtotime(Date($data["fcurso"]));

	$hactual = date('H:i:s');

	// $factual = strtotime(Date("Y-m-d").''.$hactual);
	// $fcurso = strtotime(Date($data["fcurso"]).''.$data['hcurso']);

	$fin = date("d-m-Y",strtotime($data["final"]."+ 1 days")); 

	$actual = date("d-m-Y"); 

	$factual = strtotime(Date("d-m-Y"));
	$fcurso = strtotime(Date($fin));




	$fechav = date("d-m-Y",strtotime($data['fechaf']."+ ".$data['gstVignc']." year"));     
	$vencer = date("d-m-Y",strtotime($fechav."- 3 month"));

	$f1 = strtotime($fechav);
	$f2 = strtotime($vencer);
	$f3 = strtotime($actual);


if ($f3>=$f1 && $data["proceso"] == "FINALIZADO" && $data['gstVignc'] != 101) {
	$recuVen++;

	}else 
	if($f3 >= $f2 && $data["proceso"] == "FINALIZADO" && $data['gstVignc'] != 101){
	$recuPorv++;
	}



	if($factual>$fcurso && $data["proceso"] == "PENDIENTE")  {
	$vencido++;
	}

	// if ($factualv <= $fcursov && $data["proceso"] == "PENDIENTE") {

	// // if ($factualv >= $finaliza && $data["proceso"] == "PENDIENTE") {
	// // $porvencer++;
	// // }
	// }

	if ($factual <= $fcurso AND $data['proceso']=='PENDIENTE') {
		$acreditar++;
	}


	if($data['proceso']=='FINALIZADO'){ 
	$finalizado++;
	}
	$progrmas++;

		}

		$ttlV = $vencido + $recuPorv + $recuVen;

	$data['vencido'] = $ttlV;
	//$data['porvencer'] = $porvencer;
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


