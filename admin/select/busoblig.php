<?php include ("../../conexion/conexion.php");

    
$sql = "
	SELECT gstIdlsc,gstPrfil,gstTitlo,gstVignc,gstTipo 
	FROM listacursos 
	WHERE gstIdlsc = 1 AND estado = 0 
	OR gstIdlsc = 2 AND estado = 0
	OR gstIdlsc = 155 AND estado = 0
	ORDER BY gstIdlsc ASC";
      $cat = mysqli_query($conexion,$sql);
    ?>

			<select  id="idmstr" class="form-control" class="selectpicker" name="idmstr" type="text" data-live-search="true" style="width: 100%" >
			<option value="0">CURSOS OBLIGATORIOS</option> 
			<?php while($idcat = mysqli_fetch_row($cat)):?>                      
			<option value="<?php echo $idcat[0].','.$idcat[1].','.$idcat[3]?>"><?php echo $idcat[2].' &#10143; '.$idcat[4]?></option>
			<?php endwhile; ?>

			</select>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#idmstr').select2();

			$('#idmstr').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#idmstr').val(),
					url:'session/valor.php',
					success:function(r){
						$('#taboblig').load('select/tablaobligatorio.php');
					}
				});
			});
		});
		
	</script>
	

