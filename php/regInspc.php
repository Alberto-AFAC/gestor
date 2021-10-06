<?php
include("../conexion/conexion.php");

 session_start();
if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
$id = $_SESSION['usuario']['id_usu'];
}else{
$id = '929';
}


$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'registrar'){
	$gstNombr = $_POST['gstNombr'];
	$gstApell = $_POST['gstApell'];
	$gstNmpld = $_POST['gstNmpld'];
	
	if(comprobacion($gstNombr,$gstApell,$gstNmpld,$conexion)){
	
	$gstLunac = $_POST['gstLunac'];
	$gstFenac = $_POST['gstFenac'];
	$gstStcvl = $_POST['gstStcvl'];
	$gstCurp  = $_POST['gstCurp'];
	$gstRfc   = $_POST['gstRfc'];
	$gstNpspr = $_POST['gstNpspr'];
	$gstPsvig = $_POST['gstPsvig'];
	$gstVisa  = $_POST['gstVisa'];
	$gstVignt = $_POST['gstVignt'];
	$gstNucrt = $_POST['gstNucrt'];
	$gstCalle = $_POST['gstCalle'];
	$gstNumro = $_POST['gstNumro'];
	$gstClnia = $_POST['gstClnia'];
	$gstCpstl = $_POST['gstCpstl'];
	$gstCiuda = $_POST['gstCiuda'];
	$gstStado = $_POST['gstStado'];
	$gstCasa  = $_POST['gstCasa'];
	$gstClulr = $_POST['gstClulr'];
	$gstExTel = $_POST['gstExTel'];
	
	$gstIdpst = $_POST['gstIdpst'];

	$gstAreID = $_POST['gstAreID'];
	$gstPstID = $_POST['gstPstID'];
	$gstSpcID = $_POST['gstSpcID'];
	$gstSigID = $_POST['gstSigID'];

	$gstCargo = $_POST['gstCargo'];
	$gstIDCat = $_POST['gstIDCat'];
	$gstIDSub = $_POST['gstIDSub'];
	$gstCorro = $_POST['gstCorro'];
	$gstCinst = $_POST['gstCinst'];
	$gstFeing = $_POST['gstFeing'];
	$gstIDara = $_POST['gstIDara'];
	$gstAcReg = $_POST['gstAcReg'];
	$gstIDuni = $_POST['gstIDuni'];
	
	if(registrar($gstNombr,$gstApell,$gstLunac,$gstFenac,$gstStcvl,$gstCurp,$gstRfc,$gstNpspr,$gstPsvig,$gstVisa,$gstVignt,$gstNucrt,$gstCalle,$gstNumro,$gstClnia,$gstCpstl,$gstCiuda,$gstStado,$gstCasa,$gstClulr,$gstExTel,$gstNmpld,$gstIdpst,$gstAreID,$gstPstID,$gstSpcID,$gstSigID,$gstCargo,$gstIDCat,$gstIDSub,$gstCorro,$gstCinst,$gstFeing,$gstIDara,$gstAcReg,$gstIDuni,$conexion)){
		echo "0";

		historial($id,$conexion);

	}else{
		echo "1";
	}

	}else{
		echo "2";
	}

}else if($opcion === 'actualizar'){

    $gstIdper = $_POST['gstIdper'];
    $gstNombr = $_POST['gstNombr']; // NOMBRE
    $gstApell = $_POST['gstApell']; // APELLIDO
    $gstLunac = $_POST['gstLunac']; // LUGAR DE NACIMIENTO
    $gstFenac = $_POST['gstFenac']; // FECHA DE NACIMIENTO
    $gstStcvl = $_POST['gstStcvl']; // ESTADO CIVIL
    $gstCurp  = $_POST['gstCurp']; //CURP
    $gstRfc   = $_POST['gstRfc']; //RFC
    $gstNpspr = $_POST['gstNpspr']; // NUMERO DE PASAPORTE
    $gstPsvig = $_POST['gstPsvig']; // VIGENCIA DEL PASAPORTE
    $gstVisa  = $_POST['gstVisa']; // PAIS DE LA VISA
    $gstVignt = $_POST['gstVignt']; // VISA VIGENCIA
   // $gstNucrt = $_POST['gstNucrt']; // NUMERO DE CARTLLA
    $gstCalle = $_POST['gstCalle']; // CALLE
    $gstNumro = $_POST['gstNumro']; // NUMERO DE DOMICILIO
    $gstClnia = $_POST['gstClnia']; // COLONIA
    $gstCpstl = $_POST['gstCpstl']; // CODIGO POSTAL
    $gstCiuda = $_POST['gstCiuda']; // CUIDAD
    $gstStado = $_POST['gstStado']; // ESTADO
    $gstCasa  = $_POST['gstCasa']; // NUM. DE CASA
    $gstClulr = $_POST['gstClulr']; // NUM. DE CELULAR
    $gstExTel = $_POST['gstExTel']; // NUM. DE EXTENCION
	$gstCorro = $_POST['gstCorro']; // correo 1 "23092021"
    $gstCinst = $_POST['gstCinst']; //correo 2 
	$gstSpcID = $_POST['gstSpcID']; //correo 3 

	if(actualizar($gstIdper,$gstNombr,$gstApell,$gstLunac,$gstFenac,$gstStcvl,$gstCurp,$gstRfc,$gstNpspr,$gstPsvig,$gstVisa,$gstVignt,$gstCalle,$gstNumro,$gstClnia,$gstCpstl,$gstCiuda,$gstStado,$gstCasa,$gstClulr,$gstExTel,$gstCorro,$gstCinst,$gstSpcID,$conexion)){
		echo "0";
	}else{
		echo "1";
	}
}else if($opcion === 'agrStudio'){

	$gstIDper = $_POST['gstIDper'];
	$gstInstt = $_POST['gstInstt'];
	$gstCiuda = $_POST['gstCiuda'];
	$gstPriod = $_POST['gstPriod'];
	$gstDocmt = $_POST['gstDocmt'];

	if(estudios($gstIDper,$gstInstt,$gstCiuda,$gstPriod,$gstDocmt,$conexion))
		{	echo "0";	}else{	echo "1";	}

}else if($opcion === 'actProfsn'){

 $gstIdpro = $_POST['gstIdpro'];
 $gstPusto = $_POST['gstPusto'];
 $gstMpres = $_POST['gstMpres'];
 $gstIDpai = $_POST['gstIDpai'];
 $gstCidua = $_POST['gstCidua'];
 $gstActiv = $_POST['gstActiv'];
 $gstFntra = $_POST['gstFntra'];
 $gstFslda = $_POST['gstFslda'];


	if(actPrfsion($gstIdpro,$gstPusto,$gstMpres,$gstIDpai,$gstCidua,$gstActiv,$gstFntra,$gstFslda,$conexion))
		{	echo "0";	}else{	echo "1";	}

 	}else if($opcion === 'actPrsnls'){

     $pstIdper = $_POST['pstIdper']; //id de la persona
     $gstNmpld = $_POST['gstNmpld']; //numero de empleado
     $gstIdpst = $_POST['gstIdpst']; //codigo presupuestal
     $gstCargo = $_POST['gstCargo']; //cargo
     $gstIDCat = $_POST['gstIDCat']; //categoria
     $gstIDSub = $_POST['gstIDSub']; //subcategoria
     $gstCorro = $_POST['gstCorro']; // correo personal "QUITAR"
     $gstCinst = $_POST['gstCinst']; //correo institicuonal "QUITAR"
     $gstFeing = $_POST['gstFeing']; // fecha de ingreso 
     $gstIDuni = $_POST['gstIDuni']; //unidad adminisgtrativa
	 $gstAreID = $_POST['gstAreID']; //area
	 $gstPstID = $_POST['gstPstID']; //puesto
	 $gstSpcID = $_POST['gstSpcID']; //correo opcion3 "QUITAR"
	 $gstIDara = $_POST['gstIDara']; //area
	 $gstAcReg = $_POST['gstAcReg']; //region		
	 $gstNucrt = $_POST['gstNucrt']; //ubicacion de la persona 
	 $gstSigID = $_POST['gstSigID']; //estatus	 

	if(actPrsonl($pstIdper,$gstNmpld,$gstIdpst,$gstCargo,$gstIDCat,$gstIDSub,$gstIDara,$gstAreID,$gstPstID,$gstSpcID,$gstCorro,$gstCinst,$gstFeing,$gstIDuni,$gstAcReg,$gstNucrt,$gstSigID,$conexion))
		{	echo "0";	}else{	echo "1";	}
	}


