<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();

	$query = "SELECT * FROM prog_ojt 
    INNER JOIN ojts ON ojts.id_spc = prog_ojt.id_esp
    INNER JOIN personal ON prog_ojt.id_pers = personal.gstIdper
    INNER JOIN ojts_subs ON ojts_subs.idtarea = ojts.id_ojt
    WHERE prog_ojt.estado = 0 ORDER BY id_pers ASC";
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
		$fin = date("d-m-Y",strtotime($data["final"]."+ 1 days")); 

		 $factual = strtotime($actual);
		 $fcurso = strtotime($fin);

			
		$codigor = $res['estado'];

		
	

		$cursos[] = [ 
		$data["id_pers"], 
		$data["gstNombr"],
		$data["gstApell"],
		$data["gstIDCat"],
		$data["id_pers"]
		
	];


	
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