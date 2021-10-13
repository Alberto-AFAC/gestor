<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();



	
	$query = "SELECT *,COUNT(*) AS prtcpnts,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') AS inicio,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') AS fin FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE proceso='PENDIENTE' AND cursos.estado = 0 GROUP BY cursos.codigo ORDER BY id_curso DESC";
	$resultado = mysqli_query($conexion, $query);
	$contador=0;
	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$contador++;


		ini_set('date.timezone','America/Mexico_City');
		$hactual = date('H:i:s');

		$factual = strtotime(Date("Y-m-d").''.$hactual);
		$fcurso = strtotime(Date($data["fcurso"]).''.$data['hcurso']);


		if ($factual <= $fcurso) {
	

		$proceso = '<span style="font-weight: bold; height: 50px; color:#F39403;">PENDIENTE</span>';
		$proc = 'PENDIENTE';
		


		
		$cursos[] = [ 
			$contador, 
		$data["gstTitlo"],
		$data["gstTipo"],
		$data["inicio"],
		$data["gstDrcin"],
		$data["fin"],
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


			if(isset($cursos)&&!empty($cursos )){

			$json_string = json_encode(array( 'data' => $cursos ));
			echo $json_string;
			}else{

			echo $cursos ='0';
			}

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>