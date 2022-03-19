<?php include ("../../conexion/conexion.php");

     // CURSOS OBLIGATORIOS    
      // $sql = "
      // SELECT gstIdlsc,gstPrfil,gstTitlo,gstVignc,gstTipo 
      // FROM listacursos 
      // WHERE gstIdlsc != 155 AND gstIdlsc != 2 AND gstIdlsc != 1 AND estado = 0 ORDER BY gstIdlsc ASC";

      $sql = "
      SELECT gstIdcat ,gstCatgr , gstCsigl
      FROM categorias 
      WHERE estado = 0 ORDER BY gstIdcat ASC";
      $cat = mysqli_query($conexion,$sql);
    ?>

      <select  id="idmstrc" class="form-control" class="selectpicker" name="idmstrc" type="text" data-live-search="true" style="width: 100%" >
      <option value="0">ESPECIALIDAD</option> 
      <?php while($idcat = mysqli_fetch_row($cat)):?>                      
      <option value="<?php echo $idcat[2]?>"><?php echo $idcat[1].' &#10143; '.$idcat[2]?></option>
      <?php endwhile; ?>

      </select>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#idmstrc').select2();

      $('#idmstrc').change(function(){
        $.ajax({
          type:"post",
          data:'valor=' + $('#idmstrc').val(),
          url:'session/',
          success:function(r){
            $('#tabcurso').load('select/tablaCurso.php');
          }
        });
      });
    });
    
  </script>
  

