<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GESTOR DE INSPECTORES |ALTA CURSO</title>
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
  <link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


  <!-- Left side column. contains the logo and sidebar -->
<?php include('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

      <div class="row">
    
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">ASIGANCIÓN DEL PUESTO</a></li>
              <li><a href="#evaluacion" data-toggle="tab">EVALUACIÓN</a></li>
              <!--<li><a href="#timeline" data-toggle="tab">CURSOS RECIENTES</a></li>-->
              <!--<li><a href="#settings" data-toggle="tab">CONSULTA DE CURSOS </a></li>-->
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">

                  <form class="form-horizontal" action="" method="POST">
                  <div class="form-group">
                    <div class="col-sm-4">
                        <label>CATEGORIA</label>
                        <select style="width: 100%" class="form-control" class="selectpicker" name="gstIDCat" id="gstIDCat" type="text" data-live-search="true">
                         <option value="">SELECCIONA LA CATEGORÍA</option>
                       </select>
                    </div>
                     
                    <div class="col-sm-4">
                       <label>SUB CATEGORIA</label>
                       <select type="text" class="form-control" id="gstIDSub" name="gstIDSub">
                         <option value="">SELECCIONA LA SUB CATEGORÍA</option>
                         <option value="2">2</option>
                       </select>
                    </div>

                    <div class="col-sm-4">
                     <label>CARGO</label>
                      <select type="text" class="form-control" id="gstCargo" name="gstCargo">
                         <option value="">SELECCIONA EL CARGO</option>
                         <option value="INSTRUCTOR">DIRECTOR</option>
                         <option value="INSPECTOR">INSPECTOR</option>
                         <option value="INSTRUCTOR">INSTRUCTOR</option>
                      </select>
                      </div>
                </div>   
                <div class="form-group">
                <div class="col-sm-6">
                       <label>AC Ó REGIÓN</label>
                       <input type="text" class="form-control" id="gstAcReg" name="gstAcReg">
                    </div>
                
                <div class="col-sm-6">
                      <label>UNIDAD ADMINISTRATIVA</label>
                      <select type="text" class="form-control" id="gstIDuni" name="gstIDuni">
                        <option value="">SELECCIONA LA UNIDAD ADMINISTRATIVA</option>
                        <option value="6">6</option>
                      </select>
                    </div>
                    </div>

              <div class="form-group"><br>
                    <div class="col-sm-offset-0 col-sm-5">
                    <button type="button" id="button" class="btn btn-info btn-lg" onclick="regCurso();">Aceptar</button>
                    </div>
                    <b><p class="alert alert-danger text-center padding error" id="falla">Error al registrar curso o al adjuntar archivo</p></b>

                    <b><p class="alert alert-success text-center padding exito" id="exito">¡Se registro curso y archivo con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario agregar los datos que se solicitan </p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="repetido">¡El curso ya está registrado!</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="renom">
                    Renombre su archivo</p></b>

                    <b><p class="alert alert-warning text-center padding adjuto" id="adjunta">
                    Debes adjuntar archivo</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="error">
                    Ocurrio un error</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="forn">
                    Formato no valido</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="max">
                    Supera el limite permitido</p></b>

                    </div>

                </form>
            
                </div>
                <!-- /.post -->

                <!-- Post -->

                <!-- /.post -->

                <!-- Post -->
                <div class="post">
       
                  <!-- /.user-block -->

                  <!-- /.row -->

                  <ul class="list-inline">
  
                  </ul>

             
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane 2do panel-->
              <!-- The EVALUACIÓN -->
              
              <div class="tab-pane" id="evaluacion">
              <!-- The timeline -->
              <form class="form-horizontal">
              <H4>
                     <label>PERFIL DEL INSPECTOR DE OPERACIONES </label></H4>
                  
                     <div class="row">
                     <div class="col-xs-12">
                     <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">EVALUACIÓN</h3>   
                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>PARAMETROS</th>
                  <th>OBJETIVO</th>
                  <th>ACTUAL</th>
                  <th>CUMPLIO</th>
                  <th>COMENTARIOS</th>
                  <th>EVALUADOR</th>
                </tr>
                <tr>
                  <td>EXPERIENCIA EN TRASPORTE AÉREO</td>
                  <td>5</td>
                  <td>7</td>
                  <td><span class="label label-success">CUMPLIO</span></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>EXPERIENCIA CON LA GESTIÓN U OPERACIÓN DE AÉRONAVES COMERCIALES</td>
                  <td>SI</td>
                  <td>SI</td>
                  <td><span class="label label-success">CUMPLIO</span></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>CONOCIMIENTOS Y EXPERIENCIA EN METEOROLOGÍA</td>
                  <td>SI</td>
                  <td></td>
                  <td><span class="label label-warning">PENDIENTE</span></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>CUALIDADES DE INICITAIVA, TACTO, TOLERANCIA Y PACÍENCIA</td>
                  <td>SI</td>
                  <td>NO</td>
                  <td><span class="label label-danger">NO CUMPLE</span></td>
                  <td></td>
                  <td></td>
                </tr>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          <!-- /.box -->

    <!-- /.content -->
    </div>
    </form> 
  <!-- /.content-wrapper -->
              </div>
              
    <!-- /.FIN DE EVALUACIÓN-->
              <!-- /.tab-pane -->
              <div class="tab-pane" id="settings">



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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1
    </div>
    <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong> Todos los derechos Reservados AJ.
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
<script src="../js/global.js"></script>
</body>
</html>
