<?php
header('Content-Type: application/json');
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT *,COUNT(*) as prtcpnts FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE cursos.estado = 0 GROUP by listacursos.gstTitlo,cursos.idmstr,cursos.idinst ORDER BY id_curso DESC ";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

	$id = $data['gstIdlsc'];		
	$gstTitlo = $data['gstTitlo'];

	$id_curso = $data['id_curso'];

		$fcurso=$data['fcurso'].''.$data['hcurso']; //INICIO DEL CURSO
        $ffcurso=$data['fechaf']; //FINAL DEL CURSO
		$hcurso=$data['hcurso']; 
		$tipo = 1;
		$id = $data['id_curso'];
		$sede = $data['sede'];
		$nombre = $data['gstTitlo'];
        

			// $arreglo[] = $data; 
			//  $arreglo[] = array('id'=> $id,'name'=> $gstTitlo, 'periods'=> [['id'=> $id_curso,'start'=>$start, 'end' => $end]] );
			
			//  $arreglo[] = array('start'=>$start, 'end' => $end,'name'=> $gstTitlo);
			 $arreglo[] = array('start'=> $fcurso,'end'=>$ffcurso, 'title'=> $nombre,'resource' => $tipo);

		}
        if(isset($arreglo)&&!empty($arreglo)){

			$json_string = json_encode(array( 'data' => $arreglo ));
			echo $json_string;

		}else{

			echo $json_string='0';
		}
		// if(isset($arreglo)&&!empty($arreglo)){

		// 	echo json_encode($arreglo, JSON_UNESCAPED_UNICODE);
		// }else{

		// 	echo $arreglo='0';
		// }
	}
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>