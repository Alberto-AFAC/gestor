<?php
	include("../conexion/conexion.php");
	session_start();
	ini_set('date.timezone','America/Mexico_City');
	$query = "SELECT *,COUNT(*) as prtcpnts FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE cursos.estado = 0 GROUP by fcurso ORDER BY id_curso DESC";
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
		$prtcpnts=$data['prtcpnts'];

		$Tiempo = new DateTime($hcurso); 
		$Tiempo->modify('+3 hour'); 
		$horaEstimada = $Tiempo->format('H:i:s');

		$fechaf=$data['fechaf'];
		$url = '#';

		$valor = '0';


		 $caledario['data'][] = array('id'=> $gstIdlsc, 'title'=> $gstTitlo, 'url'=> $url, 'class'=> $valor,'start'=> $prtcpnts , 'end'=> $fechaf);
	
		}

	}
//	$json_string = json_encode(array($caledario));
		echo json_encode($caledario);
		//mysqli_free_result($caledario);
		mysqli_close($conexion);

?>

