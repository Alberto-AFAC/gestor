<!DOCTYPE html><?php include ("../conexion/conexion.php");?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!--GENERATE PDF-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js" integrity="sha512-1g3IT1FdbHZKcBVZzlk4a4m5zLRuBjMFMxub1FeIRvR+rhfqHFld9VFXXBYe66ldBWf+syHHxoZEbZyunH6Idg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
  
</head>

<?php

      $sql = "SELECT gstIdpais,gstPais FROM pais WHERE estado = 0";
      $pais = mysqli_query($conexion,$sql);

      $sql = "SELECT gstIdpais,gstPais FROM pais WHERE estado = 0";
      $paises = mysqli_query($conexion,$sql);

      $sql = "SELECT gstIdcat,gstCatgr, gstCsigl FROM categorias WHERE estado = 0";
      $categ = mysqli_query($conexion,$sql);

      $sql = "SELECT gstIdcat,gstCatgr, gstCsigl FROM categorias WHERE estado = 0";
      $categs = mysqli_query($conexion,$sql);

      $sql = "SELECT  gstIdeje,gstAreje FROM ejecutiva WHERE estado = 0";
      $ejec = mysqli_query($conexion,$sql);

?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

<?php
    include('header.php');
?>

 
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" >
<!-- Content Header (Page header) -->

    <section class="content" id="lista">
      <div class="row">
        <div class="col-xs-12">
        
          <div class="box">
            <div class="box-header">
            <div class="col-sm-3">
                    <div class="input-group">
                      <H4><i class="fa ion-android-plane"></i>
                      <label>INSPECTORES</label></H4>
                    </div>
            </div>
             <div class="pull-right">
                  <div class="btn-group">
                    <a type="button" href="inspecion.php" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></a>
                  </div>
                  <!-- /.btn-group -->
                </div>
            </div>
            <!-- /INDICADORES -->
           
    <!-- Main content -->
    <section class="content">

<!-- row -->
  <?php include('inline.html'); ?>

            <!-- /FIN DE INDICADORES -->
            <div class="box-body">
            <?php include('../html/consultar.html');?>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.col -->

      <section class="content" id="detalles" style="display: none;">
      <div class="row">
      <?php include('valor.php'); ?>
      <!-- /.col -->
      </div>
      <!-- /.row -->
      </section>


<?php //include('evaluar.php');?>

  <div class="modal fade" id="modal-evaluar">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" onclick="location.href='inspecion.php'" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title">EVALUAR</h4>
              </div>
              <div class="modal-body">
              <form id="Evalúa">
              <div class="row">  
              <div class="form-group">
                  <div class="col-sm-5">
                    <label>NOMBRE</label>
                      <input type="text" class="form-control" id="evalu_nombre" name="evalu_nombre" disabled="">
                  </div>
                    <div class="col-sm-offset-0 col-sm-7">
                      <label>CATEGORÍA</label>
                        <select style="width: 100%" class="form-control" class="selectpicker" id="gstIDCat" name="gstIDCat" type="text" data-live-search="true" disabled="">
                         <?php while($oira = mysqli_fetch_row($categ)):?>                      
                         <option value="<?php echo $oira[0]?>"><?php echo $oira[1]?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>

              </div>

              <div id="evlacns"></div>

            <div class="form-group" id="buton">
              <div class="col-sm-7">
              <button type="button" id="button" class="btn btn-info" onclick="evaluar();">ACEPTAR</button>
              </div>
              <b><p class="alert alert-success text-center padding exito" id="succe0">¡Se ha evaluado con éxito!</p></b>
              <b><p class="alert alert-info text-center padding error" id="danger0">El inspector ya esta evaluado </p></b>
              <b><p class="alert alert-warning text-center padding aviso" id="empty0">Es necesario agregar los datos que se solicitan </p></b>
              </div>
             </div>
              </form>  
            </div>
          </div>
        </div>
      </div>
    </div>

 <div class="modal fade" id="modal-resultado">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">RESULTADO</h4>
              </div>
              <div class="modal-body">
              <div style="text-align: right">
              <img style="cursor: pointer;" onclick="pdf()" src="http://www.uco.es/servicios/ucodigital/omeka/files/original/d0409d702e2e506249903964dd94b80aa01d1161.png" class="img-fluid swing" width="46px" alt="Crear-PDF">
              </div>
              <form id="Result">

<input type="hidden" class="form-control" id="pdfIdper" name="pdfIdper" disabled="">
              <div class="row">  
              <div class="form-group">
                  <div class="col-sm-5">
                    <label>NOMBRE</label>
                      <input type="text" class="form-control" id="evalu_nombre" name="evalu_nombre" disabled="">
                  </div>
                    <div class="col-sm-offset-0 col-sm-7">
                      <label>CATEGORÍA</label>
                        <select style="width: 100%" class="form-control" class="selectpicker" id="gstIDCat" name="gstIDCat" type="text" data-live-search="true" disabled="">
                         <?php while($oiras = mysqli_fetch_row($categs)):?>                      
                         <option value="<?php echo $oiras[0]?>"><?php echo $oiras[1]?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>

              </div>

              <div id="rsltad"></div>

             </div>
              </form>  
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php include('agrStdPro.php'); ?>
 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.2
    </div>

    <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong> Todos los derechos Reservados AJ.
  </footer>

 <?php include('panel.html');?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script src="../js/global.js"></script>

</body>
</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function(){
$('#gstIDara').select2();
$('#gstIDCat').select2();
//$('#gstIDSub').select2();
//$('#gstIDuni').select2();
$('#gstAreID').select2();
$('#gstPstID').select2();
$('#gstIDpai').select2();
$('#AgstIDpai').select2();
$('#actualiza').load('select/actualiza.php');
$('#select1').load('select/tabla.php');
$('#actoaci').load('select/actoaci.php');
$('#siglas').load('select/siglas.php');  
$('#comandancia').load('select/actbuscacom.php');
$('#select2').load('select/acttablacom.php');
}); 
</script>
<script src="../js/select2.js"></script> 



