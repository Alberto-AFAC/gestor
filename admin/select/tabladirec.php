<?php session_start();

require_once "../../conexion/conexion.php";

      if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

        if($_SESSION['consulta'] > 0){
          $idejec=$_SESSION['consulta'];
         

          $sql="SELECT id_area,adscripcion,id_sub FROM area WHERE id_sub='$idejec' and estado=0 ORDER BY adscripcion DESC ";
        }

    
      $result=mysqli_query($conexion,$sql);
	?>
	<select  id="gstIDara" class="form-control" class="selectpicker" name="gstIDara" type="text" data-live-search="true" style="width: 100%" >
			<option value="0">SELECCIONAR LA DIRECCIÓN DE ADSCRIPCIÓN </option> 
			<?php while($valor = mysqli_fetch_row($result)):?>                      
			<option value="<?php echo $valor[0]?>"><?php echo $valor[1]?></option>
			<?php endwhile; ?>

			</select>
              
<?php   }else{   ?>

	<select  id="gstIDara" class="form-control" class="selectpicker" name="gstIDara" type="text" data-live-search="true" style="width: 100%" >
			<option value="0">SELECCIONAR LA DIRECCIÓN DE ADSCRIPCIÓN</option> 
			</select>

<?php } ?>