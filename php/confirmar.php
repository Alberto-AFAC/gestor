<?php
include("../conexion/conexion.php");
ini_set('date.timezone','America/Mexico_City');

if($_POST['id_curso']==''|| $_POST['confir']==''|| $_POST['justifi']=='' || $_POST['idinsp']==''){

	echo "8";
}else{

//if(comprobar($gstTitlo,$conexion)){
if($_POST['confir']=='CONFIRMADO' || $_POST['confir']=='OTROS'){

 $confir = $_POST['confir'];
 $justifi = $_POST['justifi'];
 $id_curso = $_POST['id_curso'];
 $idinsp = $_POST['idinsp'];

if(curConfir($id_curso,$confir,$justifi,$conexion))
		{	echo "0";	}else{	echo "1";	}

}else{

if(!empty($_FILES['archivo']['size'])){

$confir = $_POST['confir'];
$justifi = $_POST['justifi'];
$id_curso = $_POST['id_curso'];
$idinsp = $_POST['idinsp'];

//$formatos= array('.jpg', '.png', '.doc', '.xlsx','.docx','.msi','.pdf', '.zip', '.rar', '.JPG','.txt','.jpeg');
$formatos= array('.pdf');	

//if($_FILES['gstDocmt']['size'] < 16777216){
$nombreImagen=$_FILES['archivo']['name'];
$rutaTemporal=$_FILES['archivo']['tmp_name'];


$ext = substr($nombreImagen, strrpos($nombreImagen, '.'));
if (in_array($ext, $formatos)){

$rutaEnServidor = '../documento/'.$idinsp.'/cursos/'.$nombreImagen;

if (!file_exists($rutaEnServidor)){

 $ruta = '../documento/'.$idinsp.'/cursos';
if(!is_dir($ruta)){
  mkdir($ruta, 0777, true);
}


$justifi=$rutaEnServidor;
//$gstTmrio= 'documento/'.$idusu.'/'.$nombreImagen;

if(move_uploaded_file($rutaTemporal, $justifi)){

//$gstFalta = date('Y').'/'.date('m').'/'.date('d');	
//$Hfinal=date('H:i:s');
		
if(curConfir($id_curso,$confir,$justifi,$conexion))
		{	echo "0";	}else{	echo "1";	}

}else{ echo "2"; }
}else{ echo "3"; }
}else{ echo "4"; }
//}else{ echo "5"; }
}else{ echo "6";}
//}else{ echo "7";}

}



}

function curConfir($id_curso,$confir,$justifi,$conexion){
	$query="UPDATE cursos SET confirmar = '$confir',justifi='$justifi',evaluacion=1 WHERE id_curso='$id_curso'";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
	}

?>