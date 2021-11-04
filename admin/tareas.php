<!DOCTYPE html><?php 

session_start();

include ("../conexion/conexion.php");

$sql = "SELECT gstIdlsc, gstTitlo,gstTipo FROM listacursos WHERE estado = 0";
$curso = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'INSTRUCTOR' AND estado = 0";
$instructor  = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'COORDINADOR ' AND estado = 0";
$cordinador  = mysqli_query($conexion,$sql);

unset($_SESSION['consulta']);

?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="../dist/img/iconafac.ico" />
<title>Capacitación AFAC | Programar Curso</title>
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
<script src="../dist/js/sweetalert2.all.min.js"></script>
<link href="../dist/css/sweetalert2.min.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../dist/css/card.css">

<style>
.swal-wide{
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

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

<div class="wrapper">

<?php
include('header.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->

<section class="content-header">
<h1>
PROGRAMACIÓN DE TAREAS   
</h1>
</section>
<!-- Main content -->
<section class="content">
<div class="row">

<div class="col-md-12">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs" style="font-size: 14px;">
<li class="active"><a href="#activity" data-toggle="tab">CREAR TAREA</a></li>
<li><a href="#puesto" data-toggle="tab">ASIGNAR TAREA</a></li>
<li><a href="#estudios" data-toggle="tab">TAREAS ASIGNADAS</a></li>
</ul>

<div class="tab-content">
<div class="active tab-pane" id="activity">
<!-- Post -->
<div class="post">
<form id="Dtarea" class="form-horizontal" action="" method="POST">
<!--               <input type="hidden" name="gstIdper" id="gstIdper"> -->
<div class="form-group">
<div class="col-sm-4">
<div class="input-group">
<H4><i class=""></i>
<label> TAREA PRINCIPAL </label>
</H4>
</div>
</div>          
</div>
<input type="hidden" name="idsubt" id="idsubt">
<div class="form-group">
<div class="col-sm-12">
<label>TÍTULO</label>
<input type="text" style="text-transform:uppercase;" class="form-control" id="titulo1" name="titulo1" disabled="">
</div>
</div>
<div class="form-group">
<div class="col-sm-12">
<label>DESCRIPCIÓN </label>
<textarea type="text" style="text-transform:uppercase;" class="form-control" id="descrip1" name="descrip1" rows="4" disabled=""></textarea>
</div>
</div>

<div class="form-group" id="butons1" ><br>
<div class="col-sm-offset-0 col-sm-2">

<button type="button" id="button1" title="Dar click para guardar los cambios" style="background-color:#052E64; border-radius:10px;" class="btn btn-block btn-primary" onclick="agrTarea();"> AGREGAR</button>

</div>
<b>
<p class="alert alert-danger text-center padding error" id="danger">Error al agregar tarea </p>
</b>
<b>
<p class="alert alert-success text-center padding exito" id="succe">¡Se agregaron los datos con éxito!</p>
</b>

<b>
<p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario agregar los datos que se solicitan </p>
</b>
</div>
</form>


<form id="form2" style="display: none;" class="form-horizontal" action="" method="POST">
<!--               <input type="hidden" name="gstIdper" id="gstIdper"> -->
<div class="form-group">
<div class="col-sm-4">
<div class="input-group">
<H4><i class=""></i>
<label> SEGUNDA TAREA  </label>
</H4>
</div>
</div>          
</div>
<input type="hidden" name="idsubt2" id="idsubt2">
<div class="form-group">
<div class="col-sm-12">
<label>TÍTULO</label>
<input type="text" style="text-transform:uppercase;" class="form-control" id="titulo2" name="titulo2" disabled="">
</div>
</div>
<div class="form-group">
<div class="col-sm-12">
<label>DESCRIPCIÓN </label>
<textarea type="text" style="text-transform:uppercase;" class="form-control" id="descrip2" name="descrip2" rows="4" disabled=""></textarea>
</div>
</div>

<div class="form-group" id="butons2" ><br>
<div class="col-sm-offset-0 col-sm-2">

<button type="button" id="button2" title="Dar click para guardar los cambios" style="background-color:#052E64; border-radius:10px;" class="btn btn-block btn-primary" onclick="agrTarea2();"> AGREGAR</button>

</div>
<b>
<p class="alert alert-danger text-center padding error" id="danger2">Error al agregar tarea </p>
</b>
<b>
<p class="alert alert-success text-center padding exito" id="succe2">¡Se agregaron los datos con éxito!</p>
</b>

<b>
<p class="alert alert-warning text-center padding aviso" id="vacio2">Es necesario agregar los datos que se solicitan </p>
</b>
</div>
</form>





<form id="form3" style="display: none;" class="form-horizontal" action="" method="POST">
<!--               <input type="hidden" name="gstIdper" id="gstIdper"> -->
<div class="form-group">
<div class="col-sm-4">
<div class="input-group">
<H4><i class=""></i>
<label> SEGUNDA TAREA  </label>
</H4>
</div>
</div>          
</div>
<input type="hidden" name="idsubt3" id="idsubt3">
<div class="form-group">
<div class="col-sm-12">
<label>TÍTULO</label>
<input type="text" style="text-transform:uppercase;" class="form-control" id="titulo3" name="titulo3" disabled="">
</div>
</div>
<div class="form-group">
<div class="col-sm-12">
<label>DESCRIPCIÓN </label>
<textarea type="text" style="text-transform:uppercase;" class="form-control" id="descrip3" name="descrip3" rows="4" disabled=""></textarea>
</div>
</div>

<div class="form-group" id="butons3" ><br>
<div class="col-sm-offset-0 col-sm-2">

<button type="button" id="button3" title="Dar click para guardar los cambios" style="background-color:#052E64; border-radius:10px;" class="btn btn-block btn-primary" onclick="agrTarea3();"> AGREGAR</button>

</div>
<b>
<p class="alert alert-danger text-center padding error" id="danger3">Error al agregar tarea </p>
</b>
<b>
<p class="alert alert-success text-center padding exito" id="succe3">¡Se agregaron los datos con éxito!</p>
</b>

<b>
<p class="alert alert-warning text-center padding aviso" id="vacio3">Es necesario agregar los datos que se solicitan </p>
</b>
</div>
</form>


</div>
</div>
<!--------------------ASIGNAR TAREA------------------------------->

<div class="tab-pane" id="puesto">

<form id="Pusto" class="form-horizontal" action="" method="POST">
<input type="hidden" name="pstIdper" id="pstIdper">




<div class="form-group">
<div class="col-sm-4">
<div class="input-group">
<H4><i class="fa   fa-suitcase"></i>
<label> ------- </label>
</H4>
</div>
</div>
</div>
<div class="form-group">



</div>



<div class="form-group">
<input type="hidden" name="gstIDCat" id="gstIDCat" value="0">
<!-- 
<input type="hidden" name="gstIDSub" id="gstIDSub" value="0"> -->


</div>
<div class="form-group">

</div>

<div class="form-group" id="butons" style="display: none;"><br>
<div class="col-sm-offset-0 col-sm-2">
<button type="button" id="button" title="Dar click para guardar los cambios" style="background-color:#052E64; border-radius:10px;" class="btn btn-block btn-primary" onclick="actPuesto();">ACTUALIZAR</button>
</div>
<b>
<p class="alert alert-danger text-center padding error" id="danger1">Error al actualizar
datos </p>
</b>
<b>
<p class="alert alert-success text-center padding exito" id="succe1">¡Se actualizaron los
datos con éxito!</p>
</b>

<b>
<p class="alert alert-warning text-center padding aviso" id="empty1">Es necesario agregar
los datos que se solicitan </p>
</b>
</div>
</form>
</div>
<!----------------------------------------------------------------------------->            
<div class="tab-pane" id="estudios">
<form class="form-horizontal">
<div class="form-group">
<div class="col-sm-4">
<H4>
<label>ULTIMO GRADO DE ESTUDIOS </label>
</H4>
</div>
</div>
<div id="studios"></div>
</form>
</div>
<div class="tab-pane" id="experiencia">
<form class="form-horizontal">
<div id="profsions"></div>
</form>
</div>


</div>

</div></div>


<!-- /.col -->

<!-- <form class="form-horizontal"> -->
<!-- <div class="form-group">
<div class="col-sm-4">
<label class="label2">RESPONSABLES DE LA TAREA</label>
</div>                     
</div> -->  
<!-- </form> -->

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
<strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Civil</a>.</strong> Todos los derechos Reservados AAJ.
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
<script src="../js/proInspc.js"></script>
<!-- page script -->

</body>
</html>
<script type="text/javascript">

document.getElementById('titulo1').disabled = false;
document.getElementById('descrip1').disabled = false;  
document.getElementById('titulo2').disabled = false;
document.getElementById('descrip2').disabled = false; 
document.getElementById('titulo3').disabled = false;
document.getElementById('descrip3').disabled = false;  

function agrTarea(){

titulo1  = document.getElementById('titulo1').value;
descrip1 = document.getElementById('descrip1').value;
  idsubt = document.getElementById('idsubt').value;
  fechaA = document.getElementById('fechaA').value;
  fechaT = document.getElementById('fechaT').value;

  datos = 'titulo1='+titulo1+'&descrip1='+descrip1+'&idsubt='+idsubt+'&opcion=tareAgr';
//var gstFslda = document.getElementById('AgstFslda').value;

if (titulo1 == '' || descrip1 == '') {

$('#vacio').toggle('toggle');
setTimeout(function() {
$('#vacio').toggle('toggle');
}, 2000);

return;
} else {
$.ajax({
url: '../php/regTarea.php',
type: 'POST',
data: datos
}).done(function(respuesta) {
 // alert(respuesta);
if (respuesta == 0) {

$('#danger').toggle('toggle');
setTimeout(function() {
$('#danger').toggle('toggle');
}, 2000);

//conprofesion(ActIdpro);
} else {

$("#idsubt2").val(respuesta);
$('#succe').toggle('toggle');
setTimeout(function() {
$('#succe').toggle('toggle');
}, 2000);
$("#button1").hide();
$("#button2").show();
$("#form2").show();
document.getElementById('titulo1').disabled = true;
document.getElementById('descrip1').disabled = true;  

}
});
}

}

function agrTarea2(){

titulo1  = document.getElementById('titulo2').value;
descrip1 = document.getElementById('descrip2').value;
  idsubt = document.getElementById('idsubt2').value;

  datos = 'titulo1='+titulo1+'&descrip1='+descrip1+'&idsubt='+idsubt+'&opcion=tareAgr';
//var gstFslda = document.getElementById('AgstFslda').value;

if (titulo1 == '' || descrip1 == '') {

$('#vacio2').toggle('toggle');
setTimeout(function() {
$('#vacio2').toggle('toggle');
}, 2000);

return;
} else {
$.ajax({
url: '../php/regTarea.php',
type: 'POST',
data: datos
}).done(function(respuesta) {
  //alert(respuesta);
if (respuesta == 0) {

$('#danger2').toggle('toggle');
setTimeout(function() {
$('#danger2').toggle('toggle');
}, 2000);
//conprofesion(ActIdpro);
} else {
$("#idsubt3").val(respuesta);
$('#succe2').toggle('toggle');
setTimeout(function() {
$('#succe2').toggle('toggle');
}, 2000);
$("#button1").hide();
$("#button2").hide();
$("#button3").show();
$("#form3").show();
document.getElementById('titulo2').disabled = true;
document.getElementById('descrip2').disabled = true;  

}
});
}

}



function agrTarea3(){

titulo1  = document.getElementById('titulo3').value;
descrip1 = document.getElementById('descrip3').value;
  idsubt = document.getElementById('idsubt3').value;

  datos = 'titulo1='+titulo1+'&descrip1='+descrip1+'&idsubt='+idsubt+'&opcion=tareAgr';
//var gstFslda = document.getElementById('AgstFslda').value;

if (titulo1 == '' || descrip1 == '') {

$('#vacio3').toggle('toggle');
setTimeout(function() {
$('#vacio3').toggle('toggle');
}, 2000);

return;
} else {
$.ajax({
url: '../php/regTarea.php',
type: 'POST',
data: datos
}).done(function(respuesta) {
  //alert(respuesta);
if (respuesta == 0) {
$('#danger3').toggle('toggle');
setTimeout(function() {
$('#danger3').toggle('toggle');
}, 2000);




} else {


$('#succe3').toggle('toggle');
setTimeout(function() {
$('#succe3').toggle('toggle');
}, 2000);
$("#button1").hide();
$("#button2").hide();
$("#button3").hide();
document.getElementById('titulo3').disabled = true;
document.getElementById('descrip3').disabled = true;  
//conprofesion(ActIdpro);


}
});
}

}

</script>