<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();



	$query = "SELECT
    id_tar,
    titulo,descripcion, fechaA, fechaT,
    listacursos.gstTitlo,gstTipo, gstPrfil,
    personal.gstNombr,gstApell,gstCargo
        
    FROM
        tareas
        INNER JOIN tarearealizar ON id_tar = id_tare
        INNER JOIN listacursos ON gstIdlsc = idcur
        INNER JOIN personal ON gstIdper = idiva";
	$resultado = mysqli_query($conexion, $query);
	$contador = 0;

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$contador++;
			$responsables = $data["gstNombr"]." ".$data["gstApell"];
			$notificar = "<button type='button' class='btn btn-primary'>NOTIFICAR</button>";
	

	 

	 $caledario[] = [ $contador,$data["titulo"],$data["descripcion"],$data["fechaA"],$data["fechaT"],$data["gstPrfil"],$responsables,$notificar];

		}
	}


	$json_string = json_encode(array( 'data' => $caledario ));
	echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>