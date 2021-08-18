
<?php session_start();

require_once "../../conexion/conexion.php";

      if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

        if($_SESSION['consulta'] > 0){
          $gstSpcld=$_SESSION['consulta'];
          $sql="SELECT gstSpcld,gstSpoac,gstSigla FROM especialidad WHERE gstSpcld='$gstSpcld' ORDER BY gstSpcld DESC ";
        }

      $result=mysqli_query($conexion,$sql);
      $ver=mysqli_fetch_row($result);
?>
<style type="text/css">

/*.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{
background: white;
}*/
</style>      

<div class="col-sm-3">
<label class="label2">SIGLAS OACI</label>
<input disabled="" type="text" onkeyup="mayus(this);" class="form-control disabled inputalta" value="<?php echo $ver[2];?>" >
</div>

              
<?php   }else{   ?>







<?php } ?>
