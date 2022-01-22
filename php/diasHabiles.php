<?php

ini_set('date.timezone','America/Mexico_City');

$finicial = $_POST['finicial'];
$ffinal = $_POST['ffinal'];


// definimos 2 array uno para los nombre de los dias y otro para los nombres de los meses
$nombresDias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" );
$nombresMeses = array(1=>"1","2","3","4","5","6","7","8","9","10","11","12");

// establecemos la fecha de inicio
$inicio =  DateTime::createFromFormat('Y-m-d', $finicial);
// establecemos la fecha final (fecha de inicio + dias que queramos)
$fin =  DateTime::createFromFormat('Y-m-d', $ffinal);
$fin->modify( '+1 day' );

// creamos el periodo de fechas
//$periodo = new DatePeriod($inicio, new DateInterval('P1D') ,$fin);
$periodo = new DatePeriod($inicio, new DateInterval('P1D') ,$fin);
// recorremos las fechas del periodo
$n=1;	
foreach($periodo as $date){
    // definimos la variables para verlo mejor
    $nombreDia = $nombresDias[$date->format("w")];
    $nombreMes = $nombresMeses[$date->format("n")];
    $numeroDia = $date->format("j");
    $anyo = $date->format("Y");
  	//si el dia es igual a 1 reicinicar conteo
  	if($numeroDia==1){	$n=1;	}
    // mostramos los datos	 
     $inc = $n++;
	 $dias = $nombreDia;
	 $numero = $numeroDia;
	 $mes = $nombreMes;
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

