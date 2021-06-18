<?php
include("../conexion/conexion.php");
ini_set('date.timezone','America/Mexico_City');
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
		echo "0";
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
/*function eliminar($id_categoria,$conexion){

	$query = "UPDATE categoria SET estado = 0 WHERE id_categoria = '$id_categoria'";
	$resultado = mysqli_query($conexion,$query);
	verificar_resultado($resultado); 
	cerrar($conexion);
}*/




function cerrar($conexion){

	mysqli_close($conexion);

}
?>

