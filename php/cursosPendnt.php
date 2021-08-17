<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
	
	$query = "SELECT *,COUNT(*) AS prtcpnts FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE proceso='PENDIENTE' AND cursos.estado = 0 GROUP BY cursos.codigo ORDER BY id_curso DESC";
	$resultado = mysqli_query($conexion, $query);
	$contador=0;
	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$contador++;


		ini_set('date.timezone','America/Mexico_City');

		$factual = strtotime(Date("Y-m-d"));
		$fcurso = strtotime(Date($data["fcurso"]));

		if ($factual < $fcurso && $data["proceso"] == "PENDIENTE") {
	

		$proceso = '<span style="font-weight: bold; height: 50px; color:#F39403;">PENDIENTE</span>';
		$proc = 'PENDIENTE';
		


		
		$cursos[] = [ 
			$contador, 
		$data["gstTitlo"],
		$data["gstTipo"],
		$data["fcurso"],
		$data["gstDrcin"],
		$data["fechaf"],
		$data["prtcpnts"],
		$proceso,
		$data["id_curso"],
		$data["codigo"],
		$data["gstDrcin"], 
		$data['idinst'],
		$data['sede'],
		$data['link'],
		$data['modalidad'],
		$data['gstIdlsc'],
		$data['idinst'],
		$data['hcurso'],
		$proc
	];
}


		}


	}


	$json_string = json_encode(array( 'data' => $cursos ));
	echo $json_string;


		// if(isset($arreglo)&&!empty($arreglo)){

		// 	echo json_encode($arreglo, JSON_PRETTY_PRINT);
		// }else{

		// 	echo $arreglo='0';
		// }
	
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>