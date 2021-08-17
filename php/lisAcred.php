<?php
	include("../conexion/conexion.php");


$query = "
SELECT * FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = 1070 AND proceso = 'FINALIZADO' AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);


while($data = mysqli_fetch_array($resultado)){ 
$id_curso = $data['id_curso'];

$queri = "
SELECT * FROM reaccion WHERE id_curso = $id_curso AND estado = 0 ORDER BY id_curso DESC";
$resul = mysqli_query($conexion, $queri);

if($res = mysqli_fetch_array($resul)){
echo 'esta'.$id_curso;


}else{
echo 'no esta'.$id_curso;

}

}


?>