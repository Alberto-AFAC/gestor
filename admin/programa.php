<!DOCTYPE html><?php include ("../conexion/conexion.php");

$sql = "SELECT gstIdlsc, gstTitlo,gstTipo FROM listacursos WHERE estado = 0";
$curso = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'INSTRUCTOR' AND estado = 0";
$instructor  = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'COORDINADOR ' AND estado = 0";
$cordinador  = mysqli_query($conexion,$sql);

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
        PROGRAMACIÓN DEL CURSO       
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
<div class="active tab-pane" id="activity">
<!-- Post -->
<div class="post">

<form class="form-horizontal">


<div class="form-group">
<div class="col-sm-offset-0 col-sm-12">
<label style="color: white">.</label>
<select style="width: 100%" class="form-control" class="selectpicker" name="id_mstr" id="id_mstr" type="text" data-live-search="true">
<option value="0">SELECCIONE CURSO</option> 
<?php while($cursos = mysqli_fetch_row($curso)):?>

<option value="<?php echo $cursos[0]?>"><?php echo $cursos[1]?></option>
<?php endwhile; ?>
</select>
</div>
</div>

<div class="form-group">
<div class="col-sm-4">
<label>FECHA INICIO</label>
<input type="date" class="form-control" id="fcurso" name="fcurso">
</div>

<div class="col-sm-4">
<label>HORA</label>
<input type="time" class="form-control" id="hcurso" name="hcurso">
</div>


<div class="col-sm-4">
<label>FECHA CONCLUCIÓN</label>
<input type="date" class="form-control" id="fechaf" name="fechaf">
</div>
</div>

<div class="form-group">

        <!---se muestra dato del instructor al logearse-->
        <!--<div class="col-sm-4">
        <label style="color: white">INSTRUCTOR</label>
        <select type="text" class="form-control" >
        <option value="null">ELEGIR </option>
        <option value="instructor1">PRUEBA1</option>
        </select>
        </div>-->

<!--<input type='checkbox'  id='id_insp' value='"+obj.data[i].gstIdper+"' />   -->

    
    <div class="col-sm-4">
    <label>COORDINADOR </label>
      <select class="form-control" id="idcord" name="idcord" style="width: 100%;">
          <option value="0">SELECCIONE COORDINADOR </option> 
          <?php while($cordinadors = mysqli_fetch_row($cordinador)):?>
          <option value="<?php echo $cordinadors[0]?>"><?php echo $cordinadors[1].' '.$cordinadors[2]?></option>
          <?php endwhile; ?>
      </select>
    </div>
    <?php //include('advanced.php');?>

    <div class="col-sm-4">
    <label>INSTRUCTOR</label>
      <select style="width: 100%" class="form-control" class="selectpicker" id="idinst" name="idinst[]" type="text" multiple="multiple" data-placeholder="SELECCIONE INSTRUCTOR" data-live-search="true">
          <?php while($instructors = mysqli_fetch_row($instructor)):?>

          <option value="<?php echo $instructors[0]?>"><?php echo $instructors[1].' '.$instructors[2]?></option>
          <?php endwhile; ?>
      </select>
    </div>

    <div class="col-sm-4">
    <label>SEDE DEL CURSO</label>
      <select type="text" class="form-control" id="sede" name="sede">
         <option value="0">ELEGIR SEDE</option>     
         <option value="AGENCIA FEDERAL DE AVIACIÓN CIVIL">AGENCIA FEDERAL DE AVIACIÓN CIVIL</option>
         <option value="CENTRO INTERNACIONAL DE ADIESTRAMIENTO DE AVIACIÓN CIVIL">CENTRO INTERNACIONAL DE ADIESTRAMIENTO DE AVIACIÓN CIVIL</option>
      </select>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-4">
      <label>MODALIDAD</label>
      <select type="text" class="form-control" id="modalidad" name="modalidad">
          <option value="0">ELEGIR UNA OPCIÓN</option>
          <option value="A DISTANCIA">A DISTANCIA</option>
          <option value="PRESENCIAL">MIXTA</option>
          <option value="PRESENCIAL">PRESENCIAL</option>
          <option value="PRESENCIAL">SEMIPRESENCIAL</option>
          
      </select>
    </div>
    <div class="col-sm-4">
      <label>LINK DE ACCESO</label>
      <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-globe"></i>
                  </div>
            <input type="url" class="form-control" id="link" name="link" placeholder="URL ">
      </div>
    </div>
    <div class="col-sm-4">
      <label>CONTRASEÑA DE ACCESO</label>
      <div class="input-group">
      <div class="input-group-addon">
                    <i class="fa fa-unlock-alt"></i>
                  </div>
      <input type="text" class="form-control" id="contracceso" name="contracceso">
    </div>
    </div>
</div>


<div class="form-group">
<div class="col-sm-4">
<label>PARTICIPANTES DEL CURSO</label>

</div>                     
</div>   

<div id="scroll" style="width: 100%; height: 300px; overflow: scroll;">
<div class="box-body">
<?php include('../html/proInspc.html');?>
</div>
</div>
<br>


<div class="form-group"><br>
<div class="col-sm-offset-0 col-sm-5">
<button type="button" id="button" class="btn btn-info" onclick="proCurso();">PROGRAMAR</button>
<div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
  </div>
</div>
<button type="button" id="vaciar" class="btn btn-default" onclick="location.href='programa.php'" style="display: none;">VACIAR</button>
</div>

<b><p class="alert alert-danger text-center padding error" id="danger">Error al agregar datos </p></b>

<b><p class="alert alert-success text-center padding exito" id="succe">¡Se agregaron los datos con éxito!</p></b>

<b><p class="alert alert-warning text-center padding aviso" id="empty">Es necesario agregar los datos que se solicitan </p></b>
</div>
</form>
</div>

              </div>
              <!-- /.tab-pane 2do panel-->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                  pruba1
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
      <b>Version</b> 1.1
    </div>
    <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong> Todos los derechos Reservados AJ.
  </footer>

  <!-- Control Sidebar -->
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

</body>
</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function(){
$('#id_mstr').select2();
$('#idinst').select2();
$("#idcord").select2();
}); 
</script>
<script src="../js/select2.js"></script> 

<script>
	jQuery(function($){
  $(document).ajaxSend(function() {
    $("#overlay").fadeIn(3000);　
  });
		
  $('#button').click(function(){
    $.ajax({
      type: 'GET',
      success: function(proCurso){
  
      }
    }).done(function() {
      setTimeout(function(){
        $("#overlay").fadeOut(3000);
      },3000);
    });
  });	
});
</script>