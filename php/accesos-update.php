<?php 

// $conexion2 = new mysqli('localhost','u683645102_afac','Agencia.SCT2021.','u683645102_reportes');
$conexion2 = new mysqli('localhost','root','','control_de_reportes');
if ($conexion2->connect_error):
echo "Error de Conexión".$conexion2->connect_error;
endif;

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

    if($privilegios=="0"){ echo "3"; }else{		
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

}else if($opcion === 'acceso'){

    $idacceso = $_POST['idAccesos'];
	$id_usu = $_POST['idUser'];
	// $gstNmpld = $_POST['gstNmpld'];
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
    // $privilegios = $_POST['privilegios'];

		if($password != ''){
		    if(acceso($id_usu,$usuario,$password,$idacceso,$conexion)){
				echo "0";
				historia($id,$idacceso,$conexion); 
			}else{
				echo "2";
			}
		}else{
			echo "1";
		}	

}else if($opcion === 'agr_acceso'){

	$id_usu = $_POST['id_usua'];
	$privi_gestor = $_POST['privi_gestor'];
	$privi_lingui = $_POST['privi_lingui'];
	$privi_mesa = $_POST['privi_mesa'];
	$privi_acces = $_POST['privi_acces'];

	if(privi_gestor($id_usu,$privi_gestor,$conexion)){
		echo "0";
		}else{
		echo "1";
		}		

	if($privi_lingui=='x'){

			if(privi_linguiConsult($id_usu,$conexion)){}else{			
			if(privi_linguiUpdate($id_usu,$privi_mesa,$conexion)){
					echo "0";
				}else{
					echo "1";
				}
			}

	}else{	
	
	if(privi_linguiConsult($id_usu,$conexion)){
		if(privi_linguiSave($id_usu,$privi_lingui,$conexion)){
			echo "0";
		}else{
			echo "1";
		}
	}else{
			if(privi_lingui($id_usu,$privi_lingui,$conexion)){
			echo "0";
			}else{
			echo "1";
			}
	}
}

	if($privi_mesa=='x'){


			if(privi_mesaConsult($id_usu,$conexion2)){}else{			
			if(privi_mesaUpdate($id_usu,$privi_mesa,$conexion2)){
					echo "0";
				}else{
					echo "1";
				}
			}


	}else{
			if(privi_mesaConsult($id_usu,$conexion2)){
			
			if(privi_mesaSave($id_usu,$privi_mesa,$conexion2)){
				echo "0";
			}else{
				echo "1";
			}
	}else{
			if(privi_mesa($id_usu,$privi_mesa,$conexion2)){
				echo "0";
			}else{
				echo "1";
			}
		}
	}	

	if($privi_acces=='x'){

			if(privi_accesConsult($id_usu,$conexion)){}else{			
			if(privi_accesUpdate($id_usu,$privi_acces,$conexion)){
					echo "0";
				}else{
					echo "1";
				}
			}
	}else{
			if(privi_accesConsult($id_usu,$conexion)){
			
			if(privi_accesSave($id_usu,$privi_acces,$conexion)){
				echo "0";
			}else{
				echo "1";
			}
	}else{
			// if(privi_acces($id_usu,$privi_mesa,$conexion)){
			// 	echo "0";
			// }else{
			// 	echo "1";
			// }
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
	//ACCESO USUARIO Y CONTRASEÑA
    function acceso($id_usu,$usuario,$password,$idacceso,$conexion){
		$query = "UPDATE accesos SET usuario='$usuario',password='$password' WHERE id_accesos = $idacceso";
		if (mysqli_query($conexion,$query)) {
			return true;
		}else{
			return false;
		}
		//verificar_resultado($resultado);
		cerrar($conexion);									 	
	}

//PRIVILEGIOS GESTOR
	function privi_gestor($id_usu,$privi_gestor,$conexion){
		$query = "UPDATE accesos SET privilegios = '$privi_gestor' WHERE id_usu = $id_usu";
		if (mysqli_query($conexion,$query)) {
			return true;
		}else{
			return false;
		}
		cerrar($conexion);									 	
	}

//PRIVILEGIOS LINGUIS
	function privi_linguiConsult($id_usu,$conexion){
		$query="SELECT * FROM formatoacceso WHERE id_acc = $id_usu AND estado = 0";
		$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
			return true;								 	
		}else{	
			return false;
		}
	}

	function privi_linguiSave($id_usu,$privi_lingui,$conexion){
        ini_set('date.timezone','America/Mexico_City');
        $fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
    	$query = "INSERT INTO formatoacceso VALUES(0,'$privi_lingui',$id_usu,0,'$fecha',0,0);";
        if(mysqli_query($conexion,$query)){
            return true;
        }else{
            return false;
        }
	}

	function privi_lingui($id_usu,$privi_lingui,$conexion){
		$query = "UPDATE formatoacceso SET privilegio = '$privi_lingui' WHERE id_acc = $id_usu";
		if (mysqli_query($conexion,$query)) {
			return true;
		}else{
			return false;
		}
		cerrar($conexion);									 		
	}

	function privi_linguiUpdate($id_usu,$privi_mesa,$conexion){
			$query = "UPDATE formatoacceso SET estado = 1 WHERE id_acc = $id_usu";
			if (mysqli_query($conexion,$query)) {
				return true;
			}else{
				return false;
			}
			cerrar($conexion2);									 					
	}	
//PRIVILEGIOS MESA
	function privi_mesaConsult($id_usu,$conexion2){
			$query="SELECT * FROM tecnico WHERE id_usu = $id_usu AND baja = 0";
			$resultado= mysqli_query($conexion2,$query);
			if($resultado->num_rows==0){
				return true;								 	
			}else{	
				return false;
			}
		}


	function privi_mesaSave($id_usu,$privi_mesa,$conexion2){
	$query = "INSERT INTO tecnico VALUES(0,$id_usu,'usuario','password','$privi_mesa','09:00:00','18:00:00','LAS FLORES',0,'',0);";
    if(mysqli_query($conexion2,$query)){
        return true;
    }else{
        return false;
    }							 		       
	}

	function privi_mesa($id_usu,$privi_mesa,$conexion2){
		$query = "UPDATE tecnico SET privilegios = '$privi_mesa' WHERE id_usu = $id_usu";
		if (mysqli_query($conexion2,$query)) {
			return true;
		}else{
			return false;
		}
		cerrar($conexion2);									 		
	}


	function privi_mesaUpdate($id_usu,$privi_mesa,$conexion2){
		$query = "UPDATE tecnico SET baja = 1 WHERE id_usu = $id_usu";
		if (mysqli_query($conexion2,$query)) {
			return true;
		}else{
			return false;
		}
		cerrar($conexion2);									 				
	}

//PRIVILEGIOS DE ACCESO

	function privi_accesConsult($id_usu,$conexion2){
			$query="SELECT * FROM privilegio WHERE n_empleado = $id_usu AND estado = 0";
			$resultado= mysqli_query($conexion2,$query);
			if($resultado->num_rows==0){
				return true;								 	
			}else{	
				return false;
			}
		}

	function privi_accesSave($id_usu,$privi_acces,$conexion2){
	$query = "INSERT INTO privilegio VALUES(0,'$privi_acces','ACCESOS','ACCESO','$id_usu',0);";
    if(mysqli_query($conexion2,$query)){
        return true;
    }else{
        return false;
    }							 		       
	}

	// function privi_acces($id_usu,$privi_acces,$conexion2){
	// 	$query = "UPDATE tecnico SET privilegios = '$privi_acces' WHERE id_usu = $id_usu";
	// 	if (mysqli_query($conexion2,$query)) {
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// 	cerrar($conexion2);									 		
	// }


	function privi_accesUpdate($id_usu,$privi_acces,$conexion2){
		$query = "DELETE FROM privilegio WHERE modulo = 'ACCESOS' AND n_empleado = $id_usu";
		if (mysqli_query($conexion2,$query)) {
			return true;
		}else{
			return false;
		}
		cerrar($conexion2);									 				
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