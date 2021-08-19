<?php 
      $query ="SELECT * FROM
      reaccion";
         $resultado = mysqli_query($conexion, $query);
        //  VARIABLES PREGUNTA 1
         $deficiente = 0;
         $nosatisfactorio = 0;
         $satisfactorio=0;
         $excelentes=0;
          //  VARIABLES PREGUNTA 2
         $deficiente2 = 0;
         $nosatisfactorio2 = 0;
         $satisfactorio2=0;
         $excelentes2=0;
          //  VARIABLES PREGUNTA 3
         $deficiente3 = 0;
         $nosatisfactorio3 = 0;
         $satisfactorio3=0;
         $excelentes3=0;
          //  VARIABLES PREGUNTA 4
         $deficiente4 = 0;
         $nosatisfactorio4 = 0;
         $satisfactorio4=0;
         $excelentes4=0;
        //  VARIABLES PREGUNTA 5
         $deficiente5 = 0;
         $nosatisfactorio5 = 0;
         $satisfactorio5=0;
         $excelentes5=0;
          //  VARIABLES PREGUNTA 6
          $deficiente6 = 0;
          $nosatisfactorio6 = 0;
          $satisfactorio6=0;
          $excelentes6=0;
        //  VARIABLES PREGUNTA 7
        $deficiente7 = 0;
        $nosatisfactorio7 = 0;
        $satisfactorio7=0;
        $excelentes7=0;
         //  VARIABLES PREGUNTA 8
         $deficiente8 = 0;
         $nosatisfactorio8 = 0;
         $satisfactorio8=0;
         $excelentes8=0;
        //  VARIABLES PREGUNTA 9
        $deficiente9 = 0;
        $nosatisfactorio9 = 0;
        $satisfactorio9=0;
        $excelentes9=0;
        //  VARIABLES PREGUNTA 10
        $deficiente10 = 0;
        $nosatisfactorio10 = 0;
        $satisfactorio10=0;
        $excelentes10=0;
        //  VARIABLES PREGUNTA 11
        $deficiente11 = 0;
        $nosatisfactorio11 = 0;
        $satisfactorio11=0;
        $excelentes11=0;
        //  VARIABLES PREGUNTA 12
        $deficiente12 = 0;
        $nosatisfactorio12 = 0;
        $satisfactorio12=0;
        $excelentes12=0;
        $totalresg =0;
        // ANTIGUO ALGORITMO
         $nosatis = 0;
         $satis = 0;
         $excelente = 0;
         while($row = mysqli_fetch_row($resultado)) {
          // ALGORITMO PREGUNTA 1 (SE ESPECIFICÓ LOS OBJETIVOS AL INICIO DEL CURSO, EN FORMA CLARA Y COMPRENSIBLE?)
          if($row[3] == 'DEFICIENTE'){
            $deficiente++;
          }
          if($row[3] == 'NO SATISFACTORIO'){
            $nosatisfactorio++;
          }if($row[3] == 'SATISFACTORIO'){
            $satisfactorio++;
          }if($row[3] == 'EXCELENTE'){
            $excelentes++;
          }

          // ALGORITMO PREGUNTA 2 (SE EXPLICÓ EL MODO DE EVALUACIÓN AL INICIO DEL CURSO?)
          if($row[4] == 'DEFICIENTE'){
            $deficiente2++;
          }
          if($row[4] == 'NO SATISFACTORIO'){
            $nosatisfactorio2++;
          }if($row[4] == 'SATISFACTORIO'){
            $satisfactorio2++;
          }if($row[4] == 'EXCELENTE'){
            $excelentes2++;
          }

           // ALGORITMO PREGUNTA 3 (EL INSTRUCTOR/A CONTESTÓ LAS DUDAS EN TIEMPO Y FORMA?)
           if($row[5] == 'DEFICIENTE'){
            $deficiente3++;
          }
          if($row[5] == 'NO SATISFACTORIO'){
            $nosatisfactorio3++;
          }if($row[5] == 'SATISFACTORIO'){
            $satisfactorio3++;
          }if($row[5] == 'EXCELENTE'){
            $excelentes3++;
          }
          // ALGORITMO PREGUNTA 4 (LOS CONOCIMIENTOS ADQUIRIDOS SON APLICABLES A TU PUESTO DE TRABAJO?)
          if($row[6] == 'DEFICIENTE'){
            $deficiente4++;
          }
          if($row[6] == 'NO SATISFACTORIO'){
            $nosatisfactorio4++;
          }if($row[6] == 'SATISFACTORIO'){
            $satisfactorio4++;
          }if($row[6] == 'EXCELENTE'){
            $excelentes4++;
          }
           // ALGORITMO PREGUNTA 5 (CONSIDERAS QUE EL CONTENIDO DEL CURSO FUE SUFICIENTE?)
           if($row[7] == 'DEFICIENTE'){
            $deficiente5++;
          }
          if($row[7] == 'NO SATISFACTORIO'){
            $nosatisfactorio5++;
          }if($row[7] == 'SATISFACTORIO'){
            $satisfactorio5++;
          }if($row[7] == 'EXCELENTE'){
            $excelentes5++;
          }
           // ALGORITMO PREGUNTA 6 (EL CURSO CUBRIÓ TUS EXPECTATIVAS?)
           if($row[8] == 'DEFICIENTE'){
            $deficiente6++;
          }
          if($row[8] == 'NO SATISFACTORIO'){
            $nosatisfactorio6++;
          }if($row[8] == 'SATISFACTORIO'){
            $satisfactorio6++;
          }if($row[8] == 'EXCELENTE'){
            $excelentes6++;
          }
          // ALGORITMO PREGUNTA 7 (EL CURSO CUBRIÓ TUS EXPECTATIVAS?)
          if($row[9] == 'DEFICIENTE'){
            $deficiente7++;
          }
          if($row[9] == 'NO SATISFACTORIO'){
            $nosatisfactorio7++;
          }if($row[9] == 'SATISFACTORIO'){
            $satisfactorio7++;
          }if($row[9] == 'EXCELENTE'){
            $excelentes7++;
          }
          // ALGORITMO PREGUNTA 8 (EL CONTENIDO DEL CURSO AUMENTÓ TUS CONOCIMIENTOS Y COMPRENSIÓN DE LOS TEMAS REVISADOS?)
          if($row[10] == 'DEFICIENTE'){
            $deficiente8++;
          }
          if($row[10] == 'NO SATISFACTORIO'){
            $nosatisfactorio8++;
          }if($row[10] == 'SATISFACTORIO'){
            $satisfactorio8++;
          }if($row[10] == 'EXCELENTE'){
            $excelentes8++;
          }
          // ALGORITMO PREGUNTA 9 (EL TIEMPO PARA ENTREGAR LAS ACTIVIDADES, FUE SUFICIENTE PARA CUMPLIR CON ELLAS?)
          if($row[11] == 'DEFICIENTE'){
            $deficiente9++;
          }
          if($row[11] == 'NO SATISFACTORIO'){
            $nosatisfactorio9++;
          }if($row[11] == 'SATISFACTORIO'){
            $satisfactorio9++;
          }if($row[11] == 'EXCELENTE'){
            $excelentes9++;
          }
          // ALGORITMO PREGUNTA 10 (LA PRESENTACIÓN DEL CONTENIDO, FUE FÁCIL DE REVISAR?)
          if($row[12] == 'DEFICIENTE'){
            $deficiente10++;
          }
          if($row[12] == 'NO SATISFACTORIO'){
            $nosatisfactorio10++;
          }if($row[12] == 'SATISFACTORIO'){
            $satisfactorio10++;
          }if($row[12] == 'EXCELENTE'){
            $excelentes10++;
          }
           // ALGORITMO PREGUNTA 11 (LA EXPLICACIÓN DE LAS TAREAS, FUERON CLARAS Y SENCILLAS?)
           if($row[13] == 'DEFICIENTE'){
            $deficiente11++;
          }
          if($row[13] == 'NO SATISFACTORIO'){
            $nosatisfactorio11++;
          }if($row[13] == 'SATISFACTORIO'){
            $satisfactorio11++;
          }if($row[13] == 'EXCELENTE'){
            $excelentes11++;
          }
           // ALGORITMO PREGUNTA 12 (CÓMO FUE EL MATERIAL DIDÁCTICO (AUDIOVISUALES, PRESENTACIÓN, TEXTOS, ENLACES) UTILIZADO?)
           if($row[14] == 'DEFICIENTE'){
            $deficiente12++;
          }
          if($row[14] == 'NO SATISFACTORIO'){
            $nosatisfactorio12++;
          }if($row[14] == 'SATISFACTORIO'){
            $satisfactorio12++;
          }if($row[14] == 'EXCELENTE'){
            $excelentes12++;
          }if($row[19] == '0'){
            $totalresg++;
          }
          // if($row[4] == 'DEFICIENTE'){
          //   $deficiente++;
          // } if($row[5] == 'DEFICIENTE'){
          //   $deficiente++;
          // } if($row[6] == 'DEFICIENTE'){
          //   $deficiente++;
          // } if($row[7] == 'DEFICIENTE'){
          //   $deficiente++;
          // } if($row[8] == 'DEFICIENTE'){
          //   $deficiente++;
          // } if($row[9] == 'DEFICIENTE'){
          //   $deficiente++;
          // } if($row[10] == 'DEFICIENTE'){
          //   $deficiente++;
          // } if($row[11] == 'DEFICIENTE'){
          //   $deficiente++;
          // } if($row[12] == 'DEFICIENTE'){
          //   $deficiente++;
          // } if($row[13] == 'DEFICIENTE'){
          //   $deficiente++;
          // } if($row[14] == 'DEFICIENTE'){
          //   $deficiente++;
          // } 

          // if($row[3] == 'NO SATISFACTORIO'){
          //   $nosatis++;
          // }if($row[4] == 'NO SATISFACTORIO'){
          //   $nosatis++;
          // } if($row[5] == 'NO SATISFACTORIO'){
          //   $nosatis++;
          // } if($row[6] == 'NO SATISFACTORIO'){
          //   $nosatis++;
          // } if($row[7] == 'NO SATISFACTORIO'){
          //   $nosatis++;
          // } if($row[8] == 'NO SATISFACTORIO'){
          //   $nosatis++;
          // } if($row[9] == 'NO SATISFACTORIO'){
          //   $nosatis++;
          // } if($row[10] == 'NO SATISFACTORIO'){
          //   $nosatis++;
          // } if($row[11] == 'NO SATISFACTORIO'){
          //   $nosatis++;
          // } if($row[12] == 'NO SATISFACTORIO'){
          //   $nosatis++;
          // } if($row[13] == 'NO SATISFACTORIO'){
          //   $nosatis++;
          // } if($row[14] == 'NO SATISFACTORIO'){
          //   $nosatis++;
          // } 

          // if($row[3] == 'SATISFACTORIO'){
          //   $satis++;
          // }if($row[4] == 'SATISFACTORIO'){
          //   $satis++;
          // } if($row[5] == 'SATISFACTORIO'){
          //   $satis++;
          // } if($row[6] == 'SATISFACTORIO'){
          //   $satis++;
          // } if($row[7] == 'SATISFACTORIO'){
          //   $satis++;
          // } if($row[8] == 'SATISFACTORIO'){
          //   $satis++;
          // } if($row[9] == 'SATISFACTORIO'){
          //   $satis++;
          // } if($row[10] == 'SATISFACTORIO'){
          //   $satis++;
          // } if($row[11] == 'SATISFACTORIO'){
          //   $satis++;
          // } if($row[12] == 'SATISFACTORIO'){
          //   $satis++;
          // } if($row[13] == 'SATISFACTORIO'){
          //   $satis++;
          // } if($row[14] == 'SATISFACTORIO'){
          //   $satis++;
          // } 

          // if($row[3] == 'EXCELENTE'){
          //   $excelente++;
          // }if($row[4] == 'EXCELENTE'){
          //   $excelente++;
          // } if($row[5] == 'EXCELENTE'){
          //   $excelente++;
          // } if($row[6] == 'EXCELENTE'){
          //   $excelente++;
          // } if($row[7] == 'EXCELENTE'){
          //   $excelente++;
          // } if($row[8] == 'EXCELENTE'){
          //   $excelente++;
          // } if($row[9] == 'EXCELENTE'){
          //   $excelente++;
          // } if($row[10] == 'EXCELENTE'){
          //   $excelente++;
          // } if($row[11] == 'EXCELENTE'){
          //   $excelente++;
          // } if($row[12] == 'EXCELENTE'){
          //   $excelente++;
          // } if($row[13] == 'EXCELENTE'){
          //   $excelente++;
          // } if($row[14] == 'EXCELENTE'){
          //   $excelente++;
          // } 
          
        //  if($row['pregunta1'] == 'DEFICIENTE'){
        // }
      }
      $pregunta1 = $deficiente * 2.5 / 10 + $nosatisfactorio * 5 / 10   + $satisfactorio * 7.5 / 10  + $excelentes * 10 / 10;
      $pregunta2 = $deficiente2 * 2.5 / 10 + $nosatisfactorio2 * 5 / 10   + $satisfactorio2 * 7.5 / 10  + $excelentes2 * 10 / 10;
      $pregunta3 = $deficiente3 * 2.5 / 10 + $nosatisfactorio3 * 5 / 10   + $satisfactorio3 * 7.5 / 10  + $excelentes3 * 10 / 10;
      $pregunta4 = $deficiente4 * 2.5 / 10 + $nosatisfactorio4 * 5 / 10   + $satisfactorio4 * 7.5 / 10  + $excelentes4 * 10 / 10;
      $pregunta5 = $deficiente5 * 2.5 / 10 + $nosatisfactorio5 * 5 / 10   + $satisfactorio5 * 7.5 / 10  + $excelentes5 * 10 / 10;
      $pregunta6 = $deficiente6 * 2.5 / 10 + $nosatisfactorio6 * 5 / 10   + $satisfactorio6 * 7.5 / 10  + $excelentes6 * 10 / 10;
      $pregunta7 = $deficiente7 * 2.5 / 10 + $nosatisfactorio7 * 5 / 10   + $satisfactorio7 * 7.5 / 10  + $excelentes7 * 10 / 10;
      $pregunta8 = $deficiente8 * 2.5 / 10 + $nosatisfactorio8 * 5 / 10   + $satisfactorio8 * 7.5 / 10  + $excelentes8 * 10 / 10;
      $pregunta9 = $deficiente9 * 2.5 / 10 + $nosatisfactorio9 * 5 / 10   + $satisfactorio9 * 7.5 / 10  + $excelentes9 * 10 / 10;
      $pregunta10 = $deficiente10 * 2.5 / 10 + $nosatisfactorio10 * 5 / 10   + $satisfactorio10 * 7.5 / 10  + $excelentes10 * 10 / 10;
      $pregunta11 = $deficiente11 * 2.5 / 10 + $nosatisfactorio11 * 5 / 10   + $satisfactorio11 * 7.5 / 10  + $excelentes11 * 10 / 10;
      $pregunta12 = $deficiente12 * 2.5 / 10 + $nosatisfactorio12 * 5 / 10   + $satisfactorio12 * 7.5 / 10  + $excelentes12 * 10 / 10;


      
  // $resul1 = $deficiente * 2.5 / 100;
  $cantidad = $excelentes + $excelentes2 + $excelentes3 + $excelentes4 + $excelentes5 + $excelentes6 + $excelentes7 + $excelentes8 + $excelentes9 + $excelentes10 + $excelentes11 + $excelentes12 + $satisfactorio + $satisfactorio2 + $satisfactorio3 + $satisfactorio3 + $satisfactorio4 + $satisfactorio5 + $satisfactorio6 + $satisfactorio7 + $satisfactorio8 + $satisfactorio9 + $satisfactorio10 + $satisfactorio11 + $satisfactorio12; //NUMERO 
  $cantidad1 = $excelentes + $excelentes2 + $excelentes3 + $excelentes4 + $excelentes5 + $excelentes6 + $excelentes7 + $excelentes8 + $excelentes9 + $excelentes10 + $excelentes11 + $excelentes12 + $satisfactorio + $satisfactorio2 + $satisfactorio3 + $satisfactorio3 + $satisfactorio4 + $satisfactorio5 + $satisfactorio6 + $satisfactorio7 + $satisfactorio8 + $satisfactorio9 + $satisfactorio10 + $satisfactorio11 + $satisfactorio12; 
 //sacar el porcentaje
  $totalfull = $totalresg * 12;
  $totalcantida = $cantidad1 * 100;
      
      
      function porcentaje($totalfull, $totalcantida, $redondear = 2) {
        return round($totalcantida / $totalfull, $redondear); 
    }
     
    // $n1 = 255;
    // $n2 = 133;
    // $n3 = 87;
     
    // $total = $n1+$n2+$n3;
     
    // echo "$n1 es el " . porcentaje($total, $n1, 2) . "% de $total <br>";
    // echo "$n2 es el " . porcentaje($total, $n2, 2) . "% de $total <br>";
    // echo "$n3 es el " . porcentaje($total, $n3, 2) . "% de $total <br>";
        // echo "el 5 por ciento de 1000 es ".$totalPorcentaje.", con dos decimales";
      // $resul2= $nosatis * 5 / 100;
      // $resul3 = $satis * 7.5 / 100;
      // $resul4 = $excelente * 10 / 100;
      
      // $resul1 = $deficiente * 2.5 / 100;
      // switch ($resul1) {
      //   case 1:
      //     echo $resul1 = $deficiente * 2.5 / 100;
      //     break;
      // }
      


?>