<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
	
	$query = "SELECT *, COUNT(*) AS prtcpnts 
			FROM
			cursos
			INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr 
			WHERE
			cursos.estado = 0 
			GROUP BY
			cursos.idmstr,
			cursos.idinst 
			ORDER BY
			id_curso DESC";
	$resultado = mysqli_query($conexion, $query);
	$contador=0;
	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$contador++;

		//	$arreglo["data"][] = $data; 
		$date = date_create("2020-03-29");
		date_format($date,"Y/m/d H:i:s");
if($data["proceso"] == 'PENDIENTE'){

	$proceso = '<span style="font-weight: bold; height: 50px; color:#F39403;">PENDIENTE</span>';
} else if($data["proceso"] == 'FINALIZADO'){
	$proceso = '<span style="font-weight: bold; height: 50px; color:green;">FINALIZADO</span>';

} else if($data["proceso"] == 'EN PROCESO'){
	$proceso = '<span style="font-weight: bold; height: 50px; color: ##3C8DBC;">EN PROCESO</span>';
} 
	 $cursos[] = [ $contador, $data["gstTitlo"],$data["gstTipo"],$data["fcurso"],$data["gstDrcin"],$data["fechaf"],$data["prtcpnts"],$proceso];

		}



		// if(isset($arreglo)&&!empty($arreglo)){

		// 	echo json_encode($arreglo, JSON_PRETTY_PRINT);
		// }else{

		// 	echo $arreglo='0';
		// }
	}


	$json_string = json_encode(array( 'data' => $cursos ));
	echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>