    <div id="scroll" style="width: 100%; height: 300px; overflow: scroll;">
    <div class="box-body">
        <input type="hidden" name="id_mstr" id="id_mstr" value="<?php echo $idcurso?>">

        <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">


        <div class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group" role="group" aria-label="...">

                        <button type="button" style="background-color: gray; pointer-events: none; color: white;"
                        class="btn btn-default"># DECLINÓ</button>
                        <button type="button" style="background-color: black; pointer-events: none; color: white;"
                        class="btn btn-default">* REPROBÓ</button>
                    </div>
                    <input style="float: right;" id="myInput" type="text" placeholder="Búscar...">
                    <br><br>
                    <div class="table-responsive mailbox-messages">

                        <table id="test" class="table display table-striped table-bordered" role="grid"
                        aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>
               <input type="checkbox" name="selectall" id="selectall">
    </th>
    <th><i></i> NOMBRE(S)</th>
    <th><i></i> APELLIDOS</th>
    <th><i></i> CORREO</th>
    <th><i></i> ESPECIALIDAD</th>
    <th><i></i> DETALLE</th>
    <th style="width: 100px"><i></i> ESTADO</th>
    </tr>
    </thead>
    <tbody id="myTable">
    <?php
    $f = $fecha;


    foreach ($valor as $id) {

        $sql = "SELECT 
        personal.gstIdper,
        personal.gstNombr,
        personal.gstApell,
        personal.gstCorro,
        categorias.gstCatgr,
        personal.gstIDCat,
        categorias.gstCsigl,
        personal.gstFeing,
        DATE_FORMAT(personal.gstFeing,'%d/%m/%Y') AS Feingreso,
        personal.gstCargo,
        personal.gstCinst,
        personal.estado
        FROM personal 
        INNER JOIN especialidadcat 
        ON personal.gstIdper = especialidadcat.gstIDper 
        INNER JOIN categorias 
        ON categorias.gstIdcat = especialidadcat.gstIDcat 
        WHERE categorias.gstCsigl = '$id' AND personal.estado = 0 || categorias.gstCsigl = '$id' AND personal.estado = 3 ORDER BY gstFeing DESC";        
        $person = mysqli_query($conexion,$sql);
        while ($per = mysqli_fetch_row($person)) {



        // $qys = "SELECT * 
        // FROM personal
        // WHERE estado = 3";
        // $rsltd = mysqli_query($conexion, $qys); 
        // while($restd = mysqli_fetch_array($rsltd)){
        //     echo $restd[1];
        //     echo "<br>";
        // }



          if($per[3]== '0'){
            $cPersonal = "<span style='background-color: orange;' class='badge'>Sin correo Personal</span>";
        }else if($per[3]== ''){
            $cPersonal = "<span style='background-color: orange;' class='badge'>Sin correo Personal</span>";
        }else{
            $cPersonal = $per[3];
        }
        if($per[10]== '0'){
            $cInstitucional = "<span style='background-color: orange;' class='badge'>Sin correo Institucional</span>";
        }else if($per[10]== ''){
            $cInstitucional = "<span style='background-color: orange;' class='badge'>Sin correo Institucional</span>";
        }else{
            $cInstitucional = $per[10];
        }

        $gstIdper = $per[0];

        $queri = "SELECT *,GROUP_CONCAT(gstCatgr) AS spcialidds 
        FROM especialidadcat 
        INNER JOIN categorias ON categorias.gstIdcat = especialidadcat.gstIDcat 
        WHERE categorias.gstIdcat != 24 
        AND categorias.gstIdcat != 25 
        AND categorias.gstIdcat != 26 
        AND categorias.gstIdcat != 29 
        AND categorias.gstIdcat != 31
        AND especialidadcat.gstIDper = $gstIdper";
        $resul = mysqli_query($conexion, $queri); 

        if($res = mysqli_fetch_array($resul)){
            $categoria = $res['spcialidds'];

            if($res['spcialidds']==''){ 

                if($per[9]=='NUEVO INGRESO'){
                $categoria = '<p style="color:red;">FALTA ASIGNAR PUESTO</p>';                    
                }else{
                $categoria = $per[9]; 
                }
            }

        }else{
            $categoria = $per[9];
        }


    //     //ES NECESARIO CUMPLIR CON LOS 3 CURSOS PARA REALIZAR LOS SIGUIENTES
    //     $query3 = "
    //     SELECT SUM(sumidmstr) AS obligatorio FROM 
    //     (SELECT idmstr AS sumidmstr 
    //     FROM cursos WHERE prtcpnt = 'SI' AND idmstr = 1 AND idinsp = $gstIdper 
    //     UNION 
    //     SELECT idmstr AS sumidmstr 
    //     FROM cursos WHERE prtcpnt = 'SI' AND idmstr = 2 AND idinsp = $gstIdper 
    //     UNION 
    //     SELECT idmstr AS sumidmstr 
    //     FROM cursos WHERE prtcpnt = 'SI' AND idmstr = 155 AND idinsp = $gstIdper) X";
    //     $result = mysqli_query($conexion, $query3); 
    //     if($reslt = mysqli_fetch_array($result)){
    // //       $categoria = $res['spcialidds'];
    //         if($reslt['obligatorio']==158){ 
    //             $obligatorio = 'CUMPLE'; 
    //         }else{
    //             $obligatorio = 'NO CUMPLE';   
    //         }
    //     }else{
            $obligatorio = 'NO CUMPLE';   
        // }

        $fechaActual = date_create(date('Y-m-d')); 
        $FechaIngreso = date_create($per[7]); 
        $interval = date_diff($FechaIngreso, $fechaActual,false);  
        $antiguedad = intval($interval->format('%R%a'));
        ?>

        <?php

        $sql1 = "
        SELECT 
        DATE_FORMAT(fechaf, '%d-%m-%Y') AS fechaf,
        idinsp,
        proceso,
        evaluacion,
        idmstr,
        confirmar
        FROM cursos 
        WHERE idmstr = $idcurso AND idinsp = $per[0] AND prtcpnt = 'SI'
        ORDER BY fcurso DESC LIMIT 1";
        $fechas = mysqli_query($conexion,$sql1);

        $nombre = $per[1];
        $apellidos = $per[2];
        $idpar = $per[0];


        if($fecs = mysqli_fetch_row($fechas)){  

            $fechav = date("d-m-Y",strtotime($fecs[0]."+ ".$f." year"));     

            $vencer = date("d-m-Y",strtotime($fechav."- 3 month"));
            ini_set('date.timezone','America/Mexico_City');
            $actual= date("d-m-Y"); 

            $f1 = strtotime($fechav);
            $f2 = strtotime($vencer);
            $f3 = strtotime($actual);


            if($fecha==101){  

                if($fecs[3] >= 80){ //$fech = 'vigente'; ?>

            <?php }

            if($fecs[3] == 'NULL' && $idcurso == $fecs[4] && $fecs[2]=='FINALIZADO' || $fecs[3] < 80 && $idcurso == $fecs[4] && $fecs[2]=='FINALIZADO'){ 

                if($fecs[5] == 'CONFIRMADO'){
                 $conf = "<p style='color:red;float:left; '>*</p>POR REALIZAR";
             }else{
              $conf = "<p style='color:red;float:left; '>#</p>POR REALIZAR";  
          }

          ?>

          <tr><td style="width: 5%;"><input type='checkbox' name='idinsp[]' id='id_insp' class="idinsp" value='<?php echo $idpar ?>'></td>
            <td><?php echo $nombre ?></td>
            <td><?php echo $apellidos ?></td>
            <td><?php echo $cPersonal?><br><?php echo $cInstitucional?></td>
            <td><?php echo $categoria?></td>
            <td style="font-weight: bold; height: 50px; color: #3C8DBC;"><?php echo 'Personal antiguo'?></td>
            <td style='color: #333; background-color: #F4F4F4;'><?php echo $conf ?></td></tr>
            <?php  
        }

    }else


if($f3 <= $f2 && $fecs[3] == 'NULL' && $fecs[5] == 'OTROS' || $f3 <= $f2 && $fecs[3] == 'NULL' && $fecs[5] == 'TRABAJO' || $f3 <= $f2 && $fecs[3] == 'NULL' && $fecs[5] == 'ENFERMEDAD'){ ?>

        <tr><td style="width: 5%;"><input type='checkbox' name='idinsp[]' id='id_insp' class="idinsp" value='<?php echo $idpar ?>' /></td>
            <td><?php echo $nombre?></td>
            <td><?php echo $apellidos?></td>
            <td><?php echo $cPersonal?><br><?php echo $cInstitucional?></td>
            <td><?php echo $categoria?></td>
            <td style='font-weight: bold; height: 50px; color: #3C8DBC;'>Personal antiguo</td>
            <td><p style='color:red;float:left; '>#</p>POR REALIZAR</td>

    <?php }


    else if($f3 <= $f2 && $fecs[3] < 80 && $idcurso == $fecs[4] && $fecs[2]=='FINALIZADO'){ 

        if($fecs[5] == 'CONFIRMADO'){
         $conf = "<p style='color:red;float:left; '>*</p>POR REALIZAR";
     }else{
      $conf = "<p style='color:red;float:left; '>#</p>POR REALIZAR";  
    }

    ?>
    <tr><td style="width: 5%;"><input type='checkbox' name='idinsp[]' id='id_insp' class="idinsp" value='<?php echo $idpar ?>' /></td>
    <td><?php echo $nombre?></td>
    <td><?php echo $apellidos?></td>
    <td><?php echo $cPersonal?><br><?php echo $cInstitucional?></td>
    <td><?php echo $categoria?></td>
    <td style='font-weight: bold; height: 50px; color: #3C8DBC;'>Personal antiguo</td>
    <td style='color: #333; background-color: #F4F4F4;'><?php echo $conf ?></td></tr>
    <?php 

    }

    }else{ 

    $query2 = "SELECT *
    FROM cursos 
    WHERE idinsp  = $per[0] AND proceso = 'FINALIZADO'";
    $resultado = mysqli_query($conexion, $query2);
    if($curs = mysqli_fetch_row($resultado)){ 

        $estancia = '<td style="font-weight: bold; height: 50px; color: #3C8DBC;">Personal antiguo</td>';

    }else{

        if($per[11]==3){
        $estancia = '<td style="font-weight: bold; height: 50px; color: silver;">Externo</td>';        
        }else{
        $estancia = '<td style="font-weight: bold; height: 50px; color: green;">Nuevo ingreso</td>';        
        }
    }

    if($per[9]=='NUEVO INGRESO'){
        $ingreso = "<input type='checkbox' disabled/>";
    }else{
        $ingreso = "<input type='checkbox' name='idinsp[]' id='id_insp' class='idinsp' value='<?php echo $idpar ?>' />";
    }

    //CONDCION PARA LOS QUE CUMPLEN LOS 3 CURSOS
    // if($obligatorio=='CUMPLE'){
        ?>
        <tr><td style="width: 5%;"><?php echo $ingreso?></td>
            <td><?php echo $nombre ?></td>
            <td><?php echo $apellidos ?></td>
            <td><?php echo $cPersonal?><br><?php echo $cInstitucional?></td>
            <td><?php echo $categoria?></td>
            <?php echo $estancia ?>
            <td style="color: #333; background-color: #F4F4F4;"><?php echo 'POR REALIZAR'?></td></tr>
            <?php 
    //     }
     }
    ?>        
    <?php 

    }

    }   
    ?>

    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
