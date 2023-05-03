<?php
include("../conexion/conexion.php");
ini_set('date.timezone','America/Mexico_City');
session_start();
if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
	$idp = $_SESSION['usuario']['id_usu'];
}

$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'agrcurso'){

}else if($opcion === 'actcurso'){

	$idmstr = $_POST['idmstr'];
	$titulo = $_POST['titulo'];
	$tipo=$_POST['tipo'];
	$gstVignc=$_POST['gstVignc'];
	$perfil=$_POST['perfil'];
	$objetivo=$_POST['objetivo'];
	$adjunto=$_POST['adjunto'];
	$duracion=$_POST['duracion'];
	$constancia= $_POST['constancia'];
	$Factual = date('Y').'/'.date('m').'/'.date('d');	

	if(actualizar($idmstr,$titulo,$tipo,$gstVignc,$perfil,$objetivo,$adjunto,$duracion,$Factual,$constancia,$conexion)){
		echo "0";
	}else{
		echo "1";
	}
}else if($opcion === 'eliCurso'){

	$EgstIdlsc = $_POST['EgstIdlsc'];
	if(eliminar($EgstIdlsc,$conexion)){

		eliminaCur($idp,$EgstIdlsc,$conexion);

		echo "0";
	}else{
		echo "1";
	}
}else if($opcion === 'canCurso'){  //SE REPARA26052022 JESSICA SOTO

	$codigos = $_POST['codigos'];

	if(cancelar($codigos,$conexion)){
		echo "0";
		cancelarseman($codigos,$conexion); 
		cancelaconstancia($codigos,$conexion); 
		cancelainstructor($codigos,$conexion);
		cancelareaccion($codigos,$conexion);
		$realizo = 'CANCELO CURSO FOLIO: '.$codigos;
		historiCan($idp,$realizo,$codigos,$conexion);	

	}else{
		echo "1";
	}
}else if($opcion === 'eliInsp'){

	$idInsp = $_POST['idInsp'];
	$perfil = $_POST['perfil'];


	$folio = selecionarCurso($idInsp,$conexion);

	$id_folio = explode(".", $folio);
	$folio = $id_folio[0]; 
	$idper = $id_folio[1]; 
	$instructores = $id_folio[2];

	if(eliminaInsp($idInsp,$conexion)){
		echo "0";

		if($perfil=='CORD'){
			borrarCoordinador($folio,$conexion);
			eliminarInstructor($idper,$folio,$conexion);
			$nuevoInstructores = consultaInstructores($folio,$conexion);
			guardarInstructores($nuevoInstructores,$folio,$conexion);
		}


		if($perfil=='INSTRUCTOR'){

			eliminarInstructor($idper,$folio,$conexion);			
			$nuevoInstructores = consultaInstructores($folio,$conexion);
			guardarInstructores($nuevoInstructores,$folio,$conexion);
		}
//$realizo = 'CANCELO CURSO FOLIO: '.$idInsp;
//historiCan($idp,$realizo,$idInsp,$conexion);	
	}else{
		echo "1";
	}

}else if($opcion === 'agregraInstr'){


	$codigoCurso = $_POST['codigoCurso'];  
	$idinstructor = $_POST['idinstructor'];
	$puesto = $_POST['puesto'];

//echo $codigoCurso;
	$nuevoReg = selecionCurso($codigoCurso,$conexion); 
	$nuevo_reg = explode(".", $nuevoReg);

	$idmstr = $nuevo_reg[0];
	$idcoor = $nuevo_reg[1];
	$fcurso = $nuevo_reg[2];
	$fechaf = $nuevo_reg[3];
	$hcurso = $nuevo_reg[4];
	$sede = $nuevo_reg[5];
	$modalidad = $nuevo_reg[6];
	$link = $nuevo_reg[7];
	$proceso = $nuevo_reg[8];
	$observ = $nuevo_reg[9];
	$evaluacion = $nuevo_reg[10];
	$confirmar = $nuevo_reg[11];
	$justifi = $nuevo_reg[12];
	$codigo = $nuevo_reg[13];
	$fnotif = $nuevo_reg[14];
	$contracur = $nuevo_reg[15];
	$classroom = $nuevo_reg[16];
	$prtcpnt = '';
	$grupos = $nuevo_reg[18];
	$folio = $codigoCurso;


	if(instructor($idinstructor,$codigoCurso,$conexion)){

		$instructornuevo = consultaInstructores($folio,$conexion);
		echo "0";
		anexarInstructon($instructornuevo,$codigoCurso,$conexion);
//$nuevo_reg[19].','.$idinstructor;

		if(registarInstructor($idinstructor,$idmstr,$idcoor,$instructornuevo,$fcurso,$fechaf,$hcurso,$sede,$modalidad,$link,$proceso,$observ,$evaluacion,$confirmar,$justifi,$codigo,$fnotif,$contracur,$classroom,$prtcpnt,$grupos,$conexion)){				
		}

	}else{

		echo "1";

	}

}else if($opcion === 'agregraCoord'){

	$codigoCurso = $_POST['codigoCurso'];  
	$idinstructor = $_POST['idinstructor'];
	$puesto = $_POST['puesto'];
//echo $codigoCurso;
	$nuevoReg = selecionCurso($codigoCurso,$conexion); 
	$nuevo_reg = explode(".", $nuevoReg);
	$idmstr = $nuevo_reg[0];
	$idcoor = $nuevo_reg[1];
	$fcurso = $nuevo_reg[2];
	$fechaf = $nuevo_reg[3];
	$hcurso = $nuevo_reg[4];
	$sede = $nuevo_reg[5];
	$modalidad = $nuevo_reg[6];
	$link = $nuevo_reg[7];
	$proceso = $nuevo_reg[8];
	$observ = $nuevo_reg[9];
	$evaluacion = $nuevo_reg[10];
	$confirmar = $nuevo_reg[11];
	$justifi = $nuevo_reg[12];
	$codigo = $nuevo_reg[13];
	$fnotif = $nuevo_reg[14];
	$contracur = $nuevo_reg[15];
	$classroom = $nuevo_reg[16];
	$prtcpnt = '';
	$grupos = $nuevo_reg[18];
	$instruct = $nuevo_reg[19];
	$coordinadornuevo = $idinstructor;

	if($idcoor==0){

		if(registarCoordinador($idinstructor,$idmstr,$coordinadornuevo,$instruct,$fcurso,$fechaf,$hcurso,$sede,$modalidad,$link,$proceso,$observ,$evaluacion,$confirmar,$justifi,$codigo,$fnotif,$contracur,$classroom,$prtcpnt,$grupos,$conexion)){
			echo "0";
			anexarCoordinador($coordinadornuevo,$codigoCurso,$conexion);	
		}else{
			echo "1";
		}
	}else{
		echo "2";
	}
}

