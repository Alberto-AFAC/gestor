<?php include ("../../conexion/conexion.php");

    
      $sql = "SELECT DISTINCT 
      categorias.gstIdcat,categorias.gstCatgr,categorias.gstCsigl FROM categorias 
      INNER JOIN listacursobliga ON listacursobliga.gstIcatg = categorias.gstIdcat
      WHERE listacursobliga.estado = 0";
      $cat = mysqli_query($conexion,$sql);
    ?>

			<select  id="gstIdcat" class="form-control" class="selectpicker" name="gstIdcat" type="text" data-live-search="true" style="width: 100%" >
			<option value="0">CATEGORÍAS  </option> 
			<?php while($idcat = mysqli_fetch_row($cat)):?>                      
			<option value="<?php echo $idcat[0]?>"><?php echo $idcat[1].' > '.$idcat[2]?></option>
			<?php endwhile; ?>

			</select>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#gstIdcat').select2();

			$('#gstIdcat').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#gstIdcat').val(),
					url:'session/',
					success:function(r){
						$('#selecat').load('select/tablacateg.php');
					}
				});
			});
		});
		
	</script>
	

