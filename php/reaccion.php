<?php
include("../conexion/conexion.php");

$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'agreaccion'){


	ini_set('date.timezone','America/Mexico_City');
	$realizo= date('Y').'-'.date('m').'-'.date('d');	

	$idcurso = $_POST['idcursoen'];
	
	if(comprobacion($idcurso,$conexion)){
	
	$fechareac = $realizo;
	$preg1 = $_POST['preg1'];
	$preg2 = $_POST['preg2'];
	$preg3 = $_POST['preg3'];
	$preg4 = $_POST['preg4'];
	$preg5 = $_POST['preg5'];
	$preg6 = $_POST['preg6'];
	$preg7 = $_POST['preg7'];
	$preg8 = $_POST['preg8'];
	$preg9 = $_POST['preg9'];
	$preg10 = $_POST['preg10'];
	$preg11 = $_POST['preg11'];
	$preg12 = $_POST['preg12'];
	$preg13 = $_POST['preg13'];
	$preg14 = $_POST['preg14'];
	$preg15 = $_POST['preg15'];
	$preg16 = $_POST['preg16'];



	if(reaccion($idcurso,$fechareac,$preg1,$preg2,$preg3,$preg4,$preg5,$preg6,$preg7,$preg8,$preg9,$preg10,$preg11,$preg12,$preg13,$preg14,$preg15,$preg16,$conexion)){
		echo "0";
	}else{
		echo "1";
	}

	}else{
		echo "2";
	}


}else if($opcion === 'constancia'){


// $id = $_POST['cgstInspr'];
// $listregis = $_POST['listregis'];


$valor = $_POST['valor'];
$varray1 = json_decode($valor, true);
$valor = count($varray1);

$array2 = $_POST['array2'];
$array2 = json_decode($array2, true);

$array3 = $_POST['array3'];
$varray3 = json_decode($array3, true);

$array4 = $_POST['array4'];
$varray4 = json_decode($array4, true);

$array5 = $_POST['array5'];
$varray5 = json_decode($array5, true);

$array6 = $_POST['array6'];
$varray6 = json_decode($array6, true);

$array7 = $_POST['array7'];
$varray7 = json_decode($array7, true); 

for($i=0; $i<$valor; $i++){

$idcons = $varray1[$i]["cgstInspr"];
$listreg = $varray1[$i]["listregis"];
$lisasisten = $array2[$i]["lisasisten"];
$listreportein = $varray3[$i]['listreportein']; 
$cartdescrip = $varray4[$i]['cartdescrip']; 
$regponde = $varray5[$i]['regponde']; 
$infinal = $varray6[$i]['infinal']; 
$evreaccion = $varray7[$i]['evreaccion']; 

if($listreg==1){ $listreg = 'SI'; }else{ $listreg = 'NO'; }
if($lisasisten==1){ $lisasisten = 'SI'; }else{ $lisasisten = 'NO'; }
if($listreportein==1){ $listreportein = 'SI'; }else{ $listreportein = 'NO'; }
if($cartdescrip==1){ $cartdescrip = 'SI'; }else{ $cartdescrip = 'NO'; }

if($regponde==1){ $regponde = 'SI'; }else{ $regponde = 'NO'; }
if($infinal==1){ $infinal = 'SI'; }else{ $infinal = 'NO'; }
if($evreaccion==1){ $evreaccion = 'SI'; }else{ $evreaccion = 'NO'; }


if(constancia($idcons,$listreg,$lisasisten,$listreportein,$cartdescrip,$regponde,$infinal,$evreaccion,$conexion)){
	echo "0";
	}else{
	echo "1";
	}

}
 

}


function comprobacion($idcurso,$conexion){

$query="SELECT * FROM reaccion WHERE id_curso = '$idcurso' AND estado = 0";
$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
		return true;
		}else{
		return false;	
		}
		$this->conexion->cerrar();
}

function reaccion($idcurso,$fechareac,$preg1,$preg2,$preg3,$preg4,$preg5,$preg6,$preg7,$preg8,$preg9,$preg10,$preg11,$preg12,$preg13,$preg14,$preg15,$preg16,$conexion){

			$query="INSERT INTO reaccion VALUES(0,'$idcurso','$fechareac','$preg1','$preg2','$preg3','$preg4','$preg5','$preg6','$preg7','$preg8','$preg9','$preg10','$preg11','$preg12','$preg13','$preg14','$preg15','$preg16',0)";
				if(mysqli_query($conexion,$query)){
					return true;
				}else{
					return false;
				}
				$this->conexion->cerrar();
				}


function cerrar($conexion){

	mysqli_close($conexion);

}

function constancia($idcons,$listreg,$lisasisten,$listreportein,$cartdescrip,$regponde,$infinal,$evreaccion,$conexion){

	$query = "UPDATE constancias SET 
	listregis='$listreg', 
	lisasisten='$lisasisten',
	listreportein='$listreportein',
	cartdescrip='$cartdescrip',
	regponde='$regponde',
	infinal='$infinal',
	evreaccion='$evreaccion'
	WHERE id='$idcons'";
	if(mysqli_query($conexion,$query)){

		return true;

		}else{

			return false;
		}
	cerrar($conexion);

}
?>

