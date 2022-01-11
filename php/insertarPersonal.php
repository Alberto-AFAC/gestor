<?php 
	include ('../conexion/conexion.php');
    $gstNombr=$_POST['gstNombr'];
    $gstApell=$_POST['gstApell'];
    $gstLunac=$_POST['gstLunac'];
    $gstCurp=$_POST['gstCurp'];
    $gstRfc=$_POST['gstRfc'];
    $gstSexo=$_POST['gstSexo'];
    $gstIDCat=$_POST['gstIDCat'];
    $gstCasa=$_POST['gstCasa'];
    $gstClulr=$_POST['gstClulr'];
    $gstCorro=$_POST['gstCorro'];
    $gstSpcID=$_POST['gstSpcID'];
    $gstSigID=$_POST['gstSigID'];
    $gstRusp=$_POST['gstRusp'];
    $sgtCrhnt=$_POST['sgtCrhnt'];
    $gstStado=$_POST['gstStado'];
    $gstCinst=$_POST['gstCinst'];
    

    $sql = "INSERT INTO personal VALUES(0,'$gstNombr','$gstApell','$gstLunac','0','$gstSexo','0','$gstCurp','$gstRfc','0','0','0','0','0','0','0','0','0','0','0','$gstStado','$gstCasa','$gstClulr','0','0','$sgtCrhnt','$gstRusp','0','0','$gstAreID','0','$gstSpcID','0','INSPECTOR','$gstIDCat','0','$gstCorro','0','0','0','0','0','0','NO',0,'0',3)";


    echo mysqli_query($conexion,$sql);

 ?>