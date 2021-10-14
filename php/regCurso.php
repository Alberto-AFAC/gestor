<?php
include("../conexion/conexion.php");
ini_set('date.timezone','America/Mexico_City');
session_start();
if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
$idp = $_SESSION['usuario']['id_usu'];
}

$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'agrcurso'){

}else if($opcion === 'actcurso'){

$idmstr = $_POST['idmstr'];
$titulo = $_POST['titulo'];
$tipo=$_POST['tipo'];
$gstVignc=$_POST['gstVignc'];
$perfil=$_POST['perfil'];
$objetivo=$_POST['objetivo'];
$adjunto=$_POST['adjunto'];
$duracion=$_POST['duracion'];
$constancia= $_POST['constancia'];
$Factual = date('Y').'/'.date('m').'/'.date('d');	

	if(actualizar($idmstr,$titulo,$tipo,$gstVignc,$perfil,$objetivo,$adjunto,$duracion,$Factual,$constancia,$conexion)){
		echo "0";
	}else{
		echo "1";
	}
}else if($opcion === 'eliCurso'){

$EgstIdlsc = $_POST['EgstIdlsc'];
if(eliminar($EgstIdlsc,$conexion)){

		eliminaCur($idp,$EgstIdlsc,$conexion);

		echo "0";
	}else{
		echo "1";
	}
}else if($opcion === 'canCurso'){

$codigos = $_POST['codigos'];

if(cancelar($codigos,$conexion)){
		echo "0";
		$realizo = 'CANCELO CURSO FOLIO: '.$codigos;
		historiCan($idp,$realizo,$codigos,$conexion);	

	}else{
		echo "1";
	}
}


function actualizar($idmstr,$titulo,$tipo,$gstVignc,$perfil,$objetivo,$adjunto,$duracion,$Factual,$constancia,$conexion){

	$query = "UPDATE listacursos SET titulo='$titulo', tipo='$tipo', gstVignc='$gstVignc',perfil='$perfil', objetivo='$objetivo', temario='$adjunto', duracion='$duracion',constancia='$constancia',fAlta='$Factual'  WHERE idmstr='$idmstr'";
	if(mysqli_query($conexion,$query)){

		return true;

		}else{

			return false;
		}
	cerrar($conexion);
}

function eliminar($EgstIdlsc,$conexion){

	$query = "UPDATE listacursos SET estado='1' WHERE gstIdlsc='$EgstIdlsc'";
	if(mysqli_query($conexion,$query)){

		return true;

		}else{

			return false;
		}
	cerrar($conexion);
}

function cancelar($codigos,$conexion){

	$query = "UPDATE cursos SET proceso='CANCELADO',estado=1 WHERE codigo='$codigos'";
	if(mysqli_query($conexion,$query)){

		return true;

		}else{

			return false;
		}
	cerrar($conexion);
}

function eliminaCur($idp,$EgstIdlsc,$conexion){
	ini_set('date.timezone','America/Mexico_City');
		$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');	

	$query = "INSERT INTO historial(id_usu,proceso,registro,fecha) 
			  SELECT $idp,concat('ELIMINO REG.',$EgstIdlsc,' CURSO'),concat(gstTitlo),'$fecha' 
			  FROM listacursos WHERE gstIdlsc = '$EgstIdlsc'";

	if(mysqli_query($conexion,$query)){
	return true;
	}else{
	return false;
	}
	}

	function historiCan($idp,$realizo,$codigos,$conexion){
	ini_set('date.timezone','America/Mexico_City');
	$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');
	$query = "INSERT INTO historial(id_usu,proceso,registro,fecha) 
			  SELECT $idp,'$realizo',gstTitlo,'$fecha' FROM listacursos 
			  INNER JOIN cursos ON 	idmstr = gstIdlsc
			  WHERE `codigo` = '$codigos' AND cursos.estado = 1 LIMIT 1";			  
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

