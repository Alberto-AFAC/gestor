
<?php session_start();

require_once "../../conexion/conexion.php";

      if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

        if($_SESSION['consulta'] > 0){
          $gstIDcom=$_SESSION['consulta'];
         

          $sql="SELECT gstIdAir,gstCSigl,gstUnid1,gstUnid2,gstRgion FROM aeropuertos";
        }

    
      $result=mysqli_query($conexion,$sql);
	?>
	<select  id="gstIDuni" class="form-control" class="selectpicker" name="gstIDuni" type="text" data-live-search="true" style="width: 100%" disabled="">
			<?php while($valor = mysqli_fetch_row($result)):?>                      
			<option value="<?php echo $valor[0]?>"><?php echo $valor[1].' > '.$valor[2]?></option>
			<?php endwhile; ?>

			</select>
              
<?php   }else{  



 ?>
	<input id="gstIDuni" class="form-control" class="selectpicker" name="gstIDuni" type="hidden" >


		

<?php } ?>
