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
<!-- <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
</button>  -->                 <input type="checkbox" name="selectall" id="selectall">
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
      
            //echo $idcurso;
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
        while ($per = mysqli_fetch_row($person)) {

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

        if($res['spcialidds']==''){ $categoria = $per[9]; }

        }else{
        $categoria = $per[9];
        }

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
// echo '<br>';
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

if($fecs[3] < 80 && $idcurso == $fecs[4] && $fecs[2]=='FINALIZADO' && $fecs[5] == 'CONFIRMADO'){ 
    ?>

        <tr><td style="width: 5%;"><input type='checkbox' name='idinsp[]' id='id_insp' class="idinsp" value='<?php echo $idpar ?>'></td>
        <td><?php echo $nombre ?></td>
        <td><?php echo $apellidos ?></td>
        <td><?php echo $cPersonal?><br><?php echo $cInstitucional?></td>
        <td><?php echo $categoria?></td>
        <td style="font-weight: bold; height: 50px; color: #3C8DBC;"><?php echo 'Personal antiguo'?></td>
        <td style='color: #333; background-color: #F4F4F4;'><p style='color:red;float:left; '>*</p><?php echo 'POR REALIZAR'?></td></tr>
<?php  
}else if($fecs[3] == 'NULL' && $idcurso == $fecs[4] && $fecs[2]=='FINALIZADO' && $fecs[5] != 'CONFIRMADO')
{
?>
  <tr><td style="width: 5%;"><input type='checkbox' name='idinsp[]' id='id_insp' class="idinsp" value='<?php echo $idpar ?>'></td>
        <td><?php echo $nombre ?></td>
        <td><?php echo $apellidos ?></td>
        <td><?php echo $cPersonal?><br><?php echo $cInstitucional?></td>
        <td><?php echo $categoria?></td>
        <td style="font-weight: bold; height: 50px; color: #3C8DBC;"><?php echo 'Personal antiguo'?></td>
        <td style='color: #333; background-color: #F4F4F4;'><p style='color:red;float:left; '>#</p><?php echo 'POR REALIZAR'?></td></tr>

<?php }

}else if($f3 <= $f2 && $fecs[3] < 80 && $idcurso == $fecs[4] && $fecs[2]=='FINALIZADO'){ 

if($fecs[5] == 'CONFIRMADO'){
   $conf = "<td style='color: #333; background-color: #F4F4F4;'><p style='color:red;float:left; '>*</p>POR REALIZAR</td>";
}else{
  $conf = "<td style='color: #333; background-color: #F4F4F4;'><p style='color:red;float:left; '>#</p>POR REALIZAR</td>";  
}

    ?>
        <tr><td style="width: 5%;"><input type='checkbox' name='idinsp[]' id='id_insp' class="idinsp" value='<?php echo $idpar ?>' /></td>
        <td><?php echo $nombre?></td>
        <td><?php echo $apellidos?></td>
        <td><?php echo $cPersonal?><br><?php echo $cInstitucional?></td>
        <td><?php echo $categoria?></td>
        <td style='font-weight: bold; height: 50px; color: #3C8DBC;'>Personal antiguo</td>
        <?php 
        echo $conf; ?></tr><?php
}

 }else{ 

    ?>
        <tr><td style="width: 5%;"><input type='checkbox' name='idinsp[]' id='id_insp' class="idinsp" value='<?php echo $idpar ?>' /></td>
        <td><?php echo $nombre ?></td>
        <td><?php echo $apellidos ?></td>
        <td><?php echo $cPersonal?><br><?php echo $cInstitucional?></td>
        <td><?php echo $categoria?></td>
        <td style="font-weight: bold; height: 50px; color: green;"><?php echo 'Nuevo ingreso' ?></td>
        <td style="color: #333; background-color: #F4F4F4;"><?php echo 'POR REALIZAR'?></td></tr>
        <?php 
    
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
