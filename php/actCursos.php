<?php
include("../conexion/conexion.php");
ini_set('date.timezone','America/Mexico_City');

if($_POST['AgstProvd']=='' || $_POST['AgstCntro']=='' || $_POST['AgstIdlsc']=='' || $_POST['AgstTitlo']==''|| $_POST['AgstTipo']==''|| $_POST['AgstVignc']==''|| $_POST['AgstObjtv']==''|| $_POST['Ahr']==''|| $_POST['Atmp1']==''|| $_POST['Amin']==''|| $_POST['Atmp2']==''|| $_POST['AgstCntnc']==''){

	echo "8";
}else{

$AgstTitlo = $_POST['AgstTitlo'];

//if(comprobar($gstTitlo,$conexion)){

if(!empty($_FILES['AgstTmrio']['size'])){

$AgstIdlsc = $_POST['AgstIdlsc']; 
$AgstTipo = $_POST['AgstTipo'];
$AgstVignc = $_POST['AgstVignc'];
$AgstPrfil = $_POST['AgstPrfil'];
$AgstObjtv = $_POST['AgstObjtv'];
$AgstDrcin = $_POST['Ahr'].' '.$_POST['Atmp1'].' '.$_POST['Amin'].' '.$_POST['Atmp2'];
$AgstCntnc = $_POST['AgstCntnc'];

//$formatos= array('.jpg', '.png', '.doc', '.xlsx','.docx','.msi','.pdf', '.zip', '.rar', '.JPG','.txt','.jpeg');
$formatos= array('.pdf');	

//if($_FILES['gstDocmt']['size'] < 16777216){
$nombreImagen=$_FILES['AgstTmrio']['name'];
$rutaTemporal=$_FILES['AgstTmrio']['tmp_name'];


$ext = substr($nombreImagen, strrpos($nombreImagen, '.'));
if (in_array($ext, $formatos)){

$rutaEnServidor = '../documento/act/cursos/'.$nombreImagen;

if (!file_exists($rutaEnServidor)){

 $ruta = '../documento/act/cursos';
if(!is_dir($ruta)){
  mkdir($ruta, 0777, true);
}


$AgstTmrio=$rutaEnServidor;
//$gstTmrio= 'documento/'.$idusu.'/'.$nombreImagen;

if(move_uploaded_file($rutaTemporal, $AgstTmrio)){

//$gstFalta = date('Y').'/'.date('m').'/'.date('d');	
//$Hfinal=date('H:i:s');

if(actCursos($AgstIdlsc,$AgstTitlo,$AgstTipo,$AgstVignc,$AgstPrfil,$AgstTmrio,$AgstDrcin,$AgstCntnc,$AgstObjtv,$conexion))
		{	echo "0";	}else{	echo "1";	}

}else{ echo "2"; }
}else{ echo "3"; }
}else{ echo "4"; }
//}else{ echo "5"; }
}else{ echo "6";}
//}else{ echo "7";}
}

function actCursos($AgstIdlsc,$AgstTitlo,$AgstTipo,$AgstVignc,$AgstPrfil,$AgstTmrio,$AgstDrcin,$AgstCntnc,$AgstObjtv,$conexion){

if($AgstPrfil==''){
$query="UPDATE listacursos SET gstTitlo = '$AgstTitlo',gstTipo='$AgstTipo',gstVignc='$AgstVignc',gstTmrio='$AgstTmrio',gstDrcin='$AgstDrcin',gstCntnc='$AgstCntnc',gstObjtv='$AgstObjtv' WHERE gstIdlsc='$AgstIdlsc'";
}else{
$query="UPDATE listacursos SET gstTitlo = '$AgstTitlo',gstTipo='$AgstTipo',gstVignc='$AgstVignc',gstPrfil='$AgstPrfil',gstTmrio='$AgstTmrio',gstDrcin='$AgstDrcin',gstCntnc='$AgstCntnc',gstObjtv='$AgstObjtv' WHERE gstIdlsc='$AgstIdlsc'";	
}
	


		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
	}

?>