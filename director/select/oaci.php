<?php include ("../../conexion/conexion.php");

    
      $sql = "SELECT gstSpcld,gstSpoac,gstSigla FROM especialidad WHERE estado = 0";
      $oaci = mysqli_query($conexion,$sql);
    ?>
<div class="col-sm-4">
	          <label class="label2">ESPECIALIDAD OACI PERSONAL TÉCNICO</label>

			<select  id="gstSpcID"  class="selectpicker form-control inputalta" name="gstSpcID" type="text" data-live-search="true" style="width: 100%" >
			<option value="0">SELECIONE ESPECIALIDAD OACI</option>                     
			<?php while($sigla = mysqli_fetch_row($oaci)):?>
			<option value="<?php echo $sigla[0]?>"><?php echo $sigla[1]?></option>
			<?php endwhile; ?>
			</select>
</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#gstSpcID').select2();

			$('#gstSpcID').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#gstSpcID').val(),
					url:'session/',
					success:function(r){
						$('#siglas').load('select/siglas.php');
					}
				});
			});
		});
	</script>
	