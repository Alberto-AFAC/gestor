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


// `id_reac`
// `id_cursor`
// `fechareac`
// `pregunta1`
// `pregunta2`
// `pregunta3`
// `pregunta4`
// `pregunta5`
// `pregunta6`
// `pregunta7`
// `pregunta8`
// `pregunta9`
// `pregunta10`
// `pregunta11`
// `pregunta12`
// `pregunta13`
// `pregunta14`
// `pregunta15`
// `pregunta16`
// `estado`

function cerrar($conexion){

	mysqli_close($conexion);

}
?>

