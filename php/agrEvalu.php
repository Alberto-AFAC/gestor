<?php
include("../conexion/conexion.php");

$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'asignar'){

  $gstIdper = $_POST['gstIdper'];  
  $AgstCargo = $_POST['AgstCargo'];
  $AgstIDCat = $_POST['AgstIDCat'];
  $AgstIDSub = $_POST['AgstIDSub']; //SUBCATEGORIA
  $AgstAcReg = $_POST['AgstAcReg'];
  $AgstIDuni = $_POST['AgstIDuni'];
  $AgstNucrt = $_POST['AgstNucrt'];

if($AgstCargo == 'INSPECTOR'){

	agrEspcldd($gstIdper,$AgstIDCat,$conexion);
	$gstObli = 24;
	obligatorio($gstIdper,$gstObli,$conexion);	

}else if($AgstCargo == 'INSTRUCTOR'){

	$AgstIDCat = 25;
	agrEspcldd($gstIdper,$AgstIDCat,$conexion);
	$gstObli = 24;
	obligatorio($gstIdper,$gstObli,$conexion);

}else if($AgstCargo == 'COORDINADOR'){

	$AgstIDCat = 26;
	agrEspcldd($gstIdper,$AgstIDCat,$conexion);
	$gstObli = 24;
	obligatorio($gstIdper,$gstObli,$conexion);

}else{
	$AgstIDCat = 24;
	agrEspcldd($gstIdper,$AgstIDCat,$conexion);	  	
}

	$gstNombr = $_POST['gstNombr'];
	$gstNmpld = $_POST['gstNmpld'];


	accesos($gstIdper,$gstNombr,$gstNmpld,$AgstCargo,$conexion);

	if(perAsig($gstIdper,$AgstCargo,$AgstIDCat,$AgstIDSub,$AgstAcReg,$AgstIDuni,$AgstNucrt,$conexion)){
		echo $AgstCargo;
	}else{
		echo "1";
	}


}else if($opcion === 'evaluar'){

$id4 = $_POST['gstInspr'];
$id1 = $_POST['gstIdprm'];
$id2 = $_POST['actual'];
$comntr = $_POST['comntr'];

$gstIDprm = explode(",", $id1);
$gstActul = explode(",", $id2);
//$gstComen = explode(",", $id3);
$gstInspr = explode(",", $id4);
$valor = count($gstIDprm);

	for($i=0; $i<$valor; $i++){
		if(proEvalue($gstInspr[$i],$gstIDprm[$i],$gstActul[$i],$comntr,$conexion))
			{	echo "0";	}else{
				
				echo "1";	
			}
		}
}


function proEvalue($gstInspr,$gstIDprm,$gstActul,$comntr,$conexion){


	$query="SELECT * FROM evaluacion WHERE 	gstIDins='$gstInspr' AND gstIDprm='$gstIDprm' AND estado = 0 ";
			$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
			$query="INSERT INTO evaluacion VALUES(0,'$gstInspr','$gstIDprm','$gstActul','$gstActul',0,0);";
				if(mysqli_query($conexion,$query)){


	$query = "UPDATE personal SET gstEvalu = 'SI', gstComnt = '$comntr' WHERE gstIdper = '$gstInspr'";
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


function accesos($gstIdper,$gstNombr,$gstNmpld,$AgstCargo,$conexion){

$query="SELECT * FROM accesos WHERE password='$gstNmpld' AND usuario='$gstNombr' AND baja = 0 ";
			$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
			$query="INSERT INTO accesos VALUES(0,'$gstIdper','$gstNombr','$gstNmpld','$AgstCargo',0,0);";
				if(mysqli_query($conexion,$query)){

					return true;
				
				}else{

					return false;
				}
				$this->conexion->cerrar();
		}else{

		}

}



function agrEspcldd($gstIdper,$AgstIDCat,$conexion){

	$query="INSERT INTO especialidadcat VALUES(0,'$gstIdper','$AgstIDCat',0);";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
}

function obligatorio($gstIdper,$gstObli,$conexion){
	$query="INSERT INTO especialidadcat VALUES(0,'$gstIdper','$gstObli',0);";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
}

function perAsig($gstIdper,$AgstCargo,$AgstIDCat,$AgstIDSub,$AgstAcReg,$AgstIDuni,$AgstNucrt,$conexion){

	$query = "UPDATE personal SET 
	gstCargo='$AgstCargo',
	gstIDCat='$AgstIDCat',
	gstIDSub='$AgstIDSub',
	gstAcReg='$AgstAcReg',
	gstIDuni='$AgstIDuni',
	gstNucrt='$AgstNucrt',
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

