<?php
include("../conexion/conexion.php");
session_start();
if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
    $id = $_SESSION['usuario']['id_usu'];
}

$opcion = $_POST["opcion"];
$informacion = [];
  
if($opcion === 'prodias'){

$finicial = $_POST['finicial'];
$ffinal = $_POST['ffinal'];
$hora_ini = $_POST['hora_ini'];
$hora_fin = $_POST['hora_fin'];
$idPer = $_POST['idPer'];

$valor = $_POST['array1'];
$varray1 = json_decode($valor, true);
$valor = count($varray1);

$array2 = $_POST['array2'];
$array2 = json_decode($array2, true);

$array3 = $_POST['array3'];
$array3 = json_decode($array3, true);


for($i=0; $i<$valor; $i++){

$dias = $varray1[$i]["diasr"];
$validar = $varray1[$i]["idias"];
$mes = $array2[$i]["mes"];
$anio = $array3[$i]["anio"];
if($validar==1){ $validar = 'SI'; }else{ $validar = 'NO'; } 
//if(consultar($dias,$mes,$hora_ini,$hora_fin,$conexion)){
if(programaDias($idPer,$dias,$validar,$mes,$anio,$finicial,$ffinal,$hora_ini,$hora_fin,$conexion)){
  echo "0";
  }else{
  echo "1";
  }
  }
}else if($opcion === 'edidias'){

$finicial = $_POST['finicial'];
$ffinal = $_POST['ffinal'];
$hora_ini = $_POST['hora_ini'];
$hora_fin = $_POST['hora_fin'];

$valor = $_POST['array1'];
$varray1 = json_decode($valor, true);
$valor = count($varray1);

$array2 = $_POST['array2'];
$array2 = json_decode($array2, true);

$array3 = $_POST['array3'];
$array3 = json_decode($array3, true);

for($i=0; $i<$valor; $i++){

$dias = $varray1[$i]["diasr"];
$validar = $varray1[$i]["idias"];
$mes = $array2[$i]["mes"];
$anio = $array3[$i]["anio"];

if($validar==1){ $validar = 'SI'; }else{ $validar = 'NO'; }

// if(consultar($dias,$mes,$hora_ini,$hora_fin,$conexion)){
if(editarDias($dias,$validar,$mes,$anio,$finicial,$ffinal,$hora_ini,$hora_fin,$conexion)){
  echo "0";
  }else{
  echo "1";
  }
  }
}else if($opcion=='eliminar'){

$idPer = $_POST["idPer"];

  if(eliminarDias($idPer,$conexion)){
    echo "0";
  }else{
    echo "1";
  }
}else if($opcion=='eliminarDiasPro'){

  $codigo = $_POST["codigo"];

  if(eliminarDiasPro($codigo,$conexion)){
    echo "0";
    $finicial='';
    $ffinal='';
    $hora_ini='0';
    $proceso = 'PROGRAMAR';
    editarCursofecha($codigo,$finicial,$ffinal,$hora_ini,$proceso,$conexion);
        $realizo = 'ELIMINO FECHA DEL CURSO';
    historia($id,$codigo,$realizo,$conexion);

  }else{
    echo "1";
  }
}else if($opcion=='agrdias'){

$finicial = $_POST['finicial'];
$ffinal = $_POST['ffinal'];
$hora_ini = $_POST['hora_ini'];
$hora_fin = $_POST['hora_fin'];
$idPer = $_POST['idPer'];
$codigo = $_POST['codigo'];

$valor = $_POST['array1'];
$varray1 = json_decode($valor, true);
$valor = count($varray1);

$array2 = $_POST['array2'];
$array2 = json_decode($array2, true);

$array3 = $_POST['array3'];
$array3 = json_decode($array3, true);

for($i=0; $i<$valor; $i++){

$dias = $varray1[$i]["diasr"];
$validar = $varray1[$i]["idias"];
$mes = $array2[$i]["mes"];
$anio = $array3[$i]["anio"];
if($validar==1){ $validar = 'SI'; }else{ $validar = 'NO'; } 

if(reProgramaDias($idPer,$codigo,$dias,$validar,$mes,$anio,$finicial,$ffinal,$hora_ini,$hora_fin,$conexion)){
echo "0";

$proceso = 'PENDIENTE';
editarCursofecha($codigo,$finicial,$ffinal,$hora_ini,$proceso,$conexion);

if($i==1){
      $realizo = 'REPROGRAMO FECHA DEL CURSO';
    historia($id,$codigo,$realizo,$conexion);  
}

}else{
echo "1";
}
}
}

