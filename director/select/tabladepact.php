<?php session_start();

require_once "../../conexion/conexion.php";

      if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

        if($_SESSION['consulta'] > 0){
          $idsub1=$_SESSION['consulta'];
         

          $sql="SELECT id_departamentos,identific_depart,descripdep FROM departamentos WHERE id_3_dep='$idsub1' ORDER BY descripdep DESC ";
        }

    
      $result=mysqli_query($conexion,$sql);
	?>
	<select  id="depart" class="form-control" class="selectpicker" name="depart" type="text" data-live-search="true" style="width: 100%" >
			<option value="0">SELECCIONAR DEPARTAMENTO </option> 
			<?php while($valor = mysqli_fetch_row($result)):?>                      
			<option value="<?php echo $valor[0]?>"><?php echo $valor[2]?></option>
			<?php endwhile; ?>

			</select>
              
<?php   }else{   ?>

	<select  id="depart" class="form-control" class="selectpicker" name="depart" type="text" data-live-search="true" style="width: 100%" >
			<option value="0">SELECCIONAR DEPARTAMENTO </option> 
			</select>

<?php } ?>
