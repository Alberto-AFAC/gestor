<?php include ("../../conexion/conexion.php");

    
      $sql = "SELECT gstIdcat,gstCatgr,gstCsigl FROM categorias WHERE estado = 0 ORDER BY gstIdcat ASC";
      $cat = mysqli_query($conexion,$sql);
    ?>

			<select  id="isSpc" class="form-control" class="selectpicker" name="isSpc" type="text" data-live-search="true" style="width: 100%" >
			<option value="0">SELECIONE ESPECIALIDAD</option> 
			<?php while($idcat = mysqli_fetch_row($cat)):?>                      
			<option value="<?php echo $idcat[0]?>"><?php echo $idcat[1].' &#10143; '.$idcat[2]?></option>
			<?php endwhile; ?>

			</select>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#isSpc').select2();

			$('#isSpc').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#isSpc').val(),
					url:'session/',
					success:function(r){
						$('#tabSpcl').load('select/tablaSpc.php');
					}
				});
			});
		});
		
	</script>
	

