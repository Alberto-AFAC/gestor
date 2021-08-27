<?php
include("../conexion/conexion.php");

$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'profesion'){


if($_POST['AgstIDper']=='' || $_POST['gstPusto']=='' || $_POST['gstMpres']=='' || $_POST['gstIDpai']=='' || $_POST['gstCidua']=='' || $_POST['gstActiv']=='' || $_POST['gstFntra']=='' || $_POST['gstFslda']==''){

	echo "8";
}else{

	$AgstIDper = $_POST['AgstIDper'];
	$gstPusto = $_POST['gstPusto'];

if(comprobar($AgstIDper,$gstPusto,$conexion)){

if(!empty($_FILES['gstDocep']['size'])){


	
	$gstMpres = $_POST['gstMpres'];
	$gstIDpai = $_POST['gstIDpai'];
	$gstCidua = $_POST['gstCidua'];
	$gstActiv = $_POST['gstActiv'];
	$gstFntra = $_POST['gstFntra'];
	$gstFslda = $_POST['gstFslda'];

//$formatos= array('.jpg', '.png', '.doc', '.xlsx','.docx','.msi','.pdf', '.zip', '.rar', '.JPG','.txt','.jpeg');
$formatos= array('.pdf');	

//if($_FILES['gstDocep']['size'] < 16777216){
$nombreImagen=$_FILES['gstDocep']['name'];
$rutaTemporal=$_FILES['gstDocep']['tmp_name'];


$ext = substr($nombreImagen, strrpos($nombreImagen, '.'));
if (in_array($ext, $formatos)){

$rutaEnServidor = '../documento/'.$AgstIDper.'/profsion/'.$nombreImagen;

if (!file_exists($rutaEnServidor)){

 $ruta = '../documento/'.$AgstIDper.'/profsion/';
if(!is_dir($ruta)){
  mkdir($ruta, 0777, true);
}


$gstDocep=$rutaEnServidor;
//$gstDocep= 'documento/'.$idusu.'/'.$nombreImagen;

if(move_uploaded_file($rutaTemporal, $gstDocep)){

if(profesion($AgstIDper,$gstPusto,$gstMpres,$gstIDpai,$gstCidua,$gstActiv,$gstFntra,$gstFslda,$gstDocep,$conexion))
		{	echo "0";	}else{	echo "1";	}
/*if(estudios($AgstIDper,$gstPusto,$gstCiuda,$gstPriod,$gstDocep,$conexion))
		{	echo "0";	}else{	echo "1";	}*/

}else{ echo "2"; }
}else{ echo "3"; }
}else{ echo "4"; }
//}else{ echo "5"; }
}else{ echo "6";}
}else{ echo "7";}

}
	}else if($opcion==='documento'){


if($_POST['DgstIdpro']=='' || $_POST['DgstIDper']==''){
	echo "8";
}else{

$DgstIdpro = $_POST['DgstIdpro'];
$DgstIDper = $_POST['DgstIDper'];

//if(comprobar($AgstIDper,$gstPusto,$conexion)){

if(!empty($_FILES['DgstDocep']['size'])){


//$formatos= array('.jpg', '.png', '.doc', '.xlsx','.docx','.msi','.pdf', '.zip', '.rar', '.JPG','.txt','.jpeg');
$formatos= array('.pdf');	

//if($_FILES['gstDocep']['size'] < 16777216){
$nombreImagen=$_FILES['DgstDocep']['name'];
$rutaTemporal=$_FILES['DgstDocep']['tmp_name'];


$ext = substr($nombreImagen, strrpos($nombreImagen, '.'));
if (in_array($ext, $formatos)){

$rutaEnServidor = '../documento/'.$DgstIDper.'/profsion/'.$nombreImagen;

//if (!file_exists($rutaEnServidor)){

 $ruta = '../documento/'.$DgstIDper.'/profsion/';
if(!is_dir($ruta)){
  mkdir($ruta, 0777, true);
}


$DgstDocep=$rutaEnServidor;
//$DgstDocep= 'documento/'.$idusu.'/'.$nombreImagen;

if(move_uploaded_file($rutaTemporal, $DgstDocep)){

if(docProfesion($DgstIdpro,$DgstDocep,$conexion))
		{	echo "0";	}else{	echo "1";	}
/*if(estudios($AgstIDper,$gstPusto,$gstCiuda,$gstPriod,$gstDocep,$conexion))
		{	echo "0";	}else{	echo "1";	}*/

}else{ echo "2"; }
//}else{ echo "3"; }//RENOMBRAR ARCHIVO
}else{ echo "4"; }
//}else{ echo "5"; }
}else{ echo "6";}
//}else{ echo "7";}

}



}

function comprobar($AgstIDper,$gstPusto,$conexion){

	$query="SELECT * FROM profesion WHERE gstIDper = '$AgstIDper' AND gstPusto = '$gstPusto' AND estado = 0";
			$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
	}



function profesion($AgstIDper,$gstPusto,$gstMpres,$gstIDpai,$gstCidua,$gstActiv,$gstFntra,$gstFslda,$gstDocep,$conexion){


			$query="INSERT INTO profesion VALUES(0,'$AgstIDper','$gstPusto','$gstMpres','$gstIDpai','$gstCidua','$gstActiv','$gstFntra','$gstFslda','$gstDocep',0)";
				if(mysqli_query($conexion,$query)){
					return true;
				}else{
					return false;
				}
				$this->conexion->cerrar();
		
	}
function docProfesion($DgstIdpro,$DgstDocep,$conexion){

	$query="UPDATE profesion SET  gstDocep= '$DgstDocep' WHERE 	gstIdpro='$DgstIdpro'";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
	}	

?>