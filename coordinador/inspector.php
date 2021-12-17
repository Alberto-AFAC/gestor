<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Capacitación AFAC | Perfil Inspector</title>
<link rel="shortcut icon" href="../dist/img/iconafac.ico" />
<link href="../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" type="text/css" href="../dist/css/card.css">
<link rel="stylesheet" type="text/css" href="../dist/css/skins/card.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"
integrity="sha512-1g3IT1FdbHZKcBVZzlk4a4m5zLRuBjMFMxub1FeIRvR+rhfqHFld9VFXXBYe66ldBWf+syHHxoZEbZyunH6Idg=="
crossorigin="anonymous"></script>
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.2/sweetalert2.min.css"
integrity="sha512-rogivVAav89vN+wNObUwbrX9xIA8SxJBWMFu7jsHNlvo+fGevr0vACvMN+9Cog3LAQVFPlQPWEOYn8iGjBA71w=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.2/sweetalert2.min.js"
integrity="sha512-2sjxi4MoP9Gn7QE0NhJdxOFVMK/qYsZO6JnO6pngGvck8p5UPwFX2LV5AsAMOQYgvbzMmki6sIqJ90YO3STAnA=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
.swal-wide {
width: 500px !important;
font-size: 16px !important;
}

.a-alert {
outline: none;
text-decoration: none;
padding: 2px 1px 0;
}

.a-alert:link {
color: white;
}

.a-alert:visited {
color: white;
}
</style>
</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
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
<img class="profile-user-img img-responsive img-circle" src="../dist/img/perfil.png"
alt="User profile picture">

<h3 class="profile-username text-center"><?php echo $datos[1]?></h3>

<p class="text-muted text-center"><?php echo $datos[3]?></p>
<input type="text" style="display:none;" name="f1t1" id="f1t1"
value="<?php echo $datos[0]?>">


<ul class="list-group list-group-unbordered">
<li class="list-group-item">
<b>Cursos en Proceso</b> <a class="pull-right">
<div id="programados"></div>
</a>
</li>
<li class="list-group-item">
<b>Cursos Completados</b> <a class="pull-right">
<div id="completos"></div>
</a>
</li>
<li class="list-group-item">
<b>Cursos Declinados</b> <a class="pull-right">
<div id="cancelados"></div>
</a>
</li>
<li class="list-group-item">
<b>Cursos Vencidos</b> <a class="pull-right">
<div id="vencidos"></div>
</a>
</li>
    <li class="list-group-item">
    <a href="history">
    <i class="fa fa-archive"></i> <span>Perfil</span>
    <span class="pull-right-container">
    <small class="label pull-right bg-red"></small>
    <small class="label pull-right bg-blue"></small>
    </span>
    </a>
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
<a style="cursor: pointer;" onclick="constudios();" data-toggle='modal'
data-target='#modal-estud'>
<strong><i class="fa fa-book margin-r-5"></i>Educación</strong>

</a>

<!-- <span style='background-color:#BB2303; font-size: 13px; cursor: pointer;' class='badge' title='Ver detalles' data-toggle='modal' data-target='#modal-estudiosins' onclick="">pruebas</span> -->
<p class="text-muted">

<?php echo $dato[4];?>
</p>

<hr>
<a style="cursor: pointer;" onclick="conprofesion();" data-toggle='modal'
data-target='#modal-exprofe'>
<strong><i class="ion-briefcase margin-r-5"></i>Experiencia Laboral</strong>
</a>

<p class="text-muted"><?php echo $dato[5]; ?></p>


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
<li class="active"><a href="#activity" data-toggle="tab">Cursos por confirmar </a></li>
<li><a href="#curComplet" data-toggle="tab">Cursos en proceso</a></li>
<li><a href="#timeline" data-toggle="tab">Cursos completados</a></li>
<li><a href="#settings" data-toggle="tab">Cursos declinados</a></li>
<li><a href="#vencido" data-toggle="tab">Cursos vencidos</a></li>
<?php 

