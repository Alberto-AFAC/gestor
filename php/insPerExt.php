<?php 
	include ('../conexion/conexion.php');
    $nombreExt=$_POST['nombreExt'];
    $apellidoExt=$_POST['apellidoExt'];
    $curpExt=$_POST['curpExt'];
    $rfcExt=$_POST['rfcExt'];
    $sexoExt=$_POST['sexoExt'];
    $id_espc=$_POST['id_espc'];
    $phoneHom=$_POST['phoneHom'];
    $phone=$_POST['phone'];
    $emailPer=$_POST['emailPer'];
    $emailAlt=$_POST['emailAlt'];


	$sql="INSERT into personalext (nombreExt, apellidoExt, curpExt, rfcExt, sexoExt,id_espc, phoneHom,phone,emailPer,emailAlt)
			values ('$nombreExt', '$apellidoExt', '$curpExt', '$rfcExt', '$sexoExt','$id_espc','$phoneHom','$phone','$emailPer','$emailAlt')";
	echo mysqli_query($conexion,$sql);

 ?>