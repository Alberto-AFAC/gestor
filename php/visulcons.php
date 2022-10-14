<?php
include("../conexion/conexion.php");
session_start();
if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
    $id = $_SESSION['usuario']['id_usu'];
}

$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'descarga'){
    $curso_id = $_POST['curso_id'];
    
    if (historial($id,$curso_id,$conexion)){
        echo "0";
    }else{
        echo "1";
    }
}

//FUNCIONES-----------------------------------------------------------------------------------
//funcion para registra cambios
function historial($id,$curso_id,$conexion){
    ini_set('date.timezone','America/Mexico_City');
    $fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
    $query = "INSERT INTO historial VALUE (0,'1045','CONSULTA UNA CONSTANCIAS, CERTIFICADOS O DIPLOMA',concat((select codigo from cursos where id_curso =  $curso_id),' ',(select idinsp from cursos where id_curso =  $curso_id)),'$fecha')";
    if(mysqli_query($conexion,$query)){
        return true;
    }else{
        return false;
}
}
?>  