<?php
include("../conexion/conexion.php");

session_start();
if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
$id = $_SESSION['usuario']['id_usu'];
}else{
$id = '929';
}

if($_POST['gstIDper']=='' || $_POST['gstInstt']=='' || $_POST['gstCiudad']=='' || $_POST['gstPriod']==''){

	echo "8";
}else{

	$gst = $_POST['gstIDper'];

	$f = explode('.', $gst);
	$gstIDper = intval($f[0]);
	$n_empl = intval($f[1]);

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

$rutaEnServidor = '../documento/'.$n_empl.'/Estudio/'.$nombreImagen;

if (!file_exists($rutaEnServidor)){

 $ruta = '../documento/'.$n_empl.'/Estudio/';
if(!is_dir($ruta)){
  mkdir($ruta, 0777, true);
}


$gstDocmt=$rutaEnServidor;
//$gstDocmt= 'documento/'.$idusu.'/'.$nombreImagen;

if(move_uploaded_file($rutaTemporal, $gstDocmt)){

$factual = date('Y').'/'.date('m').'/'.date('d');

	$gstIDper = intval($f[0]);

if(estudios($gstIDper,$gstInstt,$gstCiuda,$gstPriod,$gstDocmt,$conexion))
		{	echo "0";	

	$gstIDper = intval($f[0]);

	historial($id,$gstIDper,$conexion);
	//personaldoc($gstIDper,$gstDocmt,$factual,$conexion);

}else{	echo "1";	}
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

			$factual = date('Y').'/'.date('m').'/'.date('d');
	
			$query="INSERT INTO estudios VALUES(0,'$gstIDper','$gstInstt','$gstCiuda','$gstPriod','$gstDocmt','$factual',0)";
				if(mysqli_query($conexion,$query)){

			$queri = "INSERT INTO personaldoc(idperdoc,documento,docajunto,fecactual,idstd) SELECT gstIDper,7,gstDocmt,fechar,gstIdstd FROM estudios ORDER BY gstIdstd DESC LIMIT 1";
			mysqli_query($conexion,$queri);

					return true;
				}else{
					return false;
				}
				$this->conexion->cerrar();
	}

function historial($id,$gstIDper,$conexion){
ini_set('date.timezone','America/Mexico_City');
	$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');	

$query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'AGREGO ESTUDIO',concat(`gstNombr`,' ',`gstApell`),'$fecha' FROM personal WHERE `gstIdper` = $gstIDper AND estado = 0";

if(mysqli_query($conexion,$query)){
return true;
}else{
return false;
}

}

// function personaldoc($gstIDper,$gstDocmt,$factual,$conexion){

// 			$query="INSERT INTO personaldoc VALUES(0,'$gstIDper',7,'$gstDocmt','$factual',0)";
// 				if(mysqli_query($conexion,$query)){
// 					return true;
// 				}else{
// 					return false;
// 				}
// 				$this->conexion->cerrar();	
// 	}


?>