function consultar($dias,$mes,$hora_ini,$hora_fin,$conexion){

  $query = "SELECT * FROM semanal WHERE dia_semana = $dias AND num_mes = $mes AND hora_ini = '$hora_ini' AND hora_fin = '$hora_fin' ";

  $resultados = mysqli_query($conexion,$query);
  if($resultados->num_rows == 0){
    return true;
  }else{
    return false;
  }
}

function programaDias($idPer,$dias,$validar,$mes,$anio,$finicial,$ffinal,$hora_ini,$hora_fin,$conexion){

  $query = "INSERT INTO semanal VALUES(0,'$idPer',0,$dias,$mes,$anio,'$validar','$finicial','$ffinal','$hora_ini','$hora_fin',0)";
  if(mysqli_query($conexion,$query)){

    return true;

    }else{

      return false;
    }
  cerrar($conexion);
}

function editarDias($dias,$validar,$mes,$anio,$finicial,$ffinal,$hora_ini,$hora_fin,$conexion){

  $query = "UPDATE semanal SET 

  id_curso = '0', 
  dia_semana='$dias',
  num_mes='$mes',
  anio='$anio',
  habil='$validar',
  fec_inico='$finicial',
  fec_fin='$ffinal',
  hora_ini='$hora_ini',
  hora_fin ='$hora_fin'
  WHERE dia_semana='$dias' AND id_curso = '0'";
  if(mysqli_query($conexion,$query)){

    return true;

    }else{

      return false;
    }
  cerrar($conexion);

}

function eliminarDias($idPer,$conexion){

  $query="DELETE FROM semanal WHERE id_per = $idPer AND id_curso = '0'";
  if(mysqli_query($conexion,$query)){

      return true;
    }else{
      return false;
    }
    $this->conexion->cerrar();
}

function eliminarDiasPro($codigo,$conexion){
  $query="DELETE FROM semanal WHERE id_curso = '$codigo' AND estado = 0";
  if(mysqli_query($conexion,$query)){

      return true;
    }else{
      return false;
    }
    $this->conexion->cerrar();  
}
function reProgramaDias($idPer,$codigo,$dias,$validar,$mes,$anio,$finicial,$ffinal,$hora_ini,$hora_fin,$conexion){

  $query = "INSERT INTO semanal VALUES(0,'$idPer','$codigo',$dias,$mes,$anio,'$validar','$finicial','$ffinal','$hora_ini','$hora_fin',0)";
  if(mysqli_query($conexion,$query)){

    return true;

    }else{

      return false;
    }
  cerrar($conexion);
}
function editarCursofecha($codigo,$finicial,$ffinal,$hora_ini,$proceso,$conexion){

  $query = "UPDATE cursos SET 
  fcurso = '$finicial', 
  fechaf='$ffinal',
  hcurso='$hora_ini',
  proceso = '$proceso'
  WHERE codigo = '$codigo' AND estado = '0'";
  if(mysqli_query($conexion,$query)){

    return true;

    }else{

      return false;
    }
  cerrar($conexion);
}

function historia($id,$codigo,$realizo,$conexion){
 ini_set('date.timezone','America/Mexico_City');
 $fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
 $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) VALUE ($id,'$realizo','FOLIO:$codigo','$fecha')";
 if(mysqli_query($conexion,$query)){
   return true;
 }else{
   return false;
 }
  cerrar($conexion);
}



?>

