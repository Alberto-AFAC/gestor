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

$idcord = $_POST['idcord'];//Coordinador
$idInstr = $_POST['idInstru'];//Instructor
$conteo = explode(",", $idInstr);	
$ttal = count($conteo);

$sede = $_POST['sede'];
$link = $_POST['link'];
$contracceso = $_POST['contracceso'];
$modalidad = $_POST['modalidad'];
$classroom = $_POST['classroom'];

$fcurso = $_POST['fcurso'];
$fechaf = $_POST['fechaf'];

$perid = $_POST['perid'];

$id = $_POST['idinsps'].','.$idcord;

$valor = explode(",", $id);
$val = count($valor);
$n = 0;
$var= 0;
$enc = 0;

//se resta los instructores 
$resta = $val - $ttal; 
	
//  foreach ($valor as $idinsps) {

// if(encurso($fcurso,$fechaf,$idinsps,$conexion)){
//   $enc = encurso($fcurso,$fechaf,$idinsps,$conexion);

//  	echo $enc;


// }else{
//  	$var++;

// }
// }

$var;

//if($val==$var){
foreach ($valor as $idinsps) {
	$n++;
// $varY = 'HAY';

//incrmento sea menor que el total de parcipantes
	if($n < $resta){
		$part = 'SI';
	}else{
		$part = '';	
	}

if(proCurso($idinsps,$id_mstr,$idcord,$idInstr,$fcurso,$fechaf,$hcurso,$sede,$modalidad,$link,$codigo,$contracceso,$classroom,$part,$conexion))
		{ 
				if($n==$ttal){
				$Instruc = explode(",", $idInstr);
				foreach ($Instruc as $idper) {
				instructor($idper,$codigo,$conexion);
				}
			}
		echo "0";	
		if($n==1){
		$realizo = 'PROGRAMO CURSO ('.$val.' PART.) FOLIO: '.$codigo;
		historiCur($idp,$realizo,$id_mstr,$conexion);				
		}

		}else{	
			echo "1";	
		}
		contancia($idinsps,$codigo, $conexion);
		semanal($perid,$codigo,$fcurso,$fechaf,$hcurso,$conexion);
	}
//}



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
$idcord = $_POST['idcord'];
$sede = $_POST['sede'];
$link = $_POST['link'];
$modalidad = $_POST['modalidad'];
$idinsps= $_POST['idinsp'];
$codigo = $_POST['acodigos'];
$contracceso = $_POST['contracur'];
$classroom = $_POST['classroom'];
$idInstr = $_POST['idntrc'];
$part = 'SI';


$yi = substr($fcursos,6,4);	$mi = substr($fcursos,3,2);	$di = substr($fcursos,0,2);
$fcurso = $yi.'-'.$mi.'-'.$di;

$yf = substr($fechafs,6,4);	$mf = substr($fechafs,3,2);	$df = substr($fechafs,0,2);
$fechaf = $yf.'-'.$mf.'-'.$df;


if(proCurso($idinsps,$id_mstr,$idcord,$idInstr,$fcurso,$fechaf,$hcurso,$sede,$modalidad,$link,$codigo,$contracceso,$classroom,$part,$conexion))

// proCurso($idinsps,$id_mstr,$idcord,$idInstr,$fcurso,$fechaf,$hcurso,$sede,$modalidad,$link,$codigo,$contracceso,$classroom, $conexion)

		{	

			contancia($idinsps,$codigo, $conexion);
			$realizo = 'AGREGO AL CURSO (1 PART.) FOLIO: '.$codigo;
			historiCur($idp,$realizo,$id_mstr,$conexion);	
			echo "0";	

		}else{	echo "1";	}

