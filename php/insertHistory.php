<?php 
include ('../conexion/conexion.php');
    $nCurse=$_POST['nCurse'];
    $tCurse=$_POST['tCurse'];
    $iCurse=$_POST['iCurse'];
    $fCurse=$_POST['fCurse'];
    $mCurse=$_POST['mCurse'];
    $sCurse=$_POST['sCurse'];
    $idinsp=$_POST['idinsp'];


	$sql="INSERT into historyc (id_inspector,nCurse, tCurse, iCurse,fCurse,mCurse,sCurse) values ($idinsp,'$nCurse','$tCurse','$iCurse','$fCurse','$mCurse','$sCurse')";
	echo mysqli_query($conexion,$sql);



?>