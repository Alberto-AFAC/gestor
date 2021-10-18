<?php
	include ("../conexion/conexion.php");
	header("Content-Type: text/html;charset=utf-8");
	$query = "SELECT * FROM accesos
INNER JOIN personal ON id_usu = gstIdper WHERE estado = 0";
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