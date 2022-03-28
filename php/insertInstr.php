<?php 
include ("../conexion/conexion.php");
session_start();
if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
	$id = $_SESSION['usuario']['id_usu'];
}
$opcion = $_POST["opcion"];
if($opcion === 'registro'){
	$idperson = $_POST['idperson'];
	$cargos = $_POST['cargos'];
	if(agrAcceso($idperson,$cargos,$conexion)){
		echo "0";
		$proceso = 'REGISTRO CARGO / '.$cargos;
		historia($id,$idperson,$proceso,$conexion); 
		modAcceso($idperson,$cargos,$conexion);			
	}else{
		echo "2";
	}	
}else if($opcion === 'eliminar'){
	$idperson = $_POST['insperco'];
	$cargo = $_POST['cargoacceso'];
	$cargos = $_POST['cargoinsco']; 
	if(eliAcceso($idperson,$conexion)){
		echo "0";
		$proceso = 'QUITO CARGO / '.$cargo;
		historia($id,$idperson,$proceso,$conexion);
		modAcceso($idperson,$cargos,$conexion);	 
	}else{
		echo "1";
	}
}else if($opcion === 'actualiza'){
	$idperson = $_POST['idpersona'];
	$cargos = $_POST['caract'];
	if(updAcceso($idperson,$cargos,$conexion)){
		echo "0";
		$proceso = 'ACTUALIZO CARGO / '.$cargos;
		historia($id,$idperson,$proceso,$conexion);
		modAcceso($idperson,$cargos,$conexion);	 
	}else{
		echo "1";
	}
}
function agrAcceso($idperson,$cargos,$conexion){
	$query="SELECT * FROM instruacceso WHERE idper = '$idperson' AND estado = 0";
	$resultado= mysqli_query($conexion,$query);
	if($resultado->num_rows==0){
		$query = "INSERT INTO instruacceso VALUES(0,$idperson,'$cargos',0)";
		if (mysqli_query($conexion,$query)) {
			return true;
		}else{
			return false;
		}
		cerrar($conexion);									 	
	}else{	
		return false;
	}
}
function eliAcceso($idperson,$conexion){
	$query = "DELETE FROM instruacceso WHERE idper = $idperson";
	if (mysqli_query($conexion, $query)) {
		return true;
	} else {
		return false;
	}
	cerrar($conexion);
}
function updAcceso($idperson,$cargos,$conexion){
	$query = "UPDATE instruacceso SET cargo='$cargos' WHERE idper = $idperson";
	if (mysqli_query($conexion,$query)) {
		return true;
	}else{
		return false;
	}
	cerrar($conexion);			
}
function modAcceso($idperson,$cargos,$conexion){
	$query = "UPDATE accesos SET privilegios='$cargos' WHERE id_usu = $idperson";
	if (mysqli_query($conexion,$query)) {
		return true;
	}else{
		return false;
	}
	cerrar($conexion);									 	
}

function historia($id,$idperson,$proceso,$conexion){
	ini_set('date.timezone','America/Mexico_City');
$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
$query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'$proceso',concat(`gstNombr`,' ',`gstApell`) ,'$fecha' FROM personal WHERE gstIdper= $idperson";
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