<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
    $id = $_GET["id"];
	$query = "SELECT * FROM cursos 
    INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr 
    INNER JOIN personal ON idinsp = gstIdper 
    INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat
    WHERE cursos.codigo = '$id' AND cursos.estado=0 ORDER BY gstCargo DESC";
	$resultado = mysqli_query($conexion, $query);
    $item = 0;

	if(!$resultado){
		die("error");
	}else{
		
		while($data = mysqli_fetch_assoc($resultado)){
            $item++;
            if($data['confirmar'] == "CONFIRMAR"){
                $confirmar = "<img src='../dist/img/pendiente.png' width='35px;' title='Pendiente por confirmar asistencia'>";

            }else{
                $confirmar = "<img src='../dist/img/check.svg' width='35px;' title='Confirma asistencia'>";
            }

	
 	
	 $caledario[] = [ $item,$data["gstNombr"],$data["gstApell"],$data["gstCargo"],$confirmar,""];

		}
	}


	$json_string = json_encode(array( 'data' => $caledario ));
	echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>