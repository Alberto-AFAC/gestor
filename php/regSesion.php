<?php 
include ("../conexion/conexion.php");
session_start();

$id = $_SESSION['usuario']['id_usu'];
$privilegio = $_SESSION['usuario']['privilegios'];

$idp = $id;
$realizo = 'INICIO SESIÓN';
$registro = 'COMO '.$privilegio;
ini_set('date.timezone','America/Mexico_City');
$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');

$sql="INSERT INTO historial(id_usu,proceso,registro,fecha)
VALUES ('$idp','$realizo','$registro','$fecha')";
echo mysqli_query($conexion,$sql);
?>
