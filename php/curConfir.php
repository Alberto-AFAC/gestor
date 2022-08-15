<?php
	include("../conexion/conexion.php");
	session_start();
	
	//$query = "SELECT * FROM cursos INNER JOIN listacursos ON idmstr = gstIdlsc INNER JOIN personal ON gstIdper = idinsp ORDER BY id_curso DESC ";
	$query="SELECT *,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as inico,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as fin FROM cursos 
	INNER JOIN listacursos ON idmstr = gstIdlsc 
	INNER JOIN personal ON gstIdper = idinsp 
	ORDER BY id_curso DESC ";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

		$idinsp = $data['idinsp'];
		$codigo = $data['codigo'];


			// if($data['idcoor']==$data['idinsp']){
			// $data["puesto"] = 'COORDINADOR';
			// }else{
			// $data["puesto"] = 'INSPECTOR';
			// }
		$idper = '';


			$queriy = "SELECT * FROM instructor WHERE codigoInst = '$codigo' AND id_per = $idinsp AND estado = 0";
			$result = mysqli_query($conexion, $queriy);

			if($rest = mysqli_fetch_array($result)){
				$data["puesto"] = 'INSTRUCTOR';
				$idper = $rest['id_per'];
			}			

		

			if($data['idcoor']==$data['idinsp'] && $data['idcoor'] == $idper){
				$data["puesto"] = 'INSTCOOR';
			}else
					if($data['idcoor']==$data['idinsp']){
			$data["puesto"] = 'COORDINADOR';
			}


			$arreglo["data"][] = $data; 
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