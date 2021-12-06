<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();

	$query = "	SELECT * FROM ojts
				INNER JOIN categorias ON categorias.gstIdcat = ojts.id_spc
				WHERE ojts.estado = 0";
						$resultado = mysqli_query($conexion, $query);
						$contador = 0;
	

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$contador++;
			$categoria = $data["gstCatgr"];
			$TaskMain = $data["ojt_principal"];
	$tareas[] = array('id'=> $contador,'categoria' => $categoria, 'TaskMain' => $TaskMain);
}

}
// }
	if(isset($tareas)&&!empty($tareas)){

		echo json_encode(array( 'data' => $tareas,JSON_PRETTY_PRINT ));
	}else{

		echo $tareas='0';
	}
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>