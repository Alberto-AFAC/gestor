<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
    $id = $_GET["id"];
   // $id = 'FO53';
	$query = "SELECT * FROM cursos 
    INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr 
    INNER JOIN personal ON idinsp = gstIdper 
    -- INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat
    WHERE cursos.codigo = '$id' AND cursos.estado=0 ORDER BY id_curso DESC";
	$resultado = mysqli_query($conexion, $query);
    $item = 0;

	if(!$resultado){
		die("error");
	}else{
		
		while($data = mysqli_fetch_assoc($resultado)){
            $item++;


$id_curso = $data['id_curso'];
$idinsp = $data['idinsp'];

$queri = "
SELECT * FROM reaccion WHERE id_curso = $id_curso AND estado = 0 ORDER BY id_curso DESC";
$resul = mysqli_query($conexion, $queri); 


if($res = mysqli_fetch_array($resul)){
$reaccion = 'SI EXISTE';
}else{
$reaccion = 'NO EXISTE';
}


		$codigo = substr($data['codigo'], 2); 
		$idcurinp = $data['idinsp'].'.'.$codigo;
$idper = '';
$queriy = "SELECT * FROM instructor WHERE id_per = $idinsp AND codigoInst = '$id' AND estado = 0";
$result = mysqli_query($conexion, $queriy);

if($rest = mysqli_fetch_array($result)){
$respon = 'INSTRUCTOR';

$idper = $rest['id_per'];

}else{
$respon = 'INSPECTOR';
}
//INSTRUCTOR Y COORDINADOR
if($data['idcoor']==$data['idinsp'] && $data['idcoor'] == $idper){

	 $confirmar = "ASISTENCIA OBLIGATORIA";
	 $participante = 'COORDINADOR/INSTRUCTOR';
	 $evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='inspeval({$codigo})' class='btn btn-primary' data-toggle='modal' data-target='#modal-evalua'><i class='fa ion-clipboard' style='font-size:15px;'></i></a> <a type='button' id='ev' title='Generación de constancias de participantes' onclick='generacion({$codigo})' class='btn btn-primary' data-toggle='modal' data-target='#modal-masiva' ><i class='fa fa fa-file-text' style='font-size:15px;'></i></a>";

	}else
//COORDINADOR
	if($data['idcoor']==$data['idinsp']){

	 $confirmar = "ASISTENCIA OBLIGATORIA";
	 $participante = 'COORDINADOR';
	 $evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='inspeval({$codigo})' class='btn btn-primary' data-toggle='modal' data-target='#modal-evalua'><i class='fa ion-clipboard' style='font-size:15px;'></i></a> <a type='button' id='ev' title='Generación de constancias de participantes' onclick='generacion({$codigo})' class='btn btn-primary' data-toggle='modal' data-target='#modal-masiva' ><i class='fa fa fa-file-text' style='font-size:15px;'></i></a>";

//INSTRUCTOR
	}else if($respon=='INSTRUCTOR'){

	 $confirmar = "ASISTENCIA OBLIGATORIA";
	 $participante = 'INSTRUCTOR';
	 $evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='inspeval({$codigo})' class='btn btn-primary' data-toggle='modal' data-target='#modal-evalua'><i class='fa ion-clipboard' style='font-size:15px;'></i></a> <a type='button' id='ev' title='Generación de constancias de participantes' onclick='generacion({$codigo})' class='btn btn-primary' data-toggle='modal' data-target='#modal-masiva' ><i class='fa fa fa-file-text' style='font-size:15px;'></i></a>";
	}else{

//PARTICIPANTES
		$evaluacion = "<a type='button' title='Eliminar inspector' onclick='eliNsp({$data['id_curso']})' class='asiste btn btn-default' data-toggle='modal' style='margin-left:3px' data-target='#eliminar-modal'><i class='fa fa-trash-o text-danger' style='font-size:15px; margin-left:2px'></i></a>";	

            if($data['confirmar'] == "CONFIRMAR"){
                $confirmar = "POR CONFIRMAR ";

            }else

//PARTICIPANTES QUE DECLINAN
            if ($data['confirmar'] == 'TRABAJO') {
                $confirmar = "<a type='button' title='Declina la convocatoria' style= 'color:red;cursor:pointer;' onclick='id_cursos({$data['id_curso']})' data-toggle='modal' data-target='#modal-declinado1'>DECLINO CURSO</a>";
            }else if ($data['confirmar'] == 'ENFERMEDAD') {
     
                $confirmar = "<a type='button' title='Declina la convocatoria' style= 'color:red;cursor:pointer;' onclick='id_cursos({$data['id_curso']})' data-toggle='modal' data-target='#modal-declinado1'>DECLINO CURSO</a>";
            }else if ($data['confirmar'] == 'OTROS') {

                $confirmar = "<a type='button' title='Declina la convocatoria' style= 'color:red;cursor:pointer;' onclick='id_cursos({$data['id_curso']})' data-toggle='modal' data-target='#modal-declinado1'>DECLINO CURSO</a>";
                // $evaluacion = "";						
            }else{

//PARTICIPANTES QUE CONFIRMAN

if ($data['evaluacion'] == 'NULL'){
$evalua = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins({$idcurinp})' class='btn btn-warning' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' stylfont-size:16px;'></i></a><span style='margin-left:2px;padding:0.5em;background:#E08E0B;color:white;' title='Reacción de Curso por Evaluar' ><i class='fa fa-check-circle-o' style='font-size:15px;'></i></span>";
}
//vista cuando se APRUEBA AL INSPECTOR "DETALLE DEL CURSO" CON EVALUACIÓN
if ($data['evaluacion'] >= 80 && $data['evaluacion'] <= 100 && $reaccion == 'SI EXISTE'){

$evalua = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins({$idcurinp})' class='btn btn-success' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='	font-size:16px;'></i></a><span style='margin-left:2px;padding:0.5em;background:green;color:white;' title='Reacción de Curso Evaluado' ><i class='fa fa-check-circle-o' style='font-size:15px;'></i></span>";	
}
// vista cuando se APRUEBA AL INSPECTOR "DETALLE DEL CURSO" SIN EVALUACIÓN
if($data['evaluacion'] >= 80 && $data['evaluacion'] <= 100 && $reaccion == 'NO EXISTE') {

$evalua = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins({$idcurinp})' class='btn btn-success' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:15px;'></i></a><span style='margin-left:2px;padding:0.5em;background:#E08E0B;color:white;' title='Reacción de Curso por Evaluar' ><i class='fa fa-check-circle-o' style='font-size:15px;'></i></span>";

}

// // vista cuando se REPRUEBA AL INSPECTOR "DETALLE DEL CURSO" SIN EVALUACIÓN
if ($data['evaluacion'] < 80 && $data['evaluacion'] >= 0 && $reaccion == 'NO EXISTE') {

$evalua = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins({$idcurinp})' class='btn btn-danger' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:15px;'></i></a><span style='margin-left:2px;padding:0.5em;background:#E08E0B;color:white;' title='Reacción de Curso por Evaluar' ><i class='fa fa-check-circle-o' style='font-size:15px;'></i></span>";
}
// // vista cuando se REPRUEBA AL INSPECTOR "DETALLE DEL CURSO" CON EVALUACIÓN
if ($data['evaluacion'] < 80 && $data['evaluacion'] >= 0 && $reaccion == 'SI EXISTE') {

$evalua = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins({$idcurinp})' class='btn btn-danger' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>		
<span style='margin-left:2px;padding:0.5em;background:green;color:white;' title='Reacción de Curso Evaluado' ><i class='fa fa-check-circle-o' style='font-size:15px;'></i></span>

";

}

                 $confirmar = "<a style= 'color:green;' >CONFIRMADO</a>";
                 $evaluacion = $evalua."<a type='button' style='margin-left:2px' title='Generar Certificado' onclick='gencerti({$idcurinp})' class='btn btn-default' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa-file-text' style='font-size:15px;'></i></a>  <a type='button' title='Eliminar inspector' onclick='eliNsp({$data['id_curso']})' class='asiste btn btn-default' data-toggle='modal' style='margin-left:3px' data-target='#eliminar-modal'><i class='fa fa-trash-o text-danger' style='font-size:15px; margin-left:2px'></i></a>";	
            }			

	 $participante = 'PARTICIPANTE';

	}


 	
	$consulta[] = 
	[ $item,$data["gstNombr"],$data["gstApell"],$participante,$confirmar,$evaluacion];

		}
	}


	$json_string = json_encode(array( 'data' => $consulta ));
	echo $json_string;

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>