<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
	
	$query = "SELECT *,DATE_FORMAT(a.fcurso, '%d/%m/%Y') AS inicio, DATE_FORMAT(a.fechaf, '%d/%m/%Y') AS finaliza
	FROM (
		SELECT *, MAX(fechaf) as ultima_fecha FROM cursos GROUP By cursos.idmstr,cursos.idinsp
	) a
	INNER JOIN listacursos b ON b.gstIdlsc = a.idmstr
	INNER JOIN personal c ON c.gstIdper = a.idinsp
	WHERE
				a.estado = 0 AND a.idinsp!=a.idcoor AND a.idinsp!=a.idinst
	ORDER BY
				a.id_curso DESC	";
	$resultado = mysqli_query($conexion, $query);
	$contador=0;
	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$contador++;

		ini_set('date.timezone','America/Mexico_City');

		// $factual = strtotime(Date("Y-m-d"));
		// $fcurso = strtotime(Date($data["fcurso"]));

		// $nuevafecha = strtotime ( '-3 month' , strtotime ( $data["fechaf"] ) ) ;
		// $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
		// $finaliza = strtotime(Date($nuevafecha));

		$actual = date("d-m-Y"); 
		$hactual = date('H:i:s');
		// $fin = $data['fin'];
		// $f3 = strtotime($actual.''.$hactual);
		// $f2 = strtotime($fin.''.$data['hcurso']); 

		$fechap = $data['fechaf'];
		$fin = date("d-m-Y",strtotime($fechap."+ 1 days")); 





		$f3curso = strtotime($actual);
		$f2curso = strtotime($fin); 

		$final = date("d-m-Y",strtotime($data['ultima_fecha']));
		


		$vig = date("d-m-Y",strtotime($data['ultima_fecha']."+".$data['gstVignc']." year"));     



		
$fechav = date("d-m-Y",strtotime($data['ultima_fecha']."+".$data['gstVignc']." year"));     
$vencer = date("d-m-Y",strtotime($fechav."- 3 month"));

$f1 = strtotime($fechav);
$f2 = strtotime($vencer);
$f3 = strtotime($actual);

$vencido = date("d-m-Y",strtotime($f1)); 

if ($f3>=$f1 && $data["proceso"] == "FINALIZADO" && $data['gstVignc'] != 101) {
		$proceso = "<span style='font-weight: bold; height: 50px; color:#D73925;'>VENCIDO</span>";
		$proc = 'VENCIDO';		
		$cursos[] = [ 
            $data["gstIdper"], 
            $data["codigo"],
            $data["gstNombr"]." ".$data["gstApell"],
            $data["gstTitlo"],
            $data["gstTipo"],
            $final,
            $vig,
            $proceso
		];
	}else 

	if($f3 >= $f2 && $data["proceso"] == "FINALIZADO" && $data['gstVignc'] != 101) {

		// else if($f3 >= $f2){ //POR VENCER?    
		$proceso = "<span style='font-weight: bold; height: 50px; color:orange;'>POR VENCER</span>";
		$proc = 'POR VENCER';		
		
		$cursos[] = [ 
            $data["gstIdper"], 
		    $data["codigo"],
            $data["gstNombr"]." ".$data["gstApell"],
		    $data["gstTitlo"],
		    $data["gstTipo"],
            $final,
            $vig,
	    	$proceso
		];
		}





   /*if ($f3curso>$f2curso  && $data["proceso"] == "PENDIENTE") {
		$proceso = "<span style='font-weight: bold; height: 50px; color:#D73925;'>CURSO POR VENCER</span>";
		$proc = 'VENCIDO';		
		$cursos[] = [ 
		$data["gstIdper"], 
		$data["codigo"],
        $data["gstNombr"]." ".$data["gstApell"],
		$data["gstTitlo"],
		$data["gstTipo"],
		$data["fcurso"],
		$data["fechaf"],
		$proceso
		];
    }*/
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