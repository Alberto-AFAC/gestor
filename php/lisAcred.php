<?php
	include("../conexion/conexion.php");


$query = "
SELECT * FROM cursos 
              INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr 
              INNER JOIN personal ON idinsp = gstIdper 
              INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat
              WHERE cursos.codigo = 'FO1' AND cursos.estado=0";

$resultado = mysqli_query($conexion, $query);

if(!$resultado){
		die("error");
	}else{

while($data = mysqli_fetch_array($resultado)){ 
$id_curso = $data['id_curso'];

$queri = "
SELECT * FROM reaccion WHERE id_curso = $id_curso AND estado = 0 ORDER BY id_curso DESC";
$resul = mysqli_query($conexion, $queri);

if($res = mysqli_fetch_array($resul)){
// echo '<br>';
// echo 'reacción'.$res[0];
// echo'<br>';
// echo 'esta'.$id_curso;
// echo '<br>';
$data["reaccion"] = 'SI EXISTE';		
$arreglo["data"][] = $data; 

}else{

// echo 'no esta'.$id_curso;
$data["reaccion"] = 'NO EXISTE';	
$arreglo["data"][] = $data; 

}

}
		if(isset($arreglo)&&!empty($arreglo)){

			echo json_encode($arreglo);
		}else{

			echo $arreglo='0';
		}
	}
		mysqli_free_result($resultado);
		mysqli_close($conexion);


?>