<?php


	// include("../../conexion/conexion.php");
	// session_start();
	// ini_set('date.timezone','America/Mexico_City');
	// $query = "SELECT * FROM semanal WHERE habil = 'SI' AND estado = 0 ORDER BY id_curso DESC";
	// $resultado = mysqli_query($conexion, $query);

	// if(!$resultado){
	// 	die("error");
	// }else{

	// 	while($data = mysqli_fetch_assoc($resultado)){

	// 	$inicio = $data['anio'].'-'.$data['num_mes'].'-'.$data['dia_semana'];
	// 	// $fin = $data['anio'].'-'.$data['num_mes'].'-'.$data['dia_semana'];
	// 	$horaini = $data['hora_ini'];
	// 	$hfin = $data['hora_fin'];
	// 	$ffinal = $data['fec_fin'];

	// 		$codigo = $data['id_curso'];

	// $queri = "
	// 	SELECT *,COUNT(*) as prtcpnts FROM cursos 
	// 	INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr 
	// 	WHERE codigo = '$codigo' AND cursos.estado = 0 
	// 	GROUP by cursos.codigo ORDER BY id_curso DESC";
	// 	$resul = mysqli_query($conexion, $queri); 
	// 	if($fech = mysqli_fetch_array($resul)){


	// 		$gstIdlsc=$fech['id_curso'];
	// 		$gstTitlo=$fech['gstTitlo'];
	// 		$gstTipo=$fech['gstTipo'];
	// 		$fcurso=$fech['fcurso'];
	// 		$hcurso=$fech['hcurso']; 
	// 	}else{
	// 	}		


	// 	// $gstIdlsc=$data['id_curso'];
	// 	// $gstTitlo=$data['gstTitlo'];
	// 	// $gstTipo=$data['gstTipo'];
	// 	// $fcurso=$data['fcurso'];
	// 	// $hcurso=$data['hcurso']; 

	// 	$Tiempo = new DateTime($hcurso); 
	// 	$Tiempo->modify('+3 hour'); 
	// 	$horaEstimada = $Tiempo->format('H:i:s');

	// 	$fechaf=$ffinal;
	// 	$url = '#';

	// 	$fecha_actual = strtotime(date("Y-m-d"));
	// 	$fecha_entrada = strtotime(date($fcurso));
	// 	$fecha_salida = strtotime(date($fechaf));

	// 	if($fecha_entrada <= $fecha_actual && $fecha_actual <= $fecha_salida){
	// 	$valor = 'event-success';
	// 		$start = strtotime($fcurso.''.$hcurso) * 1000;
	// 		$end = strtotime($fechaf.''.$horaEstimada) * 1000;

	// 	}else if($fecha_entrada < $fecha_actual && $fecha_actual > $fecha_salida){
	// 	$valor = '0';
	// 		$start = strtotime($fcurso.''.$hcurso) * 1000;
	// 		$end = strtotime($fechaf.''.$horaEstimada) * 1000;

	// 	}else if($fecha_entrada > $fecha_actual && $fecha_actual < $fecha_salida){
	// 	$valor = 'event-info';
	// 		$start = strtotime($inicio.''.$horaini) * 1000;
	// 		$end = strtotime($inicio.''.$hfin) * 1000;
	// 	}

	// 	 $caledario[] = array('id'=> $gstIdlsc, 'title'=> $gstTitlo, 'url'=> $url, 'class'=> $valor,'start'=> $start, 'end'=> $end);
	
	// 	}

	// }
	// $json_string = json_encode(array( 'success' => 1, 'result' => $caledario ));
	// echo $json_string;
	// 	//mysqli_free_result($resultado);
	// 	mysqli_close($conexion);


	include("../../conexion/conexion.php");
	session_start();
	ini_set('date.timezone','America/Mexico_City');
	$query = "SELECT *,COUNT(*) as prtcpnts FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE cursos.estado = 0 GROUP by cursos.codigo ORDER BY codigo DESC";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

		$gstIdlsc=$data['id_curso'];

		$folio = substr($data['codigo'],2);
		$codigo = $folio;

		$gstTitlo = "<a data-toggle='modal' style='cursor:pointer;' data-target='#ganttPartici'><span onclick='listview({$codigo});'>".$data['codigo'].' -> '.$data['gstTitlo']."</span></a>";

		$gstTipo=$data['gstTipo'];
		$fcurso=$data['fcurso'];
		$hcurso=$data['hcurso']; 

		$Tiempo = new DateTime($hcurso); 
		$Tiempo->modify('+3 hour'); 
		$horaEstimada = $Tiempo->format('H:i:s');

		$fechaf=$data['fechaf'];
		$url = '#';

		$fecha_actual = strtotime(date("Y-m-d"));
		$fecha_entrada = strtotime(date($fcurso));
		$fecha_salida = strtotime(date($fechaf));

		if($fecha_entrada <= $fecha_actual && $fecha_actual <= $fecha_salida){
		$valor = 'event-success';
			$start = strtotime($fcurso.''.$hcurso) * 1000;
			$end = strtotime($fechaf.''.$horaEstimada) * 1000;

		}else if($fecha_entrada < $fecha_actual && $fecha_actual > $fecha_salida){
		$valor = '0';
			$start = strtotime($fcurso.''.$hcurso) * 1000;
			$end = strtotime($fechaf.''.$horaEstimada) * 1000;

		}else if($fecha_entrada > $fecha_actual && $fecha_actual < $fecha_salida){
		$valor = 'event-info';
			$start = strtotime($fcurso.''.$hcurso) * 1000;
			$end = strtotime($fechaf.''.$horaEstimada) * 1000;
		}

		 $caledario[] = array('id'=> $gstIdlsc, 'title'=> $gstTitlo, 'url'=> $url, 'class'=> $valor,'start'=> $start, 'end'=> $end);
	
		}

	}
	$json_string = json_encode(array( 'success' => 1, 'result' => $caledario ));
	echo $json_string;
		//mysqli_free_result($resultado);
		mysqli_close($conexion);
 



?>