function consultaInstructores($folio,$conexion){
	$query="SELECT group_concat(distinct id_per) FROM instructor WHERE codigoInst = '$folio' AND estado = 0";
	$resultado= mysqli_query($conexion,$query);
	while($resultados = mysqli_fetch_row($resultado)){
		return $resultados[0];
	}
}

function guardarInstructores($nuevoInstructores,$folio,$conexion){
	$query = "UPDATE cursos SET idinst='$nuevoInstructores' WHERE codigo='$folio' AND estado = 0";
	if(mysqli_query($conexion,$query)){

		return true;

	}else{

		return false;
	}
	cerrar($conexion);
}

function actualizar($idmstr,$titulo,$tipo,$gstVignc,$perfil,$objetivo,$adjunto,$duracion,$Factual,$constancia,$conexion){

	$query = "UPDATE listacursos SET titulo='$titulo', tipo='$tipo', gstVignc='$gstVignc',perfil='$perfil', objetivo='$objetivo', temario='$adjunto', duracion='$duracion',constancia='$constancia',fAlta='$Factual'  WHERE idmstr='$idmstr'";
	if(mysqli_query($conexion,$query)){

		return true;

	}else{

		return false;
	}
	cerrar($conexion);
}

function eliminar($EgstIdlsc,$conexion){

	$query = "UPDATE listacursos SET estado='1' WHERE gstIdlsc='$EgstIdlsc'";
	if(mysqli_query($conexion,$query)){

		return true;

	}else{

		return false;
	}
	cerrar($conexion);
}
//---------------------------------------------------------CANCELAR CURSO
function cancelar($codigos,$conexion){

	$query = "UPDATE cursos SET proceso='CANCELADO',estado=1 WHERE codigo='$codigos'";
	if(mysqli_query($conexion,$query)){

		return true;

	}else{

		return false;
	}
	cerrar($conexion);
}

