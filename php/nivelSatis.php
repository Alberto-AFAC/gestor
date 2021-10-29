<?php 
      $query ="SELECT * FROM
      reaccion";
         $resultado = mysqli_query($conexion, $query);
        //  VARIABLES PREGUNTA 1
         $deficiente = 0;
         $nosatisfactorio = 0;
         $regular=0;
         $satisfactorio=0;
         $excelentes=0;
          //  VARIABLES PREGUNTA 2
         $deficiente2 = 0;
         $nosatisfactorio2 = 0;
         $regular2=0;
         $satisfactorio2=0;
         $excelentes2=0;
          //  VARIABLES PREGUNTA 3
         $deficiente3 = 0;
         $nosatisfactorio3 = 0;
         $regular3=0;
         $satisfactorio3=0;
         $excelentes3=0;
          //  VARIABLES PREGUNTA 4
         $deficiente4 = 0;
         $nosatisfactorio4 = 0;
         $regular4=0;
         $satisfactorio4=0;
         $excelentes4=0;
        //  VARIABLES PREGUNTA 5
         $deficiente5 = 0;
         $nosatisfactorio5 = 0;
         $regular5=0;
         $satisfactorio5=0;
         $excelentes5=0;
          //  VARIABLES PREGUNTA 6
          $deficiente6 = 0;
          $nosatisfactorio6 = 0;
          $regular6=0;
          $satisfactorio6=0;
          $excelentes6=0;
        //  VARIABLES PREGUNTA 7
        $deficiente7 = 0;
        $nosatisfactorio7 = 0;
        $regular7=0;
        $satisfactorio7=0;
        $excelentes7=0;
         //  VARIABLES PREGUNTA 8
         $deficiente8 = 0;
         $nosatisfactorio8 = 0;
         $regular8=0;
         $satisfactorio8=0;
         $excelentes8=0;
        //  VARIABLES PREGUNTA 9
        $deficiente9 = 0;
        $nosatisfactorio9 = 0;
        $regular9=0;
        $satisfactorio9=0;
        $excelentes9=0;
        //  VARIABLES PREGUNTA 10
        $deficiente10 = 0;
        $nosatisfactorio10 = 0;
        $regular10=0;
        $satisfactorio10=0;
        $excelentes10=0;
        //  VARIABLES PREGUNTA 11
        $deficiente11 = 0;
        $nosatisfactorio11 = 0;
        $regular11=0;
        $satisfactorio11=0;
        $excelentes11=0;
        //  VARIABLES PREGUNTA 12
        $deficiente12 = 0;
        $nosatisfactorio12 = 0;
        $regular12=0;
        $satisfactorio12=0;
        $excelentes12=0;
         //  VARIABLES PREGUNTA 13
         $deficiente13 = 0;
         $nosatisfactorio13 = 0;
         $regular13=0;
         $satisfactorio13=0;
         $excelentes13=0;
         //  VARIABLES PREGUNTA 14
         $deficiente14 = 0;
         $nosatisfactorio14 = 0;
         $regular14=0;
         $satisfactorio14=0;
         $excelentes14=0;
         //  VARIABLES PREGUNTA 15
         $deficiente15 = 0;
         $nosatisfactorio15 = 0;
         $regular15=0;
         $satisfactorio15=0;
         $excelentes15=0;
         //  VARIABLES PREGUNTA 16
         $deficiente16 = 0;
         $nosatisfactorio16 = 0;
         $regular16=0;
         $satisfactorio16=0;
         $excelentes16=0;
         //  VARIABLES PREGUNTA 17
         $deficiente17 = 0;
         $nosatisfactorio17 = 0;
         $regular17=0;
         $satisfactorio17=0;
         $excelentes17=0;
         //  VARIABLES PREGUNTA 18
         $deficiente18 = 0;
         $nosatisfactorio18 = 0;
         $regular18=0;
         $satisfactorio18=0;
         $excelentes18=0;
         //  VARIABLES PREGUNTA 19
         $deficiente19 = 0;
         $nosatisfactorio19 = 0;
         $regular19=0;
         $satisfactorio19=0;
         $excelentes19=0;
        //  VARIABLES PREGUNTA 20
         $deficiente20 = 0;
         $nosatisfactorio20 = 0;
         $regular20=0;
         $satisfactorio20=0;
         $excelentes20=0;

         //  VARIABLES PREGUNTA 21
         $deficiente21 = 0;
         $nosatisfactorio21 = 0;
         $regular21=0;
         $satisfactorio21=0;
         $excelentes21=0;

         //  VARIABLES PREGUNTA 22
         $deficiente22 = 0;
         $nosatisfactorio22 = 0;
         $regular22=0;
         $satisfactorio22=0;
         $excelentes22=0;

         //  VARIABLES PREGUNTA 23
         $deficiente23 = 0;
         $nosatisfactorio23 = 0;
         $regular23=0;
         $satisfactorio23=0;
         $excelentes23=0;

         //  VARIABLES PREGUNTA 23
      //   $deficiente26 = 0;
       //  $nosatisfactorio26 = 0;
       //  $regular26=0;
       //  $satisfactorio26=0;
       //  $excelentes26=0;




         $totalresg =0;
        // ANTIGUO ALGORITMO
         $nosatis = 0;
         $satis = 0;
         $excelente = 0;
         $regular = 0;
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
          }if($row[3] == 'REGULAR'){
            $regular++;
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
          }if($row[4] == 'REGULAR'){
            $regular2++;
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
          }if($row[5] == 'REGULAR'){
            $regular3++;
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
          }if($row[6] == 'REGULAR'){
            $regular4++;
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
          }if($row[7] == 'REGULAR'){
            $regular5++;
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
          }if($row[8] == 'REGULAR'){
            $regular6++;
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
          }if($row[9] == 'REGULAR'){
            $regular7++;
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
          }if($row[10] == 'REGULAR'){
            $regular8++;
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
          }if($row[11] == 'REGULAR'){
            $regular9++;
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
          }if($row[12] == 'REGULAR'){
            $regular10++;
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
          }if($row[13] == 'REGULAR'){
            $regular11++;
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
          }if($row[14] == 'REGULAR'){
            $regular12++;
          }

          // ALGORITMO PREGUNTA 13 (CÓMO FUE EL MATERIAL DIDÁCTICO (AUDIOVISUALES, PRESENTACIÓN, TEXTOS, ENLACES) UTILIZADO?)
          if($row[15] == 'DEFICIENTE'){
            $deficiente13++;
          }
          if($row[15] == 'NO SATISFACTORIO'){
            $nosatisfactorio13++;
          }if($row[15] == 'SATISFACTORIO'){
            $satisfactorio13++;
          }if($row[15] == 'EXCELENTE'){
            $excelentes13++;
          }if($row[15] == 'REGULAR'){
            $regular13++;
          }
          
          // ALGORITMO PREGUNTA 14 (CÓMO FUE EL MATERIAL DIDÁCTICO (AUDIOVISUALES, PRESENTACIÓN, TEXTOS, ENLACES) UTILIZADO?)
          if($row[16] == 'DEFICIENTE'){
            $deficiente14++;
          }
          if($row[16] == 'NO SATISFACTORIO'){
            $nosatisfactorio14++;
          }if($row[16] == 'SATISFACTORIO'){
            $satisfactorio14++;
          }if($row[16] == 'EXCELENTE'){
            $excelentes14++;
          }if($row[16] == 'REGULAR'){
            $regular14++;
          }
          
          // ALGORITMO PREGUNTA 15 (CÓMO FUE EL MATERIAL DIDÁCTICO (AUDIOVISUALES, PRESENTACIÓN, TEXTOS, ENLACES) UTILIZADO?)
          if($row[17] == 'DEFICIENTE'){
            $deficiente15++;
          }
          if($row[17] == 'NO SATISFACTORIO'){
            $nosatisfactorio15++;
          }if($row[17] == 'SATISFACTORIO'){
            $satisfactorio15++;
          }if($row[17] == 'EXCELENTE'){
            $excelentes15++;
          }if($row[17] == 'REGULAR'){
            $regular15++;
          }

          // ALGORITMO PREGUNTA 16 (CÓMO FUE EL MATERIAL DIDÁCTICO (AUDIOVISUALES, PRESENTACIÓN, TEXTOS, ENLACES) UTILIZADO?)
          if($row[18] == 'DEFICIENTE'){
            $deficiente16++;
          }
          if($row[18] == 'NO SATISFACTORIO'){
            $nosatisfactorio16++;
          }if($row[18] == 'SATISFACTORIO'){
            $satisfactorio16++;
          }if($row[18] == 'EXCELENTE'){
            $excelentes16++;
          }if($row[18] == 'REGULAR'){
            $regular16++;
          }          

          // ALGORITMO PREGUNTA 17 (CÓMO FUE EL MATERIAL DIDÁCTICO (AUDIOVISUALES, PRESENTACIÓN, TEXTOS, ENLACES) UTILIZADO?)
          if($row[19] == 'DEFICIENTE'){
            $deficiente17++;
          }
          if($row[19] == 'NO SATISFACTORIO'){
            $nosatisfactorio17++;
          }if($row[19] == 'SATISFACTORIO'){
            $satisfactorio17++;
          }if($row[19] == 'EXCELENTE'){
            $excelentes17++;
          }if($row[19] == 'REGULAR'){
            $regular17++;
          }

          // ALGORITMO PREGUNTA 18 (CÓMO FUE EL MATERIAL DIDÁCTICO (AUDIOVISUALES, PRESENTACIÓN, TEXTOS, ENLACES) UTILIZADO?)
          if($row[20] == 'DEFICIENTE'){
            $deficiente18++;
          }
          if($row[20] == 'NO SATISFACTORIO'){
            $nosatisfactorio18++;
          }if($row[20] == 'SATISFACTORIO'){
            $satisfactorio18++;
          }if($row[20] == 'EXCELENTE'){
            $excelentes18++;
          }if($row[20] == 'REGULAR'){
            $regular18++;
          }

          // ALGORITMO PREGUNTA 19 (CÓMO FUE EL MATERIAL DIDÁCTICO (AUDIOVISUALES, PRESENTACIÓN, TEXTOS, ENLACES) UTILIZADO?)
          if($row[21] == 'DEFICIENTE'){
            $deficiente19++;
          }
          if($row[21] == 'NO SATISFACTORIO'){
            $nosatisfactorio19++;
          }if($row[21] == 'SATISFACTORIO'){
            $satisfactorio19++;
          }if($row[21] == 'EXCELENTE'){
            $excelentes19++;
          }if($row[21] == 'REGULAR'){
            $regular19++;
          }

          // ALGORITMO PREGUNTA 20 (CÓMO FUE EL MATERIAL DIDÁCTICO (AUDIOVISUALES, PRESENTACIÓN, TEXTOS, ENLACES) UTILIZADO?)
          if($row[22] == 'DEFICIENTE'){
            $deficiente20++;
          }
          if($row[22] == 'NO SATISFACTORIO'){
            $nosatisfactorio20++;
          }if($row[22] == 'SATISFACTORIO'){
            $satisfactorio20++;
          }if($row[22] == 'EXCELENTE'){
            $excelentes20++;
          }if($row[22] == 'REGULAR'){
            $regular20++;
          }

          // ALGORITMO PREGUNTA 21 (CÓMO FUE EL MATERIAL DIDÁCTICO (AUDIOVISUALES, PRESENTACIÓN, TEXTOS, ENLACES) UTILIZADO?)
         if($row[23] == 'DEFICIENTE'){
            $deficiente21++;
          }
          if($row[23] == 'NO SATISFACTORIO'){
            $nosatisfactorio21++;
          }if($row[23] == 'SATISFACTORIO'){
            $satisfactorio21++;
          }if($row[23] == 'EXCELENTE'){
            $excelentes21++;
          }if($row[23] == 'REGULAR'){
            $regular21++;
          }

          // ALGORITMO PREGUNTA 21 (CÓMO FUE EL MATERIAL DIDÁCTICO (AUDIOVISUALES, PRESENTACIÓN, TEXTOS, ENLACES) UTILIZADO?)
          if($row[24] == 'DEFICIENTE'){
            $deficiente22++;
          }
          if($row[24] == 'NO SATISFACTORIO'){
            $nosatisfactorio22++;
          }if($row[24] == 'SATISFACTORIO'){
            $satisfactorio22++;
          }if($row[24] == 'EXCELENTE'){
            $excelentes22++;
          }if($row[24] == 'REGULAR'){
            $regular22++;
          }

          // ALGORITMO PREGUNTA 23 (CÓMO FUE EL MATERIAL DIDÁCTICO (AUDIOVISUALES, PRESENTACIÓN, TEXTOS, ENLACES) UTILIZADO?)
          if($row[25] == 'DEFICIENTE'){
            $deficiente23++;
          }
          if($row[25] == 'NO SATISFACTORIO'){
            $nosatisfactorio23++;
          }if($row[25] == 'SATISFACTORIO'){
            $satisfactorio23++;
          }if($row[25] == 'EXCELENTE'){
            $excelentes23++;
          }if($row[25] == 'REGULAR'){
            $regular23++;
          }

          // ALGORITMO PREGUNTA 26 (CÓMO FUE EL MATERIAL DIDÁCTICO (AUDIOVISUALES, PRESENTACIÓN, TEXTOS, ENLACES) UTILIZADO?)
         // if($row[28] == 'DEFICIENTE'){
           // $deficiente26++;
          //}if($row[28] == 'NO SATISFACTORIO'){
           // $nosatisfactorio26++;
          //}if($row[28] == 'SATISFACTORIO'){
           // $satisfactorio26++;
         // }if($row[28] == 'EXCELENTE'){
          //  $excelentes26++;
          //}if($row[28] == 'REGULAR'){
          //  $regular26++;
         // }
          
          if($row[31] == '0'){
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

      $pregunta1 = $deficiente * 2 / 10 + $nosatisfactorio * 4 / 10   + $regular * 6 / 10   + $satisfactorio * 8 / 10  + $excelentes * 10 / 10;
      $pregunta2 = $deficiente2 * 2 / 10 + $nosatisfactorio2 * 4 / 10 + $regular2 * 6 / 10  + $satisfactorio2 * 8 / 10  + $excelentes2 * 10 / 10;
      $pregunta3 = $deficiente3 * 2 / 10 + $nosatisfactorio3 * 4 / 10 + $regular3 * 6 / 10  + $satisfactorio3 * 8 / 10  + $excelentes3 * 10 / 10;
      $pregunta4 = $deficiente4 * 2 / 10 + $nosatisfactorio4 * 4 / 10  + $regular4 * 6 / 10 + $satisfactorio4 * 8 / 10  + $excelentes4 * 10 / 10;
      $pregunta5 = $deficiente5 * 2 / 10 + $nosatisfactorio5 * 4 / 10  + $regular5 * 6 / 10 + $satisfactorio5 * 8 / 10  + $excelentes5 * 10 / 10;
      $pregunta6 = $deficiente6 * 2 / 10 + $nosatisfactorio6 * 4 / 10  + $regular6 * 6 / 10 + $satisfactorio6 * 8 / 10  + $excelentes6 * 10 / 10;
      $pregunta7 = $deficiente7 * 2 / 10 + $nosatisfactorio7 * 4 / 10  + $regular7 * 6 / 10 + $satisfactorio7 * 8 / 10  + $excelentes7 * 10 / 10;
      $pregunta8 = $deficiente8 * 2 / 10 + $nosatisfactorio8 * 4 / 10  + $regular8 * 6 / 10 + $satisfactorio8 * 8 / 10  + $excelentes8 * 10 / 10;
      $pregunta9 = $deficiente9 * 2 / 10 + $nosatisfactorio9 * 4 / 10  + $regular9 * 6 / 10 + $satisfactorio9 * 8 / 10  + $excelentes9 * 10 / 10;
      $pregunta10 = $deficiente10 * 2 / 10 + $nosatisfactorio10 * 4 / 10  + $regular10 * 6 / 10 + $satisfactorio10 * 8 / 10  + $excelentes10 * 10 / 10;
      $pregunta11 = $deficiente11 * 2 / 10 + $nosatisfactorio11 * 4 / 10  + $regular11 * 6 / 10 + $satisfactorio11 * 8 / 10  + $excelentes11 * 10 / 10;
      $pregunta12 = $deficiente12 * 2 / 10 + $nosatisfactorio12 * 4 / 10  + $regular12 * 6 / 10 + $satisfactorio12 * 8 / 10  + $excelentes12 * 10 / 10;
      $pregunta13 = $deficiente13 * 2 / 10 + $nosatisfactorio13 * 4 / 10  + $regular13 * 6 / 10 + $satisfactorio13 * 8 / 10  + $excelentes13 * 10 / 10;
      $pregunta14 = $deficiente14 * 2 / 10 + $nosatisfactorio14 * 4 / 10  + $regular14 * 6 / 10 + $satisfactorio14 * 8 / 10  + $excelentes14 * 10 / 10;
      $pregunta15 = $deficiente15 * 2 / 10 + $nosatisfactorio15 * 4 / 10  + $regular15 * 6 / 10 + $satisfactorio15 * 8 / 10  + $excelentes15 * 10 / 10;
      $pregunta16 = $deficiente16 * 2 / 10 + $nosatisfactorio16 * 4 / 10  + $regular16 * 6 / 10 + $satisfactorio16 * 8 / 10  + $excelentes16 * 10 / 10;
      $pregunta17 = $deficiente17 * 2 / 10 + $nosatisfactorio17 * 4 / 10  + $regular17 * 6 / 10 + $satisfactorio17 * 8 / 10  + $excelentes17 * 10 / 10;
      $pregunta18 = $deficiente18 * 2 / 10 + $nosatisfactorio18 * 4 / 10  + $regular18 * 6 / 10 + $satisfactorio18 * 8 / 10  + $excelentes18 * 10 / 10;
      $pregunta19 = $deficiente19 * 2 / 10 + $nosatisfactorio19 * 4 / 10  + $regular19 * 6 / 10 + $satisfactorio19 * 8 / 10  + $excelentes19 * 10 / 10;
      $pregunta20 = $deficiente20 * 2 / 10 + $nosatisfactorio20 * 4 / 10  + $regular20 * 6 / 10 + $satisfactorio20 * 8 / 10  + $excelentes20 * 10 / 10;
      $pregunta21 = $deficiente21 * 2 / 10 + $nosatisfactorio21 * 4 / 10  + $regular21 * 6 / 10 + $satisfactorio21 * 8 / 10  + $excelentes21 * 10 / 10;
      $pregunta22 = $deficiente22 * 2 / 10 + $nosatisfactorio22 * 4 / 10  + $regular22 * 6 / 10 + $satisfactorio22 * 8 / 10  + $excelentes22 * 10 / 10;
      $pregunta23 = $deficiente23 * 2 / 10 + $nosatisfactorio23 * 4 / 10  + $regular23 * 6 / 10 + $satisfactorio23 * 8 / 10  + $excelentes23 * 10 / 10;
      //$pregunta26 = $deficiente26 * 2 / 10 + $nosatisfactorio26 * 4 / 10  + $regular26 * 6 / 10 + $satisfactorio26 * 8 / 10  + $excelentes26 * 10 / 10;



  // $resul1 = $deficiente * 2.5 / 100;
  //$cantidad = $excelentes + $excelentes2 + $excelentes3 + $excelentes4 + $excelentes5 + $excelentes6 + $excelentes7 + $excelentes8 + $excelentes9 + $excelentes10 + $excelentes11 + $excelentes12 + $satisfactorio + $satisfactorio2 + $satisfactorio3 + $satisfactorio3 + $satisfactorio4 + $satisfactorio5 + $satisfactorio6 + $satisfactorio7 + $satisfactorio8 + $satisfactorio9 + $satisfactorio10 + $satisfactorio11 + $satisfactorio12; //NUMERO 
 
  //SUMA DE EXCELENTES Y SATISFACTORIOS PARA OBTENER EL NIVEL GENERAL DE SATISFACCIÓN 
  $cantidad1 = $excelentes + $excelentes2 + $excelentes3 + $excelentes4 + $excelentes5 + $excelentes6 + $excelentes7 + $excelentes8 + $excelentes9 + $excelentes10 + $excelentes11 + $excelentes12 + $excelentes13 + $excelentes14 + $excelentes15 + $excelentes16 + $excelentes17 + $excelentes18 + $excelentes19 + $excelentes20 + $excelentes21 + $excelentes22 + $excelentes23+$satisfactorio + $satisfactorio2 + $satisfactorio3 + $satisfactorio3 + $satisfactorio4 + $satisfactorio5 + $satisfactorio6 + $satisfactorio7 + $satisfactorio8 + $satisfactorio9 + $satisfactorio10 + $satisfactorio11 + $satisfactorio12+$satisfactorio13+$satisfactorio14+$satisfactorio15+$satisfactorio16+$satisfactorio17+$satisfactorio18+$satisfactorio19+$satisfactorio20+$satisfactorio21+$satisfactorio22+$satisfactorio23; 

  //sacar el porcentaje
  $totalfull = $totalresg * 24;
  $totalcantida = $cantidad1 * 100;
      function porcentaje($totalfull, $totalcantida, $redondear = 2) {
        return round($totalcantida / $totalfull, $redondear); 
    }

  //porcentaje de DEFICIENTE 
  $cantidadef = $deficiente + $deficiente2 + $deficiente3 + $deficiente4 + $deficiente5 + $deficiente6 + $deficiente7 + $deficiente8 + $deficiente9 + $deficiente10 + $deficiente11 + $deficiente12 + $deficiente13 + $deficiente14 + $deficiente15 + $deficiente16 + $deficiente17 + $deficiente18 + $deficiente20 + $deficiente21 + $deficiente22 + $deficiente23 ; 
  $totalfulldef = $totalresg * 24;
  $totaldeficiente = $cantidadef * 100;
      function porcentajedef($totalfulldef, $totaldeficiente, $redondear = 2) {
        return round($totaldeficiente / $totalfulldef, $redondear); 
    }

    //porcentaje de NO SATISFACTORIO
  $cantidadnosa = $nosatisfactorio + $nosatisfactorio2 + $nosatisfactorio3 + $nosatisfactorio4 + $nosatisfactorio5 + $nosatisfactorio6 + $nosatisfactorio7 + $nosatisfactorio8 + $nosatisfactorio9 + $nosatisfactorio10 + $nosatisfactorio11 + $nosatisfactorio12 + $nosatisfactorio13+$nosatisfactorio14+$nosatisfactorio15+$nosatisfactorio16+$nosatisfactorio17+$nosatisfactorio18+$nosatisfactorio19+$nosatisfactorio20+$nosatisfactorio21+$nosatisfactorio22+$nosatisfactorio23; 
  $totalfullnosa = $totalresg * 24;
  $totaldnosatisf = $cantidadnosa * 100;
      function porcentaje2($totalfullnosa, $totaldnosatisf, $redondear = 2) {
        return round($totaldnosatisf / $totalfullnosa, $redondear); 
    }

    //porcentaje de SATISFACTORIO
  $cantidadsatis = $satisfactorio + $satisfactorio2 + $satisfactorio3 + $satisfactorio4 + $satisfactorio5 + $satisfactorio6 + $satisfactorio7 + $satisfactorio8 + $satisfactorio9 + $satisfactorio10 + $satisfactorio11 + $satisfactorio12+ $satisfactorio13+ $satisfactorio14+ $satisfactorio15+ $satisfactorio16+ $satisfactorio17+ $satisfactorio18+ $satisfactorio19+ $satisfactorio20+ $satisfactorio21+ $satisfactorio22+ $satisfactorio23; 
  $totalfullsatis = $totalresg * 24;
  $totalsatis = $cantidadsatis * 100;
      function porcentaje3($totalfullsatis, $totalsatis, $redondear = 2) {
        return round($totalsatis / $totalfullsatis, $redondear); 
    }

    //porcentaje de EXCELENTE
  $cantidadexc = $excelentes + $excelentes2 + $excelentes3 + $excelentes4 + $excelentes5 + $excelentes6 + $excelentes7 + $excelentes8 + $excelentes9 + $excelentes10 + $excelentes11 + $excelentes12 + $excelentes13+ $excelentes14+ $excelentes15+ $excelentes16+ $excelentes17+ $excelentes18+ $excelentes19+ $excelentes20+ $excelentes21+ $excelentes22+ $excelentes23; 
  $totalfullexc = $totalresg * 24;
  $totalexc = $cantidadexc * 100;
      function porcentaje4($totalfullexc, $totalexc, $redondear = 2) {
        return round($totalexc / $totalfullexc, $redondear); 
    }

     //porcentaje de REGULAR
  $cantidadregu = $regular + $regular2 + $regular3 + $regular4 + $regular5 + $regular6 + $regular7 + $regular8 + $regular9 + $regular10 + $regular11 + $regular12+ $regular13+ $regular14+ $regular15+ $regular16+ $regular17+ $regular18+ $regular19+ $regular20+ $regular21+ $regular22+ $regular23; 
  $totalfullregu = $totalresg * 24;
  $totalregu = $cantidadregu * 100;
      function porcentaje5($totalfullregu, $totalregu, $redondear = 2) {
        return round($totalregu / $totalfullregu, $redondear); 
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