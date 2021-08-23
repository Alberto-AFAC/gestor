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
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


<?php
include('header.php');
?> 
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" >
<!-- Content Header (Page header) -->






<section class="content">
<div class="row">



<?php
 
// $id = $_GET['valor'];
// base64_decode($valor);

//echo $id = $valor;

/*$id = 1;
$ql = "SELECT id_insp,nombre,apellidos,idarea FROM inspector
     INNER JOIN cursos ON idinsp = id_insp
     WHERE id_insp = $id AND estado = 0";
    $insp = mysqli_query($conexion,$ql);
    $pector = mysqli_fetch_row($insp);
*/
$sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0";
$are = mysqli_query($conexion,$sql);


?>

           <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">





<!--<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-edit"></i>
</button>
<button type="button" class="btn btn-box-tool" data-widget="remove">
<a href='javascript:closeDtlls()'><i class='fa fa-times'></i></a>
</button>
</div>-->




            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">REGRISTO DE PERSONAL</a></li>
              <li><a href="#estudios" data-toggle="tab">EXPERIENCIA PROFESIONAL</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">

    <form id="Dtall" class="form-horizontal" action="" method="POST" >
                  <input type="hidden" name="idinsp" id="idinsp">
                  <div class="form-group">
                    <div class="col-sm-4">
                    <label>NOMBRE(S)</label>
                    <input type="text" style="text-transform:uppercase;" class="form-control" id="nombre" name="nombre">
                    </div>

                     <div class="col-sm-4">
                      <label>APELLIDO(S)</label>
                      <input type="text" style="text-transform:uppercase;" class="form-control" id="apellidos" name="apellidos">
                      </div>

                     <div class="col-sm-4">
                      <label>CORREO</label>
                      <input type="email" style="text-transform:lowercase;" class="form-control" id="correo" name="correo">
                      </div>
                 </div>
                 <div class="form-group">
                    <div class="col-sm-4">
                    <label>CARGO</label>
                    <select type="text" class="form-control" id="cargo" name="cargo">
                        <option value="">SELECCIONA EL CARGO</option>
                        <option value="INSPECTOR">INSPECTOR</option>
                        <option value="INSTRUCTOR">INSTRUCTOR</option>
                      </select>
                    </div>
                     <div class="col-sm-4">
                      <label>NUMERO DE EMPLEDO</label>
                      <input type="text" class="form-control" id="n_empleado" name="n_empleado">
                      </div>

                     <div class="col-sm-4">
                      <label>EXTENSION Ó NUMERO TELEFONICO</label>
                      <input type="tel" class="form-control" id="ext_telf" name="ext_telf">
                      </div>
                 </div>
                 <div class="form-group">
                      <div class="col-sm-offset-0 col-sm-12">
                        <label style="color: white">.</label>
                      <select style="width: 100%" class="form-control" class="selectpicker" name="id_area" id="id_area" type="text" data-live-search="true">
                      <option value="">SELECCIONE ÁREA ADSCRIPCIÓN</option> 
                      <?php while($rea = mysqli_fetch_row($are)):?>
                      
                      <option value="<?php echo $rea[0]?>"><?php echo $rea[1]?></option>
                      <?php endwhile; ?>
                      </select>
                      </div>
                    </div>
                   
           

                  <div class="form-group">
                    <div class="col-sm-6">
                    <label>ID PUESTO</label>
                    <input type="text" class="form-control" id="idpuesto" name="idpuesto">
                    </div>

                     <!--<div class="col-sm-4">
                      <label>Área Adscripción</label>
                      <input type="text" class="form-control" id="area" name="area">
                      </div>-->

                     <div class="col-sm-6">
                      <label>UNIDAD ADMINISTRATIVA</label>
                      <input type="text" class="form-control" id="unidad" name="unidad">
                  </div>
                  <div class="col-sm-offset-0 col-sm-12">
                        <label style="color: white">.</label>
                      
                      <select style="width: 100%" class="form-control" class="selectpicker" name="idubicacion" id="idubicacion" type="text" data-live-search="true">
                      <option value="">SLECIONE UBICACION</option>
                      <option value="7">Prueba</option>  
                      <!-- ?php while($rea = mysqli_fetch_row($are)):?>
                      
                      <option value="?php echo $rea[0]?>">?php echo $rea[1]?></option>
                      ?php endwhile; ?> -->
                      </select>
                      </div>
                  </div>
                 <div class="form-group"><br>
                    <div class="col-sm-offset-0 col-sm-5">
                    <button type="button" id="button" class="btn btn-info btn-lg" onclick="registrar();">Aceptar</button>
                    </div>
                    <b><p class="alert alert-danger text-center padding error" id="danger">Los datos ya están agregados </p></b>

                    <b><p class="alert alert-success text-center padding exito" id="succe">¡Se agregaron los datos con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="empty">Es necesario agregar los datos que se solicitan </p></b>
                    </div>

                </form>            



                </div>
              
                <!-- /.post -->

                <!-- Post -->
                
