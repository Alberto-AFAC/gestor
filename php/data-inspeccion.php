<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();



$n=0;
$query = "
SELECT *, DATE_FORMAT(personal.gstFeing, '%d/%m/%Y') AS Ingreso,personal.gstIDCat AS IDcat 
FROM personal 
INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat
WHERE personal.gstCargo = 'INSPECTOR' AND  personal.estado = 0 
   OR personal.gstCargo = 'DIRECTOR' AND  personal.estado = 0 
   OR personal.gstCargo = 'EJECUTIVO' AND  personal.estado = 0
   -- OR personal.gstCargo = 'COORDINADOR' AND  personal.estado = 0
ORDER BY gstIdper DESC";

// $query = "SELECT *, DATE_FORMAT(personal.gstFeing, '%d/%m/%Y') as Ingreso,personal.gstIDCat AS IDcat,posix_getgroups()_CONCAT(gstCatgr) AS spcialidds   
// FROM especialidadcat 
// INNER JOIN categorias ON categorias.gstIdcat = especialidadcat.gstIDcat 
// INNER JOIN personal ON personal.gstIdper = especialidadcat.gstIDper 
// WHERE categorias.gstIdcat != 24 
// AND categorias.gstIdcat != 25 
// AND categorias.gstIdcat != 26 
// AND categorias.gstIdcat != 29 
// AND categorias.gstIdcat != 31
// AND personal.estado = 0 ORDER BY personal.gstIdper DESC
// "; 



	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		
		while($data = mysqli_fetch_assoc($resultado)){

		$gstIdper = $data['gstIdper'];

		$queri = "SELECT *,GROUP_CONCAT(gstCatgr) AS spcialidds 
		FROM especialidadcat 
		INNER JOIN categorias ON categorias.gstIdcat = especialidadcat.gstIDcat 
		WHERE categorias.gstIdcat != 24 
		AND categorias.gstIdcat != 25 
		AND categorias.gstIdcat != 26 
		AND categorias.gstIdcat != 29 
		AND categorias.gstIdcat != 31
		AND especialidadcat.gstIDper = $gstIdper";
		$resul = mysqli_query($conexion, $queri); 


		if($res = mysqli_fetch_array($resul)){
		$categoria = $res['spcialidds'];

		if($res['spcialidds']==''){	$categoria = 'POR ASIGNAR'; }

		}else{
		$categoria = 'POR ASIGNAR';
		}
			// if($data['gstCatgr'] == 'CURSO OBLIGATORIO'){
			// 	$categoria = "";
			  
			//   }else{
			// 	$categoria = $data['gstCatgr'];
			//   }

			
            $fechaActual = date_create(date('d-m-Y')); 
		    $FechaIngreso = date_create($data['gstFeing']); 
		    $interval = date_diff($FechaIngreso, $fechaActual,false);  
		    $antiguedad = intval($interval->format('%R%a')); 

      $gstIdper = $data['gstIdper'];
      $result = $data['gstIdper'];
      $IDcat = $data['IDcat'];
        $resul = $result.'.'.$IDcat;

	  $query2 = "SELECT *
	  FROM cursos 
	  WHERE idinsp  = $gstIdper AND proceso = 'FINALIZADO'";
	  $resultado2 = mysqli_query($conexion, $query2);
	  
	  if($curs = mysqli_fetch_row($resultado2)){ 
  
	  $cursor = "<span style='font-weight: bold; height: 50px; color: #3C8DBC;'>Personal antiguo</span>";
  
	  }else{
	  $cursor = "<span style='font-weight: bold; height: 50px; color: green;'>Nuevo ingreso</span>";
	  }
	  $n++;
    //   if($antiguedad <=30){
    //     $antiguedadT = '<span style="font-weight: bold; height: 50px; color: green;">Nuevo ingreso</span>';
    // }else {
    //     $antiguedadT = '<span style="font-weight: bold; height: 50px; color: #3C8DBC;">Personal antiguo</span>';
    // }

	
    if($data['gstEvalu'] == 'NO'){
                
        // echo "<a href='' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-danger' onclick='detalle({$data['n_reporte']})' style='width:100%'>Pendiente</a>";

        //$total =  "<a type='button' title='Por evaluación' onclick='inspector({$gstIdper})' class='btn btn-warning'  data-toggle='modal' data-target='#modal-evaluar' ><i class='fa ion-android-clipboard' style='font-size:23px;'></i></a> <a href='javascript:openDtlls()' title='Perfil' onclick='inspector({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Agregar estudios' onclick='estudio({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a>";
		$total =  "<a href='javascript:openDtlls()' title='Perfil' onclick='inspector({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Agregar estudios' onclick='estudio({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a>";
            }else if($data['gstEvalu'] == 'SI') {

        //$total = "<a type='button' title='Evaluado' onclick='resultado({$resul})' class='datos btn btn-success'  data-toggle='modal' data-target='#modal-resultado'><i class='fa ion-android-clipboard' style='font-size:23px;'></i></a> <a href='javascript:openDtlls()' title='Perfil' onclick='inspector({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Agregar estudios' onclick='estudio({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a>";
		$total = "<a href='javascript:openDtlls()' title='Perfil' onclick='inspector({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Agregar estudios' onclick='estudio({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a>";
            }
 	
	 $caledario[] = [ $n,$data["gstNmpld"],$data["gstNombr"],$data["gstApell"],$categoria,$data["Ingreso"], $cursor, $total];

		}
	}


	$json_string = json_encode(array( 'data' => $caledario ));
	echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>