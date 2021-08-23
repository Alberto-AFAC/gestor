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
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->

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

 
  <!-- Content Wrapper. Contains page content -->
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
            <?php include('../html/personal.html');?>
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
<?php //include('valores.php'); ?>
<!-- /.col -->
</div>
<!-- /.row -->
</section> 



      <div class="modal fade" id="modal-asignar">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ASIGANCIÓN DEL PUESTO</h4>
              </div>
              <div class="modal-body">
       <form id="Dtall" class="form-horizontal" action="" method="POST" >
                    <input type="hidden" name="gstIdper" id="gstIdper">
                <div class="form-group">
                    <div class="col-sm-4">
                       <label>NOMBRE(S)</label>
                       <input type="text"onkeyup="mayus(this);"class="form-control disabled" id="gstNombr" disabled="">
                    </div>

                    <div class="col-sm-4">
                       <label>APELLIDO(S)</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control disabled" id="gstApell" disabled="">
                    </div>

                    <div class="col-sm-4">
                    <label>CARGO</label>
                    <select type="text" class="form-control" id="AgstCargo" name="AgstCargo">
                         <option value="">SELECCIONA EL CARGO</option>
                         <option value="DIRECTOR">DIRECTOR</option>
                         <option value="INSPECTOR">INSPECTOR</option>
                         <option value="INSTRUCTOR">INSTRUCTOR</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <label>CATEGORIA</label>
                        <select style="width: 100%" class="form-control" class="selectpicker" name="AgstIDCat" id="AgstIDCat" type="text" data-live-search="true"  onchange="seleccionado()">
                         <option value="">SELECCIONA LA CATEGORÍA</option>
                         <?php while($Aidcat = mysqli_fetch_row($Acat)):?>                      
                         <option value="<?php echo $Aidcat[0]?>"><?php echo $Aidcat[1];?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>
                                         
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
                   <div class="col-sm-offset-0 col-sm-12">
                        <label>UNIDAD ADMINISTRATIVA</label>
                        <select style="width: 100%" class="form-control" class="selectpicker" id="AgstIDuni" name="AgstIDuni"type="text" data-live-search="true">
                         <option value="">SELECCIONE UNIDAD ADMINISTRATIVA</option> 
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
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
$('#AgstIDSub').select2();
$('#AgstIDuni').select2();
}); 
</script>
<script src="../js/select2.js"></script> 