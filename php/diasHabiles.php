<?php

ini_set('date.timezone','America/Mexico_City');

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

	$data['inc'] = $inc;
	$data['dias'] = $dias;
	$data['numero'] = $numero;
	$data['mes'] = $mes;
	$data['anio'] = $anio;

	$arreglo["data"][] = $data;

}

if(isset($arreglo)&&!empty($arreglo)){
	echo json_encode($arreglo);
}else{
	echo $arreglo='0';
}

		?>

