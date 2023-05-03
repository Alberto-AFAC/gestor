<?php
include("../conexion/conexion.php");
session_start();
$folio = 'FO'.$_POST['folio'];
$query = "SELECT *,count(codigo) as tcurso 
FROM cursos 
INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr 
WHERE codigo = '$folio' AND prtcpnt = 'SI' AND cursos.estado = 0 
GROUP by codigo ORDER BY cursos.proceso DESC ";
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