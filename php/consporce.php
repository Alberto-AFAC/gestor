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
	DATE_FORMAT( c.fechaf, '%d/%m/%Y' ) AS fcursof
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
