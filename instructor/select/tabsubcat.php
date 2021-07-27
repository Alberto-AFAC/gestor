
<?php session_start();

require_once "../../conexion/conexion.php";

      if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

        if($_SESSION['consulta'] > 0){
          $gstcat=$_SESSION['consulta'];
         
		  $sql = "SELECT gstIdsub,gstSubcat,gstSigls FROM subcategorias WHERE gst_IdCat = '$gstcat' AND estado = 0";
        }

    
      $result=mysqli_query($conexion,$sql);
	?>
	<select  id="AgstIDSub" class="form-control" class="selectpicker" name="AgstIDSub" type="text" data-live-search="true" style="width: 100%" >
			<!-- <option value="0">SELECCIONE SUB CATEGORÍA </option>  -->
			<?php while($valor = mysqli_fetch_row($result)):?>                      
			<option value="<?php echo $valor[0]?>"><?php echo $valor[1]?></option>
			<?php endwhile; ?>

			</select>
              
<?php   }else{   ?>

	<select  id="AgstIDSub" class="form-control" class="selectpicker" name="AgstIDSub" type="text" data-live-search="true" style="width: 100%">
			<!-- <option value="0">SELECCIONE SUB CATEGORÍA </option>  -->
			</select>

<?php } ?>
