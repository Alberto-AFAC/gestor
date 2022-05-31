<?php

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



		$codigo = $data['codigo'];

		$query2 = "SELECT *,COUNT(id_curso) as prtcpnts FROM semanal WHERE semanal.id_curso = '$codigo' AND estado = 0 GROUP by semanal.id_curso ORDER BY semanal.id_curso DESC ";
		$resultado2 = mysqli_query($conexion, $query2);

		if($data2 = mysqli_fetch_assoc($resultado2)){

		$hrcurso = $data2['hora_ini'];
		$hrcufin = $data2['hora_fin'];

		}else{
		$hrcurso = '0';	
		$hrcufin = '0';
		}



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
			$start = strtotime($fcurso.''.$hrcurso) * 1000;
			$end = strtotime($fechaf.''.$hrcufin) * 1000;

		}else if($fecha_entrada < $fecha_actual && $fecha_actual > $fecha_salida){
		$valor = '0';
			$start = strtotime($fcurso.''.$hrcurso) * 1000;
			$end = strtotime($fechaf.''.$hrcufin) * 1000;

		}else if($fecha_entrada > $fecha_actual && $fecha_actual < $fecha_salida){
		$valor = 'event-info';
			$start = strtotime($fcurso.''.$hrcurso) * 1000;
			$end = strtotime($fechaf.''.$hrcufin) * 1000;
		}

		 $caledario[] = array('id'=> $gstIdlsc, 'title'=> $gstTitlo, 'url'=> $url, 'class'=> $valor,'start'=> $start, 'end'=> $end);
	
		}

	}
	$json_string = json_encode(array( 'success' => 1, 'result' => $caledario ));
	echo $json_string;
		//mysqli_free_result($resultado);
		mysqli_close($conexion);
 



?>
