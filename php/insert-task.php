<?php 
include ("../conexion/conexion.php");

	$opcion = $_POST["opcion"];
	

if($opcion === 'modificar'){
    $id_tare = $_POST['id_tare'];
    
    $entrega = $_POST['entrega'];
		if($entrega != '' ){
		if(modificar($id_tare, $entrega,$conexion)){
					echo "0";
				}else{
						echo "2";
				 		}
							}else{
								echo "1";
								}

	}

	function modificar($id_tare, $entrega,$conexion){
		$query = "UPDATE tarearealizar SET entrega='$entrega' WHERE id_tare = $id_tare";
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