<?php
include ('../conexion/conexion.php');
    $isSpc=$_POST['isSpc'];
    $idInspct=$_POST['idInspct'];
    $fechaInicio=$_POST['fechaInicio'];
    $fechaTermino=$_POST['fechaTermino'];
    $coordinador=$_POST['coordinador'];
    $instructor=$_POST['instructor'];
    

	$sql="INSERT into prog_ojt (id_espc, id_inspc, inicio, termino, coordinador, instructor) values ('$isSpc','$idInspct', '$fechaInicio', '$fechaTermino','$coordinador', '$instructor')";
	echo mysqli_query($conexion,$sql);


?>