<?php include ("../../conexion/conexion.php");

    
      $sql = "SELECT id_sub,descripsub,estado FROM subdireccion WHERE estado = 0";
      $sub1 = mysqli_query($conexion,$sql);
    ?>

			<select  id="subdireccion1" class="form-control" class="selectpicker" name="subdireccion1" type="text" data-live-search="true" style="width: 100%" >
			<option value="0">SELECCIONE LA SUBDIRECCIÓN </option> 
			<?php while($idsub1 = mysqli_fetch_row($sub1)):?>                      
			<option value="<?php echo $idsub1[0]?>"><?php echo $idsub1[1]?></option>
			<?php endwhile; ?>

			</select>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#subdireccion1').select2();

			$('#subdireccion1').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#subdireccion1').val(),
					url:'session/',
					success:function(r){
						$('#departos1').load('select/tabladep.php');
					}
				});
			});
		});
	</script>