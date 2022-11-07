<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();



$n=0;
$query = "SELECT
r.*,
c.idmstr,
c.idcoor,
c.idinst,
concat((
	SELECT
		gstTitlo 
	FROM
		listacursos 
	WHERE
		gstIdlsc = c.idmstr 
	)) AS nombre_curso,
concat((
	SELECT
		gstNombr 
	FROM
		personal 
	WHERE
		gstIdper = c.idcoor 
	)) AS COORDINADOR_NOMBRE,
concat((
	SELECT
		gstApell 
	FROM
		personal 
	WHERE
		gstIdper = c.idcoor 
	)) AS COORDINADOR_APELLIDO,
concat((
	SELECT
		gstNombr 
	FROM
		personal 
	WHERE
		gstIdper = c.idinst 
	)) AS INSTRUCTOR_NOMBRE,
concat((
	SELECT
		gstApell 
	FROM
		personal 
	WHERE
		gstIdper = c.idinst 
	)) AS INSTRUCTOR_APELLIDO,
	(
	SELECT
		CONCAT(gstNombr,' ', gstApell) PARTICIPANTE 
	FROM
		personal 
	WHERE
		gstIdper = c.idinsp 
	) AS PARTICIPANTE
FROM
reaccion r,
cursos c 
WHERE
c.id_curso = r.id_curso 
AND c.estado =0";


	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		
		while($data = mysqli_fetch_assoc($resultado)){
$n++;

	 $reaccion[] = [$n,$data["id_instruct"],$data["PARTICIPANTE"],$data["nombre_curso"],$data["COORDINADOR_NOMBRE"].' '.$data["COORDINADOR_APELLIDO"],$data["INSTRUCTOR_NOMBRE"].' '.$data["INSTRUCTOR_APELLIDO"],$data["pregunta1"],$data["pregunta2"],$data["pregunta3"],$data["pregunta4"],$data["pregunta5"],$data["pregunta6"],$data["pregunta7"],$data["pregunta8"],$data["pregunta9"],$data["pregunta10"],$data["pregunta11"],$data["pregunta12"],$data["pregunta13"],$data["pregunta14"],$data["pregunta15"],$data["pregunta16"],$data["pregunta17"],$data["pregunta18"],$data["pregunta19"],$data["pregunta20"],$data["pregunta21"],$data["pregunta22"],$data["pregunta23"],$data["pregunta24"],$data["pregunta25"],$data["pregunta26"],$data["pregunta27"],$data["pregunta28"],$data["pregunta29"],$data["pregunta30"]];

		}
	}


	$json_string = json_encode(array( 'data' => $reaccion ));
	echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>