<?php
	include("../conexion/conexion.php");
	session_start();
 $query = "SELECT
 * 
FROM
 cursos
 INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr
 INNER JOIN personal ON cursos.idinsp = personal.gstIdper
WHERE
 cursos.estado = 0 
ORDER BY
 id_curso DESC";
 $resultado = mysqli_query($conexion, $query);
 if (!$resultado) {
    die("error");//EN CASO DE NO HABER RESULTADO
}else{//arreglo -funcion , parametro de resultado
    while($data = mysqli_fetch_assoc($resultado)){
        //variable arreglo..para no tener problemas con la comas,comillas,tilde etc
$arreglo["data"][] = $data;	
            //array_map("utf8_decode", $data)
    }//al tener toda los datos en data de la variable arreglo lo pasamos formato json
    if(isset($arreglo) && !empty($arreglo)) {
            echo json_encode($arreglo);
        }else
        {
                echo $arreglo='""';				
        }
}
?>