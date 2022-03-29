<?php 
include ("../conexion/conexion.php");
session_start();

if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
    $id = $_SESSION['usuario']['id_usu'];
}

$opcion = $_POST["opcion"];
	
if($opcion === 'modificar'){
    $idacceso = $_POST['idAccesos'];
	$id_usu = $_POST['idUser'];
	// $gstNmpld = $_POST['gstNmpld'];
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
    $privilegios = $_POST['privilegios'];

    if($privilegios==0){ echo "3"; }else{		
		if($password != ''){
		    if(modificar($id_usu,$usuario,$password,$idacceso,$privilegios,$conexion)){
				echo "0";
				historia($id,$idacceso,$conexion); 
			}else{
				echo "2";
			}
		}else{
			echo "1";
		}	
	}
}

//---------------------------------------------------------FUNCIONES---------------------------------------------------//
	//Funcion para actualiza la contraseña
    function modificar($id_usu,$usuario,$password,$idacceso,$privilegios,$conexion){
		$query = "UPDATE accesos SET usuario='$usuario',password='$password', privilegios= '$privilegios' WHERE id_accesos = $idacceso";
		if (mysqli_query($conexion,$query)) {
			return true;
		}else{
			return false;
		}
		//verificar_resultado($resultado);
		cerrar($conexion);									 	
	}
	//funciones para guardar en historial cambios de actualización
	function historia($id,$id_usu,$conexion){
        ini_set('date.timezone','America/Mexico_City');
        $fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
        $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'ACTUALIZA ACCESO',concat(`gstNombr`,' ',`gstApell`, ' PRIVILEGIOS: ' ,(select privilegios from accesos where id_usu = $id_usu), ' USUARIO: ' ,(select usuario from accesos where id_usu = $id_usu)),'$fecha' FROM personal WHERE gstIdper= $id_usu";
        if(mysqli_query($conexion,$query)){
            return true;
        }else{
            return false;
        }
    }

	function cerrar($conexion){
		mysqli_close($conexion);
	}


 ?>