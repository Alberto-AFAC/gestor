<?php 
	include ('../conexion/conexion.php');
    $gstNombr=$_POST['gstNombr'];
    $gstApell=$_POST['gstApell'];
    $gstCurp=$_POST['gstCurp'];
    $gstRfc=$_POST['gstRfc'];
    $gstSexo=$_POST['gstSexo'];
    $gstIDCat=$_POST['gstIDCat'];
    $gstCasa=$_POST['gstCasa'];
    $gstClulr=$_POST['gstClulr'];
    $gstCorro=$_POST['gstCorro'];
    // $gstSpcID=$_POST['gstSpcID'];

    $sql = "INSERT INTO personal VALUES(0,'$gstNombr','$gstApell','0','0','0','0','$gstCurp','$gstRfc','0','0','0','0','0','0','0','0','0','0','0','0','$gstCasa','$gstClulr','0','0','0','0','0','0','0','0','0','0','0','$gstIDCat','0','$gstCorro','0','0','0','0','0','0','NO',0,'0',2)";


    echo mysqli_query($conexion,$sql);

 ?>