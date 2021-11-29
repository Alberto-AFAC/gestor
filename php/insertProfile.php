<?php 
include ('../conexion/conexion.php');

$opciones = $_POST['opciones'];
$informacion = [];

if($opciones === 'agregar'){

$date=$_POST['date'];
$base64=$_POST['base64'];
$id_persona=$_POST['id_persona'];
$sql="INSERT INTO profile (id_persona,base64,date)
        values ('$id_persona','$base64','$date')";
echo mysqli_query($conexion,$sql);

}else if($opciones === 'editar'){


}

 ?>