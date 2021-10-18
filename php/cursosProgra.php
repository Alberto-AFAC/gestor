<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
	
	$query = "SELECT *, COUNT(*) AS prtcpnts, DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as cfinal,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as cinicial,cursos.fcurso AS fin
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
//-----COMPARACIÓN DE FECHAS DE VENCIMIENTO
		$factual = strtotime(Date("Y-m-d"));
		$fcurso = strtotime(Date($data["fcurso"]));
		$sumfech= $data["gstVignc"]; //VIGENCIA DEL CURSO
		$ftermino =strtotime($fcurso. '+'.$sumfech.'years'); //se suma los años del vencimiento
		$xvencer = date("Y-m-d",strtotime($ftermino."- 3 month")); //SE restan 3 meses
		

			$nuevafecha = strtotime ( '-3 month' , strtotime ( $data["fechaf"] ) ) ;
			$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
			$finaliza = strtotime(Date($nuevafecha));

			$actual = date("Y-m-d"); 
			$hactual = date('H:i:s');
			$fin = $data['fin'];

			$f3 = strtotime($actual.''.$hactual);
			$f2 = strtotime($fin.''.$data['hcurso']); 


		//pendiente POR VENCER
		if ($factual <= $xvencer && $data["gstTipo"] == "RECURRENTES" && $data["proceso"] == "FINALIZADO") {
			$proceso = "<span style='font-weight: bold; height: 50px; color:#D73925;'>POR VENCER</span>";
		$proc = 'POR VENCER';
	
	}

// (&& $data['proceso']=='PENDIENTE' || $f3>= $f2 && $data['proceso']=='FINALIZADO')

		if ($f3>=$f2  && $data["proceso"] == "PENDIENTE") {
		$proceso = "<span style='font-weight: bold; height: 50px; color:#D73925;'>VENCIDO</span>";
		$proc = 'VENCIDO';
		}
		
		//LOS RECURRENTES VENCEN CADA 3 AÑOS 
		elseif ($factual >= $ftermino && $data["gstTipo"] == "RECURRENTES" && $data["proceso"] == "FINALIZADO") {
		$proceso = "<span style='font-weight: bold; height: 50px; color:#D73925;'>VENCIDO</span>";
		$proc = 'VENCIDO';
	} else
		if($data["proceso"] == 'PENDIENTE'){ //PENDIENTE
		$proceso = '<span style="font-weight: bold; height: 50px; color:#F39403;">PENDIENTE</span>';
		$proc = 'PENDIENTE';
		}else if($data["proceso"] == 'FINALIZADO'){
		$proceso = '<span style="font-weight: bold; height: 50px; color:green;">FINALIZADO</span>';
		$proc = 'FINALIZADO';
		} else if($data["proceso"] == 'EN PROCESO'){
		$proceso = '<span style="font-weight: bold; height: 50px; color: ##3C8DBC;">EN PROCESO</span>';
		$proc = 'EN PROCESO';
		} 
		$cursos[] = [ 
		$data["codigo"],
		//$data["codigo"], 
		$data["gstTitlo"],
		$data["gstTipo"],
		$data["cinicial"],
		$data["gstDrcin"],
		$data["cfinal"],
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
		$data['contracur']
	];

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
