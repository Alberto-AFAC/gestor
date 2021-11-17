
<?php
	include("../conexion/conexion.php");
	session_start();
		ini_set('date.timezone','America/Mexico_City');


 $query = "SELECT *, DATE_FORMAT( cursos.fechaf, '%d/%m/%Y' ) AS final, DATE_FORMAT( cursos.fcurso, '%d/%m/%Y' ) AS inicial, evaluacion, gstTipo, DATE_FORMAT( fechaf, '%d-%m-%Y' ) AS fechaf, gstVignc, evaluacion, idmstr, gstIdlsc, id_curso FROM cursos INNER JOIN listacursos ON idmstr = gstIdlsc WHERE gstVignc != 101 AND proceso = 'FINALIZADO' AND id_curso in (SELECT MAX(id_curso) FROM cursos GROUP BY idmstr) ORDER BY id_curso DESC";

 // "SELECT *,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as final,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as inicial,evaluacion,gstTipo,DATE_FORMAT(fechaf, '%d-%m-%Y') AS fechaf,gstVignc,evaluacion,idmstr,gstIdlsc,id_curso 
 // FROM cursos 
 // INNER JOIN listacursos ON idmstr = gstIdlsc WHERE proceso = 'FINALIZADO' GROUP BY codigo";


// WHERE proceso = 'finalALIZADO' AND confirmar='CONFIRMADO' ORDER BY id_curso DESC";


$resultado = mysqli_query($conexion, $query);




	// $query = "SELECT * FROM personal WHERE estado = 0 ORDER BY gstIdper DESC";	
	// $resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
	$vigenteV=0;
	$vencidoV=0;
	$vencerV=0;	
    $total = 0;
	while($data = mysqli_fetch_array($resultado)){
				
$total++;

$fechav = date("d-m-Y",strtotime($data['fechaf']."+ ".$data['gstVignc']." year"));     
$vencer = date("d-m-Y",strtotime($fechav."- 3 month"));
ini_set('date.timezone','America/Mexico_City');
$actual= date("d-m-Y"); 
$f1 = strtotime($fechav);
$f2 = strtotime($vencer);
$f3 = strtotime($actual);



$id_curso = $data['id_curso'];
$fcurso = $data['inicial'];
$fechaf = $data['final'];

$valor=$data['confirmar'];;  

if($data['evaluacion'] == ''){
$Evaluacion = "FALTA EVALUAR";

} else {
$Evaluacion = "EVALUADO";
}

if($data['gstVignc']==101){

}else{
if($f3>=$f1){ //VENCIDO?
//$vencido = "<center><span class='badge' style='background-color: silver;'>REALIZADO</span></center>";
$vencidoV++;

}else if($f3 <= $f2 && $data['evaluacion'] >= 80){ //VIGENTE 
//$vigente = "<center><span class='badge' style='background-color: green;'>VIGENTE</span></center>";
$vigenteV++;
}else if($f3 >= $f2){ //POR VENCER
//$vencer = "<center><span class='badge' style='background-color: #D58512;'>POR VENCER</span></center>";
$vencerV++;
}else{
    // $vigencia = "<center><span class='badge' style='background-color: silver;'>POR EVALUAR</span></center>";
}
}



		// if($data['gstCargo'] == 'INSPECTOR' || $data['gstCargo'] == 'DIRECTOR'){
		// 	$inspectores++;
		// } else if($data['gstCargo'] == 'INSTRUCTOR'){
		// 	$instructor++;
		// } else if($data['gstCargo'] == 'COORDINADOR') {
  //           $coordinador++;
  //       }
  //       $total++;

		 }

	$data['CURSOS'] = $total;	
	 $data['VENCIDO'] = $vencidoV;
	 $data['VENCER'] = $vencerV;
	 $data['VIGENTE'] = $vigenteV;
	$arreglo["data"][] = $data;

		if(isset($arreglo)&&!empty($arreglo)){

			echo json_encode($arreglo);
		}else{

			echo $arreglo='0';
		}
	}
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>