//ACTUALIZAR EVALUACIÓN
}else if($opcion === 'actualizarevalu'){ 

	$evaluacion = $_POST['evaluacion'];
	$idinsp = $_POST['idinsp'];	
	$id_curso = $_POST['id_curso'];	
	$fechaev = $_POST['fechaev'];

	if(actualizarevalu($idinsp, $id_curso, $evaluacion,$fechaev, $conexion)){	
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
	$classromcur = $_POST['classromcur'];

	$reprogramar = $_POST['reprogramar'];

	$valor = $_POST['array1'];
	$varray1 = json_decode($valor, true);
	$valor = count($varray1);

	$array2 = $_POST['array2'];
	$array2 = json_decode($array2, true);

	$array3 = $_POST['array3'];
	$array3 = json_decode($array3, true);

	$hora_fin = $_POST['hora_fin'];

	for($i=0; $i<$valor; $i++){

	$dias = $varray1[$i]["diasr"];
	$validar = $varray1[$i]["idias"];
	$mes = $array2[$i]["mes"];
	$anio = $array3[$i]["anio"];

	  if($validar==1){ $valida = 'SI'; }else{ $valida = 'NO'; } 


	if(semanalAct($codigo,$dias,$valida,$mes,$anio,$fcurso,$fechaf,$hcurso,$hora_fin,$conexion)){	

		if($i==1){
	if(cursoActualizar($codigo,$fcurso,$fechaf,$hcurso,$sede,$modalidads,$linkcur,$contracur,$classromcur,$conexion))
		{	
		reprogramar($codigo,$reprogramar,$conexion);
		echo "0";		
		$realizo = 'ACTUALIZO CURSO FOLIO: '.$codigo;
		historiCan($idp,$realizo,$codigo,$conexion);	
		}else{	echo "1";	}
	}

}else{	echo "1";	}
	  }



}else if($opcion === 'PDF'){

	 $pdf = $_POST['v'];
 	if(descPDF($pdf,$conexion)){echo "0";}else{echo "1";}
}else if($opcion === 'confasiten'){

	$idperson = $_POST['idperson'];

	if (siasistio($idperson,$conexion)){
		echo "0";
		$realizo = 'VALIDA ASISTENCIA';
	   histasis($idp,$idperson,$realizo,$conexion);
	}else{
		echo "1";
	}
}else if($opcion === 'confnoasiste'){

	$idperson = $_POST['idperson'];

	if (noasistio($idperson,$conexion)){
		echo "0";
		$realizo = 'VALIDA INASISTENCIA';
	    histasis($idp,$idperson,$realizo,$conexion);
	}else{
		echo "1";
	}
}





function encurso($fcurso,$fechaf,$idinsps,$conexion){

$sql = "SELECT gstIdper,gstNombr,gstApell FROM cursos 
INNER JOIN personal ON idinsp = personal.gstIdper WHERE proceso = 'PENDIENTE' AND idinsp = $idinsps ";        
$person = mysqli_query($conexion,$sql);
while ($per = mysqli_fetch_row($person)) {

$query3 = "SELECT gstIdper,gstNombr,gstApell FROM cursos 
INNER JOIN personal ON idinsp = personal.gstIdper 
WHERE '$fcurso' > fechaf AND idinsp = $idinsps";
// '2021-11-24' > fcurso AND fechaf < '2021-11-27'

$resultado = mysqli_query($conexion, $query3);
if($curs = mysqli_fetch_row($resultado)){ 

return false;
//echo '<br>'.$enCurso = '0';

}else{
return $per[1].' '.$per[2].',';
}
}
}
//CONTEO DE CURSO
//codigo != 'X'
function consulta($conexion){
// SELECT COUNT(*) as prtcpnts FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE cursos.estado = 0 OR cursos.estado = 1 GROUP by cursos.codigo
$query = "SELECT COUNT(*) as prtcpnts FROM cursos WHERE cursos.estado = 0 OR cursos.estado = 1 GROUP by cursos.codigo";
	$resultado = mysqli_query($conexion,$query);

	$n=0;
	while ( $resul = mysqli_fetch_row($resultado) ) {
	 	$n++;
	 } 
	 return $n;
}

function siasistio($idperson,$conexion){
	// SELECT COUNT(*) as prtcpnts FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE cursos.estado = 0 OR cursos.estado = 1 GROUP by cursos.codigo
	$query = "UPDATE cursos SET confirmar='CONFIRMADO' WHERE id_curso='$idperson'";
	if(mysqli_query($conexion,$query)){
        return true;
    }else{
        return false;
    }
}

function noasistio($idperson,$conexion){
	// SELECT COUNT(*) as prtcpnts FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE cursos.estado = 0 OR cursos.estado = 1 GROUP by cursos.codigo
	$query = "UPDATE cursos SET confirmar='OTROS', justifi='NO ASISTIÓ' WHERE id_curso='$idperson'";
	if(mysqli_query($conexion,$query)){
        return true;
    }else{
        return false;
    }
}

function proCurso($idinsps,$id_mstr,$idcord,$idInstr,$fcurso,$fechaf,$hcurso,$sede,$modalidad,$link,$codigo,$contracceso,$classroom,$part,$conexion){
	$query="SELECT * FROM cursos WHERE idinsp='$idinsps' AND codigo='$codigo' AND proceso = 'PENDIENTE' AND estado = 0 ";
			$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){

$query="INSERT INTO cursos VALUES(0,'$idinsps','$id_mstr','$idcord','$idInstr','$fcurso','$fechaf','$hcurso','$sede','$modalidad','$link','PENDIENTE',0,'NULL','CONFIRMAR',0,'$codigo',0,'$contracceso','$classroom','$part',0);";
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


function instructor($idper,$codigo,$conexion){

	$query="INSERT INTO instructor VALUES(0,'$idper','$codigo',0)";
	if(mysqli_query($conexion,$query)){
		
		return true;
	}
	else{
		return false;
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

function actualizarevalu($idinsp, $id_curso, $evaluacion,$fechaev,$conexion){

	$query="UPDATE cursos SET evaluacion = '$evaluacion', fnotif = '$fechaev' WHERE idinsp='$idinsp' AND id_curso='$id_curso'";
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

	function cursoActualizar($codigo,$fcurso,$fechaf,$hcurso,$sede,$modalidads,$linkcur,$contracur,$classromcur,$conexion){

	$query="UPDATE cursos 
			SET 
			fcurso='$fcurso',
			fechaf='$fechaf',
			hcurso='$hcurso',
			sede='$sede',
			modalidad='$modalidads',
			link='$linkcur',
			contracur='$contracur',
			classroom='$classromcur'
			WHERE codigo='$codigo'";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		cerrar($conexion);

	}

	function descPDF($pdf,$conexion){

	$query="UPDATE constancias SET copias='1' WHERE id='$pdf'";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		cerrar($conexion);

	}
// fin actualia evaluación el curso
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

	function histasis($idp,$idperson,$realizo,$conexion){
		ini_set('date.timezone','America/Mexico_City');
		$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');
		$query = "INSERT INTO historial VALUES(0,$idp,'$realizo',concat('PARTICIPANTE:',(select p.gstNombr from personal p, cursos c where c.id_curso  = '$idperson' and c.idinsp=p.gstIdper),' ',(select p.gstApell from personal p, cursos c where c.id_curso  = '$idperson' and c.idinsp=p.gstIdper),' FOLIO DEL CURSO:',(select codigo from cursos  where id_curso  = '$idperson')) ,'$fecha')";			  
		if(mysqli_query($conexion,$query)){
		return true;
		}else{
		return false;
		}
	}

	function reprogramar($codigo,$reprogramar,$conexion){

		$query="INSERT INTO reprogramados VALUES(0,'$codigo',$reprogramar,0)";
			if(mysqli_query($conexion,$query)){
				
				return true;
			}
			else{
				return false;
			}				
	}

function semanal($perid,$codigo,$fcurso,$fechaf,$hcurso,$conexion){

	$query="UPDATE semanal SET id_curso='$codigo' WHERE id_per = '$perid' AND fec_inico = '$fcurso' AND fec_fin = '$fechaf' AND hora_ini = '$hcurso'";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		cerrar($conexion);
}

function semanalAct($codigo,$dias,$valida,$mes,$anio,$fcurso,$fechaf,$hcurso,$hora_fin,$conexion){

	$query="UPDATE semanal SET hora_ini = '$hcurso', hora_fin = '$hora_fin',habil='$valida' WHERE id_curso = '$codigo' AND dia_semana = '$dias' AND num_mes = '$mes' AND anio = '$anio' AND fec_inico = '$fcurso' AND fec_fin = '$fechaf'";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		cerrar($conexion);	

}
	
function cerrar($conexion){

	mysqli_close($conexion);

}
?> 


