<?php
include("../conexion/conexion.php");
session_start();

  $codigo = $_POST['codigo'];

  $hini = $_POST['hcurso'];
  $hfin = $_POST['hora_fin'];

  $valor = $_POST['array1'];
  $varray1 = json_decode($valor, true);
  $valor = count($varray1);


for($i=0; $i<$valor; $i++){

 $diasv = $varray1[$i]["diasr"];
 $validar = $varray1[$i]["idias"];

  if($validar==1){ 
// $validar = 'SI'; 

  mostrarDias($codigo,$diasv,$hini,$hfin,$conexion);
  }else{ $validar = 'NO'; } 

  }



function mostrarDias($codigo,$diasv,$hini,$hfin,$conexion){
  // $query = "SELECT dia_semana,num_mes,habil,fec_inico,fec_fin,hora_ini,hora_fin  FROM semanal WHERE id_per = $idpro AND id_curso = '0' AND habil = 'SI'";
  $query = "SELECT idinsp,dia_semana,num_mes,habil,fec_inico,fec_fin,hora_ini,hora_fin,codigo FROM semanal INNER JOIN cursos ON cursos.codigo = semanal.id_curso WHERE semanal.id_curso = '$codigo' AND habil = 'SI' GROUP BY idinsp";
  $resultado = mysqli_query($conexion, $query);

  if(!$resultado){
    die("error");
  }else{
    while($data = mysqli_fetch_assoc($resultado)){

      //$data['prtcpnt'] = $prtcpn;
      $codigo = $data['codigo'];
      $prtcpn = $data['idinsp'];
      $dia = $diasv;
      $mes = $data['num_mes'];
      $hini = $hini;
      $hfin = $hfin;
      mostrarEncurso($dia,$mes,$prtcpn,$hini,$hfin,$codigo,$conexion);
    }

  }

}

function mostrarEncurso($dia,$mes,$prtcpn,$hini,$hfin,$codigo,$conexion){
  $query = "SELECT idinsp,Id_program,id_per,semanal.id_curso AS codigos ,dia_semana,num_mes,habil,fec_inico,fec_fin,hora_ini,hora_fin,prtcpnt,gstNombr,gstApell,anio 
  FROM semanal 
  INNER JOIN cursos ON codigo = semanal.id_curso
  INNER JOIN personal ON gstIdper = $prtcpn
  WHERE 
  idinsp = $prtcpn AND 
  dia_semana = $dia AND 
  num_mes = $mes AND
  habil = 'SI' AND
  codigo != '$codigo' AND
  proceso = 'PENDIENTE'
  ";

  $resultado = mysqli_query($conexion, $query);

  if(!$resultado){
    die("error");
  }else{
    while($data = mysqli_fetch_assoc($resultado)){

$hrinipro = strtotime( $data['hora_ini'] ); 
$hrfinpro = strtotime( $data['hora_fin'] );

$hrinicom = strtotime( $hini ); 
$hrfincom = strtotime( $hfin ); 

 if($hrinicom<=$hrinipro && $hrinipro<=$hrfincom || $hrinicom<=$hrfinpro && $hrfinpro<=$hrfincom){
        
     $datos = $data['nombre'] = $data['gstNombr'].' '.$data['gstApell'].'=>'.$data['dia_semana'].'-'.$data['num_mes'].'-'.$data['anio'].' DE '.$data['hora_ini'].' A '.$data['hora_fin'].'<br>';
       $arreglo[] = $datos; 
 }else{
     
 }
 
    }
    if(isset($arreglo)&&!empty($arreglo)){
      echo json_encode($arreglo);    

    }else{

//      echo $arreglo='0';
    }
  }

}

?>