<!---------------------12354568789---------------------->

     
                <!-- /.post -->

                <!-- Post -->
                <div class="post">
       
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
      
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <ul class="list-inline">
  
                  </ul>

             
                </div>
                <!-- /.post -->
              </div>
              <!--contenedor estudios-->
              <div class="tab-pane" id="estudios">
              <!-- The timeline -->
              <form class="form-horizontal">
                  
                  <div class="form-group">
                    <div class="col-sm-6">
                    <label>PUESTO</label>
                      <input type="text" style="text-transform:uppercase;" class="form-control" id="puesto" name="puesto">
                    </div>

                     <div class="col-sm-6">
                      <label>EMPRESA</label>
                      <input type="text" style="text-transform:uppercase;" class="form-control" id="empresa" name="empresa">
                      </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                    <label>ACTIVIDADES Y LOGOROS</label>
                    <textarea name="ACTIVIDADES" id="ACTIVIDADES"  placeholder="Escribir el Objetivo" style="text-transform:uppercase;" class="form-control" rows="5" cols="50"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6">
                    <label>FECHA DE ENTRADA</label>
                    <input type="date" class="form-control" >
                    </div>
                    <div class="col-sm-6">
                    <label>FECHA DE SALIDA</label>
                    <input type="date" class="form-control">
                    </div>  
              </div>
              <div class="form-group">
                    <div class="col-sm-5">
                    <button type="button1" id="button1" class="btn btn-info btn-lg">Aceptar</button>
                    </div>
                    <b><p class="alert alert-danger text-center padding error" id="danger">Error al agregar datos </p></b>
                    <b><p class="alert alert-success text-center padding exito" id="succe">¡Se agregaron los datos con éxito!</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="empty">Es necesario agregar los datos que se solicitan </p></b>
                    </div>

                </form>   

              </div>
              <!-- /.tab-pane 2do panel-->
              <div class="tab-pane" id="timeline">

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Cursos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php //include('../html/gesCurso.html');?>
              <!--<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Titulo</th>
                  <th>Tipo</th>
                  <th>Proceso</th>
                  <th>Observaciones</th>
                  <th>Evaluación </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Webkit</td>
                  <td>Safari 2.0</td>
                  <td>OSX.4+</td>
                  <td>419.3</td>
                  <td>A</td>
                  <td>A</td>
                </tr>
            </tbody>
        </table>-->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
              </div>
              <!-- /.tab-pane -->

             <div class="tab-pane" id="settings">
                788

              </div>


              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>






<!-- /.col -->
</div>
<!-- /.row -->
</section>  
<!-- /.col -->
  
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
<script type="text/javascript" src="../js/datos.js"></script>
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

</body>
</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function(){
$('#id_area').select2();
}); 
</script>
<script src="../js/select2.js"></script> 