if($datos[3]== 'ADMINISTRATIVO'){}else{



if(isset($ojt['idiva'])&&!empty($ojt['idiva'])){

if($ojt['idiva'] != ''){
echo "<li><a href='#ojt' data-toggle='tab'>OJT</a></li>";
}else {

}
}else{

}
}
?>
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
                    <table style="width: 100%;" id="data-table-confirmar"
                        class="table display table-striped table-bordered">
                    </table>
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
            <table style="width: 100%;" id="data-table-programado"
                class="table display table-striped table-bordered"></table>
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
            <table style="width: 100%;" id="data-table-completo"
                class="table display table-striped table-bordered"></table>
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
            <table style="width: 100%;" id="data-table-cancelado"
                class="table display table-striped table-bordered"></table>
        </div>
    </div>
</div>
</div>
</section>
</div>

<div class="tab-pane" id="vencido">
<section class="content">
<div class="row">
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">
            <table style="width: 100%;" id="data-table-vencidos"
                class="table display table-striped table-bordered"></table>
        </div>
    </div>
</div>
</div>
</section>
</div>

<div class="tab-pane" id="ojt">
<section class="content">
<div class="row">
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">

            <table id="data-table-ojt"
                class="table display table-striped table-bordered"
                style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>CURSO</th>
                        <th>TAREA</th>
                        <th>DESCRIPCIÓN</th>
                        <th>INICIO</th>
                        <th>FINAL</th>
                        <th>ACCIÓN</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>
</div>
</section>
</div>
<!-- EVALUACIÓN CURSO -------------------------------------------------------------------------------------------->
<style type="text/css">
#modal-evalcurso span {
color: red;
font-size: 1.5em;
display: none;
}
</style>


<?php include('../perfil/reaccion.php');?>

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
<!-- MODAL PARA ENTREGAR TAREA -->



<form id="tareas" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">
<div class="modal fade" id="pendiente" tabindex="-1" role="dialog" aria-labelledby="pendiente"
aria-hidden="true">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<input type="hidden" id="id_tare" name="id_tare">
<input type="hidden" id="opcion" name="opcion" value="modificar">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<div class="modal-title" id="myModalLabel"><span style="font-size: 15px;"
id="titulo"></span></div>
</div>
<div class="modal-body">
<span>¿DESEAS CONCLUIR CON LAS ACTIVIDADES ASIGNADAS PARA OJT?</span><br><br>
<div class="form-group">
<div class="col-sm-2">
<label class="container">SI
<input type="radio" value="1" name="entrega">
<span class="checkmark"></span>
</label>
</div>
<div class="col-sm-2">
<label class="container">NO
<input type="radio" name="entrega" value="0">
<span class="checkmark"></span>
</label>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
<button type="button" onclick="modificar();" class="btn btn-primary">GUARDAR</button>
</div>
</div>
</div>

</div>
</form>


<script type="text/javascript" src="../js/encuestadatos.js"></script>
<?php include('../perfil/modal.php');?>
<!-- /.tab-pane -->
</div>

<!-- /.content -->
</div>
<!-- MODAL PARA ENTREGAR TAREA -->
<form id="tareas" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">
<div class="modal fade" id="pendiente" tabindex="-1" role="dialog" aria-labelledby="pendiente"
aria-hidden="true">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<input type="hidden" id="id_tare" name="id_tare">
<input type="hidden" id="opcion" name="opcion" value="modificar">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<div class="modal-title" id="myModalLabel"><span style="font-size: 15px;" id="titulo"></span></div>
</div>
<div class="modal-body">
<span>¿DESEAS CONCLUIR CON LAS ACTIVIDADES ASIGNADAS PARA OJT?</span><br><br>
<div class="form-group">
<div class="col-sm-2">
<label class="container">SI
<input type="radio" value="1" name="entrega">
<span class="checkmark"></span>
</label>
</div>
<div class="col-sm-2">
<label class="container">NO
<input type="radio" name="entrega" value="0">
<span class="checkmark"></span>
</label>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
<button type="button" onclick="modificar();" class="btn btn-primary">GUARDAR</button>
</div>
</div>
</div>
</div>
</form>
<!-- /.content-wrapper -->
<footer class="main-footer">
<div class="pull-right hidden-xs">
<b>Version</b> <?php 
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
<strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong>
Todos los derechos Reservados DDE
.

</footer>

<!--  -->
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
<!-- <script type="text/javascript" src="../js/cursos.js"></script> -->
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="../js/lisCurso.js"></script>


</body>

</html>
<?php include('../perfil/cursos.php'); ?>
