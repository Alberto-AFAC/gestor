<?php
include("../conexion/conexion.php");
session_start();

if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
$id = $_SESSION['usuario']['id_usu'];
}

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
		

		$realizo = 'ASIGNO AL USUARIO';
		historial($id,$realizo,$gstIdper,$conexion);

		if($AgstCargo=='INSPECTOR'){
			echo 0;
		}else{
			echo 2;
		}

	}else{
		echo 1;
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
			{		
				if($i===1){
					echo "0";
				$realizo = 'EVALUÓ AL USUARIO';
				$gstIdper = $gstInspr[$i];
				historial($id,$realizo,$gstIdper,$conexion);					
				}
		
			}else{
				
				echo "1";	
			}
		}
}else if($opcion==='especialidad'){

	$gstIdper = $_POST['gstIDpr'];
	$AgstIDCat = $_POST['gstIDSpe'];	

	if(agrEspcldd($gstIdper,$AgstIDCat,$conexion)){
		echo "0";
				$realizo = 'ASIGNO ESPECIALIDAD';
				historial($id,$realizo,$gstIdper,$conexion);		
	}else{
		echo "1";
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


$query="SELECT * FROM especialidadcat WHERE gstIDper=$gstIdper AND gstIDcat=$AgstIDCat AND estado = 0 ";
			$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){

		$query="INSERT INTO especialidadcat VALUES(0,'$gstIdper','$AgstIDCat',0);";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
	}else{}
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

	function historial($id,$realizo,$gstIdper,$conexion){
	ini_set('date.timezone','America/Mexico_City');
	$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');

	$query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'$realizo',concat(`gstNombr`,' ',`gstApell`),'$fecha' FROM personal WHERE `gstIdper` = $gstIdper AND estado = 0";
	if(mysqli_query($conexion,$query)){
	return true;
	}else{
	return false;
	}
	}


function cerrar($conexion){

	mysqli_close($conexion);

}
?>

