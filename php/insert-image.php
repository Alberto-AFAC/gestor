<?php 
include ("../conexion/conexion.php");
    $idUser=$_POST['id_user'];
    $date=$_POST['date'];
    $base64=$_POST['base64'];

    $sql="INSERT INTO picture (date,base64)
    values ('$date','$base64')";
echo mysqli_query($conexion,$sql);


 ?>