<?php
	include("../../conexion/conexion.php");
	session_start();
	ini_set('date.timezone','America/Mexico_City');
	$query = "SELECT *,COUNT(*) as prtcpnts FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE cursos.estado = 0 GROUP by cursos.idmstr,cursos.idinst ORDER BY id_curso DESC";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

		$gstIdlsc=$data['id_curso'];
		$gstTitlo=$data['gstTitlo'];
		$gstTipo=$data['gstTipo'];
		$fcurso=$data['fcurso'];
		$hcurso=$data['hcurso']; 

		$Tiempo = new DateTime($hcurso); 
		$Tiempo->modify('+3 hour'); 
		$horaEstimada = $Tiempo->format('H:i:s');

		$fechaf=$data['fechaf'];
		$url = 'green';

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

		 $caledario = array('id'=> 'a', 'title'=> $gstTitlo, 'eventColor'=> $url);
	
		}

	}
	$json_string = json_encode(array($caledario ));
	echo $json_string;
		//mysqli_free_result($resultado);
		mysqli_close($conexion);

?>


