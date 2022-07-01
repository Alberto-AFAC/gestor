<?php



	$conexion2 = new mysqli('localhost','root','','control_de_reportes');
    // $conexion2 = new mysqli('localhost','u683645102_afac','Agencia.SCT2021.','u683645102_reportes');
	if ($conexion2->connect_error):
	echo "Error de Conexión".$conexion2->connect_error;
	endif;

	include("../conexion/conexion.php");
	session_start();
	
	$id = $_POST['datos'];

	$query = "SELECT gstIdper,gstNombr,gstApell,gstNmpld FROM personal WHERE gstIdper = $id AND estado = 0";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

		$iduser = $data['gstIdper'];
		$Nemple = $data['gstNmpld'];

		$quer_gtr = "SELECT privilegios FROM accesos WHERE id_usu = $iduser AND baja = 0";
		$resl_gtr = mysqli_query($conexion, $quer_gtr);
		$quer_ltc = "SELECT privilegio FROM formatoacceso WHERE id_acc = $iduser AND estado = 0";
		$resl_ltc = mysqli_query($conexion, $quer_ltc);
		$quer_mda = "SELECT privilegios FROM tecnico WHERE id_usu = $iduser AND baja = 0";
		$resl_mda = mysqli_query($conexion2, $quer_mda);
		$quer_emp = "SELECT perfil FROM privilegio WHERE n_empleado = $iduser AND estado = 0";
		$resl_emp = mysqli_query($conexion, $quer_emp);

		if($res_gtr = mysqli_fetch_array($resl_gtr)){
		$data["privi_gestor"] = $res_gtr["privilegios"];
		}else{
		$data["privi_gestor"] = '0';
		}

		if($res_ltc = mysqli_fetch_array($resl_ltc)){
		$data["privi_lingui"] = $res_ltc["privilegio"];
		}else{
		$data["privi_lingui"] = 'x';
		}

		if($res_mda = mysqli_fetch_array($resl_mda)){
		$data["privi_mesa"] = $res_mda["privilegios"];
		}else{
		$data["privi_mesa"] = 'x';
		}

		if($res_emp = mysqli_fetch_array($resl_emp)){
		$data["privi_acces"] = $res_emp["perfil"];
		}else{
		$data["privi_acces"] = 'x';
		}

		$arreglo["data"][] = $data; 

		}

		if(isset($arreglo)&&!empty($arreglo)){

			echo json_encode($arreglo);
		}else{

			echo $arreglo="0";
		}
	}
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>
