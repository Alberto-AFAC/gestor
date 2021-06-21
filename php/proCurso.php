<?php
include("../conexion/conexion.php");

$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'procurso'){
	

//$idcord = $_POST['idcord'];

$id_mstr = $_POST['id_mstr'];
$hcurso = $_POST['hcurso'];
$fcurso = $_POST['fcurso'];
$fechaf = $_POST['fechaf'];
$idinst = $_POST['idinst'];
$sede = $_POST['sede'];
$link = $_POST['link'];
$modalidad = $_POST['modalidad'];
//proCurso($idinsps,$id_mstr,$hcurso,$fcurso,$fechaf,$idinst,$sede,$link, $conexion);

$id = $_POST['idinsps'];
$valor = explode(",", $id);

foreach ($valor as $idinsps) {

	if(proCurso($idinsps,$id_mstr,$hcurso,$fcurso,$fechaf,$idinst,$sede,$modalidad,$link, $conexion))
		{ 
			echo "0";	
		}else{	
			echo "1";	
		}
	// function enviarEmail(){
	// 	$to = "jmondragonescamilla@gmail.com";
	// 	$subject = "NUEVO CURSO PROGRAMADO";
	// 	$headers = "MIME-Version: 1.0" . "\r\n";
	// 	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	// 	$message = "<center><img src='https://www.aeropuertodetoluca.com.mx/en/admin/images/iconos-autoridad/autoridad-aeronautica.png' width='320px;' alt='imagen de cabezera' disabled></center><table width='100%'><br>
	// 	<tr><td bgcolor='#00A7B5' align='center'><span style='font-size: 19px; color: white'>INSCRITO CON EXITO!</span></td></tr>
	// 	<tr><td style='text-align: center; font-size: 18px;'></td></tr>
	// 	<tr><td style='text-align: center; font-size: 18px;'>TIPO: BASICO</td></tr>
	// 	<tr><td style='text-align: center; font-size: 18px;'>FECHA INICIO: ".$fcurso."</td></tr>
	// 	<tr><td style='text-align: center; font-size: 18px;'>HORA: ".$hcurso."</td></tr>
	// 	<tr><td style='text-align: center; font-size: 18px;'>COORDINADOR: </td></tr>
	// 	<tr><td style='text-align: center; font-size: 18px;'>SEDE DEL CURSO: ".$sede."</td></tr>
	// 	<tr><td style='text-align: center; font-size: 18px;'>MODALIDAD: ".$modalidad."</td></tr>
	// 	<tr><td><button></button></td></tr>
	// 	<hr><center>
	// 	<font color='#a1a1a1'>NOTA IMPORTANTE: Este correo se genera automaticamente. Por favor no responda o reenvie correos a de esta cuenta de e-mail.
	// 	</center><hr>
	// 	</table>";
	// 	mail($to, $subject, $message, $headers);


	// }

	}
}else if($opcion === 'actualizar'){

	 $idinsps = $_POST['idinsps'];		
     $nombre = $_POST["nombre"];
	 $apellidos = $_POST['apellidos'];
	 $correo = $_POST['correo'];
	 $idarea = $_POST['id_area'];
	 $puesto = $_POST['puesto'];
	 $unidad = $_POST['unidad'];
		


	if(actualizar($idinsps, $nombre, $apellidos, $correo, $idarea, $puesto,$unidad, $conexion)){
		echo "0";
	}else{
		echo "1";
	}
}else if($opcion === 'participante'){

$id_mstr = $_POST['gstIdlsc'];
$hcurso = $_POST['hrcurs'];
$fcurso = $_POST['finicio'];
$fechaf = $_POST['finalf'];
$idinst = $_POST['idcord'];
$sede = $_POST['sede'];
$link = $_POST['link'];
$modalidad = $_POST['modalidad'];
$idinsps= $_POST['idinsp'];

if(proCurso($idinsps,$id_mstr,$hcurso,$fcurso,$fechaf,$idinst,$sede,$modalidad,$link, $conexion))
		{	echo "0";	}else{	echo "1";	}

}


function proCurso($idinsps,$id_mstr,$hcurso,$fcurso,$fechaf,$idinst,$sede,$modalidad,$link, $conexion){


	$query="SELECT * FROM cursos WHERE idinsp='$idinsps' AND idmstr='$id_mstr' AND idinst='$idinst' AND proceso = 'PENDIENTE' AND estado = 0 ";
			$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){

			$query="INSERT INTO cursos VALUES(0,'$idinsps','$id_mstr','$idinst','$fcurso','$fechaf','$hcurso','$sede','$modalidad','$link','PENDIENTE',0,0,0);";
				if(mysqli_query($conexion,$query)){
					
					return true;
				}
				else{
					return false;
				}
					
	$to = "jmondragonescamilla@gmail.com";
	$subject = "NUEVO CURSO PROGRAMADO";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$message = "<center><img src='https://www.aeropuertodetoluca.com.mx/en/admin/images/iconos-autoridad/autoridad-aeronautica.png' width='320px;' alt='imagen de cabezera' disabled></center><table width='100%'><br>
	<tr><td bgcolor='#00A7B5' align='center'><span style='font-size: 19px; color: white'>INSCRITO CON EXITO!</span></td></tr>
	<tr><td style='text-align: center; font-size: 18px;'></td></tr>
	<tr><td style='text-align: center; font-size: 18px;'>TIPO: BASICO</td></tr>
	<tr><td style='text-align: center; font-size: 18px;'>FECHA INICIO: </td></tr>
	<tr><td style='text-align: center; font-size: 18px;'>HORA: </td></tr>
	<tr><td style='text-align: center; font-size: 18px;'>COORDINADOR: </td></tr>
	<tr><td style='text-align: center; font-size: 18px;'>SEDE DEL CURSO: </td></tr>
	<tr><td style='text-align: center; font-size: 18px;'>MODALIDAD: </td></tr>
	<tr><td><button></button></td></tr>
	<hr><center>
	<font color='#a1a1a1'>NOTA IMPORTANTE: Este correo se genera automaticamente. Por favor no responda o reenvie correos a de esta cuenta de e-mail.
	</center><hr>
	</table>";
	mail($to, $subject, $message, $headers);

				$this->conexion->cerrar();
		}else{

		}
		
	}

function actualizar($idinsp, $nombre, $apellidos, $correo, $idarea, $puesto,$unidad, $conexion){

	$query = "UPDATE inspector SET nombre='$nombre', apellidos='$apellidos', correo='$correo',idarea='$idarea', idpuesto='$puesto', unidad='$unidad'  WHERE id_insp='$idinsp'";
	if(mysqli_query($conexion,$query)){

		return true;

		}else{

			return false;
		}
	cerrar($conexion);
}

/*function eliminar($id_categoria,$conexion){

	$query = "UPDATE categoria SET estado = 0 WHERE id_categoria = '$id_categoria'";
	$resultado = mysqli_query($conexion,$query);
	verificar_resultado($resultado); 
	cerrar($conexion);
}*/




function cerrar($conexion){

	mysqli_close($conexion);

}
?>

