<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();



$n=0;
$query = "SELECT r.*,c.idmstr,c.idcoor,c.idinst, concat((select gstTitlo from listacursos where gstIdlsc  =c.idmstr)) as nombre_curso,concat((select gstNombr from personal where gstIdper =c.idcoor)) as COORDINADOR_NOMBRE, concat((select gstApell from personal where gstIdper =c.idcoor)) as COORDINADOR_APELLIDO,concat((select gstNombr from personal where gstIdper =c.idinst)) as INSTRUCTOR_NOMBRE,concat((select gstApell from personal where gstIdper =c.idinst)) as INSTRUCTOR_APELLIDO from reaccion r, cursos c WHERE c.id_curso =r.id_curso and c.estado=0";


	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		
		while($data = mysqli_fetch_assoc($resultado)){


	 $reaccion[] = [$n,$data["id_instruct"],$data["nombre_curso"],$data["COORDINADOR_NOMBRE"].' '.$data["COORDINADOR_APELLIDO"],$data["INSTRUCTOR_NOMBRE"].' '.$data["INSTRUCTOR_APELLIDO"],$data["pregunta1"],$data["pregunta2"],$data["pregunta3"],$data["pregunta4"],$data["pregunta5"],$data["pregunta6"],$data["pregunta7"],$data["pregunta8"],$data["pregunta9"],$data["pregunta10"],$data["pregunta11"],$data["pregunta12"],$data["pregunta13"],$data["pregunta14"],$data["pregunta15"],$data["pregunta16"],$data["pregunta17"],$data["pregunta18"],$data["pregunta19"],$data["pregunta20"],$data["pregunta21"],$data["pregunta22"],$data["pregunta23"],$data["pregunta24"],$data["pregunta25"],$data["pregunta26"],$data["pregunta27"],$data["pregunta28"],$data["pregunta29"],$data["pregunta30"]];

		}
	}


	$json_string = json_encode(array( 'data' => $reaccion ));
	echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>