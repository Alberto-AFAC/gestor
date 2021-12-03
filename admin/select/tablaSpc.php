<?php session_start();

require_once "../../conexion/conexion.php";

      if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

        if($_SESSION['consulta'] > 0){
         echo "string";$idSp=$_SESSION['consulta'];
         

$sql="SELECT * FROM `especialidadcat` 
      INNER JOIN categorias ON categorias.gstIDcat = especialidadcat.gstIdcat 
      INNER JOIN personal ON personal.gstIdper = especialidadcat.gstIDper 
      WHERE especialidadcat.gstIDcat='$idSp' AND especialidadcat.estado = 0 ";
        }

    
      $res=mysqli_query($conexion,$sql);
       
      
    ?>

<select  id="idInspct" class="form-control" class="selectpicker" name="idInspct" type="text" data-live-search="true" style="width: 100%" >
      <option value="0">SELECIONE ESPECIALIDAD</option> 
      <?php while($list = mysqli_fetch_assoc($res)):?>                      
      <option value="<?php echo $list['gstIdper']?>"><?php echo $list['gstNombr'].' '.$list['gstApell']?></option>
      <?php endwhile; ?>

      </select>
<!-- <div class="form-group">
<div class="col-sm-3">
<label>NIVEL</label>
<input type="text" class="form-control" id="nivel" name="nivel" value="<?php //echo $list['gstIdper'];?>" disabled="">
</div>





<div class="col-sm-3">
<label>TAREA</label>
<input type="text" class="form-control" id="tarea" name="tarea" value="<?php //echo $list['gstNombr'];?>" disabled="">



</div>

<div class="col-sm-3">
<label>SUB TAREA</label>
<input type="text" class="form-control" id="subtarea" name="subtarea" value="<?php //echo $list['gstApell'];?>" disabled="">


</div>


</div> -->
<!-- <div class="form-group">
<div class="col-sm-3">
<label>NIVEL</label>
<select type="text" class="form-control" id="nivel" name="nivel">
<option value="0">ELEGIR UNA OPCIÓN</option>
<option value="NIVEL 1">NIVEL 1</option>
<option value="NIVEL 2">NIVEL 2</option>
<option value="NIVEL 3">NIVEL 3</option>
</select>
</div>
<div class="col-sm-3">
<label>TAREA</label>
<select multiple="multiple" data-placeholder="SELECCIONE TAREA"
style="width: 100%;color: #000" class="form-control select2"
type="text" class="form-control" id="gstPrfil"
name="gstPrfil[]">
<?php //while($cat = mysqli_fetch_row($tareas)):?>
<option value="<?php// echo $cat[0]?>"><?php// echo $cat[1]?>
</option>
<?php //endwhile; ?>
</select>
</div>

<div class="col-sm-3">
<label>SUBTAREA</label>
<select multiple="multiple"
data-placeholder="SELECCIONE A QUIEN VA DIRIGIDO"
style="width: 100%;color: #000" class="form-control select2"
type="text" class="form-control" id="subtarea" name="subtarea">
<?php //while($cat = mysqli_fetch_row($subtarea)):?>
<option value="<?php// echo $cat[0]?>"><?php// echo $cat[1]?>
</option>
<?php //endwhile; ?>
</select>
</div>

<div class="col-sm-3">
<label>SUB-SUBTAREA</label>
<select multiple="multiple"
data-placeholder="SELECCIONE SUB-SUBTAREA"
style="width: 100%;color: #000" class="form-control select2"
type="text" class="form-control" id="subsubtarea"
name="subsubtarea">
<?php //while($cat = mysqli_fetch_row($subsubtarea)):?>
<option value="<?php// echo $cat[0]?>"><?php// echo $cat[1]?>
</option>
<?php //endwhile; ?>
</select>
</div>
</div> -->
              
<?php   }else{   ?>

<!--     <select  id="gstIDara" class="form-control" class="selectpicker" name="gstIDara" type="text" data-live-search="true" style="width: 100%" >
            <option value="0">SELECCIONAR LA DIRECCIÓN DE ADSCRIPCIÓN</option> 
            </select> -->

<?php } ?>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#idInspct').select2();


    });
  </script>