function comprobacion($gstNombr,$gstApell,$gstNmpld,$conexion){

$query="SELECT * FROM personal WHERE gstNombr = '$gstNombr' AND gstApell = '$gstApell' AND estado = 0 OR gstNmpld = $gstNmpld AND estado = 0";
$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
		return true;
		}else{
		return false;	
		}
		$this->conexion->cerrar();
}

function registrar($gstNombr,$gstApell,$gstLunac,$gstFenac,$gstStcvl,$gstCurp,$gstRfc,$gstNpspr,$gstPsvig,$gstVisa,$gstVignt,$gstNucrt,$gstCalle,$gstNumro,$gstClnia,$gstCpstl,$gstCiuda,$gstStado,$gstCasa,$gstClulr,$gstExTel,$gstNmpld,$gstIdpst,$gstAreID,$gstPstID,$gstSpcID,$gstSigID,$gstCargo,$gstIDCat,$gstIDSub,$gstCorro,$gstCinst,$gstFeing,$gstIDara,$gstAcReg,$gstIDuni,$conexion){

			$query="INSERT INTO personal VALUES(0,'$gstNombr','$gstApell','$gstLunac','$gstFenac','$gstStcvl','$gstCurp','$gstRfc','$gstNpspr','$gstPsvig','$gstVisa','$gstVignt','$gstNucrt','$gstCalle','$gstNumro','$gstClnia','$gstCpstl','$gstCiuda','$gstStado','$gstCasa','$gstClulr','$gstExTel','$gstNmpld','$gstIdpst','$gstAreID','$gstPstID','$gstSpcID','$gstSigID','$gstCargo','$gstIDCat','$gstIDSub','$gstCorro','$gstCinst','$gstFeing','$gstFeing','$gstIDara','$gstAcReg','$gstIDuni','NO','',0)";
				if(mysqli_query($conexion,$query)){
					return true;
				}else{
					return false;
				}
				$this->conexion->cerrar();
				}


