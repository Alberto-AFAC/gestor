<?php
include("../conexion/conexion.php");

    $idcurso = $_POST['gstIdlsc'];
    
    $query = "SELECT gstIdlsc,gstNombr FROM listacursos 
              INNER JOIN cursos ON idmstr = gstIdlsc
              INNER JOIN personal ON gstIdper = idinsp
              WHERE gstIdlsc = $idcurso";
    $resultado = mysqli_query($conexion, $query);
    $x=0;
    while($curso = mysqli_fetch_assoc($resultado)) {
        $x++;

//            $arreglo[][] = $curso; 
         $gstNombr = $curso['gstNombr'];

//        $json_string = json_encode($arreglo);

  //      }

    //echo $json_string;


         $caledario[] = array($gstNombr);
    
        }

    $json_string = json_encode( $caledario );
    echo $json_string;

?>