<?php 
include ('../conexion/conexion.php');

    $tituloV=$_POST['tituloV'];
    $objetivoV=$_POST['objetivoV'];
    $idCurso=$_POST['idCurso'];
    $modulo=$_POST['modulo'];
    $url=$_POST['url'];
    

	$sql="INSERT into elearnning (id_curso,tituloV, objetivoV,modulo, url) values ($idCurso,'$tituloV','$objetivoV','$modulo','$url')";
	echo mysqli_query($conexion,$sql);



?>