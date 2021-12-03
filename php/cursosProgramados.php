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


$cursos = $data['gstIdlsc']; 
// $data['gstTitlo'].'*'. 
// $data['gstTipo'].'*'. 
// $data['gstPrfil'].'*'. 
// $data['gstCntnc'].'*'. 
// $data['gstDrcin'].'*'. 
// $data['gstVignc'].'*'. 
// $data['gstObjtv'].'*'. 
// $data['hcurso'].'*'. 
// $data['fcurso'].'*'.
// $data['fechaf'].'*'. 
// $data['idinst'].'*'. 
// $data['sede'].'*'. 
// $data['link'].'*'. 
// $data['gstNombr'].'*'. 
// $data['gstApell'].'*'. 
// $data['idmstr'].'*'.
// $data['evaluacion'].'*'. 
// $data['idinsp'].'*'. 
// $data['id_curso'].'*'. 
// $data['confirmar'].'*'. 
// $data['codigo'].'*'. 
// $data['idinsp'];


	



	if($data['idcoor']==$data['idinsp']){

	 $confirmar = "ASISTENCIA OBLIGATORIA";
	 $participante = 'COORDINADOR';
	 $evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='inspeval({$codigo})' class='btn btn-primary' data-toggle='modal' data-target='#modal-evalua'><i class='fa ion-clipboard' style='font-size:15px;'></i></a> <a type='button' id='ev' title='Generación de constancias de participantes' onclick='generacion({$codigo})' class='btn btn-primary' data-toggle='modal' data-target='#modal-masiva' ><i class='fa fa fa fa-list-ul' style='font-size:15px;'></i></a>";
	}else if($data['idinst']==$data['idinsp']){

	 $confirmar = "ASISTENCIA OBLIGATORIA";
	 $participante = 'INSTRUCTOR';
	 $evaluacion = '';
	}else{

            if($data['confirmar'] == "CONFIRMAR"){
                $confirmar = "POR CONFIRMAR ";

            }else
          // vista cuando se DECLINA POR TRABAJO "DETALLE DEL CURSO"
            if ($data['confirmar'] == 'TRABAJO') {
                // confirmar = "";
                // evaluacion = "";
                // evalcurso = "";
                // listcer = "";
                $confirmar = "<a type='button' title='Declina la convocatoria' style= 'color:red;cursor:pointer;' onclick='id_cursos({$data['id_curso']})' data-toggle='modal' data-target='#modal-declinado1'>DECLINO CURSO</a>";
            }else
            // vista cuando se DECLINA POR ENFERMEDAD "DETALLE DEL CURSO"
            if ($data['confirmar'] == 'ENFERMEDAD') {
     
                $confirmar = "<a type='button' title='Declina la convocatoria' style= 'color:red;cursor:pointer;' onclick='id_cursos({$data['id_curso']})' data-toggle='modal' data-target='#modal-declinado1'>DECLINO CURSO</a>";
            }else
            // vista cuando se DECLINA POR OTROS "DETALLE DEL CURSO"
            if ($data['confirmar'] == 'OTROS') {

                // evaluacion = "";
                // evalcurso = "";
                // listcer = "";
                 $confirmar = "<a type='button' title='Declina la convocatoria' style= 'color:red;cursor:pointer;' onclick='id_cursos({$data['id_curso']})' data-toggle='modal' data-target='#modal-declinado1'>DECLINO CURSO</a>";
            }else{

                 $confirmar = "<a style= 'color:green;' >CONFIRMADO</a>";
            }			

	 $participante = 'PARTICIPANTE';
	 $evaluacion = '';

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