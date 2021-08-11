<?php
include("../conexion/conexion.php");

$opcion = $_POST["opcion"];
$informacion = [];

	$id_persona = $_POST['id_persona'];
	$id_codigocurso = $_POST['id_codigocurso'];
	$listregis = $_POST['listregis'];	
	$lisasisten = $_POST['lisasisten'];
	$listreportein = $_POST['listreportein'];
	$cartdescrip = $_POST['cartdescrip'];
	$regponde  = $_POST['regponde'];
	$infinal   = $_POST['infinal'];
	$evreaccion = $_POST['evreaccion'];
	$estado_cer = $_POST['estado_cer'];
	
	if(registrarcer($id_persona,$id_codigocurso,$listregis,$lisasisten,$listreportein,$cartdescrip,$regponde,$infinal,$evreaccion,$estado_cer)){
		echo "0";
	}else{
		echo "1";
	}

}else if($opcion === 'actualizarcer'){

    $id_persona = $_POST['id_persona'];
	$id_codigocurso = $_POST['id_codigocurso'];
	$listregis = $_POST['listregis'];	
	$lisasisten = $_POST['lisasisten'];
	$listreportein = $_POST['listreportein'];
	$cartdescrip = $_POST['cartdescrip'];
	$regponde  = $_POST['regponde'];
	$infinal   = $_POST['infinal'];
	$evreaccion = $_POST['evreaccion'];
	$estado_cer = $_POST['estado_cer'];

	if(actualizar($gstIdper,$gstNombr,$gstApell,$gstLunac,$gstFenac,$gstStcvl,$gstCurp,$gstRfc,$gstNpspr,$gstPsvig,$gstVisa,$gstVignt,$gstCalle,$gstNumro,$gstClnia,$gstCpstl,$gstCiuda,$gstStado,$gstCasa,$gstClulr,$gstExTel,$conexion$id_persona,$id_codigocurso,$listregis,$lisasisten,$listreportein,$cartdescrip,$regponde,$infinal,$evreaccion,$estado_cer)){
		echo "0";
	}else{
		echo "1";
	}

    function registrarcer($id_persona,$id_codigocurso,$listregis,$lisasisten,$listreportein,$cartdescrip,$regponde,$infinal,$evreaccion,$estado_cer,$conexion){

        $query="INSERT INTO constancias VALUES(0,'$id_persona','$id_codigocurso','$listregis','$lisasisten','$listreportein','$cartdescrip','$regponde','$infinal','$evreaccion','$estado_cer',0)";
            if(mysqli_query($conexion,$query)){
                return true;
            }else{
                return false;
            }
            $this->conexion->cerrar();
            }

function cerrar($conexion){

	mysqli_close($conexion);
}
?>

