<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
	$id2 = $_SESSION['usuario']['id_usu'];
	$query = "SELECT
	*,
	DATE_FORMAT( a.fcurso, '%d/%m/%Y' ) AS inicio,
	DATE_FORMAT( a.fechaf, '%d/%m/%Y' ) AS finaliza 
    FROM
	( SELECT *, MAX( fechaf ) AS ultima_fecha FROM cursos where cursos.estado=0 GROUP BY cursos.idmstr, cursos.idinsp ) a, 
	listacursos b, personal c  
	WHERE
	a.estado = 0 
	AND a.idinsp != a.idcoor 
	AND a.idinsp != a.idinst 
	AND b.gstIdlsc = a.idmstr
	AND c.gstIdper = a.idinsp 
	AND c.gstIDara = (select gstIDara from personal where gstIdper=$id2)
    ORDER BY
	a.id_curso DESC";
	$resultado = mysqli_query($conexion, $query);
	$contador=0;
	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$contador++;
            ini_set('date.timezone','America/Mexico_City');
		    $actual = date("d-m-Y"); 
		    $hactual = date('H:i:s');
		    $fechap = $data['fechaf'];
		    $fin = date("d-m-Y",strtotime($fechap."+ 1 days")); 
		    $f3curso = strtotime($actual);
		    $f2curso = strtotime($fin); 
		    $final = date("d-m-Y",strtotime($data['ultima_fecha']));
		    $vig = date("d-m-Y",strtotime($data['ultima_fecha']."+".$data['gstVignc']." year"));     
            $fechav = date("d-m-Y",strtotime($data['ultima_fecha']."+".$data['gstVignc']." year"));     
            $vencer = date("d-m-Y",strtotime($fechav."- 6 month"));
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
                    $data["gstNombr"]." ".        $data["gstApell"],
                    $data["gstTitlo"],
                    $data["gstTipo"],
                    $final,
                    $vig,
                    $proceso
		        ];
	        }else if($f3 >= $f2 && $data["proceso"] == "FINALIZADO" && $data['gstVignc'] != 101) {
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