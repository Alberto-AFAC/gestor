<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
    $id = $_GET["id"];
	$query = "SELECT * FROM cursos 
    INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr 
    INNER JOIN personal ON idinsp = gstIdper 
    INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat
    WHERE cursos.codigo = '$id' AND cursos.estado=0 ORDER BY id_curso DESC";
	$resultado = mysqli_query($conexion, $query);
    $item = 0;

	if(!$resultado){
		die("error");
	}else{
		
		while($data = mysqli_fetch_assoc($resultado)){
            $item++;

		$codigo = substr($data['codigo'], 2); 
		$idcurinp = $data['idinsp'].'.'.$codigo;

//COORDINADOR
	if($data['idcoor']==$data['idinsp']){

	 $confirmar = "ASISTENCIA OBLIGATORIA";
	 $participante = 'COORDINADOR';
	 $evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='inspeval({$codigo})' class='btn btn-primary' data-toggle='modal' data-target='#modal-evalua'><i class='fa ion-clipboard' style='font-size:15px;'></i></a> <a type='button' id='ev' title='Generación de constancias de participantes' onclick='generacion({$codigo})' class='btn btn-primary' data-toggle='modal' data-target='#modal-masiva' ><i class='fa fa fa fa-list-ul' style='font-size:15px;'></i></a>";

//INSTRUCTOR
	}else if($data['idinst']==$data['idinsp']){

	 $confirmar = "ASISTENCIA OBLIGATORIA";
	 $participante = 'INSTRUCTOR';
	 $evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='inspeval({$codigo})' class='btn btn-primary' data-toggle='modal' data-target='#modal-evalua'><i class='fa ion-clipboard' style='font-size:15px;'></i></a> <a type='button' id='ev' title='Generación de constancias de participantes' onclick='generacion({$codigo})' class='btn btn-primary' data-toggle='modal' data-target='#modal-masiva' ><i class='fa fa fa fa-list-ul' style='font-size:15px;'></i></a>";
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

if ($data['evaluacion'] == 0){
$evalua = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins({$idcurinp})' class='btn btn-warning' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a>";
} 

//vista cuando se APRUEBA AL INSPECTOR "DETALLE DEL CURSO" CON EVALUACIÓN

//&& ((obj.data[i].reaccion) == 'SI EXISTE')
if ((($data['evaluacion']) >= 80) && (($data['evaluacion']) <= 100)){

$evalua = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins({$idcurinp})' class='btn btn-success' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:16px;'></i></a>";	
}

// //// vista cuando se APRUEBA AL INSPECTOR "DETALLE DEL CURSO" SIN EVALUACIÓN
// //&& ((obj.data[i].reaccion) == 'NO EXISTE')
// // if((($data['evaluacion']) >= 80) && (($data['evaluacion']) <= 100)) {

// // $evalua = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins({$idcurinp})' class='btn btn-success' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";

// // }

// // vista cuando se REPRUEBA AL INSPECTOR "DETALLE DEL CURSO" SIN EVALUACIÓN
// //&& ((obj.data[i].reaccion) =='NO EXISTE')
// // if ((($data['evaluacion']) < 80) && (($data['evaluacion']) >= 1)) {

// // $evalua = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins({$idcurinp})' class='btn btn-danger' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";
// // }
// // vista cuando se REPRUEBA AL INSPECTOR "DETALLE DEL CURSO" CON EVALUACIÓN
// //&& ((obj.data[i].reaccion) == 'SI EXISTE')
// if ((($data['evaluacion']) < 80) && (($data['evaluacion']) >= 1)) {

// $evalua = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins({$idcurinp})' class='btn btn-danger' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";

// }



                 $confirmar = "<a style= 'color:green;' >CONFIRMADO</a>";
                 $evaluacion = $evalua."<a type='button' style='margin-left:2px' title='Generar Certificado' onclick='gencerti({$idcurinp})' class='btn btn-default' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa fa-list-ul' style='font-size:15px;'></i></a>  <a type='button' title='Eliminar inspector' onclick='eliNsp({$data['id_curso']})' class='asiste btn btn-default' data-toggle='modal' style='margin-left:3px' data-target='#eliminar-modal'><i class='fa fa-trash-o text-danger' style='font-size:15px; margin-left:2px'></i></a>";	
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