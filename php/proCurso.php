<?php
include("../conexion/conexion.php");
session_start();

if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
$idp = $_SESSION['usuario']['id_usu'];
}

$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'procurso'){

$n = consulta($conexion);

//$idcord = $_POST['idcord'];
$result = $n + 1;
$codigo = 'FO'.$result;
$id_mstr = $_POST['id_mstr'];
$hcurso = $_POST['hcurso'];
$fcurso = $_POST['fcurso'];
$fechaf = $_POST['fechaf'];
$idinst = $_POST['idinst'];
$sede = $_POST['sede'];
$link = $_POST['link'];
$contracceso = $_POST['contracceso'];
$modalidad = $_POST['modalidad'];

//proCurso($idinsps,$id_mstr,$hcurso,$fcurso,$fechaf,$idinst,$sede,$link, $conexion);

$id = $_POST['idinsps'].','.$idinst;

$valor = explode(",", $id);
$val = count($valor);
$n = 0;
foreach ($valor as $idinsps) {
	$n++;
if(proCurso($idinsps,$id_mstr,$idinst,$fcurso,$fechaf,$hcurso,$sede,$modalidad,$link,$codigo,$contracceso, $conexion))
		{ 
			echo "0";	
			if($n==1){
			$realizo = 'PROGRAMO CURSO ('.$val.' PART.) FOLIO: '.$codigo;
			historiCur($idp,$realizo,$id_mstr,$conexion);				
			}

		}else{	
			echo "1";	
		}

		contancia($idinsps,$codigo, $conexion);

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
$fcursos = $_POST['finicio'];
$fechafs = $_POST['finalf'];
$idinst = $_POST['idcord'];
$sede = $_POST['sede'];
$link = $_POST['link'];
$modalidad = $_POST['modalidad'];
$idinsps= $_POST['idinsp'];
$codigo = $_POST['acodigos'];
$contracceso = $_POST['contracur'];

    $date = new DateTime($fcursos);
    $date = $date->format('Y-m-d');
    $fcurso = $date;

    $dates = new DateTime($fechafs);
    $dates = $dates->format('Y-m-d');
    $fechaf = $dates;


contancia($idinsps,$codigo, $conexion);
if(proCurso($idinsps,$id_mstr,$idinst,$fcurso,$fechaf,$hcurso,$sede,$modalidad,$link,$codigo,$contracceso, $conexion))
		{	

			$realizo = 'AGREGO AL CURSO (1 PART.) FOLIO: '.$codigo;
			historiCur($idp,$realizo,$id_mstr,$conexion);	
			echo "0";	

		}else{	echo "1";	}

//ACTUALIZAR EVALUACIÓN
}else if($opcion === 'actualizarevalu'){ 

	$evaluacion = $_POST['evaluacion'];
	$idinsp = $_POST['idinsp'];	
	$id_curso = $_POST['id_curso'];	

	if(actualizarevalu($idinsp, $id_curso, $evaluacion, $conexion)){	
		echo "0";	
	}else{	
		echo "1";	}
}else if($opcion === 'finalizac'){

$codigo = $_POST['codigo'];

if(finalizac($codigo,$conexion)){
	echo "0";
		$realizo = 'FINALIZO CURSO FOLIO: '.$codigo;
		historiCan($idp,$realizo,$codigo,$conexion);	
}else{
	echo "1";
}

}else if($opcion === 'evaluaciones'){

$valor = $_POST['array1'];
$varray1 = json_decode($valor, true);
$valor = count($varray1);

$array2 = $_POST['array2'];
$array2 = json_decode($array2, true);

for($i=0; $i<$valor; $i++){

$idcurs = $varray1[$i]["idperon"];

if($idcurs==''){}else{	$evaluacion = $array2[$i]["evaluacion"];

if($evaluacion!=''){	$fechaev = $_POST['array3']; 	}else{	$evaluacion = '0';	$fechaev = '0000-00-00';	}

if(evaluarinspector($idcurs,$evaluacion,$fechaev,$conexion)){	echo "0";	}else{	echo "1";	}

		}
	}
}else if($opcion === 'cursoAct'){

	$codigo = $_POST['codigo'];
	$fcurso = $_POST['fcurso'];
	$hcurso = $_POST['hcurso'];
	$fechaf = $_POST['fechaf'];
	$sede = $_POST['sede'];
	$modalidads = $_POST['modalidads'];
	$linkcur = $_POST['linkcur'];
	$contracur = $_POST['contracur'];

	if(cursoActualizar($codigo,$fcurso,$fechaf,$hcurso,$sede,$modalidads,$linkcur,$contracur,$conexion))
	{	
		echo "0";		
		$realizo = 'ACTUALIZO CURSO FOLIO: '.$codigo;
		historiCan($idp,$realizo,$codigo,$conexion);	
	}else{ echo "1";	}	
}

//CONTEO DE CURSO

function consulta($conexion){
$query = "SELECT COUNT(*) as prtcpnts FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE cursos.estado = 0 GROUP by cursos.codigo";
	$resultado = mysqli_query($conexion,$query);

	$n=0;
	while ( $resul = mysqli_fetch_row($resultado) ) {
	 	$n++;
	 } 
	 return $n;
}


function proCurso($idinsps,$id_mstr,$idinst,$fcurso,$fechaf,$hcurso,$sede,$modalidad,$link,$codigo,$contracceso, $conexion){
	$query="SELECT * FROM cursos WHERE idinsp='$idinsps' AND codigo='$codigo' AND proceso = 'PENDIENTE' AND estado = 0 ";
			$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){

			$query="INSERT INTO cursos VALUES(0,'$idinsps','$id_mstr','$idinst','$fcurso','$fechaf','$hcurso','$sede','$modalidad','$link','PENDIENTE',0,0,'CONFIRMAR',0,'$codigo',0,'$contracceso',0);";
				if(mysqli_query($conexion,$query)){
					
					return true;
				}
				else{
					return false;
				}
				$this->conexion->cerrar();
		}else{
				}		
					}



