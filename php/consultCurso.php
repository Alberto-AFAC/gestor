<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
	
	$query = "SELECT gstIdlsc,gstPrfil,gstTitlo,gstVignc,gstTipo 
      FROM listacursos 
      WHERE estado = 0 ORDER BY gstIdlsc ASC";
	$resultado = mysqli_query($conexion, $query);
	$contador=0;
	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

			$idcurso = $data["gstIdlsc"];
// 			$contador++;

 		ini_set('date.timezone','America/Mexico_City');
 		$valor = explode(",", $data["gstPrfil"]);
 		foreach ($valor as $id) {
	
		$sql = "SELECT 
		personal.gstIdper,
		personal.gstNombr,
		personal.gstApell,
		personal.gstCorro,
		categorias.gstCatgr,
		personal.gstIDCat,
		categorias.gstCsigl,
		personal.gstFeing,
		DATE_FORMAT(personal.gstFeing,
		'%d/%m/%Y') AS Feingreso,
		personal.gstCargo,
		personal.gstCinst
		FROM personal 
		INNER JOIN especialidadcat 
		ON personal.gstIdper = especialidadcat.gstIDper 
		INNER JOIN categorias 
		ON categorias.gstIdcat = especialidadcat.gstIDcat 
		WHERE categorias.gstCsigl = '$id' AND personal.estado = 0 ORDER BY gstFeing DESC";  

        $person = mysqli_query($conexion,$sql);
        if($per = mysqli_fetch_row($person)) {


      $sql1 = "
        SELECT 
        DATE_FORMAT(fechaf, '%d-%m-%Y') AS fechaf,
        idinsp,
        proceso,
        evaluacion,
        idmstr,
        confirmar
        FROM cursos 
        WHERE idmstr = $idcurso AND idinsp = 1046 AND prtcpnt = 'SI'
        ORDER BY fcurso DESC LIMIT 1";
        $fechas = mysqli_query($conexion,$sql1);

  
        if($fecs = mysqli_fetch_row($fechas)){

        $nombre = $per[1];
        $apellidos = $per[2];
        $idpar = $per[0];
        $catg = $per[4];

		$cursos[] = [$idpar,$nombre, $apellidos ,$catg,$idcurso,'DETLL','STADO','...'];

		// $cursos[] = [$data["gstIdlsc"], $data["gstPrfil"],$data["gstTitlo"],$data["gstVignc"],$data["gstTipo"], $id];

        }        	

        }		
 	}

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