<script>
    alert("SI ESTOY ENTRANDO");
    </script>
<?php 
include("../conexion/conexion.php");
$date_update=$_POST['date_update'];
$evaluation=$_POST['evaluation'];

$sql="INSERT INTO bitevaluacion (evaluation,date_update)
			VALUES ('$evaluation','$date_update')";

echo mysqli_query($conexion,$sql);
?>