<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();



$n=0;
$query = "SELECT
c.*,
p.gstNmpld,
p.gstNombr,
p.gstApell,
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
concat((
	SELECT
		gstTitlo 
	FROM
		listacursos 
	WHERE
		gstIdlsc = c.idmstr 
	)) AS NOMBRE_CURSO,
concat((
	SELECT
		gstPrfil 
	FROM
		listacursos 
	WHERE
		gstIdlsc = c.idmstr 
	)) AS PERFIL,
( SELECT gstTipo FROM listacursos WHERE gstIdlsc = c.idmstr ) AS TIPO,
(
	SELECT
		e.adscripcion 
	FROM
		personal n,
		area e 
	WHERE
		n.gstIdper = c.idinsp 
		AND e.id_area = n.gstIDara 
	) AS areadscripcion,concat((
		SELECT
			gstApell 
		FROM
			personal 
		WHERE
			gstIdper = c.idinst 
		)) AS INSTRUCTOR_APELLIDO,
	( SELECT gstProvd FROM listacursos WHERE gstIdlsc = c.idmstr ) AS procedencia,(
	SELECT 
	    l.gstCntro 
	FROM 
	    listacursos l 
	WHERE 
	    l.gstIdlsc=c.idmstr
	)as centro,
	(
	SELECT
		u.gstGnric
	FROM
		personal n,
		codigo u 
	WHERE
		n.gstIdper = c.idinsp 
		AND u.gstIdpst = n.gstIdpst 
	) AS puesto,
	(
	SELECT
		v.gstAreje 
	FROM
		personal n,
		ejecutiva v 
	WHERE
		n.gstIdper = c.idinsp 
		AND v.gstIdeje = n.gstAreID 
	) AS direccion,
	(
	SELECT
	l.gstDrcin 
	FROM 
	    listacursos l 
	WHERE 
	    l.gstIdlsc=c.idmstr 
	) AS gstDrcin
FROM
cursos c,
personal p 
WHERE
c.idinsp = p.gstIdper 
AND c.estado = 0 
AND c.idinsp != c.idcoor 
AND c.idinsp != c.idinst";


	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		
		while($data = mysqli_fetch_assoc($resultado)){
			$n++;
			$caledario[] = [ 
			    $n,
			    $data["gstNmpld"],
			    $data["gstNombr"].' '.$data["gstApell"],
			    $data["NOMBRE_CURSO"],
			    $data["direccion"],
			    $data["areadscripcion"],
			    $data["puesto"],
			    $data["procedencia"],
			    $data["centro"],
			    $data["TIPO"],
			    $data["grupo"],
			    $data["codigo"],
			    $data["fcurso"], 
			    $data["fechaf"],
			    $data["hcurso"],
			    $data["sede"],
			    $data["modalidad"],
			    $data["link"],
			    $data["contracur"],
			    $data["proceso"],
			    $data["evaluacion"],
			    $data["fnotif"],
			    $data["classroom"],
			    $data["COORDINADOR_NOMBRE"].' '.$data["COORDINADOR_APELLIDO"],
			    $data["INSTRUCTOR_NOMBRE"].' '.$data["INSTRUCTOR_APELLIDO"],
			    $data["confirmar"],$data["justifi"],
			    $data["PERFIL"],
			    $data["gstDrcin"]
			];

		}
	}


	$json_string = json_encode(array( 'data' => $caledario ));
	echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>