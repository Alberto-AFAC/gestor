<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
	
	$query = "SELECT *,
    CASE WHEN l.gstVignc !=101 THEN (select DATE_ADD(c.fechaf, INTERVAL l.gstVignc YEAR))
    Else 'UNICA VEZ'
    END AS PRONOSTICO,
    CASE WHEN DATE_FORMAT(NOW(), '%Y/%m/%d') < (select DATE_ADD(c.fechaf, INTERVAL l.gstVignc YEAR)) THEN 'VIGENTE'
             ELSE 'VENCIDO'
    END AS ESTATUS
    from CURSOS c, personal p, listacursos l, categorias e
    WHERE p.gstIdper = c.idinsp
    AND c.idmstr = l.gstIdlsc
    AND e.gstIdcat = p.gstIDCat
    AND c.prtcpnt='SI' and c.estado=0";
	$resultado = mysqli_query($conexion, $query);
	$contador=0;
	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$contador++;

		ini_set('date.timezone','America/Mexico_City');

		$factual = strtotime(Date("Y-m-d"));
		// $fcurso = strtotime(Date($data["fcurso"]));

		// $nuevafecha = strtotime ( '-3 month' , strtotime ( $data["fechaf"] ) ) ;
		// $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
		// $finaliza = strtotime(Date($nuevafecha));

		$actual = date("d-m-Y"); 
		// $hactual = date('H:i:s');
		// $fin = $data['fin'];
		// $f3 = strtotime($actual.''.$hactual);
		// $f2 = strtotime($fin.''.$data['hcurso']); 

		// $fechap = $data['fechaf'];
		// $fin = date("d-m-Y",strtotime($fechap."+ 1 days")); 





		// $f3curso = strtotime($actual);
		// $f2curso = strtotime($fin); 

		// $final = date("d-m-Y",strtotime($data['ultima_fecha']));
		


		// $vig = date("d-m-Y",strtotime($data['ultima_fecha']."+".$data['gstVignc']." year"));     



		
// $fechav = date("d-m-Y",strtotime($data['PROTNOSTICO']."+".$data['gstVignc']." year"));     
$vencer = date("d-m-Y",strtotime($data['PRONOSTICO']."- 6 month"));

// $f1 = strtotime($fechav);
$f2 = strtotime($vencer);
$f3 = strtotime($actual);

// $vencido = date("d-m-Y",strtotime($f1)); 
if($data['ESTATUS'] == 'VIGENTE'){
	$detalles = "NO APLICA";
	$acciones ="<a disabled type='button' title='Días Hábiles' onclick='hrsDias()' class='btn btn-default' data-toggle='modal' data-target='' id='modalMost'>NOTIFICAR</a>";

}else if($data['ESTATUS'] == 'VENCIDO'){
	$detalles = "REPROGRAMAR";
	$acciones = "<a type='button' title='Días Hábiles' onclick='hrsDias()' class='btn btn-info' data-toggle='modal' data-target='' id='modalMost'>NOTIFICAR</a>";

	
}else if ($f3 >= $f2 && $data["proceso"] == "FINALIZADO" && $data['gstVignc']  != 101) {
	$detalles = "<span style='font-weight: bold; height: 50px; color:#D73925;'>CURSO POR VENCER</span>";		
}

	
		// $cursos[] = [$contador,$data['codigo'],$data["gstNombr"]." ".$data["gstApell"],$data['gstTitlo'],$data['gstTipo'],$data['gstPrfil'],$data['PRONOSTICO'],$data['ESTATUS'],$detalles,$acciones];





// if ($f3 >= $f2 && $data["proceso"] == "FINALIZADO" && $data['gstVignc']  != 101) {
// 		$proceso = "<span style='font-weight: bold; height: 50px; color:#D73925;'>CURSO POR VENCER</span>";		
// 		$cursos[] =[$contador,$data['codigo'],$data["gstNombr"]." ".$data["gstApell"],$data['gstTitlo'],$data['gstTipo'],$data['gstPrfil'],$data['PRONOSTICO'],$proceso,$detalles,$acciones];
//     }else{
// 		$cursos[] = [$contador,$data['codigo'],$data["gstNombr"]." ".$data["gstApell"],$data['gstTitlo'],$data['gstTipo'],$data['gstPrfil'],$data['PRONOSTICO'],$data['ESTATUS'],$detalles,$acciones];

// 	}
$cursos[] = [$contador,$data['codigo'],$data["gstNombr"]." ".$data["gstApell"],$data['gstTitlo'],$data['gstTipo'],$data['gstPrfil'],$data['PRONOSTICO'],$data['ESTATUS'],$detalles,$acciones];

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