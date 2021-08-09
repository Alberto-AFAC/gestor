<?php
header('Content-Type: application/json');
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT *,COUNT(*) as prtcpnts FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE cursos.estado = 0 GROUP by listacursos.gstTitlo,cursos.idmstr,cursos.idinst ORDER BY id_curso DESC ";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

	$id = $data['gstIdlsc'];		
	$gstTitlo = $data['gstTitlo'];

	$id_curso = $data['id_curso'];

		$fcurso=$data['fcurso'];
		$hcurso=$data['hcurso']; 

		$Tiempo = new DateTime($hcurso); 
		$Tiempo->modify('+0 hour'); 
		$horaEstimada = $Tiempo->format('H:i:s');

		$fechaf=$data['fechaf'];

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

	//$start = strtotime($data['fcurso'].''.$data['hcurso']) * 1000;

//			$arreglo[] = $data; 
			 $arreglo[] = array('id'=> $id,'name'=> $gstTitlo, 'periods'=> [['id'=> $id_curso,'start'=>$start, 'end' => $end]] );
	


		}
		if(isset($arreglo)&&!empty($arreglo)){

			echo json_encode($arreglo, JSON_PRETTY_PRINT);
		}else{

			echo $arreglo='0';
		}
	}
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>

