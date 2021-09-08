<!DOCTYPE html>
<?php include ("../conexion/conexion.php");

$sql = "SELECT gstIdlsc, gstTitlo,gstTipo FROM listacursos WHERE estado = 0";
$curso = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'INSTRUCTOR' AND estado = 0";
$instructor = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdper,gstNombr,gstApell,gstCargo FROM personal WHERE gstCargo = 'INSPECTOR' AND gstEvalu = 'SI' AND estado = 0 || gstCargo = 'DIRECTOR' AND estado = 0 ";
$inspector = mysqli_query($conexion,$sql);
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>Capacitación AFAC |Alta Curso</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" href="../dist/css/skins/card.css">
  <!--JORGE ALBERTO--->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php
include('header.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
          ESTADISTICAS GENERALES     
      </h1>
    </section>
    <!-- Main content -->
<section class="content">
<div class="row">
<!-- /.col -->
<div class="col-md-12">
<div class="nav-tabs-custom">
<!--<ul class="nav nav-tabs">
<li class="active"><a href="#activity" data-toggle="tab">PROGRAMACIÓN DEL CURSO</a></li>
<li><a href="#timeline" data-toggle="tab">LISTA DE PROGRAMACIÓN</a></li>
</ul>-->
<div class="tab-content">

       
<div class="box-body">
  <!--AQUÍ EMPIEZAN LAS GRAFICAS-->


</div>
<section class="content">
<div class="row">
  
<div class="panel panel-default">
  <!-- <div class="panel-body" style="width: 50%;">
    <canvas id="piechart-admin"></canvas>
  </div> -->
  <div class="chart-container" style="position: relative;">
    <canvas id="piechart-admin"></canvas>
</div>
</div>

</div>

            </div>
            

            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b>    <?php 
                                $query ="SELECT 
                                        *
                                        FROM
                                        controlvers";
                                $resultado = mysqli_query($conexion, $query);

                                $row = mysqli_fetch_assoc($resultado);
                                if(!$resultado) {
                                    var_dump(mysqli_error($conexion));
                                    exit;
                                }
                                ?>
                    <?php echo $row['version']?>
    </div>
    <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong> Todos los derechos Reservados AAJ.
  </footer>

  <!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Create the tabs -->
<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
<!--<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>-->
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

</form>
</div>
<!-- /.tab-pane -->
</div>
</aside>
  
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
<script>
    var piechar = new Chart(document.getElementById("piechart-admin"), {
        type: 'bar',
        data: {
        labels: ["ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"],
        datasets: [{
        label: "Programados",
        backgroundColor: ["rgba(0, 73, 121)"],
        borderWidth: 0,
        data: [13,12,13,14,15,16,17,18,19,20,21,22]
        },
        {
          label: "Completados",
        backgroundColor: ["rgba(0, 129, 22)"],
        borderWidth: 0,
        data: [10,12,13,14,15,16,17,18,19,20,21,22]
        },
        {
          label: "Por completar",
        backgroundColor: ["rgba(214, 114, 0)"],
        borderWidth: 0,
        data: [10,12,13,14,15,16,17,18,19,20,21,22]
        }
      ]
    },
        options: {
        legend: {
        labels: {
        fontColor: '#5c6dc0',
        }
    },
        title: {
        display: false,
        text: 'Porcentaje de cumplimiento'
    },
    scales:{
      x:{
        stacked: true,
      },
      y:{
        stacked: true,
      }
    }
        }
    });
</script>

</body>
</html>