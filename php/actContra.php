<?php include("../conexion/conexion.php");
session_start();
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
					}else{	echo "1";	}

				}else{	echo "2";	}
			}else{	echo "3";	}
		}else{	echo "4";	}
	}

		function existe_usuario($password,$idper,$conexion){
		$passwor; //= md5($password);
		$passwor = $password;
		$query = "SELECT id_usu FROM accesos WHERE password='$passwor' and id_usu = '$idper'";
		$resultado = mysqli_query($conexion, $query);
		$existe_usuario = mysqli_num_rows($resultado);
		return $existe_usuario;
		}

		function modificar($password, $pass, $usuario, $idper,$conexion){
		$passwor = $password;
		$pas = $pass;
		$query = "UPDATE accesos SET password='$pas' WHERE password='$passwor' and 	id_usu = '$idper'";
		if (mysqli_query($conexion,$query)) {
		return true;
		}else
		{
		return false;
		}
		$this->conexion->cerrar();

		}
?>