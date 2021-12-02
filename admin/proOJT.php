<?php 
include ("../conexion/conexion.php");

session_start();

$sql = "SELECT id_ojt, tarea, subtarea FROM ojt WHERE estado = 0";
$tareas = mysqli_query($conexion,$sql);

$sql = "SELECT id_ojt, subtarea FROM ojt WHERE estado = 0";
$subtarea = mysqli_query($conexion,$sql);

$sql = "SELECT id_ojt, subsubtarea FROM ojt WHERE estado = 0";
$subsubtarea = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'INSTRUCTOR' AND estado = 0 OR  gstCargo = 'COORDINADOR' AND estado = 0 ";
$instructor  = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'COORDINADOR' AND estado = 0 ";
$cordinador  = mysqli_query($conexion,$sql);

unset($_SESSION['consulta']);
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="../dist/img/iconafac.ico" />
<title>Capacitación AFAC | Alta Curso</title>

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
<link rel="stylesheet" type="text/css" href="../dist/css/sweetalert2.min.css">
<script src="../dist/js/sweetalert2.all.min.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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


<!-- Left side column. contains the logo and sidebar -->
<?php include('header.php');?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->

<section class="content-header">
<h1>
PROGRAMACIÓN OJT
</h1>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<!-- /.col -->
<div class="col-md-12">
<div class="nav-tabs-custom">
<div class="tab-content">
<div class="active tab-pane" id="activity">
<!-- Post -->
<div class="post">

<form id="addcurse" class="form-horizontal" action="" method="POST">

<div class="form-group">
<div class="col-sm-12">
<label>ESPECIALIDAD</label>

<div id="idSpecialidad"></div>

</div>
</div>

<div class="form-group">
    <div class="col-sm-12">
<div id="tabSpcl"></div>
</div>
</div>


<div class="form-group">

<div class="col-sm-4">
<label>FECHA Y HORA DE INICIO</label>
<input type="datetime-local" class="form-control"
placeholder="Ingresa subtarea..." name="fechaInicio"
id="fechaInicio">
</div>
<div class="col-sm-4">
<label>FECHA Y HORA DE TERMINO</label>
<input type="datetime-local" onkeyup="mayus(this);"
class="form-control" id="fechaTermino" name="fechaTermino">
</div>
</div>
<div class="form-group">
<div class="col-md-4">
<label>COORDINADOR DEL ÁREA</label>
<select multiple="multiple"
data-placeholder="SELECCIONE COORDINADOR DEL ÁREA"
style="width: 100%;color: #000" class="form-control select2"
type="text" class="form-control" id="coordinador"
name="coordinador">
<option value="0">SELECCIONE COORDINADOR </option> 
<?php while($cordinadors = mysqli_fetch_row($cordinador)):?>
<option value="<?php echo $cordinadors[0]?>"><?php echo $cordinadors[1].' '.$cordinadors[2]?></option>

<?php endwhile; ?>
</select>
</div>
<div class="col-md-4">
<label>INSTRUCTOR OJT</label>
<select multiple="multiple"
data-placeholder="SELECCIONE INSTRUCTOR OJT"
style="width: 100%;color: #000" class="form-control select2"
type="text" class="form-control" id="instructor"
name="instructor">
<?php while($instructors = mysqli_fetch_row($instructor)):?>
<option value="<?php echo $instructors[0]?>"><?php echo $instructors[1].' '.$instructors[2]?></option>
<?php endwhile; ?>
</select>

</div>
</div>

<div class="form-group"><br>
<div class="col-sm-offset-0 col-sm-5">
<button type="button" id="button" class="btn btn-primary"
onclick="regOjt();">ACEPTAR </button>
</div>
<b>
<p class="alert alert-danger text-center padding error" id="falla">
Error al registrar curso o al adjuntar archivo</p>
</b>

<b>
<p class="alert alert-success text-center padding exito" id="exito">
¡Se registro curso y archivo con éxito!</p>
</b>

<b>
<p class="alert alert-warning text-center padding aviso" id="vacio">
Es necesario agregar los datos que se solicitan </p>
</b>

<b>
<p class="alert alert-warning text-center padding aviso"
id="repetido">¡El curso ya está registrado!</p>
</b>

<b>
<p class="alert alert-danger text-center padding adjuto" id="renom">
Renombre su archivo</p>
</b>

<b>
<p class="alert alert-warning text-center padding adjuto"
id="adjunta">
Debes adjuntar archivo</p>
</b>

<b>
<p class="alert alert-danger text-center padding adjuto" id="error">
Ocurrio un error</p>
</b>

<b>
<p class="alert alert-danger text-center padding adjuto" id="forn">
Formato no valido</p>
</b>

<b>
<p class="alert alert-danger text-center padding adjuto" id="max">
Supera el limite permitido</p>
</b>

</div>

</form>

</div>
<!-- /.post -->

<!-- Post -->

<!-- /.post -->

<!-- Post -->

<!-- /.post -->
</div>
<!-- /.tab-pane 2do panel-->
<div class="tab-pane" id="timeline">
<!-- The timeline -->
</div>
<!-- /.tab-pane -->
<!-- /.row -->
</section>
<!-- /.content -->
</div>
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

<?php include('panel.html');?>
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
<script src="../js/gesInstr.js"></script>
<script src="../js/global.js"></script>
</body>

</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function() {
$('#gstPrfil').select2();
$('#subtarea').select2();
$('#subsubtarea').select2();
$('#coordinador').select2();
$('#instructor').select2();
 $('#idSpecialidad').load('select/buspecialidad.php');
 $('#tabSpcl').load('select/tablaSpc.php');
});

function regOjt() {
var nivel = $("#nivel").val();
var tarea = $("#tarea").val();
var subtarea = $("#subtarea").val();
var subsubtarea = $("#subsubtarea").val();
var fechaInicio = $("#fechaInicio").val();
var fechaTermino = $("#fechaTermino").val();
if (tarea == '' || subtarea == '' || subsubtarea == '' || fechaInicio == '' || fechaTermino == '') {
Swal.fire({
type: 'info',
text: 'LLENE LOS CAMPOS QUE SE SOLICITAN',
timer: 2000,
customClass: 'swal-wide',
showConfirmButton: false,
});
} else {
$.ajax({
type: "POST",
url: "../php/insertOJT.php",
data: {
nivel: nivel,
tarea: tarea,
subtarea: subtarea,
subsubtarea: subsubtarea,
fechaInicio: fechaInicio,
fechaTermino: fechaTermino

},
success: function(data) {

Swal.fire({
type: 'success',
// title: 'AFAC INFORMA',
text: 'OJT PROGRAMADO CON ÉXITO',
showConfirmButton: false,
timer: 2900,
customClass: 'swal-wide',
showConfirmButton: false,
});
setTimeout("location.href = 'proOJT';", 2000);
}
});
}

return false;
}
</script>
<script src="../js/select2.js"></script>