function actualizar($gstIdper,$gstNombr,$gstApell,$gstLunac,$gstFenac,$gstStcvl,$gstCurp,$gstRfc,$gstNpspr,$gstPsvig,$gstVisa,$gstVignt,$gstCalle,$gstNumro,$gstClnia,$gstCpstl,$gstCiuda,$gstStado,$gstCasa,$gstClulr,$gstExTel,$gstCorro,$gstCinst,$gstSpcID,$conexion){

	$query = "UPDATE personal SET gstNombr = '$gstNombr',gstApell = '$gstApell',gstLunac = '$gstLunac',gstFenac = '$gstFenac',gstStcvl = '$gstStcvl',gstCurp  = '$gstCurp',gstRfc = '$gstRfc',gstNpspr = '$gstNpspr',gstPsvig = '$gstPsvig',gstVisa = '$gstVisa',gstVignt = '$gstVignt',gstCalle = '$gstCalle',gstNumro = '$gstNumro',gstClnia = '$gstClnia',gstCpstl = '$gstCpstl',gstCiuda = '$gstCiuda',gstStado = '$gstStado',gstCasa = '$gstCasa',gstClulr = '$gstClulr',gstExTel = '$gstExTel',gstCorro = '$gstCorro',gstCinst = '$gstCinst',gstSpcID = '$gstSpcID' WHERE gstIdper = '$gstIdper'";
	if(mysqli_query($conexion,$query)){

		return true;

		}else{

			return false;
		}
	cerrar($conexion);
}


