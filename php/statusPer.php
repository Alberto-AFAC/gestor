
<?php
	include("../conexion/conexion.php");
	session_start();
		ini_set('date.timezone','America/Mexico_City');



	$query = "SELECT * FROM personal WHERE estado = 0 OR estado = 3 OR estado = 2 ORDER BY gstIdper DESC";	
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{

    $personas = 0;
    $inspectores = 0;
    $instructor = 0;
    $coordinador = 0;
    $total = 0;
	while($data = mysqli_fetch_assoc($resultado)){
				


		if($data['gstCargo'] == 'INSPECTOR' || $data['gstCargo'] == 'DIRECTOR'){
			$inspectores++;
		} else if($data['gstCargo'] == 'INSTRUCTOR'){
			$instructor++;
		} else if($data['gstCargo'] == 'COORDINADOR') {
            $coordinador++;
        }
        $total++;

		}

	$data['persona'] = $total;	
	$data['inspectores'] = $inspectores;
	$data['instructor'] = $instructor;
	$data['coordinador'] = $coordinador;
	$arreglo["data"][] = $data;

		if(isset($arreglo)&&!empty($arreglo)){

			echo json_encode($arreglo);
		}else{

			echo $arreglo='0';
		}
	}
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>


