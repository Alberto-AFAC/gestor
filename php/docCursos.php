<?php
include("../conexion/conexion.php");
ini_set('date.timezone','America/Mexico_City');

$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'insert'){

$gstTitlo = $_POST['gstTitlo'];
$gstTipo= $_POST['gstTipo'];
$gstVignc = $_POST['gstVignc'];
$gstPrfil = $_POST['gstPrfil'];
$gstTmrio = '';
$gstDrcin = $_POST['hr'].' '.$_POST['tmp1'].' '.$_POST['min'].' '.$_POST['tmp2'];
$gstCntnc = $_POST['gstCntnc'];
$gstObjtv = $_POST['gstObjtv'];
$gstFalta = date('Y').'/'.date('m').'/'.date('d');	
$Hfinal=date('H:i:s');
$gstProvd = $_POST['gstProvd'];
$gstCntro = $_POST['gstCntro'];

if(cursos($gstTitlo,$gstTipo,$gstVignc,$gstPrfil,$gstTmrio,$gstDrcin,$gstCntnc,$gstObjtv,$gstFalta,$gstProvd
,$gstCntro,$conexion))
		{	echo "0";	

		//idcurso();
	}else{	echo "1";	}

	$valors = $_POST['array'];
	$varray1 = json_decode($valors, true);
	$valor = count($varray1);

	

 for($i=0; $i<$valor; $i++){

	$titulo = $varray1[$i]['campo'];

	if(temario($titulo,$conexion)){
		echo "0";
		}else{
		echo "1";
		}

	}
 

}

// if($_POST['gstProvd']=='' || $_POST['gstCntro']=='' || $_POST['gstTitlo']==''|| $_POST['gstTipo']==''|| $_POST['gstVignc']==''|| $_POST['gstPrfil']==''|| $_POST['gstObjtv']==''|| $_POST['hr']=='' || $_POST['tmp1']=='' || $_POST['min']==''|| $_POST['tmp2']==''|| $_POST['gstCntnc']==''){

// 	echo "8";
// }else{

// $gstTitlo = $_POST['gstTitlo'];

// if(comprobar($gstTitlo,$conexion)){

// if(!empty($_FILES['gstTmrio']['size'])){

// $gstProvd = $_POST['gstProvd'];
// $gstCntro = $_POST['gstCntro'];
// $gstTipo= $_POST['gstTipo'];
// $gstVignc = $_POST['gstVignc'];
// $gstPrfil = $_POST['gstPrfil'];
// $gstObjtv = $_POST['gstObjtv'];
// $gstDrcin = $_POST['hr'].' '.$_POST['tmp1'].' '.$_POST['min'].' '.$_POST['tmp2'];
// $gstCntnc = $_POST['gstCntnc'];

// //$formatos= array('.jpg', '.png', '.doc', '.xlsx','.docx','.msi','.pdf', '.zip', '.rar', '.JPG','.txt','.jpeg');
// $formatos= array('.pdf');	

// //if($_FILES['gstDocmt']['size'] < 16777216){
// $nombreImagen=$_FILES['gstTmrio']['name'];
// $rutaTemporal=$_FILES['gstTmrio']['tmp_name'];


// $ext = substr($nombreImagen, strrpos($nombreImagen, '.'));
// if (in_array($ext, $formatos)){

// $rutaEnServidor = '../documento/cursos/'.$nombreImagen;

// if (!file_exists($rutaEnServidor)){

//  $ruta = '../documento/cursos';
// if(!is_dir($ruta)){
//   mkdir($ruta, 0777, true);
// }


// $gstTmrio=$rutaEnServidor;
// //$gstTmrio= 'documento/'.$idusu.'/'.$nombreImagen;

// if(move_uploaded_file($rutaTemporal, $gstTmrio)){

// $gstFalta = date('Y').'/'.date('m').'/'.date('d');	
// //$Hfinal=date('H:i:s');
		
// if(cursos($gstTitlo,$gstTipo,$gstVignc,$gstPrfil,$gstTmrio,$gstDrcin,$gstCntnc,$gstObjtv,$gstFalta,$gstProvd
// ,$gstCntro,$conexion))
// 		{	echo "0";	}else{	echo "1";	}

// }else{ echo "2"; }
// }else{ echo "3"; }
// }else{ echo "4"; }
// //}else{ echo "5"; }
// }else{ echo "6";}
// }else{ echo "7";}
// //}

function comprobar($gstTitlo,$conexion){
	$query="SELECT * FROM listacursos WHERE gstTitlo='$gstTitlo' AND estado = 0";		
	$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
			return true;
		}else{
			return false;	
		}
		$this->conexion->cerrar();	
	}

function cursos($gstTitlo,$gstTipo,$gstVignc,$gstPrfil,$gstTmrio,$gstDrcin,$gstCntnc,$gstObjtv,$gstFalta,$gstProvd,
$gstCntro,$conexion){
	$query="INSERT INTO listacursos VALUES(0,'$gstTitlo','$gstTipo','$gstVignc','$gstPrfil','$gstTmrio','$gstDrcin','$gstCntnc','$gstObjtv','$gstFalta','$gstProvd','$gstCntro',0);";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
	}


function idcurso($idcurso,$conexion){

	$query="SELECT gstIdlsc FROM listacursos ORDER BY gstIdlsc DESC LIMIT 1";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();

}

function temario($titulo,$conexion){

	$query="INSERT INTO temario VALUES(0,0,'$titulo',0);";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();

}

?>