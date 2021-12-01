<?php 
	include ('../conexion/conexion.php');
    $alta=$_POST['alta'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $cargo=$_POST['cargo'];
    $detalle=$_POST['detalle'];



	$sql="INSERT into insexternos (nombre, apellido, cargo, alta, detalle)
			values ('$nombre','$apellido','$cargo','$alta','$detalle')";
	echo mysqli_query($conexion,$sql);

 ?>