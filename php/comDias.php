<?php
include("../conexion/conexion.php");
session_start();
$idpro = $_SESSION['usuario']['id_usu'];

$id = $_POST['idpart'];

$modalidad = $_POST['modalidad'];

if($modalidad == 'AUTOGESTIVO'){

  echo $arreglo = '0';

}else{
    
$valor = explode(",", $id);
$val = count($valor);

foreach ($valor as $idinsps) {
  $prtcpnt = $idinsps;
  mostrarDias($prtcpnt, $idpro,$conexion);
}
}
function mostrarDias($prtcpnt, $idpro,$conexion){
  $query = "SELECT dia_semana,num_mes,habil,fec_inico,fec_fin,hora_ini,hora_fin,anio  FROM semanal WHERE id_per = $idpro AND id_curso = '0' AND habil = 'SI'";
  $resultado = mysqli_query($conexion, $query);

  if(!$resultado){
    die("error");
  }else{
    while($data = mysqli_fetch_assoc($resultado)){

      //$data['prtcpnt'] = $prtcpn;
      $prtcpn = $prtcpnt;
      $dia = $data['dia_semana'];
      $mes = $data['num_mes'];
      $hini = $data['hora_ini'];
      $hfin = $data['hora_fin'];
      $anio = $data['anio'];      
      mostrarEncurso($anio,$dia,$mes,$prtcpn,$hini,$hfin,$conexion);
    }

  }

}

function mostrarEncurso($anio,$dia,$mes,$prtcpn,$hini,$hfin, $conexion){
  $query = "SELECT idinsp,Id_program,id_per,semanal.id_curso AS codigos ,dia_semana,num_mes,habil,fec_inico,fec_fin,hora_ini,hora_fin,prtcpnt,gstNombr,gstApell,anio 
  FROM semanal 
  INNER JOIN cursos ON codigo = semanal.id_curso
  INNER JOIN personal ON gstIdper = $prtcpn
  WHERE 
  anio = $anio AND
  idinsp = $prtcpn AND 
  dia_semana = $dia AND 
  num_mes = $mes AND
  habil = 'SI' AND
  cursos.estado=0 AND
  prtcpnt = 'SI'  ";

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

      echo $arreglo='0';
    }
  }

}

?>