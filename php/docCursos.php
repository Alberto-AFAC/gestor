<?php
include("../conexion/conexion.php");
ini_set('date.timezone','America/Mexico_City');

session_start();
if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
$idp = $_SESSION['usuario']['id_usu'];
}

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

// $libro = $_POST['libro'];
// $numero = $_POST['numero'];
// $afojas = $_POST['afojas'];
 
if(cursos($gstTitlo,$gstTipo,$gstVignc,$gstPrfil,$gstTmrio,$gstDrcin,$gstCntnc,$gstObjtv,$gstFalta,$gstProvd
,$gstCntro,$conexion))
		{	echo "0";	

		$realizo = 'REGISTRO CURSO';
		historial($idp,$realizo,$gstTitlo,$conexion);
		documentoact($EgstIDper,$EgstDocmt,$EIdper,$conexion);
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
 }else if($opcion === 'agretem'){

 	$id = $_POST['idcurtem'];

	$valors = $_POST['array'];
	$varray1 = json_decode($valors, true);
	$valor = count($varray1);

 	 for($i=0; $i<$valor; $i++){

	$titulo = $varray1[$i]['campo'];

	if($titulo!=''){
	if(temario($id,$titulo,$conexion)){
		echo "0";
			$realizo = 'AGREGO TEMARIO';
			historialT($idp,$realizo,$id,$conexion);

		}else{
		echo "1";
		}
	  }else{ echo "2";}
	}
 }else if($opcion === 'agregartem'){
	
	$idcurso = $_POST['idcurso'];
	$titulo = $_POST['titulo'];
	$id = $_POST['idcur'];

	if(actualizartem($idcurso,$titulo,$conexion)){
		echo "0";

			$realizo = 'ACTUALIZO TEMARIO '.$titulo;
			historialT($idp,$realizo,$id,$conexion);

	}else{ echo "1";}

 }else if($opcion === 'eliminartem'){

 	$cursoid = $_POST['cursoid'];
 	$idcurso = $_POST['idcurso'];

	$realizo = 'ELIMINO REG.'.$idcurso.' TEMARIO';
	$id = $cursoid;
	historialT($idp,$realizo,$id,$conexion);

 		$ok = eliminartemario($idcurso,$cursoid,$conexion);
 	if(eliminartemario($idcurso,$cursoid,$conexion)){
 		echo $ok;

 	}else{
 		echo '1';
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

function actualizartem($idcurso,$titulo,$conexion){
$query="UPDATE temario SET titulo = '$titulo' WHERE idtem = $idcurso ";
	if(mysqli_query($conexion,$query)){
		return true;
	}else{
		return false;
	}
	$this->conexion->cerrar();	
}


function eliminartemario($idcurso,$cursoid,$conexion){
	$query="SELECT *,count(*) AS total FROM temario WHERE idcurso = $cursoid";
	$result = mysqli_query($conexion,$query);
		if($result->num_rows == 0){
		
		}else{		
		
		$query="DELETE FROM temario WHERE idtem = $idcurso";
		if (mysqli_query($conexion,$query)) {	

		$res = mysqli_fetch_row($result);

			return $res[4];	
		// return true;
		}else{
		return false;
		}
			$this->conexion->cerrar();

		}	
	}


	function historial($idp,$realizo,$gstTitlo,$conexion){
	ini_set('date.timezone','America/Mexico_City');
	$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');
	$query = "INSERT INTO historial VALUES(0,'$idp','$realizo','$gstTitlo','$fecha')";
	if(mysqli_query($conexion,$query)){
	return true;
	}else{
	return false;
	}
	}

	function historialT($idp,$realizo,$id,$conexion){
	ini_set('date.timezone','America/Mexico_City');
	$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');
	$query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $idp,'$realizo',concat(gstTitlo),'$fecha' FROM listacursos WHERE `gstIdlsc` = $id AND estado = 0";
	if(mysqli_query($conexion,$query)){
	return true;
	}else{
	return false;
	}
	}

?>