<?php include("../conexion/conexion.php");
session_start();
ini_set('date.timezone','America/Mexico_City');
if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
$id = $_SESSION['usuario']['id_usu'];
}else{
$id = '929';
}

$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'actCont'){

		$idper = $_POST["idper"];
		$usuario = $_POST["usu"];
		$password = $_POST["password"];
		$pass = $_POST["pass"];
		$pass2 = $_POST["pass2"];

		if($password != '' && $pass != '' && $pass2 != '' && $usuario !=''){
				$existe = existe_usuario($password,$idper, $conexion);
			
				if($existe > 0){			
						
					$encryptado =sha1($pass);
					$encryptado2 =sha1($pass2);
					if($encryptado == $encryptado2){

					if(modificar($password, $pass, $usuario, $idper, $conexion)){
						echo "7";
						$realizo = 'ACTUALIZACION DE CONTRASEÑA OBLIGATORIA';
						historia($id,$idper,$realizo,$conexion);
					}else{	echo "1";	}

				}else{	echo "2";	}
			}else{	echo "3";	}
		}else{	echo "4";	}
	}else if($opcion === 'restorePas'){

		$idper = $_POST["idper"];
		$usuario = $_POST["usu"];
		$password = $_POST["password"];
		$pass = $_POST["pass"];
		$pass2 = $_POST["pass2"];

		// if($password != '' && $pass != '' && $pass2 != '' && $usuario !=''){
				$existe = existe_usuario($password,$idper, $conexion);
			
				if($existe > 0){			
						
					$encryptado =sha1($pass);
					$encryptado2 =sha1($pass2);
					if($encryptado == $encryptado2){

					if(restablecer($password, $pass, $usuario, $idper, $conexion)){
						echo "7";
						$realizo = 'RESTABLECIÓ CONTRASEÑA';
						historia($id,$idper,$realizo,$conexion);
					}else{	echo "1";	}

				}else{	echo "2";	}
			}else{	echo "3";	}
		// }else{	echo "4";	}
	}

//-----------------------------------------------------------FUNCIONES -------------------------------------------------------
	function existe_usuario($password,$idper,$conexion){
		$passwor; //= md5($password);
		$passwor = $password;
		$query = "SELECT id_usu FROM accesos WHERE password='$passwor' and id_usu = '$idper'";
		$resultado = mysqli_query($conexion, $query);
		$existe_usuario = mysqli_num_rows($resultado);
		return $existe_usuario;
	}

	//funciones para guardar en historial cambios de actualización de contraseña
	function historia($id,$idper,$realizo,$conexion){
        ini_set('date.timezone','America/Mexico_City');
        $fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
        $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'$realizo',concat(`gstNombr`,' ',`gstApell`),'$fecha' FROM personal WHERE gstIdper= $idper";
        if(mysqli_query($conexion,$query)){
            return true;
        }else{
            return false;
        }
    }

	function modificar($password, $pass, $usuario, $idper,$conexion){
		$passwor = $password;
		$pas = $pass;
		$query = "UPDATE accesos SET password='$pas', cambio='1' WHERE password='$passwor' and 	id_usu = '$idper'";
		if (mysqli_query($conexion,$query)) {
		return true;
	}else{
		return false;
	}
		$this->conexion->cerrar();

	}

		function restablecer($password, $pass, $usuario, $idper,$conexion){
		$passwor = $password;
		$pas = $pass;
		$FehaActual = date('Y-m-d H:i:s');
		$query = "UPDATE accesos SET password='$pas', cambio='1',token='$FehaActual' WHERE password='$passwor' and 	id_usu = '$idper'";
		if (mysqli_query($conexion,$query)) {
		return true;
		}else{
		return false;
		}
		$this->conexion->cerrar();

		}
?>