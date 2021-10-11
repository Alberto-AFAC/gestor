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


if($_POST['gstIdperArc']=='' || $_POST['docadjunto']=='' || $_POST['gstNemple']==''){

	echo "8";
}else{

$gstIdperArc = $_POST['gstIdperArc'];
$docadjunto = $_POST['docadjunto'];
$gstNemple = $_POST['gstNemple'];

if(comprobar($gstIdperArc,$docadjunto,$conexion)){

if(!empty($_FILES['DgsAgra']['size'])){


//$formatos= array('.jpg', '.png', '.doc', '.xlsx','.docx','.msi','.pdf', '.zip', '.rar', '.JPG','.txt','.jpeg');
$formatos= array('.pdf');	

//if($_FILES['DgsAgra']['size'] < 16777216){
$nombreImagen=$_FILES['DgsAgra']['name'];
$rutaTemporal=$_FILES['DgsAgra']['tmp_name'];


$ext = substr($nombreImagen, strrpos($nombreImagen, '.'));
if (in_array($ext, $formatos)){

$rutaEnServidor = '../documento/'.$gstNemple.'/Check-RH/'.$nombreImagen;

if (!file_exists($rutaEnServidor)){

 $ruta = '../documento/'.$gstNemple.'/Check-RH/';
if(!is_dir($ruta)){
  mkdir($ruta, 0777, true);
}


$DgsAgra=$rutaEnServidor;
//$DgsAgra= 'documento/'.$idusu.'/'.$nombreImagen;

if(move_uploaded_file($rutaTemporal, $DgsAgra)){

if(personaldoc($gstIdperArc,$docadjunto,$DgsAgra,$factual,$conexion))
		{	echo "0";	

	historial($id,$gstIdperArc,$docadjunto,$conexion);

}else{	echo "1";	}
/*if(estudios($gstIdperArc,$docadjunto,$gstCiuda,$gstPriod,$DgsAgra,$conexion))
		{	echo "0";	}else{	echo "1";	}*/

	}else{ echo "2"; }
	}else{ echo "3"; }
	}else{ echo "4"; }
	//}else{ echo "5"; }
	}else{ echo "6";}
	}else{ echo "7";}

	}
	
	}else if($opcion === 'actualizar'){


		if($_POST['gstIdperAct']=='' || $_POST['docactuali']=='' || $_POST['actNemple']==''){

			echo "8";
		}else{

		$gstIdperAct = $_POST['gstIdperAct'];
		$docactuali = $_POST['docactuali'];
		$actNemple = $_POST['actNemple'];

		if(!empty($_FILES['DgstActul']['size'])){

		$formatos= array('.pdf');	

		$nombreImagen=$_FILES['DgstActul']['name'];
		$rutaTemporal=$_FILES['DgstActul']['tmp_name'];


		$ext = substr($nombreImagen, strrpos($nombreImagen, '.'));
		if (in_array($ext, $formatos)){

		$rutaEnServidor = '../documento/'.$actNemple.'/Check-RH/'.$nombreImagen;

		 $ruta = '../documento/'.$actNemple.'/Check-RH/';
		if(!is_dir($ruta)){
		  mkdir($ruta, 0777, true);
		}


		$DgstActul=$rutaEnServidor;

		if(move_uploaded_file($rutaTemporal, $DgstActul)){

		if(documentoact($gstIdperAct,$docactuali,$DgstActul,$factual,$conexion))
				{	echo "0";	

		$realizo = 'ACTUALIZO DOC';	
		historia($id,$gstIdperAct,$realizo,$docactuali,$conexion);

		}else{	echo "1";	}
		
			}else{ echo "2"; }
			//}else{ echo "3"; }
			}else{ echo "4"; }
			//}else{ echo "5"; }
			}else{ echo "6";}

			}

	}else if($opcion === 'elimnardoc'){

	$gstIdperEli = $_POST['gstIdperEli']; 
	$doceliminar = $_POST['doceliminar']; 

	$gstIdperAct = $gstIdperEli;
	$docactuali = $doceliminar;
	$realizo = 'ELIMINO DOC'; 
	historia($id,$gstIdperAct,$realizo,$docactuali,$conexion);

	 $docadjunto = consultadoc($gstIdperEli,$doceliminar,$conexion);

		if(file_exists($docadjunto)){	

			if(unlink($docadjunto)) {

				if(borraregistro($gstIdperEli,$doceliminar,$conexion)){	echo "0";	}else{	echo "1";	}

			}else{
				echo '2';
			}
		}else{
			if(borraregistro($gstIdperEli,$doceliminar,$conexion)){	echo "0";	}else{	echo "1";	}
		}
		
	}else if($opcion === 'arcelimnar'){

	$arceliminar = $_POST['arceliminar'];

		hisT($id,$arceliminar,$conexion);

	 $docadjunto = consultarch($arceliminar,$conexion);
		
	if (file_exists($docadjunto)) {	

		if(unlink($docadjunto)){

			if(eliminaRest($arceliminar,$conexion)){	echo "0";	}else{	echo "1";	}
		}else{
			echo '2';
		}	
			
			} else {
				if(eliminaRest($arceliminar,$conexion)){	echo "0";	}else{	echo "1";	}
		}
	}

