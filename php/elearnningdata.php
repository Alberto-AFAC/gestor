<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
    $id = $_GET["id"];
	$query = "SELECT * FROM elearnning 
	WHERE  id_curso = $id AND estado = 0";
	$resultado = mysqli_query($conexion, $query);
    $x = 0;
	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
        $x++;

 	
	 $caledario[] = [ $x, $data["tituloV"],$data["objetivoV"],$data[""],$data["url"]];

		}

	}


	$json_string = json_encode(array( 'data' => $caledario ));
	echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>