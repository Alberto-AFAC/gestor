<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
	
	$id = $_SESSION['usuario']['id_usu'];
	$n = 0;
	$sql = 
	"SELECT personal.gstIdper,personal.gstIDara,gstNombr,gstApell,gstCargo FROM personal 
	 WHERE personal.gstIdper = '".$id."' && personal.estado = 0 ";
   $persona = mysqli_query($conexion,$sql);
   $datos = mysqli_fetch_row($persona);

	 $datos[1];
	 $datos[2];
	 $datos[3];

	$Direje= $datos[1];
	$query = "
	SELECT *,personal.gstIDCat AS IDcat 
	FROM personal 
	INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat
	WHERE personal.gstCargo = 'INSPECTOR' AND  personal.estado = 0 AND gstIDara  = $Direje 
	   OR personal.gstCargo = 'DIRECTOR' AND  personal.estado = 0 AND gstIDara = $Direje
	   OR personal.gstCargo = 'EJECUTIVO' AND  personal.estado = 0 AND gstIDara = $Direje 
	   -- OR personal.gstCargo = 'COORDINADOR' AND  personal.estado = 0 AND gstIDara = $Direje  


	   ORDER BY personal.gstCargo ASC";
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


			$fechaActual = date_create(date('Y-m-d')); 
			$FechaIngreso = date_create($data['gstFeing']); 
			$interval = date_diff($FechaIngreso, $fechaActual,false);  
			$antiguedad = intval($interval->format('%R%a')); 
			$gstIdper = $data['gstIdper'];
			$result = $data['gstIdper'];
			$IDcat = $data['IDcat'];
			$resul = $result.'.'.$IDcat;


		if($antiguedad <=30){
		$antiguedadT = '<span style="font-weight: bold; height: 50px; color: green;">Nuevo ingreso</span>';
		}else {
		$antiguedadT = '<span style="font-weight: bold; height: 50px; color: #3C8DBC;">Personal antiguo</span>';
		}

    $n++;
 
	if($data['gstEvalu'] == 'NO' && $data['gstCargo']!='DIRECTOR'){
		$total = "<a type='button' title='Por evaluaci??n' onclick='inspector({$gstIdper})' class='btn btn-warning'  data-toggle='modal' data-target='#modal-evaluar' ><i class='fa ion-android-clipboard' style='font-size:23px;'></i></a> <a href='javascript:openDtlls()' title='Perfil' onclick='inspector({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a>";

		//$caledario[] = [ $n,$data["gstNmpld"],$data["gstNombr"],$data["gstApell"],$data["gstCatgr"],$antiguedadT, $total];
	}else if($data['gstEvalu'] == 'SI' && $data['gstCargo']!='DIRECTOR') { 
		$total = "<a type='button' title='Evaluado' onclick='resultado({$resul})' class='datos btn btn-success'  data-toggle='modal' data-target='#modal-resultado'><i class='fa ion-android-clipboard' style='font-size:23px;'></i></a> <a href='javascript:openDtlls()' title='Perfil' onclick='inspector({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Nueva especialidad' onclick='spcialidad({$gstIdper})' class='datos btn btn-default' data-toggle='modal' data-target='#modal-especialidad' style='width:40px; height:35px;padding:0;margin:0;'><img width='25px' style='padding-top:0.3em;' src='../dist/img/anadir.svg'></a>";
		//$caledario[] = [ $n,$data["gstNmpld"],$data["gstNombr"],$data["gstApell"],$data["gstCatgr"],$antiguedadT, $total2];


	}$caledario[] = [ $n,$data["gstNmpld"],$data["gstNombr"],$data["gstApell"],$categoria,$antiguedadT, $total];


		}
	}


	$json_string = json_encode(array( 'data' => $caledario ));
	echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>