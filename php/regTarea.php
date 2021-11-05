<?php
include("../conexion/conexion.php");
session_start();

if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
$id = $_SESSION['usuario']['id_usu'];
}

$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'tareAgr'){

  $idcur = $_POST['idcur']; 
  $titulo1 = $_POST['titulo1'];  
  $descrip1 = $_POST['descrip1'];
  $idsubt = $_POST['idsubt'];
  $fechaA = $_POST['fechaA'];
  $fechaT = $_POST['fechaT'];
  $idcur = $_POST['idcur'];

  if($idsubt==''){
  	$idsubt = 0;
  }
//	accesos($gstIdper,$gstNombr,$gstNmpld,$AgstCargo,$conexion);

	if(Tareas($idcur, $titulo1 ,$descrip1, $idsubt, $fechaA, $fechaT, $conexion)){
		//$realizo = 'ASIGNO AL USUARIO';
		//historial($id,$realizo,$gstIdper,$conexion);
		$valor = conIDtar($conexion);
			echo $valor;
	}else{
		echo 0;
	}

}else if($opcion === 'agrIVA'){

	$idinsp = $_POST['idinsp'];

	if(agrIvas($idinsp,$conexion)){
		echo "1";
	}else{
		echo "0";
	}
}


 function conIDtar($conexion){

$query="SELECT id_tar FROM tareas WHERE estado = 0 ORDER BY id_tar DESC LIMIT 1";
$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
		return '0';
		}else{
			 $res = mysqli_fetch_row($resultado);
			
			  return $res[0];
		}
		$this->conexion->cerrar();
} 


// function accesos($gstIdper,$gstNombr,$gstNmpld,$AgstCargo,$conexion){

// $query="SELECT * FROM accesos WHERE password='$gstNmpld' AND usuario='$gstNombr' AND baja = 0 ";
// 			$resultado= mysqli_query($conexion,$query);
// 			$query="INSERT INTO accesos VALUES(0,'$gstIdper','$gstNombr','$gstNmpld','$AgstCargo',0,0);";
// 		if($resultado->num_rows==0){
// 				if(mysqli_query($conexion,$query)){

// 					return true;
				
// 				}else{

// 					return false;
// 				}
// 				$this->conexion->cerrar();
// 		}else{

// 		}

// }


// function obligatorio($gstIdper,$gstObli,$conexion){
// 	$query="INSERT INTO especialidadcat VALUES(0,'$gstIdper','$gstObli','NO',0);";
// 		if(mysqli_query($conexion,$query)){
// 			return true;
// 		}else{
// 			return false;
// 		}
// 		$this->conexion->cerrar();
// }


function Tareas($idcur, $titulo1 ,$descrip1, $idsubt, $fechaA, $fechaT, $conexion){

	// ini_set('date.timezone','America/Mexico_City');
	// $factual = date('Y').'/'.date('m').'/'.date('d');

	$query="INSERT INTO tareas VALUES(0,'$idcur','$titulo1','$descrip1','$fechaA','$fechaT','$idsubt',0);";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();

}

function agrIvas($idinsp,$conexion){

$query="INSERT INTO tarearealizar(idtarea,idiva,estado) SELECT id_tar,$idinsp,0 FROM tareas ORDER BY id_tar DESC LIMIT 1";
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