
<?php session_start();

require_once "../../conexion/conexion.php";

      if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

        if($_SESSION['consulta'] > 0){
          $Idpst=$_SESSION['consulta'];
          $sql="SELECT gstIdpst,gstNivel,gstGnric FROM codigo WHERE gstIdpst='$Idpst' ORDER BY gstIdpst DESC ";
        }

      $result=mysqli_query($conexion,$sql);
      $ver=mysqli_fetch_row($result);
?>
<style type="text/css">

/*.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{
background: white;
}*/
</style>      

<div class="col-sm-4">
<label>ID PUESTO (NIVEL TABULAR)</label>
<input disabled="" type="text" onkeyup="mayus(this);" class="form-control disabled" value="<?php echo $ver[1];?>" >
</div>                                         

<div class="col-sm-4">
<label>NOMBRE DEL PUESTO (GENERICO)</label>
<input disabled="" type="text" class="form-control disabled" value="<?php echo $ver[2];?>" >
</div>                  

              
<?php   }else{   ?>







<?php } ?>
