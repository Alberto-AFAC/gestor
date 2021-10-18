<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
	
	$query = "SELECT *, COUNT(*) AS prtcpnts,cursos.fcurso AS fin 
			FROM
			cursos
			INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr 
			WHERE
			cursos.estado = 0 
			GROUP BY
			cursos.codigo
			ORDER BY
			id_curso DESC";
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

		$nuevafecha = strtotime ( '-3 month' , strtotime ( $data["fechaf"] ) ) ;
		$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
		$finaliza = strtotime(Date($nuevafecha));

		$actual = date("Y-m-d"); 
		$hactual = date('H:i:s');
		$fin = $data['fin'];

		$f3 = strtotime($actual.''.$hactual);
		$f2 = strtotime($fin.''.$data['hcurso']); 


if ($f3>=$f2  && $data["proceso"] == "PENDIENTE") {
		$proceso = "<span style='font-weight: bold; height: 50px; color:#D73925;'>VENCIDO</span>";
		$proc = 'VENCIDO';
		

		$cursos[] = [ 
		$data["codigo"], 
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

		if ($factual > $fcurso && $data["proceso"] == "PENDIENTE" && $data["gstTipo"] == "RECURRENTES" && $data["proceso"] == "FINALIZADO") {
		$proceso = "<span style='font-weight: bold; height: 50px; color:#D73925;'>VENCIDO</span>";
		$proc = 'VENCIDO';
			

		$cursos[] = [ 
		$data["codigo"], 
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

	

		if ($factual <= $fcurso && $data["proceso"] == "PENDIENTE" && $data["gstTipo"] == "RECURRENTES" && $data["proceso"] == "FINALIZADO") {

		if ($factual >= $finaliza && $data["proceso"] == "PENDIENTE" && $data["gstTipo"] == "RECURRENTES" && $data["proceso"] == "FINALIZADO") {

			$proceso = "<span style='font-weight: bold; height: 50px; color:#F39403;'>POR VENCER</span>";
			$proc = 'POR VENCER';

			$cursos[] = [ 
			$data["codigo"], 
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