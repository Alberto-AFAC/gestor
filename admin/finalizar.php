<?php

$idcurso = $_POST['gstIdlsc'];
$query = "SELECT gstTitlo,gstIdlsc,gstNombr,gstProvd,DATE_FORMAT(fcurso,'%d/%m/%Y'),hcurso,gstCargo,sede,modalidad FROM listacursos 
			  INNER JOIN cursos ON idmstr = gstIdlsc
			  INNER JOIN personal ON gstIdper = idinsp
			  WHERE gstIdlsc = $idcurso";
	$resultado = mysqli_query($conexion, $query);
    while($curso = mysqli_fetch_row($resultado)) {
    }

?>