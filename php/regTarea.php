<?php
include("../conexion/conexion.php");
session_start();

if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
$id = $_SESSION['usuario']['id_usu'];
}

$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'tareAgr'){

  $idcur = $_POST['idcur']; 
  $titulo1 = $_POST['titulo1'];  
  $dateR = $_POST['dateR'];  
  // $descrip1 = $_POST['descrip1'];
  $idsubt = $_POST['idsubt'];
//   $fechaA = $_POST['fechaA'];
//   $fechaT = $_POST['fechaT'];
  $idcur = $_POST['idcur'];

  if($idsubt==''){
  	$idsubt = 0;
  }


//	accesos($gstIdper,$gstNombr,$gstNmpld,$AgstCargo,$conexion);

	if(Tareas($idcur, $titulo1, $idsubt, $dateR, $conexion)){
		//$realizo = 'ASIGNO AL USUARIO';
		//historial($id,$realizo,$gstIdper,$conexion);
		$valor = conIDtar($conexion);
			echo $valor;
	}else{
		echo 0;
	}


	$valors = $_POST['array'];
	$varray1 = json_decode($valors, true);
	$valor = count($varray1);

 	 for($i=0; $i<$valor; $i++){

	$titulo = $varray1[$i]['tareauno'];
	$numsubt = 1;
	if($titulo=='' && $numsubt==1){}else{
	if(tarea1($titulo,$numsubt,$conexion)){
		//echo "0";

		}else{
		echo "1";
		}
	  }		
	}



	$valors2 = $_POST['array2'];
	$varray2 = json_decode($valors2, true);
	$valor2 = count($varray2);

 	 for($i=0; $i<$valor2; $i++){

	$titulo = $varray2[$i]['tareados'];
	
	$numsubt = 2;
	if($titulo=='' && $numsubt==2){}else{

	if(tarea1($titulo,$numsubt,$conexion)){
		echo "0";

		}else{
		echo "1";
		}
	}
	}

	$valors3 = $_POST['array3'];
	$varray3 = json_decode($valors3, true);
	$valor3 = count($varray3);

 	 for($i=0; $i<$valor3; $i++){

	$titulo = $varray3[$i]['tareatre'];

	$numsubt = 3;
		if($titulo=='' && $numsubt==3){}else{
	if(tarea1($titulo,$numsubt,$conexion)){
		echo "0";

		}else{
		echo "1";
		}
	  }	
	}



}else if($opcion === 'agrIVA'){

	$idinsp = $_POST['idinsp'];

	if(agrIvas($idinsp,$conexion)){
		echo "1";
	}else{
		echo "0";
	}
}else if($opcion==='ntfccn'){

$valor = $_POST['array1'];
$varray1 = json_decode($valor, true);
$valor = count($varray1);

$array2 = $_POST['array2'];
$array2 = json_decode($array2, true);

$array3 = $_POST['array3'];
$array3 = json_decode($array3, true);

for($i=0; $i<$valor; $i++){
$idtar = $varray1[$i]["id_tarea"];
//$listreg = $varray1[$i]["listregis"];
$evalsi = $array2[$i]["evalsi"];
$evalno = $array3[$i]["evalno"];


if($evalsi != '' || $evalno != ''){
if($evalsi==1){ $eval = 'SI'; }else
if($evalno==1){ $eval = 'NO'; }else
if($evalsi==''){ $eval = '0';} else
if($evalno==''){ $eval = '0';}

if(evaluarinspector($idtar,$eval,$conexion)){

//if($i==1){
	echo "0";
//}

}else{ echo "1"; } }else{ if($i==1){ echo "2"; } } }

}


 function conIDtar($conexion){

$query="SELECT id_tar FROM tareas WHERE estado = 0 ORDER BY id_tar DESC LIMIT 1";
$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
		return '0';
		}else{
			 $res = mysqli_fetch_row($resultado);
			
			  return $res[0];
		}
		$this->conexion->cerrar();
} 


// function accesos($gstIdper,$gstNombr,$gstNmpld,$AgstCargo,$conexion){

// $query="SELECT * FROM accesos WHERE password='$gstNmpld' AND usuario='$gstNombr' AND baja = 0 ";
// 			$resultado= mysqli_query($conexion,$query);
// 			$query="INSERT INTO accesos VALUES(0,'$gstIdper','$gstNombr','$gstNmpld','$AgstCargo',0,0);";
// 		if($resultado->num_rows==0){
// 				if(mysqli_query($conexion,$query)){

// 					return true;
				
// 				}else{

// 					return false;
// 				}
// 				$this->conexion->cerrar();
// 		}else{

// 		}

// }


// function obligatorio($gstIdper,$gstObli,$conexion){
// 	$query="INSERT INTO especialidadcat VALUES(0,'$gstIdper','$gstObli','NO',0);";
// 		if(mysqli_query($conexion,$query)){
// 			return true;
// 		}else{
// 			return false;
// 		}
// 		$this->conexion->cerrar();
// }


function Tareas($idcur, $titulo1, $idsubt, $dateR,$conexion){

	// ini_set('date.timezone','America/Mexico_City');
	// $factual = date('Y').'/'.date('m').'/'.date('d');

	$query="INSERT INTO ojts VALUES(0,'$idcur','$titulo1','$idsubt','$dateR',0);";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();

}

function tarea1($titulo,$numsubt,$conexion){

	$query="INSERT INTO ojts_subs(idtarea,ojt_subtarea,numsubt,estado) 
			SELECT id_ojt,'$titulo',$numsubt,0 FROM ojts ORDER BY id_ojt DESC LIMIT 1";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();

}


function agrIvas($idinsp,$conexion){

$query="INSERT INTO tarearealizar(idtarea,idiva,estado) SELECT id_tar,$idinsp,0 FROM tareas ORDER BY id_tar DESC LIMIT 1";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
}

//EVALUAR INSPECTOR CON FECHA 
	function evaluarinspector($idtar,$eval,$conexion){

	$query="UPDATE tarearealizar SET evalua = '$eval' WHERE id_tare='$idtar'";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		cerrar($conexion);
	}

	function cerrar($conexion){

	mysqli_close($conexion);

}
?>