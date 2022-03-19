    <div id="scroll" style="width: 100%; height: 300px; overflow: scroll;">
    <div class="box-body">
<!--         <input type="hidden" name="id_mstr" id="id_mstr" value="<?php echo $idcurso?>"> -->

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
                    <input style="float: right;" id="myBusqd" type="text" placeholder="Búscar...">
                    <br><br>
                    <div class="table-responsive mailbox-messages">

                        <table id="test" class="table display table-striped table-bordered" role="grid"
                        aria-describedby="example_info">
                        <thead>
                            <tr>
    <th><i></i> ID</th>
    <th><i></i> NOMBRE(S)</th>
    <th><i></i> APELLIDOS</th>
    <th><i></i> CORREO</th>
    <th><i></i> ESPECIALIDAD</th>
    <th><i></i> CURSO</th>
    <th style="width: 100px"><i></i> ESTADO</th>
    </tr>
    </thead>
    <tbody id="myTable">
    <?php
//    $f = $fecha;

    $sqlst = "SELECT * FROM listacursos WHERE estado = 0";
    $rsltcrs = mysqli_query($conexion,$sqlst);
    while($rslcr = mysqli_fetch_assoc($rsltcrs)) {
            
    
        $valor = explode(",", $rslcr['gstPrfil']);           
        foreach ($valor as $id) {   


            if($titulo==$id){
    
            $sql = "SELECT 
            personal.gstIdper,
            personal.gstNombr,
            personal.gstApell,
            personal.gstCorro,
            categorias.gstCatgr,
            personal.gstIDCat,
            categorias.gstCsigl,
            personal.gstFeing,
            DATE_FORMAT(personal.gstFeing,
            '%d/%m/%Y') AS Feingreso,
            personal.gstCargo,
            personal.gstCinst
            FROM personal 
            INNER JOIN especialidadcat 
            ON personal.gstIdper = especialidadcat.gstIDper 
            INNER JOIN categorias 
            ON categorias.gstIdcat = especialidadcat.gstIDcat 
            WHERE categorias.gstCsigl = '$id' AND personal.estado = 0 ORDER BY gstFeing DESC";        
            $person = mysqli_query($conexion,$sql);
            $n = 1;
            while ($per = mysqli_fetch_row($person)) {
              $idcurso = $rslcr['gstIdlsc']; 
              $f = $rslcr['gstVignc'];
              $fecha = $rslcr['gstVignc'];
              $gstTitlo = $rslcr['gstTitlo'];    

             // echo '<br>'.$n++.'<>'.$per[0].' '.$per[1].' '.$rslcr['gstTitlo'];

            // echo $rslcr['gstIdlsc'].'<--->'.$rslcr['gstTitlo'].'<--->'.$rslcr['gstPrfil'].'<--->'.$per[1];

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


        $categoria = $per[4];

            $obligatorio = 'NO CUMPLE';   
       

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
        WHERE idmstr = $idcurso AND idinsp = $gstIdper AND prtcpnt = 'SI'
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

          <tr><td><?php echo $idpar ?></td>
            <td><?php echo $nombre ?></td>
            <td><?php echo $apellidos ?></td>
            <td><?php echo $cPersonal?><br><?php echo $cInstitucional?></td>
            <td><?php echo $categoria?></td>
            <td style="font-weight: bold; height: 50px; color: #3C8DBC;"><?php echo $gstTitlo ?></td>
            <td style='color: #333; background-color: #F4F4F4;'><?php echo $conf ?></td></tr>
            <?php  
        }

    }

if($f3 <= $f2 && $fecs[3] == 'NULL' && $fecs[5] == 'OTROS' || $f3 <= $f2 && $fecs[3] == 'NULL' && $fecs[5] == 'TRABAJO' || $f3 <= $f2 && $fecs[3] == 'NULL' && $fecs[5] == 'ENFERMEDAD'){ ?>

            <td><?php echo $idpar ?></td>
            <td><?php echo $nombre?></td>
            <td><?php echo $apellidos?></td>
            <td><?php echo $cPersonal?><br><?php echo $cInstitucional?></td>
            <td><?php echo $categoria?></td>
            <td style='font-weight: bold; height: 50px; color: #3C8DBC;'><?php echo $gstTitlo ?></td>
            <td><p style='color:red;float:left; '>#</p>POR REALIZAR</td>

    <?php }

    else if($f3 <= $f2 && $fecs[3] < 80 && $idcurso == $fecs[4] && $fecs[2]=='FINALIZADO'){ 

        if($fecs[5] == 'CONFIRMADO'){
         $conf = "<p style='color:red;float:left; '>*</p>POR REALIZAR";
     }else{
      $conf = "<p style='color:red;float:left; '>#</p>POR REALIZAR";  
    }

    ?>
    <tr><td><?php echo $idpar ?></td>
    <td><?php echo $nombre?></td>
    <td><?php echo $apellidos?></td>
    <td><?php echo $cPersonal?><br><?php echo $cInstitucional?></td>
    <td><?php echo $categoria?></td>
    <td style='font-weight: bold; height: 50px; color: #3C8DBC;'><?php echo $gstTitlo ?></td>
    <td style='color: #333; background-color: #F4F4F4;'><?php echo $conf ?></td></tr>
    <?php 

    }

    }else{ 

        ?>
        <tr><td><?php echo $idpar ?></td>
            <td><?php echo $nombre ?></td>
            <td><?php echo $apellidos ?></td>
            <td><?php echo $cPersonal?><br><?php echo $cInstitucional?></td>
            <td><?php echo $categoria?></td>
            <td style="font-weight: bold; height: 50px; color: #3C8DBC;"><?php echo $gstTitlo ?></td>
            <td style="color: #333; background-color: #F4F4F4;"><?php echo 'POR REALIZAR'?></td></tr>
            <?php 
    //     }
     }
    ?>        
    <?php 

            }

            }

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
