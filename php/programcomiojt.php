<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	    session_start();
    $id = $_GET["id"];

	$query = "SELECT * FROM prog_ojt  WHERE estado = 0 and id_pers=$id GROUP BY comision";
	$resultado = mysqli_query($conexion, $query);
    $item = 0;

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
            $item++;
			$id_registro = $data["id_proojt"];
			$id_tarea = $data["id_tarea"];
            $id_subtarea = $data['id_subtarea'];   
            $notificar = "<a title='Ver detalle' onclick='openOJT($id)' type='button' data-toggle='modal' class='editar btn btn-default'><i class='fa fa-list-ul'></i></a> <a title='Información de la comisión' onclick='comisioninfo($id_registro)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-proojtcomi'><i class='fa fa-info'></i></a> <a title='Notificar' onclick='enviarMailOjt({$id_registro}.{$id})' class='datos btn btn-default' ><i class='glyphicon glyphicon-send'></i></a>";

        
		//ESTA ES LA CONSULTA AQUI DEBES DE AGREGAR TODO LO DE LAS COLUMNAS
		$consulta[] = 
		[ $item, $data["comision"],$data["fec_inioj"], $data["fec_finoj"], $data["nivel"], $notificar];
	
	}
}
	$json_string = json_encode(array( 'data' => $consulta ));
	echo $json_string;
	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>
