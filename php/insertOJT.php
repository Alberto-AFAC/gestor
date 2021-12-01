<?php
include ('../conexion/conexion.php');
$nivel=$_POST['nivel'];
    $tarea=$_POST['tarea'];
    $subtarea=$_POST['subtarea'];
    $subsubtarea=$_POST['subsubtarea'];
    $fechaInicio=$_POST['fechaInicio'];
    $fechaTermino=$_POST['fechaTermino'];
    

	$sql="INSERT into ojt (nivel, tarea, subtarea, subsubtarea, fechaInicio, fechaTermino) values ('$nivel', '$tarea', '$subtarea', '$subsubtarea', '$fechaInicio', '$fechaTermino')";
	echo mysqli_query($conexion,$sql);


?>