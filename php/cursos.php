<?php
	include("../conexion/conexion.php");
	session_start();
	ini_set('date.timezone','America/Mexico_City');
	$id = $_SESSION['usuario']['id_usu'];

	$query = "SELECT * FROM cursos 
	INNER JOIN listacursos ON idmstr = gstIdlsc
	WHERE idinsp = $id AND cursos.estado = 0 AND idinsp!=idcoor AND idinsp!=idinst OR idinsp = $id AND cursos.estado = 2 AND idinsp!=idcoor AND idinsp!=idinst ORDER BY id_curso DESC";
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

	$fin = $data['fechaf'];
	$hfin = $data['hcurso'];

	$f3 = strtotime($actual);
	$f2 = strtotime($fin); 

	if($f3>$f2 && $data['proceso']=='PENDIENTE' && $data['confirmar'] == 'CONFIRMAR' || $f3> $f2 && $data['proceso']=='FINALIZADO' && $data['confirmar'] == 'CONFIRMAR'){ 
	$vencidos++;
	}

	if($f3<=$f2 && $data['confirmar']== 'CONFIRMAR'){
	$confirma++;
	}

	if($f3<=$f2 && $data['proceso']== 'PENDIENTE' && $data['confirmar'] == 'CONFIRMADO' || $f3<=$f2 && $data['proceso']== 'PENDIENTE' && $data['confirmar'] == 'CONFIRMAR'){
	$proceso++;	
	} 

	if($data['confirmar']=='ENFERMEDAD' || $data['confirmar']=='TRABAJO' || $data['confirmar']=='OTROS'){
	$declina++;	
	}

	if($data['proceso']=='FINALIZADO' && $data['confirmar'] == 'CONFIRMADO'){ 
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


