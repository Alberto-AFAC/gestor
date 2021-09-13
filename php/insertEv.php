<?php 
include("../conexion/conexion.php");
$date_update=$_POST['date_update'];
$obtained=$_POST['obtained'];
$evaluation=$_POST['evaluation'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];

$sql="INSERT INTO bitevaluacion (date_update,obtained,evaluation,start_date,end_date)
			VALUES ('$date_update','$obtained','$evaluation','$start_date','$end_date')";

echo mysqli_query($conexion,$sql);
?>