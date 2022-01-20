<?php

ini_set('date.timezone','America/Mexico_City');

$finicial = $_POST['finicial'];
$ffinal = $_POST['ffinal'];


$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");    
    $d = date('d');
    $m = $meses[date('n')-1];
    $y = date('Y');

// definimos 2 array uno para los nombre de los dias y otro para los nombres de los meses
$nombresDias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado" );
$nombresMeses = array(1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

// establecemos la fecha de inicio
$inicio =  DateTime::createFromFormat('Y-m-d', $finicial);
// establecemos la fecha final (fecha de inicio + dias que queramos)
$fin =  DateTime::createFromFormat('Y-m-d', $ffinal);
$fin->modify( '+1 day' );

// creamos el periodo de fechas
//$periodo = new DatePeriod($inicio, new DateInterval('P1D') ,$fin);
$periodo = new DatePeriod($inicio, new DateInterval('P1D') ,$fin);
// recorremos las dechas del periodo
foreach($periodo as $date){
    // definimos la variables para verlo mejor
    $nombreDia = $nombresDias[$date->format("w")];
    $nombreMes = $nombresMeses[$date->format("n")];
    $numeroDia = $date->format("j");
    $anyo = $date->format("Y");
    // mostramos los datos
	 $dias = $nombreDia;
	 $numero = $numeroDia;
	 $mes = $nombreMes;
	 $anio = $anyo;

// $caledario[] = array('id'=> $gstIdlsc, 'title'=> $gstTitlo, 'url'=> $url, 'class'=> $valor,'start'=> $start, 'end'=> $end)

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

