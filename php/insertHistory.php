<?php 
include ('../conexion/conexion.php');
  
if($_POST['tCurse']=='' || $_POST['iCurse']=='' || $_POST['fCurse']=='' || $_POST['mCurse']=='' || $_POST['sCurse']=='' || $_POST['idinsp']==''){

    echo "8";
}else{

if(!empty($_FILES['fileDoc']['size'])){
    $nCurse=$_POST['nCurse'];
    $nameOther=$_POST['nameOther'];
    $tCurse=$_POST['tCurse'];
    $iCurse=$_POST['iCurse'];
    $fCurse=$_POST['fCurse'];
    $mCurse=$_POST['mCurse'];
    $sCurse=$_POST['sCurse'];
    $idinsp=$_POST['idinsp'];
    $nEmpl =$_POST['nEmpl']; 
    
    $formatos= array('.pdf');   

    $nombreImagen=$_FILES['fileDoc']['name'];
    $rutaTemporal=$_FILES['fileDoc']['tmp_name'];

        $ext = substr($nombreImagen, strrpos($nombreImagen, '.'));
    if (in_array($ext, $formatos)){

    $rutaEnServidor = '../documento/'.$nEmpl.'/acuse/'.$nombreImagen;

    if (!file_exists($rutaEnServidor)){

     $ruta = '../documento/'.$nEmpl.'/acuse/';
    if(!is_dir($ruta)){
      mkdir($ruta, 0777, true);
    }
    $file=$rutaEnServidor;

    if(move_uploaded_file($rutaTemporal, $file)){


if(acusePDF($idinsp,$nCurse,$nameOther,$tCurse,$iCurse,$fCurse,$mCurse,$sCurse,$file,$conexion))
        {   echo "0";   
    if($nCurse != 0){
    acuseCurso($idinsp,$nCurse,$tCurse,$iCurse,$fCurse,$mCurse,$sCurse,$file,$conexion);        
    }


    // $realizo = 'AGREGO PROFESIÓN';
    // historial($id,$realizo,$AgstIDper,$conexion);

}else{  echo "1";   }



}else{ echo "2"; }
}else{ echo "3"; }
}else{ echo "4"; }
}else{ echo "6"; }
}


function acusePDF($idinsp,$nCurse,$nameOther,$tCurse,$iCurse,$fCurse,$mCurse,$sCurse,$file,$conexion){

$sql="INSERT INTO historyc (id_inspector,nCurse, nameOther, tCurse, iCurse,fCurse,mCurse,sCurse,file) values ($idinsp,'$nCurse','$nameOther','$tCurse','$iCurse','$fCurse','$mCurse','$sCurse','$file')";
if(mysqli_query($conexion,$sql)){
    return true;
}else{
    return false;
}
$this->conexion->cerrar();
}
    
function acuseCurso($idinsp,$nCurse,$tCurse,$iCurse,$fCurse,$mCurse,$sCurse,$file,$conexion){
    $sqls = "INSERT INTO cursos VALUES(0,'$idinsp','$nCurse',0,0,'$iCurse','$fCurse',0,'$sCurse','$mCurse','0','FINALIZADO',0,80,'CONFIRMADO','$file','X',0,0,0,'SI',2);";
     mysqli_query($conexion,$sqls);
}

    // $sqls = "INSERT INTO cursos VALUES(0,'$idinsp','$nCurse',0,'$iCurse','$fCurse',0,'$sCurse','$mCurse','0','FINALIZADO',0,80,'CONFIRMADO',0,'X',0,0,2);";
    // mysqli_query($conexion,$sqls);

?>