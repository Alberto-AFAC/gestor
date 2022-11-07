<?php
	include("../conexion/conexion.php");
	session_start();
	
	//$query = "SELECT * FROM subespecojt s, categorias c where s.id_especialidad=c.gstIdcat and s.estado='0'  ORDER BY s.id_subesp  ASC";
    $query = "SELECT * FROM categorias where estado='0' AND gstIdcat!=24 AND gstIdcat!=25 and gstIdcat!=26 and gstIdcat!=29 and gstIdcat!=33 and gstIdcat!=31 ORDER BY gstIdcat  ASC";
	$resultado = mysqli_query($conexion, $query);
	$contador=0;
	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$contador++;
			ini_set('date.timezone','America/Mexico_City');
			if ($data["estado"] == "0") {
				$gstIdcat  =$data["gstIdcat"];
				$proceso = "<a onclick='opendettsup($gstIdcat)' style='cursor:pointer;' title='Ver subespecialidad' class='btn btn-primary btn-icon' data-toggle='modal' data-target='#modal-detallespecial'><div><i style='color:white;' class='fa fa-list-alt text-success'></i></div></a> <a href='' title='Actualizar cargos' onclick='' class='btn btn-default text-info' data-toggle='modal' data-target='#modal-accesoact'><i class='fa fa-exchange'></i></a>  <a href='' title='Eliminar' onclick='' class='btn btn-default text-red' data-toggle='modal' data-target='#modal-cursinstru'><i class='fa fa-times-circle-o'></i></a>";	
				$cursos[] = [ 
					$contador,
					$data["gstCatgr"], 
					$data["gstCsigl"],
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