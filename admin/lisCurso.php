<!DOCTYPE html><?php include ("../conexion/conexion.php");

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
  
  <title>Gestor inspectores |Alta Curso</title>
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
  
  <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">
  

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

<?php
include('header.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
          CURSOS PROGRAMADOS     
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

       
<div class="box-body" id="listCurso">
<?php include('../html/lisCurso.html');?>

 <!-- Datatables -->

</div>
<section class="content">
<div class="row">
  
<?php include('viscurso.php');?>

</div>

            </div>
            <div id='lstacurs'></div>
           
     <div class="modal fade" id="modal-participnt">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" onclick="location.href='lisCurso.php'" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">AGREGAR PARTICIPANTE</h4>
              </div>
              <div class="modal-body">
          <form class="form-horizontal" id="Prtcpnt">

            <input type="hidden" class="form-control" id="gstIdlsc" name="gstIdlsc">
        
            <div class="form-group">
                  <div class="col-sm-6">
                    <label>TÍTULO</label>
                      <input type="text" onkeyup="mayus(this);" class="form-control" id="gstTitlo" name="gstTitlo" disabled="">
                  </div>

                  <div class="col-sm-3">
                       <label>INICIO</label>
                       <input type="date" onkeyup="mayus(this);" class="form-control" id="finicio" name="finicio" disabled="">
                  </div>
                     <div class="col-sm-3">
                       <label>DURACIÓN</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control" id="gstDrcin" name="gstDrcin" disabled="">
                  </div>
            </div>

            <div class="form-group">
  
   <div class="col-sm-12">
    <label>PARTICIPANTE</label>
      <select class="form-control" id="idinsp" name="idinsp" style="width: 100%;">
          <option value="">ELIJA PARTICIPANTE PARA ASISTIR AL CURSO </option> 
          <?php while($inspectors = mysqli_fetch_row($inspector)):?>
          <option value="<?php echo $inspectors[0]?>"><?php echo $inspectors[1].' '.$inspectors[2].' ('.$inspectors[3].')'?></option>
          <?php endwhile; ?>
      </select>
    </div>
            </div>

              <input type="hidden" name="hrcurs" id="hrcurs">
              <input type="hidden" name="finalf" id="finalf">
              <input type="hidden" name="idcord" id="idcord">
              <input type="hidden" name="sede" id="sede">
              <input type="hidden" name="linke" id="linke">
              <input type="hidden" name="modalidad" id="modalidad">

                <div class="form-group">
                <div class="col-sm-5">

                <button type="button" id="button" class="btn btn-info" onclick="agrPartc();">ACEPTAR</button>

                </div>              
                <b><p class="alert alert-info text-center padding error" id="danger">El participante ya está agregado </p></b>

                <b><p class="alert alert-success text-center padding exito" id="succe">¡Se agregó el participante con éxito!</p></b>

                <b><p class="alert alert-warning text-center padding aviso" id="empty">Elija participante  </p></b>
                </div>
              </form>   
            </div>
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
      <form class="form-horizontal" action="" method="POST"  >
      <div class="modal fade" id="modal-eliminar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ELIMINAR CURSO </h4>
              </div>
              <div class="modal-body">
                <input type="hidden" name="gstIdlsc" id="gstIdlsc">
               <div class="form-group">
                <div class="col-sm-12">
                  <p> CONFIRME ACEPTAR, PARA ELIMINAR: <input type="text" name="gstTitlo" id="gstTitlo" class="form-control disabled" disabled="" style="background: white;border: 1px solid white;"></p>
                </div>
                  <br>
                  <div class="col-sm-5">
                  <button type="button" class="btn btn-primary" onclick="eliCurso()">ACEPTAR</button>
                  </div>
                    <b><p class="alert alert-warning text-center padding error" id="danger">Error al eliminar curso</p></b>
                    <b><p class="alert alert-success text-center padding exito" id="succe">¡Se elimino curso con éxito !</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="empty">Elija curso para eliminar </p></b>
                    </div>
                  </div>
                </div>    
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>
    </section>
    <form class="form-horizontal" action="" method="POST" id="avaluacion" >
    <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal fade" id="modal-evaluar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                  <span aria-hidden="true">&times;</span></button>
                <p><h4 class="modal-title">EVALUACIÓN DE RESULTADOS</h4></p>
                <label>Participante</label>
                <input type="text" disabled="" style="text-transform:uppercase; font-size: 14pt; display:none" class="form-control " id="idinsev" name="evaNombr">
                <input type="text" disabled="" style="text-transform:uppercase; font-size: 14pt" class="form-control" id="evaNombr" name="evaNombr">
              </div>
              <div class="modal-body">
                      <div class="form-group">
                      <div class="col-sm-4">
                           <label>ID del Curso</label>
                           <input type="text" name="idfolio" id="idfolio" style="text-transform:uppercase;" class="form-control disabled" disabled="">
                        </div>
                        <div class="col-sm-12">
                           <label>Curso</label>
                           <input type="text" name="idperon" id="idperon" style="text-transform:uppercase;" class="form-control disabled" disabled="">
                        </div>
                        <div class="col-sm-12">
                             <label>Fecha de la evaluación</label>
                             <input type="date" style="text-transform:uppercase;" class="form-control disabled" id='fechaev'>
                        </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-4">
                             <label>Puntuación obtenida</label>
                             <input type="number" name="cantidad" min="1" max="10" style="text-transform:uppercase;" class="form-control disabled;" id='validoev'  onchange="cambiartexto()">
                          </div>
                          <div class="col-sm-4">
                    
                          </div>
                          <span class='label label-success' style= "font-size:25px; display:none"  id='SIe'>APROBADO</span>
                              <span class='label label-danger' style= "font-size:25px; display:none" id='NOE'>REPROBADO</span>
                              <span class='label label-primary' style= "font-size:25px;" id='PE'>PENDIENTE</span>
                      </div>
                     
                      <div class="form-group">
                           <div class="col-sm-2">
                              
                           </div>
                      </div>
                     
                      <div class="form-group">
                           <div class="col-sm-12">
                           <textarea class="col-sm-12"  name="comentarios" id="comeneva" rows="4" cols="10" onkeyup="mayus(this);" style= "font-size: 14px; border-radius: 5px;" placeholder ="Comentarios Adicionales"></textarea>
                           </div>
                      </div>
                
                       <div class="form-group">
                           <div class="col-sm-5">
                             <button type="button" class="btn btn-primary" onclick="cerrareval()">ACEPTAR</button>
                           </div>
                             <b><p class="alert alert-warning text-center padding error" id="dangerev">Error al Evaluar!!</b>
                               <b><p class="alert alert-success text-center padding exito" id="succeev">¡Se Evaluo con exito!</p></b>
                                  <b><p class="alert alert-warning text-center padding aviso" id="emptyev">Falto Ingresar la Puntuación!</p></b>
                                      <b><p class="alert alert-warning text-center padding aviso" id="emptyev1">Falto Ingresar la Fecha!</p></b>
                           </div>
                  </div>
                </div>    
              </div>
            </div>
            <!-- /.modal-content -->
      
          <!-- /.modal-dialog -->
      
        

</form>

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

</body>
</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function(){
$('#id_mstr').select2();
$('#idinst').select2();
$('#idinsp').select2();
}); 
</script>
<script src="../js/select2.js"></script> 