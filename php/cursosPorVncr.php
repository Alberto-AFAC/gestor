<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
	$query = "SELECT *, COUNT(*) AS prtcpnts,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') AS inicio,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') AS finaliza 
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
		    $fin = date("d-m-Y",strtotime($fechap."+ 5 days")); 
		    $f3curso = strtotime($actual);
		    $f2curso = strtotime($fin); 
		    $fechav = date("d-m-Y",strtotime($data['fechaf']."+ ".$data['gstVignc']." year"));     
		    $vencer = date("d-m-Y",strtotime($fechav."- 3 month"));
		    $f1 = strtotime($fechav);
		    $f2 = strtotime($vencer);
		    $f3 = strtotime($actual);
		    if ($f3>=$f1 && $data["proceso"] == "FINALIZADO" && $data['gstVignc'] != 101) {
                //		if(){ //VENCIDO
		        $proceso = "<span style='font-weight: bold; height: 50px; color:#D73925;'>RECURRENTE VENCIDO</span>";
		        $proc = 'VENCIDO';		
                //		}
		        // else if($f3 >= $f2){ //POR VENCER?    
		        // $proceso = "<span style='font-weight: bold; height: 50px; color:#D73925;'>POR VENCER</span>";
		        // $proc = 'POR VENCER';		
		        // }
		        $cursos[] = [ 
		            $data["codigo"], 
		            $data["gstTitlo"],
		            $data["gstTipo"],
		            $data["inicio"],
		            $data["gstDrcin"],
		            $data["finaliza"],
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
		            $proc
		        ];
	        }else if($f3 >= $f2 && $data["proceso"] == "FINALIZADO" && $data['gstVignc'] != 101) {
		         // else if($f3 >= $f2){ //POR VENCER?    
		        $proceso = "<span style='font-weight: bold; height: 50px; color:orange;'>RECURRENTE POR VENCER</span>";
		        $proc = 'POR VENCER';		
		        $cursos[] = [ 
		            $data["codigo"], 
		            $data["gstTitlo"],
		            $data["gstTipo"],
		            $data["inicio"],
		            $data["gstDrcin"],
		            $data["finaliza"],
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
		            $proc
		        ];
	        }
            if ($f3curso>$f2curso  && $data["proceso"] == "PENDIENTE") {
		        $proceso = "<span style='font-weight: bold; height: 50px; color:#D73925;'>PROGRAMACIÓN VENCIDA</span>";
		        $proc = 'VENCIDO';		
		        $cursos[] = [ 
		        $data["codigo"], 
		            $data["gstTitlo"],
		            $data["gstTipo"],
		            $data["inicio"],
		            $data["gstDrcin"],
		            $data["finaliza"],
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
		            $proc
		        ];
	        }
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