<?php include("../conexion/conexion.php");

ini_set('date.timezone','America/Mexico_City');

// $finicial = '2022-02-02';
// $ffinal = '2022-02-11';
	
	$codigo = $_POST['codigo'];
	$finicial = $_POST['finicial'];
	$ffinal = $_POST['ffinal'];
	//DEFINIMOS 2 ARRAY UNO PARA LOS NOMBRES DE LOS DÍAS Y OTRO PARA LOS NOMBRES DE LOS MESES
	$nomDia = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" );
	$nomMes = array(1=>"1","2","3","4","5","6","7","8","9","10","11","12");

		//ESTABLECEMOS LA FECHA DE INICIO 
	$inicio =  DateTime::createFromFormat('Y-m-d', $finicial);
		//ESTABLECEMOS LA FECHA FINAL (FECHA DE INICIO + DÍAS QUE QUERAMOS)
	$fin =  DateTime::createFromFormat('Y-m-d', $ffinal);
	$fin->modify( '+1 day' );

		//CREAMOS EL PERIODO DE FECHAS
	$periodo = new DatePeriod($inicio, new DateInterval('P1D') ,$fin);
		//RECORREMOS LAS FECHAS DEL PERIODO
	$n=1;	
	foreach($periodo as $date){
    //DEFINIMOS LAS VARIABLES 
    $nomDias = $nomDia[$date->format("w")];
    $nomMeses = $nomMes[$date->format("n")];
    $numDia = $date->format("j");
    $anyo = $date->format("Y");
  	//SI EL DÍA ES IGUAL A 1 REINICIAR CONTEO
  	if($numDia==1){	$n=1;	}
    //SE MUESTRA LOS DATOS	 
     $inc = $n++;
	 $dias = $nomDias;
	 $numero = $numDia;
	 $mes = $nomMeses;
	 $anio = $anyo;

$query = "SELECT hora_fin,dia_semana,num_mes,anio,habil  
FROM semanal WHERE dia_semana = $numero AND id_curso = '$codigo' AND estado = 0";
$resultado = mysqli_query($conexion, $query);
if($datas = mysqli_fetch_assoc($resultado)){
//	$data['habil'] = $datas['habil'];
	// echo $datas['dia_semana'].'=='.$dias;
		$data['horaf']=$datas['hora_fin'];
		$data['inc'] = $inc;
		$data['dias'] = $dias;
		$data['numero'] = $numero;
		$data['mes'] = $mes;
		$data['anio'] = $anio;
		$data['habil'] = $datas['habil'];
	}else{
		$data['inc'] = $inc;
		$data['dias'] = $dias;
		$data['numero'] = $numero;
		$data['mes'] = $mes;
		$data['anio'] = $anio;
		$data['habil'] = 'NO';
	}	


	$arreglo["data"][] = $data;

}

if(isset($arreglo)&&!empty($arreglo)){
	echo json_encode($arreglo);
}else{
	echo $arreglo='0';
}





// 	$query = "SELECT dia_semana AS dias,dia_semana AS numero,num_mes AS mes,anio  
// 	FROM semanal WHERE id_curso = '0' AND estado = 0";
// 	$resultado = mysqli_query($conexion, $query);

// 	if(!$resultado){
// 		die("error");
// 	}else{
// 		$in=1;	
// 		while($datas = mysqli_fetch_assoc($resultado)){

// 			$inc = $in++;			
// 			$datas['dias'];
// 			$datas['numero'];
// 			$datas['mes'];
// 			$datas['anio'];
// 			$datas['inc'] = $inc;
// 			$arreglos["datas"][] = $datas; 
// 		}
// 		if(isset($arreglos)&&!empty($arreglos)){
// echo "<br><br><br><br><br>";

// 			echo json_encode($arreglos);
// 		}else{

// 			echo $arreglos='0';
// 		}
// 	}
// 		mysqli_free_result($resultado);
// 		mysqli_close($conexion);

		?>

