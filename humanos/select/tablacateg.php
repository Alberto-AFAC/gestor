<?php session_start();

require_once "../../conexion/conexion.php";


      if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

        if($_SESSION['consulta'] > 0){
           
            $idper=$_SESSION['consulta'];
        	
			$f = explode(',', $idper);
			$idcurso = intval($f[0]);
            $fecha = intval($f[2]);
            $lista = intval($f[3]);
			$valor = explode(",", $idper);

?>

<div id="scroll" style="width: 100%; height: 300px; overflow: scroll;">
    <div class="box-body">
        <input type="hidden" name="id_mstr" id="id_mstr" value="<?php echo $idcurso?>">

        <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">


        <div class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group" role="group" aria-label="...">
                        <button type="button" style="pointer-events: none; color: white;"
                            class="btn btn-success btn-default">VIGENTE</button>
                        <button type="button" style="pointer-events: none; color: white;"
                            class="btn btn-warning btn-default">POR VENCER</button>
                        <button type="button" style="pointer-events: none; color: white;"
                            class="btn btn-danger btn-default">VENCIDO</button>
                    </div>
                    <input style="float: right;" id="myInput" type="text" placeholder="Búscar...">
                    <br><br>
                    <div class="table-responsive mailbox-messages">

                        <table class="table display table-striped table-bordered" role="grid"
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
		if($idcurso!=$id){

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
    '%d/%m/%Y') as Feingreso,
    personal.gstCargo 
    FROM personal 
    INNER JOIN especialidadcat ON personal.gstIdper = especialidadcat.gstIDper 
    INNER JOIN categorias ON categorias.gstIdcat = especialidadcat.gstIDcat 
    WHERE personal.gstCargo!='INSTRUCTOR' AND personal.estado = 0 ORDER BY gstFeing DESC";        
	$person = mysqli_query($conexion,$sql);
	while ($per = mysqli_fetch_row($person)) {
		$fechaActual = date_create(date('Y-m-d')); 
		$FechaIngreso = date_create($per[7]); 
		$interval = date_diff($FechaIngreso, $fechaActual,false);  
		$antiguedad = intval($interval->format('%R%a'));

	       

		 if($per[6]==$id){        
	?>
    <tr>
<?php

$sql = "
SELECT 
DATE_FORMAT(fechaf, '%d-%m-%Y') AS fechaf,
idinsp,
proceso,
evaluacion,
idmstr,
confirmar
FROM cursos 
WHERE idmstr = $lista AND idinsp = $per[0] 
ORDER BY fcurso DESC LIMIT 1";
$fechas = mysqli_query($conexion,$sql);

if($fecs = mysqli_fetch_row($fechas)){

 $fecs[0];
 $fecs[1];
 $per[0];

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

     if($fecs[3] < 80 && $idcurso == $fecs[4] && $fecs[2]=='FINALIZADO'){ 

if($fecs[5] == 'CONFIRMADO'){
   $conf = "<td style='color: #333; background-color: #F4F4F4;'><p style='color:red;float:left; '>*</p>POR REALIZAR</td>";
}else{
  $conf = "<td style='color: #333; background-color: #F4F4F4;'><p style='color:red;float:left; '>#</p>POR REALIZAR</td>";  
}

    ?>

        <td style="width: 5%;"><input type='checkbox' name='idinsp[]' id='id_insp' class="idinsp" value='<?php echo $per[0]?>' /></td>
        <td><?php echo $per[1]?></td>
        <td><?php echo $per[2]?></td>
        <td><?php echo $per[3]?></td>
        <td><?php echo $per[4]?></td>

        <?php 
        if($antiguedad <=30){
        echo "<td style='color:green; font-weight: bold;'>Nuevo ingreso</td>";
        }else {
        echo "<td style='color: #3C8DBC; font-weight: bold;'>Personal antiguo</td>";
        }
        echo $conf;
}

 }else if($f3>=$f1){
//$fech = 'vencido';
?>
        <td style="width: 5%;"><input type='checkbox' name='idinsp[]' id='id_insp' value='<?php echo $per[0]?>' class="idinsp" /></td>
        <td><?php echo $per[1]?></td>
        <td><?php echo $per[2]?></td>
        <td><?php echo $per[3]?></td>
        <td><?php echo $per[4]?></td>


        <?php 
        if($antiguedad <=30){
        echo "<td style='color:green; font-weight: bold;'>Nuevo ingreso</td>";
        }else {
        echo "<td style='color: #3C8DBC; font-weight: bold;'>Personal antiguo</td>";
        }

        echo "<td style='color: white; background-color:#AC2925;'>REPROGRAMAR</td>";


}else if($f3 <= $f2 && $fecs[3] >= 80 ){ //$fech = 'vigente'; ?>
        <td style="width: 5%;"><input disabled="" type='checkbox' 
        value='<?php echo $per[0]?>' /></td>
        <td><?php echo $per[1]?></td>
        <td><?php echo $per[2]?></td>
        <td><?php echo $per[3]?></td>
        <td><?php echo $per[4]?></td>
        <?php 
        if($antiguedad <=30){
        echo "<td style='color:green; font-weight: bold;'>Nuevo ingreso</td>";
        }else {
        echo "<td style='color: #3C8DBC; font-weight: bold;'>Personal antiguo</td>";
        }
        echo "<td style='color: white; background-color: #398439;'>$fechav</td>";

}else 

if($f3 <= $f2 && $fecs[3] < 80 && $idcurso == $fecs[4] && $fecs[2]=='FINALIZADO'){ 



if($fecs[5] == 'CONFIRMADO'){
   $conf = "<td style='color: #333; background-color: #F4F4F4;'><p style='color:red;float:left; '>*</p>POR REALIZAR</td>";
}else{
  $conf = "<td style='color: #333; background-color: #F4F4F4;'><p style='color:red;float:left; '>#</p>POR REALIZAR</td>";  
}

    ?>


     

        <td style="width: 5%;"><input type='checkbox' name='idinsp[]' id='id_insp' class="idinsp" value='<?php echo $per[0]?>' /></td>
        <td><?php echo $per[1]?></td>
        <td><?php echo $per[2]?></td>
        <td><?php echo $per[3]?></td>
        <td><?php echo $per[4]?></td>

        <?php 
        if($antiguedad <=30){
        echo "<td style='color:green; font-weight: bold;'>Nuevo ingreso</td>";
        }else {
        echo "<td style='color: #3C8DBC; font-weight: bold;'>Personal antiguo</td>";
        }
        echo $conf;




}else if($f3 >= $f2){   //$fech = 'por vencer';   ?>
        <td style="width: 5%;"><input type='checkbox' name='idinsp[]' id='id_insp' class="idinsp" value='<?php echo $per[0]?>' /></td>
        <td><?php echo $per[1]?></td>
        <td><?php echo $per[2]?></td>
        <td><?php echo $per[3]?></td>
        <td><?php echo $per[4]?></td>

        <?php 
        if($antiguedad <=30){
        echo "<td style='color:green; font-weight: bold;'>Nuevo ingreso</td>";
        }else {
        echo "<td style='color: #3C8DBC; font-weight: bold;'>Personal antiguo</td>";
        }

        echo "<td style='color: white; background-color: #D58512;'>REPROGRAMAR</td>";

}  


 }else{ ?>

        <td style="width: 5%;"><input type='checkbox' name='idinsp[]' id='id_insp' class="idinsp" value='<?php echo $per[0]?>' /></td>
        <td><?php echo $per[1]?></td>
        <td><?php echo $per[2]?></td>
        <td><?php echo $per[3]?></td>
        <td><?php echo $per[4]?></td>

        <?php 
        if($antiguedad <=30){
        echo "<td style='color:green; font-weight: bold;'>Nuevo ingreso</td>";
        }else {
        echo "<td style='color: #3C8DBC; font-weight: bold;'>Personal antiguo</td>";
        }
        echo "<td style='color: #333; background-color: #F4F4F4;'>POR REALIZAR</td>";
}

?>        </tr>
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

<?php		
	
        }

	?>




<?php   }else{   ?>
<input type="hidden" name="id_mstr" id="id_mstr" value="0">
<?php } ?>


<script type="text/javascript">

// Use 'prop' instead of 'attr'
// 'attr' only work the first time, better use 'prop'

// add multiple select/unselect functionality
$("#selectall").on("click", function() {
  $(".idinsp").prop("checked", this.checked);
});

// if all checkbox are selected, check the selectall checkbox and viceversa
$(".idinsp").on("click", function() {
  if ($(".idinsp").length == $(".idinsp:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
    

</script>