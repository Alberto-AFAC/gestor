<?php
include("../conexion/conexion.php");

$factual = date('Y').'/'.date('m').'/'.date('d');

if($_POST['EIdper']=='' || $_POST['EgstIDper']=='' || $_POST['EgstInstt']=='' || $_POST['EgstCiudad']=='' || $_POST['EgstPriod']==''){

	echo "8";
}else{

$EgstIDper = $_POST['EgstIDper'];
$EgstInstt = $_POST['EgstInstt'];

if(!empty($_FILES['EgstDocmt']['size'])){

$EgstIDper = $_POST['EgstIDper'];
$EgstInstt = $_POST['EgstInstt'];
$EgstCiuda = $_POST['EgstCiudad'];
$EgstPriod = $_POST['EgstPriod'];
$EIdper = $_POST['EIdper'];
//$formatos= array('.jpg', '.png', '.doc', '.xlsx','.docx','.msi','.pdf', '.zip', '.rar', '.JPG','.txt','.jpeg');
$formatos= array('.pdf');	

//if($_FILES['gstDocmt']['size'] < 16777216){
$nombreImagen=$_FILES['EgstDocmt']['name'];
$rutaTemporal=$_FILES['EgstDocmt']['tmp_name'];


$ext = substr($nombreImagen, strrpos($nombreImagen, '.'));
if (in_array($ext, $formatos)){

$rutaEnServidor = '../documento/'.$EIdper.'/'.$nombreImagen;
//$rutaEnServidor = '../documento/estudios/'.$gstIDper.'/'.$nombreImagen;

if (!file_exists($rutaEnServidor)){

 $ruta = '../documento/'.$EIdper;

if(!is_dir($ruta)){
  mkdir($ruta, 0777, true);
}


$EgstDocmt=$rutaEnServidor;
//$EgstDocmt= 'documento/'.$idusu.'/'.$nombreImagen;

if(move_uploaded_file($rutaTemporal, $EgstDocmt)){

	

if(actualizar($EgstIDper,$EgstInstt,$EgstCiuda,$EgstPriod,$EgstDocmt,$conexion))
		{	echo "0";	

	documentoact($EIdper,$EgstDocmt,$factual,$conexion);


}else{	echo "1";	}
/*if(actualizar($EgstIDper,$EgstInstt,$EgstCiuda,$EgstPriod,$EgstDocmt,$conexion))
		{	echo "0";	}else{	echo "1";	}*/

}else{ echo "2"; }
}else{ echo "3"; }
}else{ echo "4"; }
//}else{ echo "5"; }
}else{ 

//	echo "6";
$EIdper = $_POST['EIdper'];	
$EgstIDper = $_POST['EgstIDper'];
$EgstInstt = $_POST['EgstInstt'];
$EgstCiuda = $_POST['EgstCiudad']; 
$EgstPriod = $_POST['EgstPriod'];
$EgstDocmt = '';

if(actualizar($EgstIDper,$EgstInstt,$EgstCiuda,$EgstPriod,$EgstDocmt,$conexion))
		{	echo "6";	documentoact($EIdper,$EgstDocmt,$factual,$conexion);	}else{	echo "1";	}		
	}
}

function actualizar($EgstIDper,$EgstInstt,$EgstCiuda,$EgstPriod,$EgstDocmt,$conexion){

			if($EgstDocmt==''){			
			$query="UPDATE estudios SET gstInstt = '$EgstInstt', gstCiuda = '$EgstCiuda', gstPriod = '$EgstPriod' WHERE gstIdstd='$EgstIDper'";
			}else{
			$query="UPDATE estudios SET gstInstt = '$EgstInstt', gstCiuda = '$EgstCiuda', gstPriod = '$EgstPriod', gstDocmt = '$EgstDocmt' WHERE gstIdstd='$EgstIDper'";				
			}


				if(mysqli_query($conexion,$query)){
					return true;
				}else{
					return false;
				}
				$this->conexion->cerrar();
	}


	function documentoact($EgstIDper,$EgstDocmt,$factual,$conexion){

		$query="UPDATE personaldoc SET docajunto = '$EgstDocmt', fecactual = '$factual' WHERE idperdoc = $EgstIDper AND documento = 7";
			if(mysqli_query($conexion,$query)){
				return true;
			}else{
				return false;
			}
			$this->conexion->cerrar();
		}


?>