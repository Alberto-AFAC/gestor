<?php
include("../conexion/conexion.php");

$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'asignar'){

  $gstIdper = $_POST['gstIdper'];  
  $AgstCargo = $_POST['AgstCargo'];
  $AgstIDCat = $_POST['AgstIDCat'];
  $AgstIDSub = $_POST['AgstIDSub'];
  $AgstIDuni = $_POST['AgstIDuni'];

	if(perAsig($gstIdper,$AgstCargo,$AgstIDCat,$AgstIDSub,$AgstIDuni,$conexion)){
		echo "0";
	}else{
		echo "1";
	}


}else if($opcion === 'evaluar'){

$id4 = $_POST['gstInspr'];
$id1 = $_POST['gstIdprm'];
$id2 = $_POST['actual'];
$id3 = $_POST['comntr'];

$gstIDprm = explode(",", $id1);
$gstActul = explode(",", $id2);
$gstComen = explode(",", $id3);
$gstInspr = explode(",", $id4);
$valor = count($gstIDprm);

	for($i=0; $i<$valor; $i++){
		if(proEvalue($gstInspr[$i],$gstIDprm[$i],$gstActul[$i],$gstComen[$i],$conexion))
			{	echo "0";	}else{
				
				echo "1";	
			}
		}
}


function proEvalue($gstInspr,$gstIDprm,$gstActul,$gstComen,$conexion){


	$query="SELECT * FROM evaluacion WHERE 	gstIDins='$gstInspr' AND gstIDprm='$gstIDprm' AND estado = 0 ";
			$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
			$query="INSERT INTO evaluacion VALUES(0,'$gstInspr','$gstIDprm','$gstActul','$gstActul','$gstComen',0,0);";
				if(mysqli_query($conexion,$query)){


	$query = "UPDATE personal SET gstEvalu = 'SI' WHERE gstIdper = '$gstInspr'";
	if(mysqli_query($conexion,$query)){

		return true;
		}else{
			return false;
		}
				}else{
					return false;
				}
				$this->conexion->cerrar();
		}else{

		}
	}

function perAsig($gstIdper,$AgstCargo,$AgstIDCat,$AgstIDSub,$AgstIDuni,$conexion){

	$query = "UPDATE personal SET 
	gstCargo='$AgstCargo',
	gstIDCat='$AgstIDCat',
	gstIDSub='$AgstIDSub',
	gstIDuni='$AgstIDuni',
	gstEvalu='NO'
	 WHERE gstIdper='$gstIdper'";
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

