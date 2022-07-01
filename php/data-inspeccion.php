<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
	$n=0;
	$query = "SELECT
	*,
	DATE_FORMAT( p.gstFeing, '%d/%m/%Y' ) AS Ingreso,
	p.gstIDCat AS IDcat,
	(
	SELECT
		GROUP_CONCAT( g.gstCatgr ) AS spcialidds 
	FROM
		especialidadcat e,
		categorias g 
	WHERE
		g.gstIdcat = e.gstIDcat 
		AND g.gstIdcat NOT IN (24, 25, 26, 39, 31) 
		AND e.gstIDper = p.gstIdper 
		AND p.gstCargo='INSPECTOR'
	) AS spcialidds
FROM
	personal p,
	categorias c
WHERE
	c.gstIdcat = p.gstIDCat 
	AND p.gstCargo IN ('INSPECTOR', 'DIRECTOR', 'EJECUTIVO') 
	AND p.estado = 0 
ORDER BY
	p.gstIdper DESC";
	$resultado = mysqli_query($conexion, $query);
	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$gstIdper = $data['gstIdper'];
			$categoria = $data['spcialidds'];
			if($data['spcialidds']==''){	
				$categoria = 'POR ASIGNAR';
			}
			$fechaActual = date_create(date('d-m-Y')); 
	        $FechaIngreso = date_create($data['gstFeing']); 
	        $interval = date_diff($FechaIngreso, $fechaActual,false);  
	        $antiguedad = intval($interval->format('%R%a')); 

			$gstIdper = $data['gstIdper'];
			$result = $data['gstIdper'];
			$IDcat = $data['IDcat'];
			$resul = $result.'.'.$IDcat;
			
			/*if($data['antiguedad']>0){ 

				$cursor = "<span style='font-weight: bold; height: 50px; color: #3C8DBC;'>Personal antiguo</span>";
			}else{
				$cursor = "<span style='font-weight: bold; height: 50px; color: green;'>Nuevo ingreso</span>";
			}*/
			$n++;
               if($antiguedad <=60){
                 $cursor = '<span style="font-weight: bold; height: 50px; color: green;">Nuevo ingreso</span>';
             }else {
                 $cursor = '<span style="font-weight: bold; height: 50px; color: #3C8DBC;">Personal antiguo</span>';
             }

			$total =  "<a href='javascript:openDtlls()' title='Perfil' onclick='inspector({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Agregar estudios' onclick='estudio({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a>";
			/*if($data['gstEvalu'] == 'NO'){
				// echo "<a href='' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-danger' onclick='detalle({$data['n_reporte']})' style='width:100%'>Pendiente</a>";
                //$total =  "<a type='button' title='Por evaluación' onclick='inspector({$gstIdper})' class='btn btn-warning'  data-toggle='modal' data-target='#modal-evaluar' ><i class='fa ion-android-clipboard' style='font-size:23px;'></i></a> <a href='javascript:openDtlls()' title='Perfil' onclick='inspector({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Agregar estudios' onclick='estudio({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a>";
		        $total =  "<a href='javascript:openDtlls()' title='Perfil' onclick='inspector({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Agregar estudios' onclick='estudio({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a>";
            }else if($data['gstEvalu'] == 'SI') {
                //$total = "<a type='button' title='Evaluado' onclick='resultado({$resul})' class='datos btn btn-success'  data-toggle='modal' data-target='#modal-resultado'><i class='fa ion-android-clipboard' style='font-size:23px;'></i></a> <a href='javascript:openDtlls()' title='Perfil' onclick='inspector({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Agregar estudios' onclick='estudio({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a>";
		        $total = "<a href='javascript:openDtlls()' title='Perfil' onclick='inspector({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Agregar estudios' onclick='estudio({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a>";
            }*/
	    $caledario[] = [ $n,$data["gstNmpld"],$data["gstNombr"],$data["gstApell"],$categoria,$data["Ingreso"], $cursor, $total];
	}
}

	$json_string = json_encode(array( 'data' => $caledario ));
	echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>