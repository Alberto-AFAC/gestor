<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();



	$query = "SELECT *, DATE_FORMAT(personal.gstFeing, '%d/%m/%Y') as Ingreso FROM personal 
    INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat
    WHERE personal.gstCargo = 'INSPECTOR' AND  personal.estado = 0 OR personal.gstCargo = 'DIRECTOR' AND  personal.estado = 0 ORDER BY gstIdper DESC";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
            $fechaActual = date_create(date('d-m-Y')); 
		    $FechaIngreso = date_create($data['gstFeing']); 
		    $interval = date_diff($FechaIngreso, $fechaActual,false);  
		    $antiguedad = intval($interval->format('%R%a')); 

      $gstIdper = $data['gstIdper'];
      $result = $data['gstIdper'];
      if($antiguedad <=30){
        $antiguedadT = '<span style="font-weight: bold; height: 50px; color: green;">Nuevo ingreso</span>';
    }else {
        $antiguedadT = '<span style="font-weight: bold; height: 50px; color: #3C8DBC;">Personal antiguo</span>';
    }
    
 	
	 $caledario[] = [ $data["gstNmpld"],$data["gstNombr"],$data["gstApell"],$data["gstCatgr"],$data["Ingreso"], $antiguedadT];

		}
	}


	$json_string = json_encode(array( 'data' => $caledario ));
	echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>