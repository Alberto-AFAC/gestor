<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();



	$query = "SELECT
    id_tar,titulo,descripcion, fechaA, fechaT,
    listacursos.gstTitlo,gstTipo,gstPrfil,
    personal.gstNombr,gstApell,gstCargo        
    FROM
    tareas
    INNER JOIN tarearealizar ON tarearealizar.idtarea = tareas.id_tar  
    INNER JOIN listacursos ON listacursos.gstIdlsc = tareas.idcur
    INNER JOIN personal ON personal.gstIdper = tarearealizar.idiva";
	$resultado = mysqli_query($conexion, $query);
	$contador = 0;

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$contador++;
			$responsables = $data["gstNombr"]." ".$data["gstApell"];
			$notificar = "<button type='button' class='btn btn-primary'>NOTIFICAR</button>";
	

	 

	 $tareas[] = [ $contador,$data["titulo"],$data["descripcion"],$data["fechaA"],$data["fechaT"],$data["gstPrfil"],$responsables,$notificar];

		}
	}
	if(isset($tareas)&&!empty($tareas)){

		echo json_encode(array( 'data' => $tareas,JSON_UNESCAPED_UNICODE ));
	}else{

		echo $tareas='Sin datos';
	}

	// $json_string = json_encode(array( 'data' => $tareas ));
	// echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>