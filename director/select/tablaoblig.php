<?php session_start();

		require_once "../../conexion/conexion.php";

		$idcur=0;
		$idcat=0;

      if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

        if($_SESSION['consulta'] > 0){
        
        $idper=$_SESSION['consulta'];

		$ids = explode(",", $idper);
		$idcur = $ids[0];
		$idcat = $ids[1]; 
    
        $sqli="SELECT listacursos.gstIdlsc,listacursos.gstTitlo FROM listacursobliga 
			   INNER JOIN listacursos ON listacursobliga.gstIDlsc = listacursos.gstIdlsc
			   WHERE listacursobliga.gstIDlsc = '$idcur' AND listacursos.estado = 0 ORDER BY listacursos.gstIdlsc ASC";

        $sql="SELECT
        	personal.gstIdper, 
			personal.gstNombr, 
			personal.gstApell,
			personal.gstCorro, 
			listacursobliga.gstIcatg, 
			listacursobliga.gstIDlsc, 
			listacursos.gstTitlo FROM personal 
			INNER JOIN listacursobliga ON personal.gstIDCat = listacursobliga.gstIcatg 
			INNER JOIN listacursos ON listacursos.gstIdlsc = listacursobliga.gstIDlsc 
			WHERE listacursobliga.gstIDlsc = '$idcur' AND personal.gstIDCat = '$idcat' ORDER BY personal.gstIdper DESC";	         
      }

		$res=mysqli_query($conexion,$sqli);
		$lista = mysqli_fetch_row($res);

		$lista[1];
		?><input type="hidden" name="id_mstr" id="id_mstr" value="<?php echo $lista[0]?>">

<link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
<div id="scroll" style="width: 100%; height: 150px; overflow: scroll;">
<div class="box-body">

<div class="dataTables_wrapper form-inline dt-bootstrap">
	<div class="row"> 
		<div class="col-sm-12">
			<div class="table-responsive mailbox-messages">

			<table class="table display table-striped table-bordered" role="grid" aria-describedby="example_info">
				<thead>
					<tr>
						<th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button></th>
						<th><i></i> NOMBRE(S)</th>
						<th><i></i> APELLIDOS</th>
						<th><i></i> CORREO</th>
						<th><i></i> PROCESO</th>
					</tr>
				</thead>
				<tbody>


		<?php

	$result=mysqli_query($conexion,$sql);
	while ($valor = mysqli_fetch_row($result)) {
		
		$id = $valor[0];
		$curso = $valor[5];
		if(consultaCurso($id,$curso,$conexion)){
	

		?>


				<tr>
					<td style="width: 5%;"><input type='checkbox' name='idinsp[]' id='id_insp' value='<?php echo $id?>' /></td>
					<td><?php echo $valor[1]?></td>
					<td><?php echo $valor[2]?></td>
					<td><?php echo $valor[3]?></td>
					<td><b>SIN ASIGNAR </b></td>
				</tr>

<?php	}else{ ?>


				<tr>

					<td style="width: 5%;">
					<p style="padding: 0;color:green; text-align: center;">&#x2714;</p>
					</td>					
					<td><?php echo $valor[1]?></td>
					<td><?php echo $valor[2]?></td>
					<td><?php echo $valor[3]?></td>
					<td><b>ASIGNADO </b></td>
				</tr>



<?php }

		}
?>

				</tbody>
			</table>
		</div>
	</div>
</div>
</div></div></div>

<?php  }else{ ?>


<?php  }


	



function consultaCurso($id,$curso,$conexion){
	$query = "SELECT idinsp FROM cursos WHERE idinsp = $id AND idmstr=$curso AND estado=0 ORDER BY 	id_curso DESC";		
	$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
			return $id;
		}else{
			return false;	
		}
		$this->conexion->cerrar();	
	}


?>


 
<script src="../plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript">

  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>


</script>