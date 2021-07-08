
<?php session_start();

require_once "../../conexion/conexion.php";


      if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

        if($_SESSION['consulta'] > 0){
           
            $idper=$_SESSION['consulta'];
        	
			$f = explode(',', $idper);
			$idcurso = intval($f[0]);


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

			<table class="table display table-striped table-bordered" role="grid" aria-describedby="example_info">
				<thead>
					<tr>
						<th>N°<!-- <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button> --></th>
						<th><i></i> NOMBRE(S)</th>
						<th><i></i> APELLIDOS</th>
						<th><i></i> CORREO</th>
						<th><i></i> CATEGORÍA</th>
					</tr>
				</thead>
				<tbody>
		<?php


	foreach ($valor as $id) {
		if($idcurso!=$id){

$sql = "SELECT personal.gstIdper, personal.gstNombr,personal.gstApell,personal.gstCorro,categorias.gstCatgr, personal.gstIDCat,categorias.gstCsigl FROM personal 
INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat
WHERE personal.estado = 0";

	$person = mysqli_query($conexion,$sql);
	while ($per = mysqli_fetch_row($person)) {
			 if($per[6]==$id){
	?>
				<tr>
					<td style="width: 5%;"><input type='checkbox' name='idinsp[]' id='id_insp' value='<?php echo $per[0]?>' /></td>
					<td><?php echo $per[1]?></td>
					<td><?php echo $per[2]?></td>
					<td><?php echo $per[3]?></td>
					<td><?php echo $per[4]?></td>
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
</div></div></div>

<?php		
	
        }

	?>



	
<?php   }else{   ?>
<input type="hidden" name="id_mstr" id="id_mstr" value="0">
<?php } ?>

