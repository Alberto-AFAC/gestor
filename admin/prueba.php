<!DOCTYPE html><?php include ("../conexion/conexion.php");

$query = "
SELECT
*
,DATE_FORMAT(reaccion.fechareac, '%d/%m/%Y') as reaccion
FROM
cursos
-- INNER JOIN constancias ON id_persona = idinsp
INNER JOIN personal ON idinsp = gstIdper
INNER JOIN reaccion ON cursos.id_curso = reaccion.id_curso
-- INNER JOIN listacursos ON idmstr = listacursos.gstIdlsc 
WHERE
proceso = 'Finalizado' 
AND confirmar = 'CONFIRMADO' 
AND evaluacion >= 70 
GROUP BY cursos.id_curso";
$resultado = mysqli_query($conexion, $query);

      while($data = mysqli_fetch_array($resultado)){ 
       $idperson = $data['idinsp'];
       $idmstr = $data['idmstr'];
       $idcuro = $data['id_curso'];
       $codigo = $data['codigo'];
       $id_reac = $data['id_reac'];
       $fec_reac = $data['reaccion'];

       $query1 = "SELECT * FROM listacursos WHERE gstIdlsc = '$idmstr'";
        $resultado1 = mysqli_query($conexion, $query1);

        if($data1 = mysqli_fetch_assoc($resultado1)){
        	$idlist = $data1['gstIdlsc'];
        	$titulo = $data1['gstTitlo'];
        }


		$query2 = "SELECT * FROM constancias 
		WHERE id_persona = $idperson
		AND listregis = 'SI' 
		AND lisasisten = 'SI' 
		AND listreportein = 'SI' 
		AND cartdescrip = 'SI' 
		AND regponde = 'SI' 
		AND infinal = 'SI' 
		AND evreaccion = 'SI'
		";
        $resultado2 = mysqli_query($conexion, $query2);

        if($data2 = mysqli_fetch_assoc($resultado2)){
            $constancia = $data2['id_codigocurso'];
            $id_persona = $data2['id_persona'];
        }else{
            $constancia = 'SIN CONST';
            $id_persona = 'SIN ID';
        }


       // $query3 = "SELECT *,DATE_FORMAT(reaccion.fechareac, '%d/%m/%Y') as reaccion FROM reaccion WHERE id_curso = '$idcuro'";
       //  $resultado3 = mysqli_query($conexion, $query3);

       //  if($data3 = mysqli_fetch_assoc($resultado3)){
        	// $id_reac = $data['id_reac'];
        	// $fec_reac = $data['reaccion'];
        // }else{
        // }        

       $encrypidpersona = base64_encode($id_persona);
       $encryidlist = base64_encode($idlist);
      echo '<br>'.$curso_id = $idperson;
      echo $data['gstNombr']." ".$data['gstApell'];
      echo $titulo;
echo "<a href='constancia.php?data={$encrypidpersona}&cod={$encryidlist} ' target='_blank' title='Dar clic para consultar' onclick='visualcon({$idcuro})'><center><img src='../dist/img/constancias.svg' width='30px;' alt='pdf'></center></a><span><center><span  data-toggle='modal' data-target='#correcionModal' style='cursor: pointer;' onclick='perfil({$idcuro})' class='btn-info badge'>REALIZAR CORRECIÓN</center></span>";

      echo 'Fecha reaccion-->'.$fec_reac;
      echo 'Constancia-->'.$constancia.'<br>';

}


?>