function cancelarseman($codigos,$conexion){

	$query = "UPDATE semanal SET estado=1 WHERE id_curso='$codigos'";
	if(mysqli_query($conexion,$query)){

		return true;

	}else{

		return false;
	}
	cerrar($conexion);
}

function cancelaconstancia($codigos,$conexion){
	$query = "UPDATE constancias SET estado_cer=1 WHERE id_codigocurso='$codigos'";
	if(mysqli_query($conexion,$query)){

		return true;

	}else{

		return false;
	}
	cerrar($conexion);
}

function cancelainstructor($codigos,$conexion){
	$query = "UPDATE instructor SET estado=1 WHERE codigoInst='$codigos'";
	if(mysqli_query($conexion,$query)){

		return true;

	}else{

		return false;
	}
	cerrar($conexion);
}

function cancelareaccion($codigos,$conexion){
	$query = "UPDATE reaccion SET estado=1 WHERE id_instruct='$codigos'";
	if(mysqli_query($conexion,$query)){

		return true;

	}else{

		return false;
	}
	cerrar($conexion);
}
//-----------------------------------------------------FIN CANCELAR CURSO
function eliminaCur($idp,$EgstIdlsc,$conexion){
	ini_set('date.timezone','America/Mexico_City');
	$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');	

	$query = "INSERT INTO historial(id_usu,proceso,registro,fecha) 
	SELECT $idp,concat('ELIMINO REG.',$EgstIdlsc,' CURSO'),concat(gstTitlo),'$fecha' 
	FROM listacursos WHERE gstIdlsc = '$EgstIdlsc'";

	if(mysqli_query($conexion,$query)){
		return true;
	}else{
		return false;
	}
}

function historiCan($idp,$realizo,$codigos,$conexion){
	ini_set('date.timezone','America/Mexico_City');
	$fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s');
	$query = "INSERT INTO historial(id_usu,proceso,registro,fecha) 
	SELECT $idp,'$realizo',gstTitlo,'$fecha' FROM listacursos 
	INNER JOIN cursos ON 	idmstr = gstIdlsc
	WHERE `codigo` = '$codigos' AND cursos.estado = 1 LIMIT 1";			  
	if(mysqli_query($conexion,$query)){
		return true;
	}else{
		return false;
	}
}

function eliminaInsp($idInsp,$conexion){
	$query="DELETE FROM cursos WHERE id_curso = $idInsp";
	if(mysqli_query($conexion,$query)){
		return true;
	}else{
		return false;
	}
	$this->conexion->cerrar();
}

function borrarCoordinador($folio,$conexion){
	$query = "UPDATE cursos SET idcoor=0 WHERE codigo='$folio' AND estado = 0";
	if(mysqli_query($conexion,$query)){
		return true;
	}else{
		return false;
	}
	cerrar($conexion);	
}

function selecionarCurso($idInsp,$conexion){
	$query="SELECT codigo,idinsp,idinst FROM cursos WHERE id_curso = $idInsp";
	$resultado= mysqli_query($conexion,$query);

	while($resultados = mysqli_fetch_row($resultado)){
		return $resultados[0].'.'.$resultados[1].'.'.$resultados[2];
	}
	$this->conexion->cerrar();		
}

function eliminarInstructor($idper,$folio,$conexion){
	$query = "UPDATE instructor SET estado=1 WHERE id_per=$idper AND codigoInst='$folio'";
	if(mysqli_query($conexion,$query)){
		return true;
	}else{
		return false;
	}
	cerrar($conexion);				
}

