<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();

	$query = "SELECT *,COUNT(*) AS prtcpnts,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') AS inicio,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') AS fin,classroom,cursos.fechaf AS final FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE proceso='PENDIENTE' AND cursos.estado = 0 GROUP BY cursos.codigo ORDER BY id_curso DESC";
	$resultado = mysqli_query($conexion, $query);
	$contador=0;
	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$contador++;


		ini_set('date.timezone','America/Mexico_City');
		$actual = date("Y-m-d"); 
		$hactual = date('H:i:s');
		$fin = date("d-m-Y",strtotime($data["final"]."+ 6 days")); 

		 $factual = strtotime($actual);
		 $fcurso = strtotime($fin);


//		 echo '('.$factual.'<'.$fcurso.')'; 

			$codigo= $data["codigo"];
			$queri = "SELECT * FROM reprogramados WHERE id_curso = '$codigo' AND reprogramado = 1";
			$resul = mysqli_query($conexion, $queri);

		if($res = mysqli_fetch_array($resul)){
		$codigor = $res['id_curso'];
		if ($factual <= $fcurso) {
	

		$proceso = '<span style="font-weight: bold; height: 50px; color:#F39403;">REPROGRAMADO</span>';
		$proc = 'PENDIENTE';
			
		$cursos[] = [ 
		$data["codigo"], 
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
		$proc,
		$data['contracur'],
		$data['classroom'],
		$data['idcoor']
	];
}

		}else{

		if ($factual <= $fcurso) {
	

		$proceso = '<span style="font-weight: bold; height: 50px; color:#F39403;">PENDIENTE</span>';
		$proc = 'PENDIENTE';
			
		$cursos[] = [ 
		$data["codigo"], 
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
		$proc,
		$data['contracur'],
		$data['classroom'],
		$data['idcoor']
	];
}

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