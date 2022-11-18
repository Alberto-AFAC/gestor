<?php 
ini_set('date.timezone','America/Mexico_City');
    include('../conexion/conexion.php');
    $datos = base64_decode($_GET['data']);
    $codigo = base64_decode($_GET['fol']);
    $query = "SELECT
	c.id,
	c.id_persona,
	u.codigo,
	c.id_codigocurso,
	u.fechaf,
	p.gstNombr,
	p.gstApell,
	l.gstTitlo,
	l.gstIdlsc,
	u.fcurso,
	YEAR ( u.fechaf ) AS ano,
	gstDrcin,
	u.evaluacion,
	u.sede,
	l.gstCntnc,
	DAY ( u.fcurso ) AS dia,
	MONTH ( u.fcurso ) AS MES,
	DAY ( u.fechaf ) AS diafinal,
	MONTH ( u.fechaf ) AS mesfinal,
	u.modalidad,
CASE
		WHEN MONTH ( u.fcurso ) = 1 THEN
		'enero' 
		WHEN MONTH ( u.fcurso ) = 2 THEN
		'febrero' 
		WHEN MONTH ( u.fcurso ) = 3 THEN
		'marzo' 
		WHEN MONTH ( u.fcurso ) = 4 THEN
		'abril' 
		WHEN MONTH ( u.fcurso ) = 5 THEN
		'mayo' 
		WHEN MONTH ( u.fcurso ) = 6 THEN
		'junio' 
		WHEN MONTH ( u.fcurso ) = 7 THEN
		'julio' 
		WHEN MONTH ( u.fcurso ) = 8 THEN
		'agosto' 
		WHEN MONTH ( u.fcurso ) = 9 THEN
		'septiembre' 
		WHEN MONTH ( u.fcurso ) = 10 THEN
		'octubre' 
		WHEN MONTH ( u.fcurso ) = 11 THEN
		'noviembre' 
		WHEN MONTH ( u.fcurso ) = 12 THEN
		'diciembre' ELSE 'novalido' 
	END AS mesnombre,
CASE
		
		WHEN MONTH ( u.fechaf ) = 1 THEN
		'enero' 
		WHEN MONTH ( u.fechaf ) = 2 THEN
		'febrero' 
		WHEN MONTH ( u.fechaf ) = 3 THEN
		'marzo' 
		WHEN MONTH ( u.fechaf ) = 4 THEN
		'abril' 
		WHEN MONTH ( u.fechaf ) = 5 THEN
		'mayo' 
		WHEN MONTH ( u.fechaf ) = 6 THEN
		'junio' 
		WHEN MONTH ( u.fechaf ) = 7 THEN
		'julio' 
		WHEN MONTH ( u.fechaf ) = 8 THEN
		'agosto' 
		WHEN MONTH ( u.fechaf ) = 9 THEN
		'septiembre' 
		WHEN MONTH ( u.fechaf ) = 10 THEN
		'octubre' 
		WHEN MONTH ( u.fechaf ) = 11 THEN
		'noviembre' 
		WHEN MONTH ( u.fechaf ) = 12 THEN
		'diciembre' ELSE 'MES NO VALIDO' 
	END AS mesfinales,
	u.grupo 
FROM
	constancias c, personal p,cursos u,listacursos l
	WHERE
	p.gstIdper=c.id_persona
	AND u.codigo=c.id_codigocurso
    AND u.idinsp=c.id_persona
	AND l.gstIdlsc=u.idmstr
	and c.id =$datos 
	AND u.estado = 0
	AND u.estado = 3
    AND c.id_codigocurso = '$codigo'
	AND u.codigo = '$codigo'";
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