function selecionCurso($codigoCurso,$conexion){
	$query="SELECT idmstr,idcoor,fcurso,fechaf,hcurso,sede,modalidad,link,proceso,observ,evaluacion,confirmar,justifi,codigo,fnotif,contracur,classroom,prtcpnt,grupo,idinst
	FROM cursos WHERE codigo = '$codigoCurso'";
	$resultado= mysqli_query($conexion,$query);
	while($resultados = mysqli_fetch_row($resultado)){
		return 
		$resultados[0].'.'.$resultados[1].'.'.$resultados[2].'.'.
		$resultados[3].'.'.$resultados[4].'.'.$resultados[5].'.'.
		$resultados[6].'.'.$resultados[7].'.'.$resultados[8].'.'.
		$resultados[9].'.'.$resultados[10].'.'.$resultados[11].'.'.
		$resultados[12].'.'.$resultados[13].'.'.$resultados[14].'.'.
		$resultados[15].'.'.$resultados[16].'.'.$resultados[17].'.'.
		$resultados[18].'.'.$resultados[19];
	}
}			

function registarInstructor($idinstructor,$idmstr,$idcoor,$instructornuevo,$fcurso,$fechaf,$hcurso,$sede,$modalidad,$link,$proceso,$observ,$evaluacion,$confirmar,$justifi,$codigo,$fnotif,$contracur,$classroom,$prtcpnt,$grupos,$conexion){
	$query="SELECT * FROM cursos WHERE idinsp='$idinstructor' AND codigo='$codigo' AND estado = 0 ";
	$resultado= mysqli_query($conexion,$query);
	if($resultado->num_rows==0){
		$query="INSERT INTO cursos  VALUES(0,$idinstructor,$idmstr,$idcoor,'$instructornuevo','$fcurso','$fechaf','$hcurso','$sede','$modalidad','$link','$proceso','$observ','$evaluacion','$confirmar','$justifi','$codigo','$fnotif','$contracur','$classroom','$prtcpnt','$grupos','0')";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();	
	}else{}
}

function instructor($idinstructor,$codigoCurso,$conexion){
	$query="SELECT * FROM instructor WHERE id_per='$idinstructor' AND codigoInst='$codigoCurso' AND estado = 0 ";
	$resultado= mysqli_query($conexion,$query);
	if($resultado->num_rows==0){
		$query="INSERT INTO instructor VALUES(0,'$idinstructor','$codigoCurso',0)";
		if(mysqli_query($conexion,$query)){
			return true;
		}
		else{
			return false;
		}
	}else{
	}	
}	

function anexarInstructon($instructornuevo,$codigoCurso,$conexion){
	$query = "UPDATE cursos SET idinst='$instructornuevo' WHERE codigo='$codigoCurso'";
	if(mysqli_query($conexion,$query)){
		return true;
	}else{
		return false;
	}
	cerrar($conexion);
}

function registarCoordinador($idinstructor,$idmstr,$coordinadornuevo,$instruct,$fcurso,$fechaf,$hcurso,$sede,$modalidad,$link,$proceso,$observ,$evaluacion,$confirmar,$justifi,$codigo,$fnotif,$contracur,$classroom,$prtcpnt,$grupos,$conexion){
	$query="SELECT * FROM cursos WHERE idinsp='$idinstructor' AND codigo='$codigo' AND estado = 0 ";
	$resultado= mysqli_query($conexion,$query);
	if($resultado->num_rows==0){

		$query="INSERT INTO cursos  VALUES(0,$idinstructor,$idmstr,$coordinadornuevo,'$instruct','$fcurso','$fechaf','$hcurso','$sede','$modalidad','$link','$proceso','$observ','$evaluacion','$confirmar','$justifi','$codigo','$fnotif','$contracur','$classroom','$prtcpnt','$grupos','0')";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();	
	}else{	}
}

function anexarCoordinador($coordinadornuevo,$codigoCurso,$conexion){
	$query = "UPDATE cursos SET idcoor='$coordinadornuevo' WHERE codigo='$codigoCurso'";
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

