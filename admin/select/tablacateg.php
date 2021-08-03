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
                    <div class="table-responsive mailbox-messages">

                        <table class="table display table-striped table-bordered" role="grid"
                            aria-describedby="example_info">
                            <thead>
                                <tr>
                                    <th>N°
                                        <!-- <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button> -->
                                    </th>
                                    <th><i></i> NOMBRE(S)</th>
                                    <th><i></i> APELLIDOS</th>
                                    <th><i></i> CORREO</th>
                                    <th><i></i> CATEGORÍA</th>
                                    <th><i></i> DETALLE</th>
                                    <th style="width: 100px"><i></i> ESTADO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$f = $fecha;


	foreach ($valor as $id) {
		if($idcurso!=$id){


//echo $fecha;

$sql = "SELECT 	
personal.gstIdper, 
personal.gstNombr, 
personal.gstApell, 
personal.gstCorro, 
categorias.gstCatgr, 
personal.gstIDCat, 
categorias.gstCsigl,
personal.gstFeing, 
DATE_FORMAT(personal.gstFeing, '%d/%m/%Y') as Feingreso
FROM personal 
INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat
WHERE personal.estado = 0
ORDER BY gstFeing DESC";

	$person = mysqli_query($conexion,$sql);
	while ($per = mysqli_fetch_row($person)) {
		$fechaActual = date_create(date('Y-m-d')); 
		$FechaIngreso = date_create($per[7]); 
		$interval = date_diff($FechaIngreso, $fechaActual,false);  
		$antiguedad = intval($interval->format('%R%a')); 
	
		// if ($antiguedad < 0) {
		// 	echo "Mayor 1";
		// }else if ($antiguedad == 0) {
		// 	echo "iguales";
		// }else if ($antiguedad > 0) {
		// 	echo "Mayor 2";
		// }
		 if($per[6]==$id){
         


	?>
                                <tr>
                                    <td style="width: 5%;"><input type='checkbox' name='idinsp[]' id='id_insp'
                                            value='<?php echo $per[0]?>' /></td>
                                    <td><?php echo $per[1]?></td>
                                    <td><?php echo $per[2]?></td>
                                    <td><?php echo $per[3]?></td>
                                    <td><?php echo $per[4]?></td>


                            <?php 
                            if($antiguedad <=30){
                                echo "<td style='color: white; background-color: rgba(0, 128, 0, 0.658);'>Nuevo ingreso</td>";
                            }else {
                                echo "<td style='color: white; background-color: #3C8DBC;'>Personal antiguo</td>";
                            }
                            ?>

<?php

$sql = "
SELECT DATE_FORMAT(fechaf, '%d-%m-%Y') as fechaf,idinsp FROM cursos 
-- INNER JOIN listacursos ON idmstr = gstIdlsc
-- INNER JOIN personal ON idinsp = gstIdper
WHERE idmstr = $lista";
$fecha = mysqli_query($conexion,$sql);
while ($fec = mysqli_fetch_row($fecha)) {


if($fec[1]==$per[0]){

 $fec[0];
// "<br>";
 $fec[1];
// "<br>";
 $per[0];
// "<br>";
// $fecha;
$fechav = date("d-m-Y",strtotime($fec[0]."+ ".$f." year")); 

$vencer = date("d-m-Y",strtotime($fechav."- 6 month"));
ini_set('date.timezone','America/Mexico_City');
$actual= date("d-m-Y"); 

$f1 = strtotime($fechav);
$f2 = strtotime($vencer);
$f3 = strtotime($actual);

if($f3>=$f1){
$fech = 'vencio';
echo "<td style='color: white; background-color:#AC2925;'>$fechav</td>";
}else if($f3 <= $f2){
$fech = 'vigente';

echo "<td style='color: white; background-color: #398439;'>$fechav</td>";

}else if($f3 >= $f2){
$fech = 'por vencer';
echo "<td style='color: white; background-color: #D58512;'>$fechav</td>";
}

?>
    

<?php } ?> 
        
<?php }  



?>

				
                                </tr>
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