<!DOCTYPE html><?php include ("../conexion/conexion.php");?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PERSONAL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>

<?php
$sql = "SELECT gstIdpais,gstPais FROM pais WHERE estado = 0";
$pais = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdpais,gstPais FROM pais WHERE estado = 0";
$paises = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdcat,gstCatgr,gstCsigl FROM categorias WHERE estado = 0";
$Acat = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdsub,gstSubcat,gstSigls FROM subcategorias WHERE estado = 0";
$Asub1 = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdCom,gstCSigl,gstNombr,gstNocrt,gstRgion FROM comandancia WHERE estado = 0";
$Auni = mysqli_query($conexion,$sql);
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php
include('header.php');
?>

<?php 
 $query = "SELECT * FROM personal WHERE estado = 0 ORDER BY gstIdper DESC";
  $resultado = mysqli_query($conexion, $query);

?>
<?php
while($data=mysqli_fetch_array($resultado)){
?>
       <div class="modal fade" id='modal-asignar<?php echo $data['gstIdper'];?>'>
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ASIGANCIÓN DEL PUESTOsss</h4>
              </div>
              <div class="modal-body">
       <form id="Dtall" class="form-horizontal" action="" method="POST" >
                    <input type="hidden" name="gstIdper" id="gstIdper">
                <div class="form-group">
                    <div class="col-sm-4">
                       <label>NOMBRE(S)</label>
                       <input type="text"onkeyup="mayus(this);"class="form-control disabled" id="gstNombr" value="<?php echo $data['gstNombr'];?>" disabled="">
                    </div>

                    <div class="col-sm-4">
                       <label>APELLIDO(S)</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control disabled" id="gstApell" value="<?php echo $data['gstApell'];?>" disabled="">
                    </div>

                    <div class="col-sm-4">
                    <label>CARGO</label>
                    <select type="text" class="form-control" id="AgstCargo" name="AgstCargo">
                         <option value="">SELECCIONA EL CARGO</option>
                         <option value="DIRECTOR">DIRECTOR</option>
                         <option value="INSPECTOR">INSPECTOR</option>
                         <option value="INSTRUCTOR">INSTRUCTOR</option>
                         <option value="COORDINADOR">COORDINADOR</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <label>CATEGORIA</label>
                        <select style="width: 100%" class="form-control" class="selectpicker" name="AgstIDCat" id="AgstIDCat" type="text" data-live-search="true"  onchange="seleccionado()">
                         <option value="">SELECCIONA LA CATEGORÍA</option>
                         <?php while($Aidcat = mysqli_fetch_row($Acat)):?>                      
                         <option value="<?php echo $Aidcat[0]?>"><?php echo $Aidcat[1];?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>

                    <input type="hidden" name="AgstIDSub" id="AgstIDSub" value="1">
                                         
                  <div class="col-sm-6">
                       <label>SUB CATEGORIA</label>
                       <select style="width: 100%" class="form-control" class="selectpicker" name="AgstIDSub" id="AgstIDSub" type="text" data-live-search="true">
                         <option value="">SELECCIONA LA SUB CATEGORÍA</option>
                         <option value="0">NO APLICA</option>
                         <?php while($Aidsub1 = mysqli_fetch_row($Asub1)):?>                      
                         <option value="<?php echo $Aidsub1[0]?>"><?php echo $Aidsub1[1];?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>
                </div>

                <div class="form-group">
                   <div class="col-sm-offset-0 col-sm-6">
                        <label>COMANDANCIA </label>
                        <select style="width: 100%" class="form-control" class="selectpicker" type="text" id="AgstIDuni" name="AgstIDuni" data-live-search="true">
                         <option value="">SELECCIONAR COMANDANCIA</option> 
                         <?php while($Aiduni = mysqli_fetch_row($Auni)):?>                      
                          <option value="<?php echo $Aiduni[0]?>"><?php echo $Aiduni[1].' > '.$Aiduni[2].' REGIÓN: '.$Aiduni[4]?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>

                   <div class="col-sm-offset-0 col-sm-6">
                        <label>UBICACIÓN </label>
                        <select style="width: 100%" class="form-control" class="selectpicker" type="text" data-live-search="true">
                         <option value="">SELECCIONAR UBICACIÓN  </option> 
                         <?php while($Aiduni = mysqli_fetch_row($Auni)):?>                      
                          <option value="<?php echo $Aiduni[0]?>"><?php echo $Aiduni[1].' > '.$Aiduni[2].' REGIÓN: '.$Aiduni[4]?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>
                </div>
                  
                <div class="form-group"><br>
                    <div class="col-sm-offset-0 col-sm-5">
                    <button type="button" id="button" class="btn btn-info" onclick="asignar();">ACEPTAR</button>
                    </div>
                    <b><p class="alert alert-danger text-center padding error" id="danger2">Error al asignar</p></b>

                    <b><p class="alert alert-success text-center padding exito" id="succe2">¡Se asignó con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="empty2">Es necesario llenar todos los campos</p></b>
                    </div>
                </form>    
            </div>
          </div>
        </div>
      </div>
    </div> 
  <!-- Content Wrapper. Contains page content -->
<?php  } ?>
<div class="content-wrapper" >
<!-- Content Header (Page header) -->

    <section class="content" id="lista">
      <div class="row">
        <div class="col-xs-12">
        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">PERSONAL</h3>
             <div class="pull-right">
              
                  <div class="btn-group">
                    <a type="button" href="persona.php" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></a>
                  </div>
                  <!-- /.btn-group -->
                </div>
            </div>
            <div class="box-body">

          <div class="row">
            <div class="table-responsive col-sm">
            <table id="data-table-reportes" class="table table-striped table-hover">Aqui esta</table>
            </div>
          </div>



            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.col -->




    <?php include('agrStdPro.php');?>

    <!-- Main content -->
    <!-- /.content -->
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
/*$('#gstIDara').select2();
$('#gstIDCat').select2();
$('#gstIDSub').select2();
$('#gstIDuni').select2();*/

$('#gstIDpai').select2();
$('#AgstIDpai').select2();
$('#AgstIDCat').select2();
//$('#AgstIDSub').select2();
$('#AgstIDuni').select2();
}); 
</script>
<script src="../js/select2.js"></script> 


<script type="text/javascript">

var dataSet = [
<?php 

while($data = mysqli_fetch_array($resultado)){ ?>


  ["<?php echo  $data['gstNombr'];?>","<?php echo $data['gstApell']?>",

"<a title='Evaluación' class='btn btn-danger' data-toggle='modal' data-target='#modal-asignar<?php echo $data['gstIdper'];?>'>ASIGNAR</a>"



  ],



<?php } ?>
    ];

var tableGenerarReporte = $('#data-table-reportes').DataTable({
    "language": {
      "searchPlaceholder": "Buscar datos...",
      "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [
      {title: "gstNombr"},
      {title: "gstApell"},
      {title: "Accion"}
    ],
  });

</script>

