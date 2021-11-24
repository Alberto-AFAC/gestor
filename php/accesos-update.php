<?php 
include ("../conexion/conexion.php");

	$opcion = $_POST["opcion"];
	

if($opcion === 'modificar'){
        $idacceso = $_POST['idAccesos'];
		$id_usu = $_POST['id_usu'];
		$gstNmpld = $_POST['gstNmpld'];
		$password = $_POST['password'];
        $privilegios = $_POST['privilegios'];
		if($password != '' ){
		if(modificar($id_usu, $gstNmpld, $password, $idacceso,  $privilegios, $conexion)){
					echo "0";
				}else{
						echo "2";
				 		}
							}else{
								echo "1";
								}

	}

	function modificar($id_usu, $gstNmpld, $password, $idacceso,  $privilegios, $conexion){
		$query = "UPDATE accesos SET password='$password', privilegios= '$privilegios' WHERE id_usu = $idacceso";
		if (mysqli_query($conexion,$query)) {
						return true;
					}else
						{
							return false;
						}
		//verificar_resultado($resultado);
		cerrar($conexion);									 	
	}



	function cerrar($conexion){
		mysqli_close($conexion);
	}
 ?>