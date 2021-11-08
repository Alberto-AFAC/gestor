<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();

	$query = "SELECT
    id_tar,titulo,descripcion, fechaA, fechaT,id_tar AS idtar1,
    listacursos.gstTitlo,gstTipo,gstPrfil,
    personal.gstNombr,gstApell,gstCargo        
    FROM
    tareas
    INNER JOIN tarearealizar ON tarearealizar.idtarea = tareas.id_tar  
    INNER JOIN listacursos ON listacursos.gstIdlsc = tareas.idcur
    INNER JOIN personal ON personal.gstIdper = tarearealizar.idiva
	 WHERE idsubt = 0 GROUP BY idcur";
	$resultado = mysqli_query($conexion, $query);
	$contador = 0;

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$contador++;
			$responsables = $data["gstNombr"]." ".$data["gstApell"];
			$notificar = "<button type='button' class='btn btn-primary'>NOTIFICAR</button>";
			$titulo = $data["titulo"];
			$idtar1 = $data["idtar1"];

			$query2 = "	SELECT
			id_tar,titulo,descripcion, fechaA, fechaT,id_tar AS idtar2,
			listacursos.gstTitlo,gstTipo,gstPrfil,
			personal.gstNombr,gstApell,gstCargo        
			FROM
			tareas
			INNER JOIN tarearealizar ON tarearealizar.idtarea = tareas.id_tar  
			INNER JOIN listacursos ON listacursos.gstIdlsc = tareas.idcur
			INNER JOIN personal ON personal.gstIdper = tarearealizar.idiva
				WHERE idsubt = $idtar1 GROUP BY idcur";
				$resultado2 = mysqli_query($conexion, $query2);
				while($data2 = mysqli_fetch_assoc($resultado2)){
		
			$subtarea = $data2['titulo'];
			$descripcion = $data2['descripcion'];
			$idtar2 = $data2["idtar2"];

			$query3 = "	SELECT
			id_tar,titulo,descripcion, fechaA, fechaT,
			listacursos.gstTitlo,gstTipo,gstPrfil,
			personal.gstNombr,gstApell,gstCargo        
			FROM
			tareas
			INNER JOIN tarearealizar ON tarearealizar.idtarea = tareas.id_tar  
			INNER JOIN listacursos ON listacursos.gstIdlsc = tareas.idcur
			INNER JOIN personal ON personal.gstIdper = tarearealizar.idiva
				WHERE idsubt = $idtar2 GROUP BY idcur";
				$resultado3 = mysqli_query($conexion, $query3);
				while($data3 = mysqli_fetch_assoc($resultado3)){
					$subsubtarea = $data3['titulo'];
					$descripcionsub = $data3['descripcion'];

	 

	//  $tareas[] = [ $id,$data["titulo"],$data["descripcion"],$data["fechaA"],$data["fechaT"],$data["gstPrfil"],$responsables,$notificar];
	$tareas[] = array('id'=> $contador,'titulo' =>$titulo,'subtarea' => $subtarea,'subsubtarea' => $subsubtarea,'descripcion' => $descripcion,'descripcionsub'=> $descripcionsub,'notificar' => $notificar);
				}
		}
	}
}
	if(isset($tareas)&&!empty($tareas)){

		echo json_encode(array( 'data' => $tareas,JSON_PRETTY_PRINT ));
	}else{

		echo $tareas='0';
	}

	// $json_string = json_encode(array( 'data' => $tareas ));
	// echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>