<?php 
ini_set('date.timezone','America/Mexico_City');
    include('../conexion/conexion.php');
    $datos = base64_decode($_GET['data']);
    $query = "SELECT id, id_persona, id_codigocurso, fechaf, personal.gstNombr, personal.gstApell, gstTitlo,gstIdlsc,fcurso, YEAR(fechaf) AS ano, gstDrcin, cursos.evaluacion, cursos.sede, listacursos.gstCntnc, DAY(fcurso) AS dia, 	MONTH(fcurso) AS MES, DAY(fechaf) AS diafinal, MONTH(fechaf) AS mesfinal, cursos.modalidad, CASE WHEN MONTH ( fcurso ) = 1 THEN
    'enero' 
    WHEN MONTH ( fcurso ) = 2 THEN
    'febrero' 
    WHEN MONTH ( fcurso ) = 3 THEN
    'marzo' 
    WHEN MONTH ( fcurso ) = 4 THEN
    'abril' 
    WHEN MONTH ( fcurso ) = 5 THEN
    'mayo' 
    WHEN MONTH ( fcurso ) = 6 THEN
    'junio' 
    WHEN MONTH ( fcurso ) = 7 THEN
    'julio' 
    WHEN MONTH ( fcurso ) = 8 THEN
    'agosto' 
    WHEN MONTH ( fcurso ) = 9 THEN
    'septiembre' 
    WHEN MONTH ( fcurso ) = 10 THEN
    'octubre' 
    WHEN MONTH ( fcurso ) = 11 THEN
    'noviembre' 
    WHEN MONTH ( fcurso ) = 12 THEN
    'diciembre' ELSE 'novalido' END AS mesnombre,
    CASE
		WHEN MONTH ( fechaf ) = 1 THEN
		'enero' 
		WHEN MONTH ( fechaf ) = 2 THEN
		'febrero' 
		WHEN MONTH ( fechaf ) = 3 THEN
		'marzo' 
		WHEN MONTH ( fechaf ) = 4 THEN
		'abril' 
		WHEN MONTH ( fechaf ) = 5 THEN
		'mayo' 
		WHEN MONTH ( fechaf ) = 6 THEN
		'junio' 
		WHEN MONTH ( fechaf ) = 7 THEN
		'julio' 
		WHEN MONTH ( fechaf ) = 8 THEN
		'agosto' 
		WHEN MONTH ( fechaf ) = 9 THEN
		'septiembre' 
		WHEN MONTH ( fechaf ) = 10 THEN
		'octubre' 
		WHEN MONTH ( fechaf ) = 11 THEN
		'noviembre' 
		WHEN MONTH ( fechaf ) = 12 THEN
		'diciembre' ELSE 'MES NO VALIDO' 
	END AS mesfinales FROM constancias INNER JOIN personal ON personal.gstIdper = constancias.id_persona INNER JOIN cursos ON id_codigocurso = codigo INNER JOIN listacursos ON idmstr = gstIdlsc 
    WHERE id = $datos";
    $const = mysqli_query($conexion, $query);
    $con = mysqli_fetch_array($const);
    $dia = array("cero","uno","dos","tres","cuatro","cinco","seis","siete","ocho","nueve","diez","once","doce","trece","catorce","quince", "dieciseis","diecisiete","dieciocho","diecinueve", "veinte","veintiuno","veintidós","veintitres","veinticuatro","veinticinco","veintiseis","veintisiete","veintiocho","veintinueve","treinta","treinta y uno");
    $fecha2= $dia[date('d')];
    setlocale(LC_TIME, "spanish");
    $mesactual = strftime("%B");
    $nombre = $con['gstNombr'];
    $apellido = $con['gstApell'];
    $documento = $con['gstCntnc'];
    $curso = $con['gstTitlo'];
    $dateF = $con['fcurso'];
    $dateFinal = $con['fechaf'];
    $registro = $con['id_codigocurso'];
    $EvaluacionF = $con['evaluacion'];
    $tituloPrueba = "INDUCCIÓN A LA SCT";
    $conteoStr = strlen($con['gstTitlo']);
    // $temario = $con['titulo'];
    $idc = $con['gstIdlsc'];
    $llave = base64_encode($con['gstNombr']." ".$con['gstApell']." ".$con['id_codigocurso']);
    $nombresCompletos = $con['gstNombr']." ".$con['gstApell'];
    $mes = array("0","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $hoy= date('d').' de '.$mes[date('n')].' del año '.date('Y');
    // $qrFecha = $dateF[date("F j, Y")];  

?>