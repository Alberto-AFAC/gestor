<?php session_start();

require_once "../../conexion/conexion.php";

      if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

        if($_SESSION['consulta'] > 0){
         echo "";$idSp=$_SESSION['consulta'];
         

$sql="SELECT * FROM `especialidadcat` 
      INNER JOIN categorias ON categorias.gstIDcat = especialidadcat.gstIdcat 
      INNER JOIN personal ON personal.gstIdper = especialidadcat.gstIDper 
      WHERE especialidadcat.gstIDcat='$idSp' AND especialidadcat.estado = 0 ";
        }

    
      $res=mysqli_query($conexion,$sql);
       
      
    ?>
  <label>SELECCIONE INSPECTOR</label>
<select  id="idInspct" class="form-control" class="selectpicker" name="idInspct" type="text" data-live-search="true" style="width: 100%" >
      <option value="0">SELECIONE INSPECTOR</option> 
      <?php while($list = mysqli_fetch_assoc($res)):?>                      
      <option value="<?php echo $list['gstIdper']?>"><?php echo $list['gstNombr'].' '.$list['gstApell']?></option>
      <?php endwhile; ?>

      </select>
              
<?php   }else{   ?>

<?php } ?>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#idInspct').select2();


    });
  </script>