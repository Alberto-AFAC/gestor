<?php
	include("../conexion/conexion.php");
	session_start();
	//$query = "SELECT * FROM cursos INNER JOIN listacursos ON idmstr = gstIdlsc INNER JOIN personal ON gstIdper = idinsp ORDER BY id_curso DESC ";
	$idcurso = $_GET["idcurso"];
	$query="SELECT
	*,
	DATE_FORMAT( c.fcurso, '%d/%m/%Y' ) AS inico,
	DATE_FORMAT( c.fechaf, '%d/%m/%Y' ) AS fin,
	(select p.gstNombr from personal p, cursos c where c.idcoor=p.gstidper and c.id_curso='$idcurso' GROUP BY c.codigo) as coordname,
	(select p.gstApell from personal p, cursos c where c.idcoor=p.gstidper and c.id_curso='$idcurso' GROUP BY c.codigo) as coordlastname
FROM
	cursos c,
	listacursos l,
	personal p 
WHERE
	c.idmstr = l.gstIdlsc 
	AND p.gstIdper = c.idinsp 
	AND c.id_curso=$idcurso
ORDER BY
	id_curso DESC";
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