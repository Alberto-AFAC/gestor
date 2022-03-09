<?php 
include ("../conexion/conexion.php");
session_start();

// if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
//     $id = $_SESSION['usuario']['id_usu'];
// }

$opcion = $_POST["opcion"];
	
if($opcion === 'modificar'){
		$n_empleado = $_POST['nemp'];
		$perfil = $_POST['perfil'];
		$acces = $_POST['accesos'];

		$acceso2 = substr($acces, 1);

			if($acces[0]=='a'){
				    $acceso = 'b'.$acceso2;
			}else if($acces[0]=='b'){
					$acceso = 'a'.$acceso2;
			}
	
		if(comprobacion($acces,$acceso,$n_empleado,$conexion)){

		if(registrar($perfil,$acces,$acceso,$n_empleado,$conexion)){
		echo "0";
		}else{
		echo "1";
		}
		}else{
			if($acces[0]=='a'){
			$acceso = 'b'.$acceso2;
			}else if($acces[0]=='b'){
			$acceso = 'a'.$acceso2;
			}
		if(modificar($perfil,$acces,$acceso,$n_empleado,$conexion)){
		echo "0";
		//				historia($id,$idacceso,$conexion); 
		}else{
		echo "1";
		}
		}





}

	function comprobacion($acces,$acceso,$n_empleado,$conexion){

	$query="SELECT * FROM privilegio WHERE n_empleado = $n_empleado AND acceso = '$acces' AND estado = 0 OR n_empleado = $n_empleado AND acceso = '$acceso' AND estado = 0";
	$resultado= mysqli_query($conexion,$query);
			if($resultado->num_rows==0){
			return true;
			}else{
			return false;	
			}
			$this->conexion->cerrar();
	}


    function modificar($perfil,$acces,$acceso,$n_empleado,$conexion){
		$query = "UPDATE privilegio SET perfil='$perfil',acceso='$acces' WHERE n_empleado = $n_empleado AND acceso = '$acceso' ";
		if (mysqli_query($conexion,$query)) {
			return true;
		}else{
			return false;
		}
		cerrar($conexion);									 	
	}

	function registrar($perfil,$acces,$acceso,$n_empleado,$conexion){

			$query="INSERT INTO privilegio VALUES(0,'$perfil','','$acces','$n_empleado',0)";
				if(mysqli_query($conexion,$query)){
					return true;
				}else{
					return false;
				}
				$this->conexion->cerrar();
				}


	//funciones para guardar en historial cambios de actualización
	// function historia($id,$id_usu,$conexion){
 //        ini_set('date.timezone','America/Mexico_City');
 //        $fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
 //        $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'ACTUALIZA ACCESO',concat(`gstNombr`,' ',`gstApell`, ' PRIVILEGIOS: ' ,(select privilegios from accesos where id_usu = $id_usu), ' USUARIO: ' ,(select usuario from accesos where id_usu = $id_usu)),'$fecha' FROM personal WHERE gstIdper= $id_usu";
 //        if(mysqli_query($conexion,$query)){
 //            return true;
 //        }else{
 //            return false;
 //        }
 //    }

	function cerrar($conexion){
		mysqli_close($conexion);
	}


 ?>


