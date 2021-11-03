<?php
	include("../conexion/conexion.php");


	$idins = $_POST['gstIdper'];

	$query = "SELECT *,listacursos.gstIdlsc AS list FROM especialidadcat
	INNER JOIN categorias ON especialidadcat.gstIDcat = categorias.gstIdcat
	INNER JOIN listacursos ON listacursos.gstPrfil = categorias.gstCsigl
	WHERE especialidadcat.gstIDper = $idins AND especialidadcat.estado = 0";

	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

			$lis = $data['list'];
	
			$queri = "
			SELECT * FROM cursos WHERE idinsp = $idins AND idmstr = $lis AND estado = 0 ORDER BY id_curso DESC";
			$resul = mysqli_query($conexion, $queri);


			if($res = mysqli_fetch_array($resul)){
				if($res['proceso']=='PENDIENTE' && $res['confirmar']=='CONFIRMADO'){ // CONRFIRMA (SIN FINALIZAR CURSO)
					$data['proceso'] = 'EN CURSO';
					$arreglo["data"][] = $data; 
				}else if($res['proceso']=='FINALIZADO' && $res['confirmar']=='CONFIRMADO'){ // CONFIRMA Y ESTA FINALIZADO EL CURSO
					$data['proceso'] = 'FINALIZADO';
					$arreglo["data"][] = $data; 
				}
				if($res['proceso']=='FINALIZADO' && $res['confirmar']=='TRABAJO'){ //DECLINA POR TABAJO
					$data['proceso'] = 'PENDIENTE';
					$arreglo["data"][] = $data;
				}
				if($res['proceso']=='FINALIZADO' && $res['confirmar']=='ENFERMEDAD'){ //DECLINA POR ENFERMEDAD
					$data['proceso'] = 'PENDIENTE';
					$arreglo["data"][] = $data;
				}
				if($res['proceso']=='FINALIZADO' && $res['confirmar']=='OTROS'){ //DECLINA POR OTROS
					$data['proceso'] = 'PENDIENTE';
					$arreglo["data"][] = $data;
				}
			}else{
			
			$data["proceso"] = 'PENDIENTE';
			$arreglo["data"][] = $data; 
			}

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