function contancia($idinsps,$codigo,$conexion){

			$query="INSERT INTO constancias VALUES(0,$idinsps,'$codigo','','','','','','','',0,0);";
				if(mysqli_query($conexion,$query)){
					
					return true;
				}
				else{
					return false;
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
//actualia evaluación el curso

function actualizarevalu($idinsp, $id_curso, $evaluacion, $conexion){

	$query="UPDATE cursos SET evaluacion = '$evaluacion' WHERE idinsp='$idinsp' AND id_curso='$id_curso'";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		cerrar($conexion);
	}
//FINALIZA CURSO
function finalizac($codigo,$conexion){

	$query="UPDATE cursos SET proceso = 'FINALIZADO' WHERE codigo = '$codigo' AND estado=0";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		cerrar($conexion);
	}	
//EVALUAR INSPECTOR CON FECHA 
	function evaluarinspector($idcurs,$evaluacion,$fechaev,$conexion){

	$query="UPDATE cursos SET evaluacion = '$evaluacion',fnotif='$fechaev' WHERE id_curso='$idcurs'";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		cerrar($conexion);
	}

	function cursoActualizar($codigo,$fcurso,$fechaf,$hcurso,$sede,$modalidads,$linkcur,$contracur,$conexion){

	$query="UPDATE cursos 
			SET 
			fcurso='$fcurso',
			fechaf='$fechaf',
			hcurso='$hcurso',
			sede='$sede',
			modalidad='$modalidads',
			link='$linkcur',
			contracur='$contracur' 
			WHERE codigo='$codigo'";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		cerrar($conexion);

	}

// fin actualia evaluación el curso
function enviarCorreo($idinsps,$id_mstr,$hcurso,$fcurso,$fechaf,$idinst,$sede,$modalidad,$link, $conexion){
						$query = "SELECT gstNombr,gstApell,gstCinst, gstCorro, gstTipo, modalidad, gstCargo, link, fcurso FROM personal INNER JOIN cursos	ON cursos.idinsp = personal.gstIdper
					INNER JOIN listacursos ON cursos.idmstr = listacursos.gstIdlsc WHERE personal.gstIdper = $idinsps AND cursos.estado = 0";
		$resultado= mysqli_query($conexion,$query);
		$fila = mysqli_fetch_assoc($resultado);

		$nombre = $fila['gstNombr'];
		$correo = $fila['gstCorro'];
		$link = $fila['link'];
		$modalidad = $fila['modalidad'];	
		$tipoCurso = $fila['gstTipo'];	
		$cargo = $fila['gstCargo'];
		$apellido = $fila['gstApell'];
		$fcurso   = date("d-m-Y");
		
		
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "tls";
		$mail->CharSet = "Content-Type: text/html; charset=utf-8";
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587;
		$mail->Username ='jmondragonescamilla@gmail.com';
		$mail->Password = 'ELVIS_wolf97';

		$mail->AddAddress('jmondragonescamilla@gmail.com');
		$mail->Subject = "NUEVO CURSO PROGRAMADO";
		$msg = "<center><img src='https://www.aeropuertodetoluca.com.mx/en/admin/images/iconos-autoridad/autoridad-aeronautica.png' width='320px;' alt='imagen de cabezera' disabled></center><table width='100%'><br>
			<tr><td bgcolor='#00A7B5' align='center'><span style='font-size: 19px; color: white'>INSCRITO CON EXITO!</span></td></tr>
			<tr><td style='text-align: center; font-size: 15px;'>Folio: ".$idinsps."</td></tr>
			<tr><td style='text-align: center; font-size: 15px;'>Nombre del participante: ".$nombre." ".$apellido."</td></tr>
			<tr><td style='text-align: center; font-size: 15px;'>Tipo de curso: ".$tipoCurso."</td></tr>
			<tr><td style='text-align: center; font-size: 15px;'>Fecha Inicio: ".$fcurso."</td></tr>
			<tr><td style='text-align: center; font-size: 15px;'>Hora: ".$hcurso." Hrs</td></tr>
			<tr><td style='text-align: center; font-size: 15px;'>Cargo: ".$cargo."</td></tr>
			<tr><td style='text-align: center; font-size: 15px;'>Sede del curso: ".$sede."</td></tr>
			<tr><td style='text-align: center; font-size: 15px;'>Modalidad: ".$modalidad."</td></tr>
			<hr><center>
			<font color='#a1a1a1'>NOTA IMPORTANTE: Este correo se genera automaticamente. Por favor no responda o reenvie correos a de esta cuenta de e-mail.
			</center><hr>
			</table>";
		$mail->MsgHTML($msg);
		$mail->send();
}


	function historiCur($idp,$realizo,$id_mstr,$conexion){
	ini_set('date.timezone','America/Mexico_City');
	$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');
	$query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $idp,'$realizo',concat(gstTitlo),'$fecha' FROM listacursos WHERE `gstIdlsc` = $id_mstr AND estado = 0";
	if(mysqli_query($conexion,$query)){
	return true;
	}else{
	return false;
	}
	}

	function historiCan($idp,$realizo,$codigo,$conexion){
	ini_set('date.timezone','America/Mexico_City');
	$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');
	$query = "INSERT INTO historial(id_usu,proceso,registro,fecha) 
			  SELECT $idp,'$realizo',gstTitlo,'$fecha' FROM listacursos 
			  INNER JOIN cursos ON 	idmstr = gstIdlsc
			  WHERE `codigo` = '$codigo' AND cursos.estado = 0 LIMIT 1";			  
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


