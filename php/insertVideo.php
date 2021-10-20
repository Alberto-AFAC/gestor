<?php 
include ('../conexion/conexion.php');

    $tituloV=$_POST['tituloV'];
    $objetivoV=$_POST['objetivoV'];
    $idCurso=$_POST['idCurso'];
    $url=$_POST['url'];

	$sql="INSERT into elearnning (id_curso,tituloV, objetivoV, url) values ($idCurso,'$tituloV','$objetivoV','$url')";
	echo mysqli_query($conexion,$sql);



?>