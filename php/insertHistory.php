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

	$sqls = "INSERT INTO cursos VALUES(0,'$idinsp','$nCurse',0,'$iCurse','$fCurse',0,'$sCurse','$mCurse','0','FINALIZADO',0,80,'CONFIRMADO',0,'X',0,0,2);";
	mysqli_query($conexion,$sqls);
?>