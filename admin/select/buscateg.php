<?php include ("../../conexion/conexion.php");

    
      $sql = "SELECT gstIdlsc,gstPrfil,gstTitlo FROM listacursos WHERE estado = 0 ORDER BY gstIdlsc DESC";
      $cat = mysqli_query($conexion,$sql);
    ?>

			<select  id="idmstr" class="form-control" class="selectpicker" name="idmstr" type="text" data-live-search="true" style="width: 100%" >
			<option value="0">CURSO</option> 
			<?php while($idcat = mysqli_fetch_row($cat)):?>                      
			<option value="<?php echo $idcat[0].','.$idcat[1]?>"><?php echo $idcat[2]?></option>
			<?php endwhile; ?>

			</select>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#idmstr').select2();

			$('#idmstr').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#idmstr').val(),
					url:'session/',
					success:function(r){
						$('#tabcurso').load('select/tablacateg.php');
					}
				});
			});
		});
		
	</script>
	

