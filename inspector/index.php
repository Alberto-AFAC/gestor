<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gestor de Inspectores|Perfil Inspector</title>

  <link href="../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
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


    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../dist/img/perfil.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $datos[1]?></h3>

              <p class="text-muted text-center"><?php echo $datos[3]?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Cursos programados</b> <a class="pull-right"><div id="programados"></div></a>
                </li>
                <li class="list-group-item">
                  <b>Cursos Completados</b> <a class="pull-right"><div id="completos"></div></a>
                </li>
                <li class="list-group-item">
                  <b>Cursos cancelados</b> <a class="pull-right"><div id="cancelados"></div></a>
                </li>
              </ul>
      
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Competencia</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="#">
              <strong><i class="fa fa-book margin-r-5"></i>Educación</strong>  
              </a>
              <p class="text-muted">
                <?php echo $dato[4];?>
              </p>

              <hr>
              <a href="#">
              <strong><i class="ion-briefcase margin-r-5"></i>Experiencia Laboral</strong>
              </a>

              <p class="text-muted"><?php echo $dato[5]; ?></p>
             
<!--               <strong><i class="fa fa-pencil margin-r-5"></i>Habilidades</strong>
              <a href="#" class="btn ion-edit"><b></b></a>
              <p>
                <span class="label label-danger">ingles</span>
                <span class="label label-success">Codigos</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p> -->

              <hr>

        
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">

            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Cursos en proceso </a></li>
              <li><a href="#curComplet" data-toggle="tab">Cursos programados</a></li>              
              <li><a href="#timeline" data-toggle="tab">Cursos completados</a></li>
              <li><a href="#settings" data-toggle="tab">Cursos cancelados</a></li>
            </ul>
          <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->

<div class="post">
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
</div>
<div class="box-body">
  <div id="refresh">
<table style="width: 100%;" id="data-table-confirmar" class="table display table-striped table-bordered"></table>
</div>
</div>
</div>
</div>
</div>
</section>
</div>

              </div>
       
<div class="tab-pane" id="curComplet">
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
</div>
<div class="box-body">
<table style="width: 100%;" id="data-table-programado" class="table display table-striped table-bordered"></table>
</div>
</div>
</div>
</div>
</section>
</div>

<div class="tab-pane" id="timeline">
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
</div>
<div class="box-body">
<table style="width: 100%;" id="data-table-completo" class="table display table-striped table-bordered"></table>
</div>
</div>
</div>
</div>
</section>
</div>
              <!-- /.tab-pane -->

<div class="tab-pane" id="settings">
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
</div>
<div class="box-body">
<table style="width: 100%;" id="data-table-cancelado" class="table display table-striped table-bordered"></table>
</div>
</div>
</div>
</div>
</section>
</div>

<?php include('modal.php');?>
              <!-- /.tab-pane -->
            </div>
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
<?php include('../admin/panel.html');?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script type="text/javascript" src="../js/cursos.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

</body>
</html>

<?php echo $datos[0];?>


<script type="text/javascript">

var dataSet = [
<?php 
$query = "
SELECT * FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND confirmar = 'CONFIRMAR' AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_curso'];

 $fcurso = $data['fcurso'] = date("d-m-Y");
 $fechaf = $data['fechaf'] = date("d-m-Y");
?>

//console.log('<?php echo $id_curso ?>');

["<?php echo $data['gstTitlo']?>","<?php echo $data['gstTipo']?>","<?php echo  $fcurso?>","<?php echo $data['hcurso']?>","<?php echo $fechaf?>",

"<a type='button' title='Confirmar asistencia' onclick='confirmar(<?php echo $id_curso ?>)' class='btn btn-warning' data-toggle='modal' data-target='#modal-confirma'>CONFIRMAR </a>"

//"<a title='Evaluación' class='btn btn-danger' data-toggle='modal' data-target='#modal-asignar'>ASIGNAR</a>"

],
<?php } ?>
]

