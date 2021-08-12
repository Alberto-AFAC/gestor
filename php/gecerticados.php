<?php
include("../conexion/conexion.php");
$opcion = $_POST["opcion"];

  if($opcion === 'alrcertific'){

	$id_persona = $_POST['id_persona'];
	$id_codigocurso = $_POST['id_codigocurso'];
	$listregis = $_POST['listregis'];	
	$lisasisten = $_POST['lisasisten'];
	$listreportein = $_POST['listreportein'];
	$cartdescrip = $_POST['cartdescrip'];
	$regponde  = $_POST['regponde'];
	$infinal   = $_POST['infinal'];
	$evreaccion = $_POST['evreaccion'];
	$copias = $_POST['copias'];

		if(alrcertific($id_persona,$id_codigocurso,$listregis,$lisasisten,$listreportein,$cartdescrip,$regponde,$infinal,$evreaccion,$copias,$conexion)){
			echo "0";
		}else{
			echo "1";
		}

	}else if($opcion === 'actuacer'){
	
	$id_persona = $_POST['id_persona'];
	$id_codigocurso = $_POST['id_codigocurso'];
	$listregis = $_POST['listregis'];	
	$lisasisten = $_POST['lisasisten'];
	$listreportein = $_POST['listreportein'];
	$cartdescrip = $_POST['cartdescrip'];
	$regponde  = $_POST['regponde'];
	$infinal   = $_POST['infinal'];
	$evreaccion = $_POST['evreaccion'];
	$copias = $_POST['copias'];
	$estado_cer = $_POST['estado_cer'];

	if(actuacer($id_persona,$id_codigocurso,$listregis,$lisasisten,$listreportein,$cartdescrip,$regponde,$infinal,$evreaccion,$copias,$conexion)){
		echo "0";
	}else{
		echo "1";
	}
	}
	function alrcertific($id_persona,$id_codigocurso,$listregis,$lisasisten,$listreportein,$cartdescrip,$regponde,$infinal,$evreaccion,$copias,$conexion){

		$query="INSERT INTO constancias  VALUES(0,'$id_persona','$id_codigocurso','$listregis','$lisasisten','$listreportein','$cartdescrip','$regponde','$infinal','$evreaccion','$copias','0')";
			if(mysqli_query($conexion,$query)){
				return true;
			}else{
				return false;
			}
			$this->conexion->cerrar();
			}
	function actuacer($id_persona,$id_codigocurso,$listregis,$lisasisten,$listreportein,$cartdescrip,$regponde,$infinal,$evreaccion,$copias,$conexion){

		$query = "UPDATE constancias  SET id_persona = '$id_persona',id_codigocurso = '$id_codigocurso',listregis = '$listregis',lisasisten = '$lisasisten',listreportein = '$listreportein',regponde  = '$regponde',infinal = '$infinal',evreaccion = '$evreaccion',copias = '$copias',estado_cer = '$estado_cer'WHERE id_persona = '$id_persona'";
			if(mysqli_query($conexion,$query)){
				return true;
			}else{
				return false;
			}
			cerrar($conexion);
			}

	function cerrar($conexion){

	 mysqli_close($conexion);
			
	}
?>

