<?php
include("../conexion/conexion.php");
session_start();
ini_set('date.timezone','America/Mexico_City');

if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
$idp = $_SESSION['usuario']['id_usu'];
}

if($_POST['AgstProvd']=='' || $_POST['AgstCntro']=='' || $_POST['AgstIdlsc']=='' || $_POST['AgstTitlo']==''|| $_POST['AgstTipo']==''|| $_POST['AgstVignc']==''|| $_POST['AgstObjtv']==''|| $_POST['Ahr']==''|| $_POST['Atmp1']==''|| $_POST['Amin']==''|| $_POST['Atmp2']==''|| $_POST['AgstCntnc']==''){

	echo "8";
}else{

$AgstIdlsc = $_POST['AgstIdlsc']; 
$AgstTitlo = $_POST['AgstTitlo'];
$AgstTipo = $_POST['AgstTipo'];
$AgstVignc = $_POST['AgstVignc'];
$AgstPrfil = $_POST['AgstPrfil'];
$AgstTmrio = $_POST['AgstTmrio'];
$AgstDrcin = $_POST['Ahr'].' '.$_POST['Atmp1'].' '.$_POST['Amin'].' '.$_POST['Atmp2'];
$AgstCntnc = $_POST['AgstCntnc'];
$AgstObjtv = $_POST['AgstObjtv'];
$AgstProvd = $_POST['AgstProvd'];
$AgstCntro = $_POST['AgstCntro'];


$gstFalta = date('Y').'/'.date('m').'/'.date('d');	
$Hfinal=date('H:i:s');

 if(actCursos($AgstIdlsc,$AgstTitlo,$AgstTipo,$AgstVignc,$AgstPrfil,$AgstTmrio,$AgstDrcin,$AgstCntnc,$AgstObjtv,$AgstProvd,$AgstCntro,$gstFalta,$conexion))
		{	echo "0";	

	$realizo = 'ACTUALIZO CURSO';
	historial($idp,$realizo,$AgstTitlo,$conexion);

}else{	echo "1";	}

//if(comprobar($gstTitlo,$conexion)){

// if(!empty($_FILES['AgstTmrio']['size'])){

// $AgstIdlsc = $_POST['AgstIdlsc']; 
// $AgstTipo = $_POST['AgstTipo'];
// $AgstVignc = $_POST['AgstVignc'];
// $AgstPrfil = $_POST['AgstPrfil'];
// $AgstObjtv = $_POST['AgstObjtv'];
// $AgstDrcin = $_POST['Ahr'].' '.$_POST['Atmp1'].' '.$_POST['Amin'].' '.$_POST['Atmp2'];
// $AgstCntnc = $_POST['AgstCntnc'];

// //$formatos= array('.jpg', '.png', '.doc', '.xlsx','.docx','.msi','.pdf', '.zip', '.rar', '.JPG','.txt','.jpeg');
// $formatos= array('.pdf');	

// //if($_FILES['gstDocmt']['size'] < 16777216){
// $nombreImagen=$_FILES['AgstTmrio']['name'];
// $rutaTemporal=$_FILES['AgstTmrio']['tmp_name'];


// $ext = substr($nombreImagen, strrpos($nombreImagen, '.'));
// if (in_array($ext, $formatos)){

// $rutaEnServidor = '../documento/act/cursos/'.$nombreImagen;

// if (!file_exists($rutaEnServidor)){

//  $ruta = '../documento/act/cursos';
// if(!is_dir($ruta)){
//   mkdir($ruta, 0777, true);
// }


// $AgstTmrio=$rutaEnServidor;
// //$gstTmrio= 'documento/'.$idusu.'/'.$nombreImagen;

// if(move_uploaded_file($rutaTemporal, $AgstTmrio)){



// if(actCursos($AgstIdlsc,$AgstTitlo,$AgstTipo,$AgstVignc,$AgstPrfil,$AgstTmrio,$AgstDrcin,$AgstCntnc,$AgstObjtv,$conexion))
// 		{	echo "0";	}else{	echo "1";	}

// }else{ echo "2"; }
// }else{ echo "3"; }
// }else{ echo "4"; }
// //}else{ echo "5"; }
// }else{ echo "6";}
// //}else{ echo "7";}
}

function actCursos($AgstIdlsc,$AgstTitlo,$AgstTipo,$AgstVignc,$AgstPrfil,$AgstTmrio,$AgstDrcin,$AgstCntnc,$AgstObjtv,$AgstProvd,$AgstCntro,$gstFalta,$conexion){

if($AgstPrfil==''){
$query="UPDATE listacursos SET gstTitlo = '$AgstTitlo',gstTipo='$AgstTipo',gstVignc='$AgstVignc',gstTmrio='$AgstTmrio',gstDrcin='$AgstDrcin',gstCntnc='$AgstCntnc',gstObjtv='$AgstObjtv',gstFalta='$gstFalta',gstProvd='$AgstProvd',gstCntro='$AgstCntro' WHERE gstIdlsc='$AgstIdlsc'";
}else{
$query="UPDATE listacursos SET gstTitlo = '$AgstTitlo',gstTipo='$AgstTipo',gstVignc='$AgstVignc',gstPrfil='$AgstPrfil',gstTmrio='$AgstTmrio',gstDrcin='$AgstDrcin',gstCntnc='$AgstCntnc',gstObjtv='$AgstObjtv',gstFalta='$gstFalta',gstProvd='$AgstProvd',gstCntro='$AgstCntro' WHERE gstIdlsc='$AgstIdlsc'";	
}

		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
	}

	function historial($idp,$realizo,$AgstTitlo,$conexion){
	ini_set('date.timezone','America/Mexico_City');
	$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');
	$query = "INSERT INTO historial VALUES(0,'$idp','$realizo','$AgstTitlo','$fecha')";
	if(mysqli_query($conexion,$query)){
	return true;
	}else{
	return false;
	}
	$this->conexion->cerrar();
	}
?>