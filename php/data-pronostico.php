<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();

	$query = "SELECT * FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr 
	INNER JOIN personal ON personal.gstIdper = cursos.idinsp
	WHERE proceso = 'FINALIZADO' AND listacursos.gstTipo = 'BÁSICOS/INICIAL' OR listacursos.gstTipo = 'RECURRENTES'";
	$resultado = mysqli_query($conexion, $query);
	$x = 0;

	if(!$resultado){
		die("error");
	}else{
		
		while($data = mysqli_fetch_assoc($resultado)){
			$x++;
			$inspector = $data["gstNombr"]." ".$data["gstApell"];
			$inicio = date("d-m-Y",strtotime($data['fcurso']));
			$final = date("d-m-Y",strtotime($data['fechaf']));
			$fechaFinal = $data["fechaf"];
			$fechav = date("d-m-Y",strtotime($data['fechaf']."+ ".$data['gstVignc']." year"));

	
 	
	 $pronostico[] = [$data["gstPrfil"],$inspector,$data['gstTitlo'],$data["gstTipo"],$inicio,$final,$fechav];

		}
	}

		if(isset($pronostico)&&!empty($pronostico)){

			$json_string = json_encode(array( 'data' => $pronostico ));
			echo $json_string;

		}else{

			echo $json_string='0';
		}


		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>