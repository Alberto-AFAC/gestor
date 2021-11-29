<?php 
	include ('../conexion/conexion.php');
    $alta=$_POST['alta'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $cargo=$_POST['cargo'];


	$sql="INSERT into insexternos (nombre, apellido, cargo, alta)
			values ('$nombre','$apellido','$cargo','$alta')";
	echo mysqli_query($conexion,$sql);

 ?>