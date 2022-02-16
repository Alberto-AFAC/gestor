<?php
include("../conexion/conexion.php");
session_start();
if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
$id = $_SESSION['usuario']['id_usu'];
}else{
$id = '929';
}

ini_set('date.timezone','America/Mexico_City');
$factual = date('Y').'/'.date('m').'/'.date('d');

$opcion = $_POST["opcion"];
$informacion = [];



if($opcion === 'documento'){


if($_POST['ojtIdper']=='' || $_POST['ojtNemple']==''){

	echo "8";
}else{

$ojtIdper = $_POST['ojtIdper'];
$ojtdocadjunto = $_POST['ojtdocadjunto'];
$ojtNemple = $_POST['ojtNemple'];

if(comprobar($ojtIdper,$ojtdocadjunto,$conexion)){

if(!empty($_FILES['OjtAgra']['size'])){


//$formatos= array('.jpg', '.png', '.doc', '.xlsx','.docx','.msi','.pdf', '.zip', '.rar', '.JPG','.txt','.jpeg');
$formatos= array('.pdf');	

//if($_FILES['OjtAgra']['size'] < 16777216){
$nombreImagen=$_FILES['OjtAgra']['name'];
$rutaTemporal=$_FILES['OjtAgra']['tmp_name'];


$ext = substr($nombreImagen, strrpos($nombreImagen, '.'));
if (in_array($ext, $formatos)){

$rutaEnServidor = '../documento/'.$ojtNemple.'/'.$ojtdocadjunto.'/'.$nombreImagen;

if (!file_exists($rutaEnServidor)){

 $ruta = '../documento/'.$ojtNemple.'/'.$ojtdocadjunto.'/';
if(!is_dir($ruta)){
  mkdir($ruta, 0777, true);
}


$OjtAgra=$rutaEnServidor;
//$OjtAgra= 'documento/'.$idusu.'/'.$nombreImagen;

if(move_uploaded_file($rutaTemporal, $OjtAgra)){

if(inspectordoc($ojtIdper,$ojtdocadjunto,$OjtAgra,$factual,$conexion))
		{	echo "0";	

	historial($id,$ojtIdper,$ojtdocadjunto,$conexion);

}else{	echo "1";	}
/*if(estudios($ojtIdper,$ojtdocadjunto,$gstCiuda,$gstPriod,$OjtAgra,$conexion))
		{	echo "0";	}else{	echo "1";	}*/

	}else{ echo "2"; }
	}else{ echo "3"; }
	}else{ echo "4"; }
	//}else{ echo "5"; }
	}else{ echo "6";}
	}else{ echo "7";}

	}
	
	}else if($opcion === 'actdoc'){


		if($_POST['ojtIdperact']=='' || $_POST['ojtNempleact']=='' || $_POST['ojtdocadact']=='' || $_POST['docactuali'] == ''){

			echo "8";
		}else{
		$docactuali = $_POST['docactuali'];	
		$ojtIdperact = $_POST['ojtIdperact'];
		$ojtdocadjunto = $_POST['ojtdocadact'];
		$ojtNempleact = $_POST['ojtNempleact'];

		if(!empty($_FILES['OjtAgraAct']['size'])){

		$formatos= array('.pdf');	

		$nombreImagen=$_FILES['OjtAgraAct']['name'];
		$rutaTemporal=$_FILES['OjtAgraAct']['tmp_name'];


		$ext = substr($nombreImagen, strrpos($nombreImagen, '.'));
		if (in_array($ext, $formatos)){

		$rutaEnServidor = '../documento/'.$ojtNempleact.'/'.$ojtdocadjunto.'/'.$nombreImagen;

		 $ruta = '../documento/'.$ojtNempleact.'/'.$ojtdocadjunto.'/';
		if(!is_dir($ruta)){
		  mkdir($ruta, 0777, true);
		}


		$OjtAgraAct=$rutaEnServidor;

		if(move_uploaded_file($rutaTemporal, $OjtAgraAct)){

		if(documentoact($docactuali,$ojtIdperact,$OjtAgraAct,$factual,$conexion))
				{	echo "0";	

		// $realizo = 'ACTUALIZO DOC';	
		// historia($id,$ojtIdperact,$realizo,$docactuali,$conexion);

		}else{	echo "1";	}
		
			}else{ echo "2"; }
			//}else{ echo "3"; }
			}else{ echo "4"; }
			//}else{ echo "5"; }
			}else{ echo "6";}

			}

	}else if($opcion==='elimiarojt'){


	$ojtIdperEli = $_POST['ojtIdperEli']; 
//	$doceliminar = $_POST['doceliminar']; 

	// $gstIdperAct = $ojtIdperEli;
	// $docactuali = $doceliminar;
	// $realizo = 'ELIMINO DOC'; 
	// historia($id,$gstIdperAct,$realizo,$docactuali,$conexion);

	  $docadjunto = consultadoc($ojtIdperEli,$conexion);

		if(file_exists($docadjunto)){	

			if(unlink($docadjunto)) {

				if(borraregistro($ojtIdperEli,$conexion)){	echo "0";	}else{	echo "1";	}

			}else{
				echo '2';
			}
		}else{
			if(borraregistro($ojtIdperEli,$conexion)){	echo "0";	}else{	echo "1";	}
		}

	}

	function consultadoc($ojtIdperEli,$conexion){

	$query = "SELECT * FROM inspectordoc WHERE idi = '$ojtIdperEli' ";
	  $result = mysqli_query($conexion,$query);
	  $res = mysqli_fetch_row($result);

	  return $res[3];
	}

	function comprobar($ojtIdper,$ojtdocadjunto,$conexion){

	$query="SELECT * FROM inspectordoc WHERE idperdoc = '$ojtIdper' AND idstd != '0'";
			$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
	}
	function inspectordoc($ojtIdper,$ojtdocadjunto,$OjtAgra,$factual,$conexion){

			$query="INSERT INTO inspectordoc VALUES(0,'$ojtIdper','$ojtdocadjunto','$OjtAgra','$factual',0)";
				if(mysqli_query($conexion,$query)){
					return true;
				}else{
					return false;
				}
				$this->conexion->cerrar();	
	}

function documentoact($docactuali,$ojtIdperact,$OjtAgraAct,$factual,$conexion){

		$query="UPDATE inspectordoc SET docajunto = '$OjtAgraAct', fecactual = '$factual' WHERE idperdoc = $ojtIdperact AND idi = $docactuali ";
			if(mysqli_query($conexion,$query)){
				return true;
			}else{
				return false;
			}
			$this->conexion->cerrar();
	
}	

function borraregistro($ojtIdperEli,$conexion){

	$query="DELETE FROM inspectordoc WHERE idi = $ojtIdperEli";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
	}