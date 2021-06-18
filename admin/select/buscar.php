<?php include ("../../conexion/conexion.php");

    
      $sql = "SELECT gstIdpst,gstCodig,gstNivel FROM codigo WHERE estado = 0";
      $puesto = mysqli_query($conexion,$sql);
    ?>

			<select  id="gstIdpst" class="form-control" class="selectpicker" name="gstIdpst" type="text" data-live-search="true" style="width: 100%" >
			<option value="0">CODIGO PRESUPUESTAL</option> 
			<?php while($idpst = mysqli_fetch_row($puesto)):?>                      
			<option value="<?php echo $idpst[0]?>"><?php echo $idpst[1]?></option>
			<?php endwhile; ?>

			</select>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#gstIdpst').select2();

			$('#gstIdpst').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#gstIdpst').val(),
					url:'session/',
					success:function(r){
						$('#select1').load('select/tabla.php');
					}
				});
			});
		});
	</script>
	