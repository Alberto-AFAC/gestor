


<?php

include ("../conexion/conexion.php"); session_start();
$id = $_SESSION['usuario']['id_usu'];

      $sql = 
     "SELECT personal.gstIdper,gstNombr,gstApell,gstCargo,gstNmpld,gstIDara FROM personal 
      WHERE personal.gstIdper = '".$id."' && personal.estado = 0 ";
    $persona = mysqli_query($conexion,$sql);
    $datos = mysqli_fetch_row($persona);

      $datos[1];
      $datos[2];
      $datos[3];


      $sqli = 
     "SELECT gstInstt,gstMpres FROM personal 
       INNER JOIN estudios ON estudios.gstIDper = personal.gstIdper 
      INNER JOIN profesion ON profesion.gstIDper = personal.gstIdper 
      WHERE personal.gstIdper = '".$id."' && personal.estado = 0 ORDER BY estudios.gstIdstd,profesion.gstIdpro DESC
      ";

      $persona = mysqli_query($conexion,$sql);
      $datos = mysqli_fetch_row($persona);

  
  if (!empty($dato[4]) || !empty($dato[5])) {
      $dato[4];
      $dato[5];
  }else{
      $dato[4]="";
      $dato[5]="";
  }

      $sql2 =
      "SELECT * FROM cursos 
      INNER JOIN listacursos ON gstIdlsc = idmstr  
      WHERE modalidad = 'E-LEARNNING' AND idinsp = $id";
      $query = mysqli_query($conexion,$sql2);
      $datos2 = mysqli_fetch_assoc($query);
  
      $datos[0];
      $sql = "SELECT * FROM listacursos WHERE estado = 0 ORDER BY gstIdlsc desc";
      $cursos = mysqli_query($conexion,$sql);

      $sqljt = "SELECT * FROM tarearealizar WHERE estado = 0 AND idiva = '".$id."'";
      $queryjt = mysqli_query($conexion,$sqljt);
      $ojt = mysqli_fetch_assoc($queryjt);


    //   $sqlper = "SELECT titulo FROM perfil WHERE estado = 0 ";
    //   $perfil = mysqli_query($conexion,$sqlper);
    //   while($perf = mysqli_fetch_row($perfil)){

    //   $acces = $perf[0];

    //   $sqlp = "SELECT perfil,modulo,acceso,n_empleado FROM privilegio WHERE n_empleado = '".$datos[4]."' AND acceso = '".$acces."' AND estado = 0 ";
    //   $permiso = mysqli_query($conexion,$sqlp);

    //   if($perm = mysqli_fetch_array($permiso)){      
        
    //      $acceso = $perm['acceso']; 
                 
    //   }else{
    //     $acces = 'acceso';        
    //   }

    // }


//     $sqlp = "SELECT perfil,modulo,acceso,n_empleado FROM privilegio WHERE n_empleado = '".$datos[4]."' && estado = 0 ";
//     $permiso = mysqli_query($conexion,$sqlp);
//     while($perm = mysqli_fetch_row($permiso)){

//       if (!empty($perm[3]) ) {
//           $acceso = $perm[2];
//           $nmplea = $perm[3];


// //ADMINISTRADOR
//   if($acceso == 'aaltapersonl'){
//     $acceso; 
//   }else{
//     $acceso = 'ok';
//   }

//   if($acceso == 'aaltapersonlxtrn'){
//     $acceso;
//   }else{
//     $acceso = 'ok';
//   }

//   if($acceso == 'aaltainstrucxtrn'){
//     $acceso;
//   }else{
//     $acceso = 'ok';
//   }          
          
          // alistapersonl
          // aasigpuesto
          // aeditausu
          // aanadestudio
          // aasignapuesto
          // aeliminausu
          // alistainspctr
          // aevalinspctor
          // aapendice
          // aditarinspctr
          // agradostudio
          // axperienciapro
          // alistainstc
          // aeditaprfil1
          // aacceso1
          // aacceso2
          // aacceso3



//       }else{
    
//       }
// }

?>