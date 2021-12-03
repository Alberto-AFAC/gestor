<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();

	$query = "SELECT
	DATE_FORMAT(fechaA, '%d/%m/%Y') AS fechaini,DATE_FORMAT(fechaT, '%d/%m/%Y') AS fechater,
    id_tar,titulo,descripcion, fechaA, fechaT,id_tar AS idtar1,
    categorias.gstCatgr,gstCsigl    
    FROM
    tareas
    INNER JOIN categorias ON categorias.gstIdcat  = tareas.idcur
	 WHERE idsubt = 0 GROUP BY idcur";
	$resultado = mysqli_query($conexion, $query);
	$contador = 0;
	

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$contador++;
			$notificar = "<button type='button' class='btn btn-primary'>NOTIFICAR</button>";
			$titulo = $data["titulo"];
			$descriprincipal = $data["descripcion"];
			$inicio = $data["fechaini"];
			$cursoPrinc = "<span>".$data["gstCatgr"]."</span><span style='font-weight: bold; color: #3C8DBC;'>(".$data["gstCsigl"].")</span>";
			// if($data["gstPrfil"] == 0){
			// 	$perfilPrinc = 'POR ASIGNAR';
			// }else{
			// 	$perfilPrinc = $data["gstPrfil"];
			// }
	
			$final = $data["fechater"];
			$idtar1 = $data["idtar1"];
			// $participantes = "<span data-toggle='modal' data-target='#basicModal' style='cursor: alias; font-weight:bold; color: green;'></span>";
			$query2 = "	SELECT
				DATE_FORMAT(fechaA, '%d/%m/%Y') AS fechaini,DATE_FORMAT(fechaT, '%d/%m/%Y') AS fechater,
			id_tar,titulo,descripcion, fechaA, fechaT,id_tar AS idtar2,
			categorias.gstCatgr,gstCsigl      
			FROM
			tareas
			INNER JOIN categorias ON categorias.gstIdcat  = tareas.idcur
				WHERE idsubt = $idtar1 GROUP BY idcur";
				$resultado2 = mysqli_query($conexion, $query2);
				while($data2 = mysqli_fetch_assoc($resultado2)){
		
			$subtarea = $data2['titulo'];
			$descripcion = $data2['descripcion'];
			$iniciosub = $data2['fechaini'];
			$finalsub = $data2['fechater'];
			$idtar2 = $data2["idtar2"];


			$query3 = "	SELECT
				DATE_FORMAT(fechaA, '%d/%m/%Y') AS fechaini,DATE_FORMAT(fechaT, '%d/%m/%Y') AS fechater,
			id_tar,titulo,descripcion, fechaA, fechaT,id_tar AS idtar3,
			categorias.gstCatgr,gstCsigl    
			FROM
			tareas
			INNER JOIN categorias ON categorias.gstIdcat  = tareas.idcur
				WHERE idsubt = $idtar2 GROUP BY idcur";
				$resultado3 = mysqli_query($conexion, $query3);
				while($data3 = mysqli_fetch_assoc($resultado3)){
					$subsubtarea = $data3['titulo'];
					$descripcionsub = $data3['descripcion'];
					$iniciosubsub = $data3['fechaini'];
					$finalsubsub = $data3['fechater'];
					$idtar3 = $data3['idtar3'];

	//  $tareas[] = [ $id,$data["titulo"],$data["descripcion"],$data["fechaA"],$data["fechaT"],$data["gstPrfil"],$responsables,$notificar];
	$tareas[] = array('id'=> $contador,'cursoPrinc' => $cursoPrinc,'titulo' =>$titulo,'descriprincipal' => $descriprincipal,'subtarea' => $subtarea,'subsubtarea' => $subsubtarea,'descripcion' => $descripcion,'descripcionsub'=> $descripcionsub,'notificar' => $notificar);
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