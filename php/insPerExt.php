<?php 
	include ('../conexion/conexion.php');
    $gstNombr=$_POST['gstNombr'];
    $gstApell=$_POST['gstApell'];
    $gstCurp=$_POST['gstCurp'];
    $gstRfc=$_POST['gstRfc'];
    $gstSexo=$_POST['gstSexo'];
    $gstIDCat=$_POST['gstIDCat'];


	$sql="INSERT into personal (gstNombr, gstApell, gstLunac, gstFenac, gstSexo,gstStcvl,gstCurp,gstRfc,gstisst,gstNpspr,gstPsvig,gstVisa,gstVignt,gstNucrt,gstCalle,gstNumro,gstClnia,gstCpstl,gstCiuda,gstStado,gstCasa,gstClulr,gstExTel,gstNmpld,sgtCrhnt,gstRusp,gstPlaza,gstIdpst,gstAreID,gstPstID,gstSpcID,gstSigID,gstCargo,gstIDCat,gstIDSub,gstCorro,gstCinst,gstFeing,gstFtrmn,gstIDara,gstAcReg,gstIDuni,gstEvalu,gstComnd,gstComnt,control,estado,)
			values ('$gstNombr', '$gstApell', '0', '0000-00-00', '$gstSexo','0','$gstCurp','$gstRfc','0','0','0000-00-00','0','0000-00-00','0','0','0','0',0,'0','0','0','0','0',0,'0','0','0','0',0,0,'0','0',0,'$gstIDCat',0,'0','0','0000-00-00','0000-00-00',0,'0',0,'0','0','EXTERNO',0)";
	echo mysqli_query($conexion,$sql);

 ?>