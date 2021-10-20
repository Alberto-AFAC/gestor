<?php
	include ("../conexion/conexion.php");
	header("Content-Type: text/html;charset=utf-8");
	$query = "SELECT *,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as final, DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as inicio FROM cursos 
    INNER JOIN listacursos ON gstIdlsc = idmstr  
    WHERE modalidad = 'E-LEARNNING' AND cursos.estado = 0
    GROUP BY gstIdlsc";
	$resultado = mysqli_query($conexion, $query);

	if (!$resultado) {
		die("error");//EN CASO DE NO HABER RESULTADO
	}else{//arreglo -funcion , parametro de resultado
		while($data = mysqli_fetch_assoc($resultado)){
			//variable arreglo..para no tener problemas con la comas,comillas,tilde etc
	$arreglo["data"][] = $data;	
				//array_map("utf8_decode", $data)
		}//al tener toda los datos en data de la variable arreglo lo pasamos formato json
		if(isset($arreglo) && !empty($arreglo)) {
				echo json_encode($arreglo);
			}else
			{
					echo $arreglo='""';				
			}
	}
	mysqli_free_result($resultado);
	mysqli_close($conexion);