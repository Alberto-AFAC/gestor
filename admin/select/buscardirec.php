<?php include ("../../conexion/conexion.php");

    
      $sql = "SELECT gstIdeje,gstAreje,estado FROM ejecutiva WHERE estado = 0";
      $dicejec = mysqli_query($conexion,$sql);
    ?>

			<select id="gstAreID" class="form-control" class="selectpicker" name="gstAreID" type="text" data-live-search="true" style="width: 100%" >
			<option value="0">SELECCIONAR LA DIRECCIÓN EJECUTIVA / DIRECCIÓN DE ÁREA</option> 
			<?php while($idejec = mysqli_fetch_row($dicejec)):?>                      
			<option value="<?php echo $idejec[0]?>"><?php echo $idejec[1]?></option>
			<?php endwhile; ?>

			</select>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#gstAreID').select2();

			$('#gstAreID').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#gstAreID').val(),
					url:'session/',
					success:function(r){
						$('#gstIDara').load('select/tabladirec.php');
					}
				});
			});
		});
	</script>