var tableGenerarReporte = $('#data-table-confirmar').DataTable({
"language": {
"searchPlaceholder": "Buscar datos...",
"url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
},
data: dataSet,
columns: [
{title: "CURSO"},
{title: "TIPO"},
{title: "INICIA"},
{title: "HORA"},
{title: "FINALIZA"},
{title: "ACCIÓN"}
],
});


var dataSet = [
<?php 
$query = "
SELECT * FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND proceso = 'PENDIENTE' AND cursos.estado = 0 || idinsp = $datos[0] AND confirmar = 'CONFIRMAR' AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_curso'];

 $fcurso = $data['fcurso'] = date("d-m-Y");
 $fechaf = $data['fechaf'] = date("d-m-Y");

if($data['confirmar']=='CONFIRMAR'){
$valor='POR CONFIRMAR';
}else if($data['confirmar']=='CONFIRMADO'){
 $valor=$data['confirmar']; 
}else{
 $valor='DECLINADO';  
}

?>

//console.log('<?php echo $id_curso ?>');

["<?php echo $data['gstTitlo']?>","<?php echo $data['gstTipo']?>","<?php echo $fcurso?>","<?php echo $data['hcurso']?>","<?php echo $fechaf?>",

// "<a type='button' title='Evaluación' onclick='asignacion(<?php echo $id_curso ?>)' class='btn btn-default' data-toggle='modal' data-target='#modal-asignar'><?php echo $valor?> </a>"

"<?php echo $valor?>"



],
<?php } ?>
]

var tableGenerarReporte = $('#data-table-programado').DataTable({
"language": {
"searchPlaceholder": "Buscar datos...",
"url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
},
data: dataSet,
columns: [
{title: "CURSO"},
{title: "TIPO"},
{title: "INICIA"},
{title: "HORA"},
{title: "FINALIZA"},
{title: "ACCIÓN"}
],
});


var dataSet = [
<?php 
$query = "
SELECT * FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND proceso = 'FINALIZADO' AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_curso'];

 $fcurso = $data['fcurso'] = date("d-m-Y");
 $fechaf = $data['fechaf'] = date("d-m-Y");
?>
["<?php echo $data['gstTitlo']?>","<?php echo $data['gstTipo']?>","<?php echo  $fcurso?>","<?php echo $data['hcurso']?>","<?php echo $fechaf?>",

"<a type='button' title='Evaluación' onclick='asignacion(<?php echo $id_curso ?>)' class='btn btn-success' data-toggle='modal' data-target='#modal-asignar'>FINALIZADO </a>"
],
<?php } ?>
];
var tableGenerarReporte = $('#data-table-completo').DataTable({
"language": {
"searchPlaceholder": "Buscar datos...",
"url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
},
data: dataSet,
columns: [
{title: "CURSO"},
{title: "TIPO"},
{title: "INICIA"},
{title: "HORA"},
{title: "FINALIZA"},
{title: "ACCIÓN"}
],
});

var dataSet = [
<?php 
$query = "
SELECT * FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND proceso = 'CANCELADO' AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_curso'];

 $fcurso = $data['fcurso'] = date("d-m-Y");
 $fechaf = $data['fechaf'] = date("d-m-Y");
?>
["<?php echo $data['gstTitlo']?>","<?php echo $data['gstTipo']?>","<?php echo  $fcurso?>","<?php echo $data['hcurso']?>","<?php echo $fechaf?>",

"<a type='button' title='Evaluación' onclick='asignacion(<?php echo $id_curso ?>)' class='btn btn-danger' data-toggle='modal' data-target='#modal-asignar'>CANCELADO </a>"
],
<?php } ?>
];
var tableGenerarReporte = $('#data-table-cancelado').DataTable({
"language": {
"searchPlaceholder": "Buscar datos...",
"url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
},
data: dataSet,
columns: [
{title: "CURSO"},
{title: "TIPO"},
{title: "INICIA"},
{title: "HORA"},
{title: "FINALIZA"},
{title: "ACCIÓN"}
],
});
</script>
