<?php include ("../../conexion/conexion.php");

    
      $sql = "SELECT gstIdCom,gstRgion,gstNombr FROM comandancia WHERE estado = 0";
      $coman = mysqli_query($conexion,$sql);
    ?>

			<select  id="AgstAcReg" class="form-control" class="selectpicker" name="AgstAcReg" type="text" data-live-search="true" style="width: 100%" >
			<option value="0">COMANDANCIA </option> 
			<?php while($idcoman = mysqli_fetch_row($coman)):?>                      
			<option value="<?php echo $idcoman[0]?>"><?php echo $idcoman[2]?></option>
			<?php endwhile; ?>

			</select>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#AgstAcReg').select2();

			$('#AgstAcReg').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#AgstAcReg').val(),
					url:'session/',
					success:function(r){
						$('#select3').load('select/tablacom.php');
					}
				});
			});
		});
	</script>
	