function estudios($gstIDper,$gstInstt,$gstCiuda,$gstPriod,$gstDocmt,$conexion){

	$query="SELECT * FROM estudios WHERE gstIDper = '$gstIDper' AND gstInstt = '$gstInstt' AND estado = 0";
			$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
			$query="INSERT INTO estudios VALUES(0,'$gstIDper','$gstInstt','$gstCiuda','$gstPriod','$gstDocmt',0)";
				if(mysqli_query($conexion,$query)){
					return true;
				}else{
					return false;
				}
				$this->conexion->cerrar();
		}else{

		}
	}

function profesion($gstIDper,$gstPusto,$gstMpres,$gstIDpai,$gstCidua,$gstActiv,$gstFntra,$gstFslda,$conexion){

	$query="SELECT * FROM profesion WHERE gstIDper = '$gstIDper' AND gstPusto = '$gstPusto' AND estado = 0";
			$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
			$query="INSERT INTO profesion VALUES(0,'$gstIDper','$gstPusto','$gstMpres','$gstIDpai','$gstCidua','$gstActiv','$gstFntra','$gstFslda',0)";
				if(mysqli_query($conexion,$query)){
					return true;
				}else{
					return false;
				}
				$this->conexion->cerrar();
		}else{

		}
	}

function actPrfsion($gstIdpro,$gstPusto,$gstMpres,$gstIDpai,$gstCidua,$gstActiv,$gstFntra,$gstFslda,$conexion){

	$query="UPDATE profesion SET gstPusto = '$gstPusto', gstMpres = '$gstMpres', gstIDpai = '$gstIDpai', gstCidua = '$gstCidua',gstActiv  = '$gstActiv', gstFntra  = '$gstFntra',gstFslda = '$gstFslda'  WHERE gstIdpro = '$gstIdpro'";
		if(mysqli_query($conexion,$query)){
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();
	}


function actPrsonl($pstIdper,$gstNmpld,$gstIdpst,$gstCargo,$gstIDCat,$gstIDSub,$gstIDara,$gstAreID,$gstPstID,$gstSpcID,$gstCorro,$gstCinst,$gstFeing,$gstIDuni,$gstAcReg,$gstNucrt,$gstSigID,$conexion){

	$query = "UPDATE personal SET gstNmpld = '$gstNmpld',gstIdpst = '$gstIdpst',gstCargo = '$gstCargo',gstIDCat = '$gstIDCat',gstIDSub = '$gstIDSub',gstIDara='$gstIDara',gstAreID='$gstAreID',gstPstID='$gstPstID',gstSpcID='$gstSpcID',gstCorro = '$gstCorro',gstCinst = '$gstCinst',gstFeing = '$gstFeing',gstIDuni = '$gstIDuni', gstAcReg = '$gstAcReg',gstNucrt='$gstNucrt',gstSigID='$gstSigID' WHERE gstIdper = '$pstIdper'";
	if(mysqli_query($conexion,$query)){

		return true;

		}else{

			return false;
		}
	cerrar($conexion);
}

// function selecionar($conexion){
// 	// INSERT INTO asignacion(id_equi,n_emp,proceso) SELECT id_equipo,$nempleado,'$proceso' FROM equipo ORDER BY id_equipo DESC LIMIT 1
// }

function historial($id,$conexion){
ini_set('date.timezone','America/Mexico_City');
$fecha= date('Y').'/'.date('m').'/'.date('d');	

//$query="INSERT INTO historial VALUES(0,,'PERSONAL','AGREGO',)";

$query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'AGREGO AL USUARIO',concat(`gstNombr`,' ',`gstApell`),'$fecha' FROM personal ORDER BY `gstIdper` DESC LIMIT 1";

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

