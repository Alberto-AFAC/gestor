<?php
	include("../conexion/conexion.php");
	session_start();
	

	$id = $_SESSION['usuario']['id_usu'];
	$n = 0;
	$sql = 
	"SELECT gstNmpld FROM personal 
	 WHERE personal.gstIdper = '".$id."' && personal.estado IN (0,3) ";
   $persona = mysqli_query($conexion,$sql);
   $datos = mysqli_fetch_row($persona);

	$nemp = $datos[0];

	$query = "SELECT * FROM privilegio WHERE n_empleado = $nemp AND estado = 0";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

			// $data['privilegios'] = $priv;
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
