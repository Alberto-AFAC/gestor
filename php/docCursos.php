<?php
include("../conexion/conexion.php");
ini_set('date.timezone','America/Mexico_City');

$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'insert'){

$gstTitlo = $_POST['gstTitlo'];
$gstTipo= $_POST['gstTipo'];
$gstVignc = $_POST['gstVignc'];
$gstPrfil = $_POST['gstPrfil'];
$gstTmrio = '';
$gstDrcin = $_POST['hr'].' '.$_POST['tmp1'].' '.$_POST['min'].' '.$_POST['tmp2'];
$gstCntnc = $_POST['gstCntnc'];
$gstObjtv = $_POST['gstObjtv'];
$gstFalta = date('Y').'/'.date('m').'/'.date('d');	
$Hfinal=date('H:i:s');
$gstProvd = $_POST['gstProvd'];
$gstCntro = $_POST['gstCntro'];

if(cursos($gstTitlo,$gstTipo,$gstVignc,$gstPrfil,$gstTmrio,$gstDrcin,$gstCntnc,$gstObjtv,$gstFalta,$gstProvd
,$gstCntro,$conexion))
		{	echo "0";	

		$id = idcurso($conexion);

	}else{	echo "1";	}

	$valors = $_POST['array'];
	$varray1 = json_decode($valors, true);
	$valor = count($varray1);
	
 for($i=0; $i<$valor; $i++){

	$titulo = $varray1[$i]['campo'];

	if(temario($id,$titulo,$conexion)){
		echo "0";
		}else{
		echo "1";
		}

	}
 }

function comprobar($gstTitlo,$conexion){
	$query="SELECT * FROM listacursos WHERE gstTitlo='$gstTitlo' AND estado = 0";		
	$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
			return true;
		}else{
			return false;	
		}
		$this->conexion->cerrar();	
	}

function cursos($gstTitlo,$gstTipo,$gstVignc,$gstPrfil,$gstTmrio,$gstDrcin,$gstCntnc,$gstObjtv,$gstFalta,$gstProvd,
$gstCntro,$conexion){
	$query="INSERT INTO listacursos VALUES(0,'$gstTitlo','$gstTipo','$gstVignc','$gstPrfil','$gstTmrio','$gstDrcin','$gstCntnc','$gstObjtv','$gstFalta','$gstProvd','$gstCntro',0);";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
	}


function idcurso($conexion){

	$query="SELECT gstIdlsc FROM listacursos ORDER BY gstIdlsc DESC LIMIT 1";  
	$result = mysqli_query($conexion,$query);
	$res = mysqli_fetch_row($result);
	return $res[0];

		$this->conexion->cerrar();
}

function temario($id,$titulo,$conexion){

	$query="INSERT INTO temario VALUES(0,$id,'$titulo',0);";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();

}

?>