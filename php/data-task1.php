<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();

	$query = "SELECT
    id_tar,titulo,descripcion, fechaA, fechaT,id_tar AS idtar1,entrega,
    listacursos.gstTitlo,gstTipo,gstPrfil,
    personal.gstNombr,gstApell,gstCargo,
	COUNT(gstNombr)as participantes        
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
			$descriprincipal = $data["descripcion"];
			$inicio = $data["fechaA"];
			$cursoPrinc = $data["gstTitlo"];
			if($data["gstPrfil"] == 0){
				$perfilPrinc = 'POR ASIGNAR';
			}else{
				$perfilPrinc = $data["gstPrfil"];
			}
	
			$final = $data["fechaT"];
			$idtar1 = $data["idtar1"];
			// $participantes = "<span data-toggle='modal' data-target='#basicModal' style='cursor: alias; font-weight:bold; color: green;'></span>";
			$participantes = "<span style='font-weight:bold; color: green;'>PARTICIPANTE(S): ".$data["participantes"]."</span> / <a href='#' onclick='responsables({$idtar1})' data-toggle='modal' data-target='#basicModal' style='cursor: pointer; font-weight:bold; color: blue;'>EVALUAR</a>";

			

			$query2 = "	SELECT
			id_tar,titulo,descripcion, fechaA, fechaT,id_tar AS idtar2,entrega,
			listacursos.gstTitlo,gstTipo,gstPrfil,
			personal.gstNombr,gstApell,gstCargo,
			COUNT(gstNombr)as participantesub         
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
			$iniciosub = $data2['fechaA'];
			$finalsub = $data2['fechaT'];
			$idtar2 = $data2["idtar2"];

			$participantesub = "<span style='font-weight:bold; color: green;'>PARTICIPANTE(S): ".$data2["participantesub"]."</span> / <a href='#' onclick='responsables({$idtar2})' data-toggle='modal' data-target='#basicModal' style='cursor: pointer; font-weight:bold; color: blue;'>EVALUAR</a>";

			$query3 = "	SELECT
			id_tar,titulo,descripcion, fechaA, fechaT,id_tar AS idtar3,entrega,
			listacursos.gstTitlo,gstTipo,gstPrfil,
			personal.gstNombr,gstApell,gstCargo,
			COUNT(gstNombr)as participantesubsub       
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
					$iniciosubsub = $data3['fechaA'];
					$finalsubsub = $data3['fechaT'];
					$idtar3 = $data3['idtar3'];

					$participantesubsub = "<span style='font-weight:bold; color: green;'>PARTICIPANTE(S): ".$data3["participantesubsub"]."</span> / <a href='#' onclick='responsables({$idtar3})' data-toggle='modal' data-target='#basicModal' style='cursor: pointer; font-weight:bold; color: blue;'>EVALUAR</a>";



	 

	//  $tareas[] = [ $id,$data["titulo"],$data["descripcion"],$data["fechaA"],$data["fechaT"],$data["gstPrfil"],$responsables,$notificar];
	$tareas[] = array('id'=> $contador,'cursoPrinc' => $cursoPrinc,'titulo' =>$titulo,'descriprincipal' => $descriprincipal,'inicio' => $inicio,'final' =>$final,'iniciosub' => $iniciosub, 'iniciosubsub' => $iniciosubsub,'finalsub' => $finalsub,'finalsubsub' => $finalsubsub,'participantes' => $participantes,'participantesub' => $participantesub,'participantesubsub' => $participantesubsub,'subtarea' => $subtarea,'subsubtarea' => $subsubtarea,'descripcion' => $descripcion,'descripcionsub'=> $descripcionsub,'notificar' => $notificar,'perfilPrinc' => $perfilPrinc);
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