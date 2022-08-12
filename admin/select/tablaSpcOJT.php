<?php session_start();

require_once "../../conexion/conexion.php";

      if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

        if($_SESSION['consulta'] > 0){
          echo "";$idSp=$_SESSION['consulta'];
          $sql="SELECT e.*,c.*,p.* FROM especialidadcat e, categorias c, personal p
          WHERE c.gstIDcat=e.gstIdcat 
          AND p.gstIdper=e.gstIDper 
          AND e.gstIDcat='$idSp' 
          AND e.estado = 0 
          UNION
          SELECT e.*,c.gstIdcat,('INSTRUCTOR PRINCIPAL OJT') gstCatgr,c.gstCsigl,c.estado,p.* FROM especialidadcat e, categorias c, personal p, instcoord_ojt i
          WHERE c.gstIDcat=e.gstIdcat 
          AND p.gstIdper=i.id_pers
          AND i.id_pers=e.gstIDper 
          AND i.tipo='INSTRUCTOR PRINCIPAL OJT' 
          AND e.estado = 0 
          GROUP BY i.id_pers";
        }
        $res=mysqli_query($conexion,$sql);
            
?>
<label>SELECCIONE INSPECTOR</label>
<select id="idInspct1" class="form-control" class="selectpicker" name="idInspct1" type="text" data-live-search="true"
    style="width: 100%">
    <option value="0">SELECIONE INSPECTOR</option>
    <?php while($list = mysqli_fetch_assoc($res)):?>
    <option value="<?php echo $list['gstIdper']?>">
        <?php echo $list['gstNombr'].' '.$list['gstApell'].' / '.$list['gstCatgr']?></option>
    <?php endwhile; ?>
</select>
<?php   }else{   ?>
<?php } ?>
<script type="text/javascript">
$(document).ready(function() {
    $('#idInspct1').select2();


});
</script>