<?php
include ('../conexion/conexion.php');
    $id_espec=$_POST['id_espec'];
    $nivel=$_POST['nivel'];
    $tarea=$_POST['tarea'];
    $subtarea=$_POST['subtarea'];
    $subsubtarea=$_POST['subsubtarea'];
    // $fechaInicio=$_POST['fechaInicio'];
    // $fechaTermino=$_POST['fechaTermino'];
    

	$sql="INSERT into ojt (id_espec,nivel, tarea, subtarea, subsubtarea) values ('$id_espec','$nivel', '$tarea', '$subtarea', '$subsubtarea')";
	echo mysqli_query($conexion,$sql);


?>