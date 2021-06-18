<?php
include("../conexion/conexion.php");

if($_POST['gstIDper']=='' || $_POST['gstInstt']=='' || $_POST['gstCiudad']=='' || $_POST['gstPriod']==''){

	echo "8";
}else{

$gstIDper = $_POST['gstIDper'];
$gstInstt = $_POST['gstInstt'];

if(comprobar($gstIDper,$gstInstt,$conexion)){

if(!empty($_FILES['gstDocmt']['size'])){

$gstIDper = $_POST['gstIDper'];
$gstInstt = $_POST['gstInstt'];
$gstCiuda = $_POST['gstCiudad'];
$gstPriod = $_POST['gstPriod'];
//$formatos= array('.jpg', '.png', '.doc', '.xlsx','.docx','.msi','.pdf', '.zip', '.rar', '.JPG','.txt','.jpeg');
$formatos= array('.pdf');	

//if($_FILES['gstDocmt']['size'] < 16777216){
$nombreImagen=$_FILES['gstDocmt']['name'];
$rutaTemporal=$_FILES['gstDocmt']['tmp_name'];


$ext = substr($nombreImagen, strrpos($nombreImagen, '.'));
if (in_array($ext, $formatos)){

$rutaEnServidor = '../documento/estudios/'.$gstIDper.'/'.$nombreImagen;

if (!file_exists($rutaEnServidor)){

 $ruta = '../documento/estudios/'.$gstIDper;
if(!is_dir($ruta)){
  mkdir($ruta, 0777, true);
}


$gstDocmt=$rutaEnServidor;
//$gstDocmt= 'documento/'.$idusu.'/'.$nombreImagen;

if(move_uploaded_file($rutaTemporal, $gstDocmt)){

if(estudios($gstIDper,$gstInstt,$gstCiuda,$gstPriod,$gstDocmt,$conexion))
		{	echo "0";	}else{	echo "1";	}
/*if(estudios($gstIDper,$gstInstt,$gstCiuda,$gstPriod,$gstDocmt,$conexion))
		{	echo "0";	}else{	echo "1";	}*/

}else{ echo "2"; }
}else{ echo "3"; }
}else{ echo "4"; }
//}else{ echo "5"; }
}else{ echo "6";}
}else{ echo "7";}

}


function comprobar($gstIDper,$gstInstt,$conexion){

	$query="SELECT * FROM estudios WHERE gstIDper='$gstIDper' AND gstInstt='$gstInstt' AND estado = 0";
			$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
	}


function estudios($gstIDper,$gstInstt,$gstCiuda,$gstPriod,$gstDocmt,$conexion){

			$query="INSERT INTO estudios VALUES(0,'$gstIDper','$gstInstt','$gstCiuda','$gstPriod','$gstDocmt',0)";
				if(mysqli_query($conexion,$query)){
					return true;
				}else{
					return false;
				}
				$this->conexion->cerrar();
	}

?>