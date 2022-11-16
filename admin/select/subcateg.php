<?php session_start();

require_once "../../conexion/conexion.php";

      if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

        if($_SESSION['consulta'] > 0){
          $idsub1=$_SESSION['consulta'];
         

          $sql="SELECT * FROM subespecojt WHERE id_especialidad=$idsub1 ORDER BY subdescrip ASC ";
        }

    
      $result=mysqli_query($conexion,$sql);
	?>
<select name="idubuojt" id="idubuojt" class="form-control" class="selectpicker" type="text"
    data-live-search="true" style="width: 100%">
    <option value="0">SELECCIONAR SUB-CATEGORIA </option>
    <?php while($valor = mysqli_fetch_row($result)):?>
    <option value="<?php echo $valor[0]?>"><?php echo $valor[2]?></option>
    <?php endwhile; ?>

</select>

<?php   }else{   ?>

<select id="idubuojt" class="form-control" class="selectpicker" name="idubuojt" type="text"
    data-live-search="true" style="width: 100%">
    <option value="0">SIN SUB-ESPECIALIDAD</option>
</select>

<?php } ?>

<script type="text/javascript">
$(document).ready(function() {
    $('#idubuojt').select2();

});
</script>