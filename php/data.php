<?php
header('Content-Type: application/json');
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT *,COUNT(*) as prtcpnts FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE cursos.estado = 0 GROUP by listacursos.gstTitlo,cursos.idmstr,cursos.idinst ORDER BY cursos.id_curso DESC ";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

	$id = $data['gstIdlsc'];		
	$gstTitlo = $data['gstTitlo'];

	$id_curso = $data['id_curso'];

	$codigo = $data['codigo'];
	

	$query2 = "SELECT *,COUNT(*) as prtcpnts FROM semanal WHERE semanal.id_curso = '$codigo' AND estado = 0 GROUP by id_curso ORDER BY semanal.id_curso DESC ";
	$resultado2 = mysqli_query($conexion, $query2);
	
	if($data2 = mysqli_fetch_assoc($resultado2)){
		
		$fcurso = $data2['fec_inico'].''.$data2['hora_ini'];//INICIO DEL CURSO

	}

	$folio = substr($data['codigo'],2);
	$codigo = $folio;

	
        $ffcurso= $data['fechaf']; //FINAL DEL CURSO
		$hcurso=$data['hcurso']; 
		$tipo = $data['gstTipo'];
		$id = $data['id_curso'];
	
		$nombre = "<a data-toggle='modal' data-target='#ganttPartici'><span onclick='listview({$codigo});'>{$data['gstTitlo']}</span></a>";
        

			// $arreglo[] = $data; 
			//  $arreglo[] = array('id'=> $id,'name'=> $gstTitlo, 'periods'=> [['id'=> $id_curso,'start'=>$start, 'end' => $end]] );
			
			//  $arreglo[] = array('start'=>$start, 'end' => $end,'name'=> $gstTitlo);
			 $arreglo[] = array('start'=> $fcurso,'end'=>$ffcurso, 'title'=> $nombre,'resource' => $tipo);

		}
        // if(isset($arreglo)&&!empty($arreglo)){

		// 	$json_string = json_encode(array( 'data' => $arreglo ));
		// 	echo $json_string;

		// }else{

		// 	echo $json_string='0';
		// }
		if(isset($arreglo)&&!empty($arreglo)){

			echo json_encode($arreglo, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		}else{

			echo $arreglo='0';
		}
	}
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>