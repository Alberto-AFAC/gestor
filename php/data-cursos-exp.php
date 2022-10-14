<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();



$n=0;
$query = "SELECT c.*, p.gstNmpld, p.gstNombr, p.gstApell, concat((select gstNombr from personal where gstIdper =c.idcoor)) as COORDINADOR_NOMBRE, concat((select gstApell from personal where gstIdper =c.idcoor)) as COORDINADOR_APELLIDO,concat((select gstNombr from personal where gstIdper =c.idinst)) as INSTRUCTOR_NOMBRE,concat((select gstApell from personal where gstIdper =c.idinst)) as INSTRUCTOR_APELLIDO,concat((select gstTitlo from listacursos where gstIdlsc =c.idmstr)) as NOMBRE_CURSO,concat((select gstPrfil from listacursos where gstIdlsc =c.idmstr)) as PERFIL  FROM cursos c, personal p 
WHERE c.idinsp = p.gstIdper AND c.estado = 0 AND c.idinsp!=c.idcoor and c.idinsp!=c.idinst";


	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		
		while($data = mysqli_fetch_assoc($resultado)){
			$n++;

	 $caledario[] = [ $n,$data["gstNmpld"],$data["gstNombr"].' '.$data["gstApell"],$data["NOMBRE_CURSO"],$data["grupo"],$data["codigo"],$data["fcurso"], $data["fechaf"],$data["hcurso"],$data["sede"],$data["modalidad"],$data["link"],$data["contracur"],$data["proceso"],$data["evaluacion"],$data["fnotif"],$data["classroom"],$data["COORDINADOR_NOMBRE"].' '.$data["COORDINADOR_APELLIDO"],$data["INSTRUCTOR_NOMBRE"].' '.$data["INSTRUCTOR_APELLIDO"],$data["confirmar"],$data["justifi"],$data["PERFIL"]];

		}
	}


	$json_string = json_encode(array( 'data' => $caledario ));
	echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>