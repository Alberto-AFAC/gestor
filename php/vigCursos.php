
<?php
	include("../conexion/conexion.php");
	session_start();
	ini_set('date.timezone','America/Mexico_City');


 $query = "SELECT *, DATE_FORMAT( cursos.fechaf, '%d/%m/%Y' ) AS final, DATE_FORMAT( cursos.fcurso, '%d/%m/%Y' ) AS inicial, evaluacion, gstTipo, DATE_FORMAT( fechaf, '%d-%m-%Y' ) AS fechaf, gstVignc, evaluacion, idmstr, gstIdlsc, id_curso,cursos.fechaf AS finaliza,codigo FROM cursos INNER JOIN listacursos ON idmstr = gstIdlsc WHERE id_curso in (SELECT MAX(id_curso) FROM cursos GROUP BY idmstr) ORDER BY id_curso DESC";

	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
	$vigenteV=0;
	$vencidoV=0;
	$vencerV=0;	
	$Xvncer=0;
    $total = 0;
	while($data = mysqli_fetch_array($resultado)){
				
$total++;

$actual= date("d-m-Y"); 
$hactual = date('H:i:s');
$fin = date("d-m-Y",strtotime($data["finaliza"]." -1 days")); 

$factual = strtotime($actual);
$fcurso = strtotime($fin);

if($factual == $fcurso AND $data['proceso'] == 'PENDIENTE'){
$Xvncer++;
}


$fechav = date("d-m-Y",strtotime($data['fechaf']."+ ".$data['gstVignc']." year"));     
$vencer = date("d-m-Y",strtotime($fechav."- 3 month"));
ini_set('date.timezone','America/Mexico_City');

$f1 = strtotime($fechav);
$f2 = strtotime($vencer);
$f3 = strtotime($actual);


$id_curso = $data['id_curso'];
$fcurso = $data['inicial'];
$fechaf = $data['final'];

$valor=$data['confirmar'];;  

if($data['evaluacion'] == '' AND $data['gstVignc']!=101 AND $data['proceso'] == 'FINALIZADO'){
$Evaluacion = "FALTA EVALUAR";

} else {
$Evaluacion = "EVALUADO";
}


if($f3>=$f1 AND $data['gstVignc']!=101 AND $data['proceso'] == 'FINALIZADO'){ //VENCIDO

$vencidoV++;

}else if($f3 <= $f2 && $data['evaluacion'] >= 80 AND $data['gstVignc']!=101 AND $data['proceso'] == 'FINALIZADO'){ //VIGENTE 

$vigenteV++;
}else if($f3 >= $f2 AND $data['gstVignc']!=101 AND $data['proceso'] == 'FINALIZADO'){ //POR VENCER

$vencerV++;
}else{

}
    $total++;

		 }



		if($_SESSION['usuario']['privilegios'] == "SUPER_ADMIN" || $_SESSION['usuario']['privilegios'] == "ADMINISTRADOR" || $_SESSION['usuario']['privilegios'] =="DIRECTOR_CIAAC" || $_SESSION['usuario']['privilegios'] =="INSTRUCTOR"){
			$data['CURSOS'] = $total;
			$data['VENCIDO'] = $vencidoV;
			$data['VENCER'] = $vencerV;
			$data['VIGENTE'] = $vigenteV;
			$data['XVNCER'] = $Xvncer;
		}else{
			$data['VENCIDO'] = 0;
			$data['VENCER'] = 0;
			$data['VIGENTE'] = 0;
			$data['XVNCER'] = 0;
		}	




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





