<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	    session_start();
    $id = $_GET["id"];

	$query = "SELECT * FROM prog_ojt  WHERE estado = 0 and id_pers=$id ORDER BY id_proojt ASC";
	$resultado = mysqli_query($conexion, $query);
    $item = 0;

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
            $item++;
			
			$id_registro = $data["id_proojt"];
			$id_tarea = $data["id_tarea"];
            $id_subtarea = $data['id_subtarea'];
            $notificar="<a title='Notificar' onclick='' class='datos btn btn-default' data-toggle='modal' data-target='#modal-evaluarojt'><i class='glyphicon glyphicon-send'></i></a>";

            // TAREAS OJT
			$queri = "SELECT * FROM ojts  WHERE id_ojt=$id_tarea ORDER BY id_ojt DESC";
			$resul = mysqli_query($conexion, $queri); 
			if($res = mysqli_fetch_array($resul)){
				$tareapri = $res['ojt_principal'];
			}else{
				$tareapri = "NO TIENE TAREA PRINCIPAL";
			}

            // SUBTAREAS OJT
			$queriy = "SELECT * FROM ojts_subs  WHERE id_subojt= $id_subtarea ORDER BY id_subojt  DESC";
			$result = mysqli_query($conexion, $queriy);
			$y= 0;
			if($rest = mysqli_fetch_array($result)){
                $y++;
				
				$nomsubta = $rest['ojt_subtarea'];
				if($rest['numsubt']== 1){
					$numsub = "SUBTAREA 1";
					$subtarea = $numsub. ' / '  .$nomsubta;
				}else if($rest['numsubt']== 2){
					$numsub = "SUBTAREA 2 - ID";
					$subtarea = $numsub. ' / '  .$nomsubta;
				}else if($rest['numsubt']== 3){
					$numsub = "SUBTAREA 3 - ID";
					$subtarea = $numsub. ' / '  .$nomsubta;
				}
                
			}else{
				$subtarea = "NO HAY SUBTAREAS LIGAS";
			}
            //ASISTENCIA DEL PARTICIPANTE OJT
		    if($data['confirojt']== 'PENDIENTE'){
				$asistencia = "<span class='label label-warning' style=''>PENDIENTE</span>";
				$notificar = "<a title='Información de la programación' onclick='ojtprogram($id_registro)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-proojt'><i class='fa fa-info'></i></a> <a title='Notificar' onclick='enviarMailOjt({$id_registro}.{$id})' class='datos btn btn-default' ><i class='glyphicon glyphicon-send'></i></a>";

			}else if($data['confirojt']=='CONFIRMADO' && $data['nivel']=='1'){
				$asistencia = "<span class='label label-success' style='height: 50px; color:green;'>CONFIRMADO</span>";
				$notificar = "<a title='Información de la programación' onclick='ojtprogram($id_registro)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-proojt'><i class='fa fa-info'></i></a> <a title='Notificar' onclick='enviarMailOjt({$id_registro}.{$id})' class='datos btn btn-default' data-toggle='modal' data-target='#notificarConv'><i class='glyphicon glyphicon-send'></i></a> <a type='button' id='ev' title='Evaluación nivel 1' onclick='evalun1($id_registro)' class='btn btn-default' data-toggle='modal' data-target='#modal-evaluarojt'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";
		    }else if($data['confirojt']=='CONFIRMADO' && $data['nivel']=='2'){
				$asistencia = "<span class='label label-success' style='height: 50px; color:green;'>CONFIRMADO</span>";
				//$notificar = "<a title='Información de la programación' onclick='ojtprogram($id_registro)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-proojt'><i class='fa fa-info'></i></a> <a title='Notificar' onclick='enviarMailOjt({$id_registro}.{$id})' class='datos btn btn-default'><i class='glyphicon glyphicon-send'></i></a> <a class='datos btn btn-default' data-toggle='modal' data-target='#modal-evaluarojtII' class='datos btn btn-default' ><i class='fa ion-clipboard'></i></a>";
		        $notificar = "<a title='Información de la programación' onclick='ojtprogram($id_registro)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-proojt'><i class='fa fa-info'></i></a> <a title='Notificar' onclick='enviarMailOjt({$id_registro}.{$id})' class='datos btn btn-default' data-toggle='modal' data-target='#notificarConv'><i class='glyphicon glyphicon-send'></i></a> <a type='button' id='ev' title='Evaluación nivel 2' onclick='evalun2($id_registro)' class='btn btn-default' data-toggle='modal' data-target='#modal-evaluarojtII'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";
			}else if($data['confirojt']=='CONFIRMADO' && $data['nivel']=='3'){
				$asistencia = "<span class='label label-success' style='height: 50px; color:green;'>CONFIRMADO</span>";
				//$notificar = "<a title='Información de la programación' onclick='ojtprogram($id_registro)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-proojt'><i class='fa fa-info'></i></a> <a title='Notificar' onclick='enviarMailOjt({$id_registro}.{$id})' class='datos btn btn-default'><i class='glyphicon glyphicon-send'></i></a> <a class='datos btn btn-default' data-toggle='modal' data-target='#modal-evaluarojtIII' class='datos btn btn-default' ><i class='fa ion-clipboard'></i></a>";
		        $notificar = "<a title='Información de la programación' onclick='ojtprogram($id_registro)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-proojt'><i class='fa fa-info'></i></a> <a title='Notificar' onclick='enviarMailOjt({$id_registro}.{$id})' class='datos btn btn-default' data-toggle='modal' data-target='#notificarConv'><i class='glyphicon glyphicon-send'></i></a> <a type='button' id='ev' title='Evaluación nivel 3' onclick='evalun3($id_registro)' class='btn btn-default' data-toggle='modal' data-target='#modal-evaluarojtIII'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";
			}else if($data['confirojt']=='TRABAJO'){
			    $asistencia = "<a type='button' class='label label-danger' title='Declina la convocatoria' style= 'color:red;cursor:pointer;' onclick='infdecOJT($id_registro)' data-toggle='modal' data-target='#modal-declinadoOJT'>DECLINO ENTRANAMIENTO</a>";
				$notificar = "<a title='Información de la programación' onclick='ojtprogram($id_registro)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-proojt'><i class='fa fa-info'></i></a> <a title='Notificar' onclick='enviarMailOjt({$id_registro}.{$id})' class='datos btn btn-default'><i class='glyphicon glyphicon-send'></i></a>";
			}else if ($data['confirojt'] == 'ENFERMEDAD') {
                $asistencia = "<a type='button' class='label label-danger' title='Declina la convocatoria' style= 'color:red;cursor:pointer;' onclick='infdecOJT($id_registro)' data-toggle='modal' data-target='#modal-declinadoOJT'>DECLINO ENTRANAMIENTO</a>";
				$notificar = "<a title='Información de la programación' onclick='ojtprogram($id_registro)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-proojt'><i class='fa fa-info'></i></a> <a title='Notificar' onclick='enviarMailOjt({$id_registro}.{$id})' class='datos btn btn-default'><i class='glyphicon glyphicon-send'></i></a>";
			}else if ($data['confirojt'] == 'OTROS') {
                $asistencia = "<a type='button' class='label label-danger' title='Declina la convocatoria' style= 'color:red;cursor:pointer;' onclick='infdecOJT($id_registro)' data-toggle='modal' data-target='#modal-declinadoOJT'>DECLINO ENTRANAMIENTO</a>";
				$notificar = "<a title='Información de la programación' onclick='ojtprogram($id_registro)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-proojt'><i class='fa fa-info'></i></a> <a title='Notificar' onclick='enviarMailOjt({$id_registro}.{$id})' class='datos btn btn-default'><i class='glyphicon glyphicon-send'></i></a>";
			}

            //ESTATUS
			if($data['estatus'] == "PENDIENTE"){
				$estusoojt = "<span style='font-weight: bold; height: 50px; color:orange;'>PENDIENTE</span>";
				//$notificar = "<a title='Información de la programación' onclick='ojtprogram($id_registro)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-proojt'><i class='fa fa-info'></i></a> <a title='Notificar' onclick='enviarMailOjt({$id_registro}.{$id})' class='datos btn btn-default' ><i class='glyphicon glyphicon-send'></i></a>";
			}else if ($data['estatus'] == 'FINALIZADO' && $data['nivel']=='1') {
                $estusoojt = "<span style='font-weight: bold; height: 50px; color:green;'>FINALIZADO</span>";	
				$notificar = "<a title='Información de la programación' onclick='ojtprogram($id_registro)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-proojt'><i class='fa fa-info'></i></a> <a type='button' id='ev' title='Evaluación nivel 1' onclick='evalun1($id_registro)' class='btn btn-default' data-toggle='modal' data-target='#modal-evaluarojt'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";
            }else if ($data['estatus'] == 'FINALIZADO' && $data['nivel']=='2') {
                $estusoojt = "<span style='font-weight: bold; height: 50px; color:green;'>FINALIZADO</span>";	
				$notificar = "<a title='Información de la programación' onclick='ojtprogram($id_registro)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-proojt'><i class='fa fa-info'></i></a> <a type='button' id='ev' title='Evaluación nivel 2' onclick='evalun2($id_registro)' class='btn btn-default' data-toggle='modal' data-target='#modal-evaluarojtII'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";
            }else if ($data['estatus'] == 'FINALIZADO' && $data['nivel']=='3') {
                $estusoojt = "<span style='font-weight: bold; height: 50px; color:green;'>FINALIZADO</span>";	
				$notificar = "<a title='Información de la programación' onclick='ojtprogram($id_registro)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-proojt'><i class='fa fa-info'></i></a> <a type='button' id='ev' title='Evaluación nivel 3' onclick='evalun3($id_registro)' class='btn btn-default' data-toggle='modal' data-target='#modal-evaluarojtIII'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";
            }
               
		//ESTA ES LA CONSULTA AQUI DEBES DE AGREGAR TODO LO DE LAS COLUMNAS
		$consulta[] = 
		[ $item, $data["comision"],$tareapri, $subtarea, $data["fec_inioj"], $data["fec_finoj"], $data["nivel"], $asistencia, $estusoojt, $notificar];


	
	}
}
	$json_string = json_encode(array( 'data' => $consulta ));
	echo $json_string;
	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>