function consultadoc($gstIdperEli,$doceliminar,$conexion){

$query = "SELECT * FROM personaldoc WHERE idperdoc = $gstIdperEli AND documento = $doceliminar";
  $result = mysqli_query($conexion,$query);
  $res = mysqli_fetch_row($result);

  return $res[3];
}


function consultarch($arceliminar,$conexion){

$query = "SELECT * FROM personaldoc WHERE documento = 7 AND idstd = $arceliminar ";
  $result = mysqli_query($conexion,$query);
  $res = mysqli_fetch_row($result);
if($result->num_rows==0){

return 'no hay';

}else{
 // $res = mysqli_fetch_row($result);

  return $res[3];
}
}


function comprobar($gstIdperArc,$docadjunto,$conexion){

	$query="SELECT * FROM personaldoc WHERE idperdoc = '$gstIdperArc' AND documento = '$docadjunto'";
			$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
	}

function personaldoc($gstIdperArc,$docadjunto,$DgsAgra,$factual,$conexion){

			$query="INSERT INTO personaldoc VALUES(0,'$gstIdperArc','$docadjunto','$DgsAgra','$factual',0)";
				if(mysqli_query($conexion,$query)){
					return true;
				}else{
					return false;
				}
				$this->conexion->cerrar();	
	}


function documentoact($gstIdperAct,$docactuali,$DgstActul,$factual,$conexion){

		$query="UPDATE personaldoc SET docajunto = '$DgstActul', fecactual = '$factual' WHERE idperdoc = $gstIdperAct";
			if(mysqli_query($conexion,$query)){
				return true;
			}else{
				return false;
			}
			$this->conexion->cerrar();
	
}

function borraregistro($gstIdperEli,$doceliminar,$conexion){

	$query="DELETE FROM personaldoc WHERE idperdoc = $gstIdperEli AND documento = $doceliminar";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
	}

function eliminaRest($arceliminar,$conexion){
	$query="DELETE FROM estudios WHERE gstIdstd = $arceliminar AND estado = 0";
	if(mysqli_query($conexion,$query)){

		$queri="DELETE FROM personaldoc WHERE idstd = $arceliminar";
		mysqli_query($conexion,$queri);

			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
	}

	function hisT($id,$arceliminar,$conexion){
	ini_set('date.timezone','America/Mexico_City');
		$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');	

	$query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,concat('ELIMINO REG.',$arceliminar,' ESTUDIOS'),concat(`gstNombr`,' ',`gstApell`),'$fecha' FROM personal INNER JOIN estudios ON personal.gstIdper = estudios.gstIDper WHERE gstIdstd = '$arceliminar'";

	if(mysqli_query($conexion,$query)){
	return true;
	}else{
	return false;
	}
	}

	// function hisTcheck($id,$arceliminar,$conexion){
	// ini_set('date.timezone','America/Mexico_City');
	// 	$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');	

	// $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,concat('ELIMINO REG.',$arceliminar,' ESTUDIOS'),concat(`gstNombr`,' ',`gstApell`),'$fecha' FROM personal INNER JOIN estudios ON personal.gstIdper = estudios.gstIDper WHERE gstIdstd = '$arceliminar'";

	// if(mysqli_query($conexion,$query)){
	// return true;
	// }else{
	// return false;
	// }
	// }
	
	function historial($id,$gstIdperArc,$docadjunto,$conexion){
	ini_set('date.timezone','America/Mexico_City');
		$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');	

	$query = "INSERT INTO historial(id_usu,proceso,registro,fecha) 
			  SELECT $id,concat('AGREGO DOC. ', nombre),concat(`gstNombr`,' ',`gstApell`),'$fecha' 
			  FROM personal 
			  INNER JOIN personaldoc ON personal.gstIdper = personaldoc.idperdoc 
			  INNER JOIN listadoc ON id_doc = documento
			  ORDER BY personaldoc.id DESC LIMIT 1";
	if(mysqli_query($conexion,$query)){
	return true;
	}else{
	return false;
	}
	} 


	function historia($id,$gstIdperAct,$realizo,$docactuali,$conexion){
	ini_set('date.timezone','America/Mexico_City');
		$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');	

	$query = "INSERT INTO historial(id_usu,proceso,registro,fecha) 
			  SELECT $id,concat('$realizo. ', nombre),concat(`gstNombr`,' ',`gstApell`),'$fecha' 
			  FROM personal 
			  INNER JOIN personaldoc ON personal.gstIdper = personaldoc.idperdoc 
			  INNER JOIN listadoc ON id_doc = documento
			  WHERE idperdoc = $gstIdperAct AND documento = $docactuali";
	if(mysqli_query($conexion,$query)){
	return true;
	}else{
	return false;
	}
	} 

?>