<?php
include("../conexion/conexion.php");
header('Content-Type: application/json');
session_start();
$query = "SELECT *, COUNT(*) AS prtcpnts, DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as cfinal,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as cinicial,cursos.fechaf AS fin,classroom
FROM
cursos
INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr 
WHERE
cursos.estado = 0 
GROUP BY
cursos.codigo
ORDER BY
id_curso DESC";
$resultado = mysqli_query($conexion, $query);
$contador=0;
if(!$resultado){
	die("error");
}else{
	while($data = mysqli_fetch_assoc($resultado)){
		$contador++;
		$codigo= $data["codigo"];
		$queri = "SELECT * FROM reprogramados WHERE id_curso = '$codigo' AND reprogramado = 1";
		$resul = mysqli_query($conexion, $queri);
		ini_set('date.timezone','America/Mexico_City');
//-----COMPARACIÓN DE FECHAS DE VENCIMIENTO
		$factual = strtotime(Date("Y-m-d"));
		$fcurso = strtotime(Date($data["fcurso"]));
$sumfech= $data["gstVignc"]; //VIGENCIA DEL CURSO
$ftermino =strtotime($fcurso. '+'.$sumfech.'years'); //se suma los años del vencimiento
$xvencer = date("Y-m-d",strtotime($ftermino."- 3 month")); //SE restan 3 meses
$nuevafecha = strtotime ( '-3 month' , strtotime ( $data["fechaf"] ) ) ;
$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
$finaliza = strtotime(Date($nuevafecha));
$actual = date("Y-m-d"); 
$hactual = date('H:i:s');
$fin = date("d-m-Y",strtotime($data['fin']."+ 5 days")); 
$f3 = strtotime($actual);
$f2 = strtotime($fin); 
if($res = mysqli_fetch_array($resul)){
	$codigor = $res['id_curso'];
	if ($f3>$f2  && $data["proceso"] == "PENDIENTE" AND $codigor = $codigo) {
		$proceso = "<span style='font-weight: bold; height: 50px; color:#D73925;'>PROGRAMACIÓN VENCIDA</span>";
		$proc = 'VENCIDO';
	}
elseif($data["proceso"] == 'PENDIENTE' AND $codigor = $codigo){ //PENDIENTE
	$proceso = '<span style="font-weight: bold; height: 50px; color:#F39403;">REPROGRAMADO</span>';
	$proc = 'PENDIENTE';
}
else if($data["proceso"] == 'FINALIZADO' AND $codigor = $codigo){
	$proceso = '<span style="font-weight: bold; height: 50px; color:green;">FINALIZADO</span>';
	$proc = 'FINALIZADO';
} else if($data["proceso"] == 'EN PROCESO' AND $codigor = $codigo){
	$proceso = '<span style="font-weight: bold; height: 50px; color: ##3C8DBC;">EN PROCESO</span>';
	$proc = 'EN PROCESO';
}else if($data["proceso"] == "PROGRAMAR" AND $codigor = $codigo){
	$proceso = '<span style="font-weight: bold; height: 50px; color:#F39403;">REPROGRAMAR</span>';
	$proc = 'PENDIENTE';
} 
}else{

	if ($f3>$f2 && $data["proceso"] == "PENDIENTE" && $codigo!="FO194" && $codigo!="FO278" && $codigo!="FO195" && $codigo!="FO283" && $codigo!="FO310" && $codigo!="FO314" && $codigo!="FO315" && $codigo!="FO316" && $codigo!="FO319" && $codigo!="FO320" && $codigo!="FO321" && $codigo!="FO322" && $codigo!="FO327" && $codigo!="FO328" && $codigo!="FO335" && $codigo!="FO341" && $codigo!="FO339" && $codigo!="FO337" && $codigo!="FO330" && $codigo!="FO331" && $codigo!="FO344"  && $codigo!="FO349" && $codigo!="FO354" && $codigo!="FO356" && $codigo!="FO357" && $codigo!="FO363" && $codigo!="FO364" && $codigo!="FO376" && $codigo!="FO343" && $codigo!="FO399" && $codigo!="FO408" && $codigo!="FO409" && $codigo!="FO410" && $codigo!="FO411" && $codigo!="FO413" && $codigo!="FO279" && $codigo!="FO417" && $codigo!="FO419" && $codigo!="FO424" && $codigo!="FO438" && $codigo!="FO404" && $codigo!="FO438" && $codigo!="FO449" && $codigo!="FO448" && $codigo!="FO447" && $codigo!="FO169" && $codigo!="FO185" && $codigo!="FO192" && $codigo!="FO193" && $codigo!="FO307" && $codigo!="FO309" && $codigo!="FO392" && $codigo!="FO438" && $codigo!="FO457" && $codigo!="FO391" && $codigo!="FO431" && $codigo!="FO432" && $codigo!="FO433" && $codigo!="FO434" && $codigo!="FO435" && $codigo!="FO436" && $codigo!="FO463" && $codigo!="FO466" && $codigo!="FO467" && $codigo!="FO468" && $codigo!="FO469" && $codigo!="FO482" && $codigo!="FO472" && $codigo!="FO473" && $codigo!="FO483" && $codigo!="FO487" && $codigo!="FO483" && $codigo!="FO481" && $codigo!="FO489" && $codigo!="FO497" && $codigo!="FO485" && $codigo!="FO510" && $codigo!="FO526" && $codigo!="FO527" && $codigo!="FO528" ) {
		$proceso = "<span style='font-weight: bold; height: 50px; color:#D73925;'>PROGRAMACIÓN VENCIDA</span>";
		$proc = 'VENCIDO';
	}
elseif($data["proceso"] == 'PENDIENTE'){ //PENDIENTE
	$proceso = '<span style="font-weight: bold; height: 50px; color:#F39403;">PENDIENTE</span>';
	$proc = 'PENDIENTE';
}
else if($data["proceso"] == 'FINALIZADO'){
	$proceso = '<span style="font-weight: bold; height: 50px; color:green;">FINALIZADO</span>';
	$proc = 'FINALIZADO';
} else if($data["proceso"] == 'EN PROCESO'){
	$proceso = '<span style="font-weight: bold; height: 50px; color: ##3C8DBC;">EN PROCESO</span>';
	$proc = 'EN PROCESO';
}else if($data["proceso"] == "PROGRAMAR" AND $codigor = $codigo){
	$proceso = '<span style="font-weight: bold; height: 50px; color:#F39403;">REPROGRAMAR</span>';
	$proc = 'PENDIENTE';
} 
}

$cursos[] = [ 
	/*0*/	$data["codigo"],
//$data["codigo"], 
	$data["gstTitlo"],
	$data["gstTipo"],
	$data["cinicial"],
	$data["gstDrcin"],
	$data["cfinal"],
	$data["prtcpnts"],
	$proceso,
	$data["id_curso"],
	$data["codigo"],
	$data["gstDrcin"], 
	$data['idinst'],
	$data['sede'],
	$data['link'],
	$data['modalidad'],
	$data['gstIdlsc'],
	$data['idinst'],
	$data['hcurso'],
	$proc,
	$data['contracur'],
	$data['classroom'],
	/*21*/	$data['idcoor'],
	$data['grupo']
];
}
}
if(isset($cursos)&&!empty($cursos )){
	$json_string = json_encode(array( 'data' => $cursos ));
	echo $json_string;
}else{
	echo $cursos ='0';
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>
