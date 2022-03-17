<?php
	include("../conexion/conexion.php");
	session_start();
	ini_set('date.timezone','America/Mexico_City');
	$id = $_SESSION['usuario']['id_usu'];

	$query = "SELECT * FROM prog_ojt WHERE id_pers = $id AND estado = 0 ORDER BY id_proojt DESC";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{

	$vencidos = 0;
	$confirma = 0;
	$proceso = 0;
	$declina = 0;
	$finalizado = 0;
	while($data = mysqli_fetch_assoc($resultado)){
				
	$actual = date("Y-m-d"); 
	$hactual = date('H:i:s');

	$fin = $data['fec_finoj'];
	//$hfin = $data['hcurso'];

	$f3 = strtotime($actual);
	$f2 = strtotime($fin); 

	if($f3>$f2 && $data['estatus']=='PENDIENTE' && $data['confirojt'] == 'PENDIENTE' || $f3> $f2 && $data['estatus']=='FINALIZADO' && $data['confirojt'] == 'PENDIENTE'){ 
	$vencidos++;
	}

	if($f3<=$f2 && $data['confirojt']== 'PENDIENTE'){
	$confirma++;
	}

	if($f3<=$f2 && $data['estatus']== 'PENDIENTE' && $data['confirojt'] == 'CONFIRMADO'){
	$proceso++;	
	} 

	if($data['confirojt']=='ENFERMEDAD' || $data['confirojt']=='TRABAJO' || $data['confirojt']=='OTROS'){
	$declina++;	
	}

	if($data['estatus']=='FINALIZADO' && $data['confirojt'] == 'CONFIRMADO'){ 
	$finalizado++;
	}

		}
	$data['finalizado'] = $finalizado;	
	$data['declina'] = $declina;	
	$data['proceso'] = $proceso;	
	$data['confirmar'] = $confirma;
	$data['vencido'] = $vencidos;
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


