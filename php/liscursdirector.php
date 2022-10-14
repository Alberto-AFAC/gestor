<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
    $id = $_SESSION['usuario']['id_usu'];
	$query = "SELECT c.*,l.*, COUNT(*) AS prtcpnts, DATE_FORMAT(c.fechaf, '%d/%m/%Y') as cfinal,DATE_FORMAT(c.fcurso, '%d/%m/%Y') as cinicial,c.fechaf AS fin,classroom FROM cursos c, listacursos l, personal p where l.gstIdlsc=c.idmstr and c.estado=0 and p.gstIdper=c.idinsp and p.gstIDara=(select gstIDara from personal where gstIdper=$id ) GROUP BY c.codigo ORDER BY c.id_curso DESC";
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
			// $fin = $data['fin'];
			// $f3 = strtotime($actual.''.$hactual);
			// $f2 = strtotime($fin.''.$data['hcurso']); 
		    $fin = date("d-m-Y",strtotime($data['fin']."+ 5 days")); 

		    $f3 = strtotime($actual);
		    $f2 = strtotime($fin); 

//PENDIENTE POR VENCER - RECURRENTE
// if ($factual <= $xvencer && 
// 	$data["gstTipo"] == "RECURRENTES" && 
// 	$data["proceso"] == "FINALIZADO")
// {	
// 	$proceso = "<span style='font-weight: bold; height: 50px; color:#D73925;'>POR VENCER</span>";
// 	$proc = 'POR VENCER';

// }


if($res = mysqli_fetch_array($resul)){
$codigor = $res['id_curso'];

if ($f3>$f2  && $data["proceso"] == "PENDIENTE" AND $codigor = $codigo) {
$proceso = "<span style='font-weight: bold; height: 50px; color:#F39403;'>PENDIENTE</span>";
$proc = 'PENDIENTE';
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
} 


}else{

if ($f3>$f2 && $data["proceso"] == "PENDIENTE"  ) {
	$proceso = "<span style='font-weight: bold; height: 50px; color:#F39403;'>PENDIENTE</span>";
	$proc = 'PENDIENTE';
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
