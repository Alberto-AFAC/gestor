<?php
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT
	c.*,
	l.gstIdlsc,
	l.codigoCrso,
	l.gstTitlo,
	l.gstTipo,
	l.gstVignc,
	l.gstPrfil,
	l.gstTmrio,
	l.gstDrcin,
	l.gstCntnc,
	l.gstObjtv,
	l.gstFalta,
	l.gstProvd,
	l.gstCntro,
	DATE_FORMAT( c.fechaf, '%d/%m/%Y' ) AS fcursof,
	(
	SELECT
		MAX( cursos.fcurso ) 
	FROM
		cursos 
	WHERE
		cursos.idmstr = c.idmstr 
		AND cursos.idinsp = c.idinsp 
		AND l.gstVignc != 101 
		AND c.proceso = 'FINALIZADO' 
		AND c.confirmar = 'CONFIRMADO' 
		AND cursos.evaluacion >= 80 
		AND c.evaluacion >= 80 
		AND c.prtcpnt='SI'
		) AS recursado,(
	SELECT
		MAX(s.fcurso) 
	FROM
		cursos s,
		listacursos a 
	WHERE
		s.idinsp = c.idinsp 
		AND s.idmstr = a.gstIdlsc 
		AND l.gstVignc != 101 
		AND c.proceso = 'FINALIZADO' 
		AND c.confirmar = 'CONFIRMADO' 
		AND s.evaluacion >= 80 
		AND l.gstTipo = 'BÁSICOS/INICIAL' 
		AND a.gstTipo = 'RECURRENTES' 
		AND a.gstPrfil = l.gstPrfil 
		AND c.evaluacion >= 80
		AND c.prtcpnt='SI'
	) AS recurrente 
FROM
	cursos c,
	listacursos l 
WHERE
	l.gstIdlsc = c.idmstr 
	AND c.idinsp != c.idcoor 
	AND c.idinsp != c.idinst 
	AND c.estado = '0'";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

			$arreglo["data"][] = $data; 
		}
		if(isset($arreglo)&&!empty($arreglo)){

			echo json_encode($arreglo);
		}else{

			echo $arreglo='0';
		}
	}
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>


