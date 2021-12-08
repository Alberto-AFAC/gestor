<?php include ("../../conexion/conexion.php");

    
      $sql = "SELECT gstIdCom,gstRgion,gstNombr FROM comandancia WHERE estado = 0";
      $coman = mysqli_query($conexion,$sql);
    ?>

			<select  id="gstAcReg" class="form-control" class="selectpicker" name="gstAcReg" type="text" data-live-search="true" style="width: 100%" >
			<?php while($idcoman = mysqli_fetch_row($coman)):?>                      
			<option value="<?php echo $idcoman[0]?>"><?php echo $idcoman[1].' > '.$idcoman[2]?></option>
			<?php endwhile; ?>

			</select>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#gstAcReg').select2();

			$('#gstAcReg').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#gstAcReg').val(),
					url:'session/',
					success:function(r){
						$('#select2').load('select/tablacom.php');
					}
				});
			});
		});
	</script>
	