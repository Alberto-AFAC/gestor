<?php
include("../conexion/conexion.php");

$opcion = $_POST["opcion"];
$informacion = [];


	
if($opcion === 'prodias'){


// $id = $_POST['cgstInspr'];
// $validaris = $_POST['listregis'];

$finicial = $_POST['finicial'];
$ffinal = $_POST['ffinal'];
$hora_ini = $_POST['hora_ini'];
$hora_fin = $_POST['hora_fin'];

$valor = $_POST['array1'];
$varray1 = json_decode($valor, true);
$valor = count($varray1);

$array2 = $_POST['array2'];
$array2 = json_decode($array2, true);



for($i=0; $i<$valor; $i++){

$dias = $varray1[$i]["diasr"];
$validar = $varray1[$i]["idias"];
$mes = $array2[$i]["mes"];
// $listreportein = $varray3[$i]['listreportein']; 
// $cartdescrip = $varray4[$i]['cartdescrip']; 
// $regponde = $varray5[$i]['regponde']; 
// $infinal = $varray6[$i]['infinal']; 
// $evreaccion = $varray7[$i]['evreaccion']; 

if($validar==1){ $validar = 'SI'; }else{ $validar = 'NO'; }
// if($mes==1){ $mes = 'SI'; }else{ $mes = 'NO'; }
// if($listreportein==1){ $listreportein = 'SI'; }else{ $listreportein = 'NO'; }
// if($cartdescrip==1){ $cartdescrip = 'SI'; }else{ $cartdescrip = 'NO'; }

// if($regponde==1){ $regponde = 'SI'; }else{ $regponde = 'NO'; }
// if($infinal==1){ $infinal = 'SI'; }else{ $infinal = 'NO'; }
// if($evreaccion==1){ $evreaccion = 'SI'; }else{ $evreaccion = 'NO'; }
 
if(consultar($dias,$mes,$hora_ini,$hora_fin,$conexion)){
if(programaDias($dias,$validar,$mes,$finicial,$ffinal,$hora_ini,$hora_fin,$conexion)){
	echo "0";
	}else{
	echo "1";
	}
}else{

	echo "si";
}


  }
}else if($opcion === 'edidias'){

	echo "NO";

}


function consultar($dias,$mes,$hora_ini,$hora_fin,$conexion){

	$query = "SELECT * FROM semanal WHERE dia_semana = $dias AND num_mes = $mes AND hora_ini = '$hora_ini' AND hora_fin = '$hora_fin' ";

	$resultados = mysqli_query($conexion,$query);
	if($resultados->num_rows == 0){
		return true;
	}else{
		return false;
	}
}

function programaDias($dias,$validar,$mes,$finicial,$ffinal,$hora_ini,$hora_fin,$conexion){

	$query = "INSERT INTO semanal VALUES(0,0,0,$dias,$mes,'$validar','$finicial','$ffinal','$hora_ini','$hora_fin',0)";
	if(mysqli_query($conexion,$query)){

		return true;

		}else{

			return false;
		}
	cerrar($conexion);

}
?>

