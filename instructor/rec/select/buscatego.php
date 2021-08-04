<?php include ("../../conexion/conexion.php");

    
	  $sql = "SELECT gstIdcat,gstCatgr,gstCsigl FROM categorias WHERE estado = 0";
	  $Acat = mysqli_query($conexion,$sql);

    ?>

			<select  id="AgstIDCat" class="form-control" class="selectpicker" name="AgstIDCat" type="text" data-live-search="true" style="width: 100%" >
			<option value="0">SELECCIONE CATEGORÍA </option> 
			<?php while($idAcat = mysqli_fetch_row($Acat)):?>                      
			<option value="<?php echo $idAcat[0]?>"><?php echo $idAcat[1]?></option>
			<?php endwhile; ?>

			</select>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#AgstIDCat').select2();

			$('#AgstIDCat').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#AgstIDCat').val(),
					url:'session/',
					success:function(r){
						$('#subcategoria').load('select/tabsubcat.php');
					}
				});
			});
		});
	</script>
	