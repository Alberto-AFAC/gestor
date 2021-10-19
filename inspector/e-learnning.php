<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Gestor de Inspectores|Perfil Inspector</title>
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
.card {
box-shadow: 0 4px 8px 0 rgba(0,0,0,0.4);
transition: 0.3s;
margin:6%;
}

.card:hover {
box-shadow: 0 8px 16px 0 rgba(0,0,0,0.8);
}

.card-body {
padding:8px;
}
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
<img class="profile-user-img img-responsive img-circle" src="../dist/img/perfil.png"
alt="User profile picture">

<h3 class="profile-username text-center"><?php echo $datos[1]?></h3>

<p class="text-muted text-center"><?php echo $datos[3]?></p>

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



</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
<div class="col-md-9">
<div class="nav-tabs-custom">




<?php 


$sql2 =
"SELECT * FROM cursos 
INNER JOIN listacursos ON gstIdlsc = idmstr  
WHERE modalidad = 'E-LEARNNING' AND idinsp = $id";
 $query = mysqli_query($conexion,$sql2);
while($datos2 = mysqli_fetch_assoc($query)){?>

      <!-- Default box -->
      <div class="col-md-6 col-sm-0">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $datos2['gstTitlo']?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapsa">
              <i class="fa fa-minus"></i></button>
    
          </div>
        </div>
        <div class="box-body">
        <?php echo $datos2['gstObjtv']?>
        <br><br><button class="btn btn-info btn-sm" style="float: right;">APRENDER MÁS...</button>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <span style="color: gray;">FECHA DE VENCIMIENTO: 
        
             </span>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      </div>


<?php } ?>


</div>
<!--/row-->
</div>
<!--container-->


<!-- EVALUACIÓN CURSO -------------------------------------------------------------------------------------------->
<style type="text/css">
#modal-evalcurso span {
color: red;
font-size: 1.5em;
display: none;
}
</style>


<script type="text/javascript" src="../js/encuestadatos.js"></script>
<?php include('modal.php');?>
<!-- /.tab-pane -->
</div>

<!-- /.nav-tabs-custom -->

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
Todos los derechos Reservados AJ.

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
<script src="../js/lisCurso.js"></script>


</body>

</html>

<?php 

ini_set('date.timezone','America/Mexico_City');
$datos[0];?>


<script type="text/javascript">
var dataSet = [
<?php 
$query = "
SELECT *,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as final,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as inicial,cursos.fcurso AS fin  
FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND confirmar = 'CONFIRMAR' AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_curso'];

$fcurso = $data['inicial'];
$fechaf = $data['final'];
$fin = $data['fin'];

$actual= date("Y-m-d"); 
$hactual = date('H:i:s');

$f3 = strtotime($actual.''.$hactual);
$f2 = strtotime($fin.''.$data['hcurso']); 


if($f3<=$f2){
?>

//console.log('<?php echo $id_curso ?>');

["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
"<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

"<a type='button' title='Confirmar asistencia' onclick='confirmar(<?php echo $id_curso ?>)' class='btn btn-warning' data-toggle='modal' data-target='#modal-confirma'>CONFIRMAR</a>"

//"<a title='Evaluación' class='btn btn-danger' data-toggle='modal' data-target='#modal-asignar'>ASIGNAR</a>"

],
<?php } 
}?>
]

var tableGenerarReporte = $('#data-table-confirmar').DataTable({
"language": {
"searchPlaceholder": "Buscar datos...",
"url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
},
data: dataSet,
columns: [{
title: "CURSO"
},
{
title: "TIPO"
},
{
title: "INICIA"
},
{
title: "HORA"
},
{
title: "FINALIZA"
},
{
title: "ACCIÓN"
}
],
});


var dataSet = [
<?php 
$query = "
SELECT *,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as final,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as inicial,cursos.fcurso AS fin 
FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND proceso = 'PENDIENTE' AND cursos.estado = 0 || idinsp = $datos[0] AND confirmar = 'CONFIRMAR' AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_curso'];

$fcurso = $data['inicial'];
$fechaf = $data['final']; 
$fin = $data['fin'];

$actual= date("Y-m-d"); 
$hactual = date('H:i:s');

$f3 = strtotime($actual.''.$hactual);
$f2 = strtotime($fin.''.$data['hcurso']); 



if($f3<=$f2){

if($data['confirmar']=='CONFIRMAR'){
$valor="<span title='Pendiente por ' style='background-color: grey; font-size: 13px;' class='badge'>PENDIENTE</span>";

?>

["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo $fcurso?>",
"<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

"<?php echo $valor ?>", "<?php echo $data['confirmar']?>"

//aquies

],
<?php }else if($data['confirmar']=='CONFIRMADO'){ 
$valor="<span style='background-color:green; font-size: 13px;' class='badge' title='Ver detalles'>CONFIRMADO</span>";
?>
["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo $fcurso?>",
"<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

"<?php echo $valor ?>", "<?php echo $data['confirmar']?>"

//aquies

],

<?php }
}
}?>
]

var tableGenerarReporte = $('#data-table-programado').DataTable({
"language": {
"searchPlaceholder": "Buscar datos...",
"url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
},
data: dataSet,
columns: [{
title: "CURSO"
},
{
title: "TIPO"
},
{
title: "INICIA"
},
{
title: "HORA"
},
{
title: "FINALIZA"
},
{
title: "ASISTENCIA"
},
{
title: "CONFIR",
"visible": false
}
],
});

// CURSOS PROGRAMADOS
var dataSet = [
<?php 


$query = "SELECT *,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as final,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as inicial,evaluacion 
FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND proceso = 'FINALIZADO' AND cursos.estado = 0 AND confirmar='CONFIRMADO' ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 
$id_curso = $data['id_curso'];


$fcurso = $data['inicial'];
$fechaf = $data['final'];

$valor=$data['confirmar'];;  

if($data['evaluacion'] == ''){
$Evaluacion = "FALTA EVALUAR";

} else {
$Evaluacion = "EVALUADO";
}


$queri = "
SELECT * FROM reaccion WHERE id_curso = $id_curso AND estado = 0 ORDER BY id_curso DESC";
$resul = mysqli_query($conexion, $queri);


if($res = mysqli_fetch_array($resul)){
//if($res != 0){

$query = "SELECT * FROM constancias WHERE id_persona = $datos[0] AND id_codigocurso = '".$data['codigo']."' AND estado_cer = 0";
$const = mysqli_query($conexion, $query);
if($con = mysqli_fetch_array($const)){

if($con[3]=='SI' && $con[4]=='SI' && $con[5]=='SI' && $con[6]=='SI' && $con[7]=='SI' && $con[8]=='SI' && $con[9]=='SI'){
$accion = "<center><a title='Descarga Constancia' type='button' id='myCertificate' href='constancia.php?data={$con[0]}' onclick='desactivar();' class='datos btn btn-default'><i class='fa fa-file-pdf-o text-danger'></i></a></center><center><span class='badge' style='background-color: green;'>EVALUADO</span><center>";
}else{


$accion = "<center><b style='color:silver;' title='Pendiente' onclick='pdf()' ><i class='fa fa-file-pdf-o'></i></b></center><center><span class='badge' style='background-color: green;'>EVALUADO</span><center>";



}


?>

["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
"<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",
"<span class='badge' style='background-color: green; font-size: 14px;'><?php echo $valor?></span>",
<?php if($data['evaluacion']<80){?>

"<center><b style='color:red;' title='Pendiente' onclick='pdf()' ><span class='badge' style='background-color: #BB2303; font-size: 14px;'>NO ACREDITADO</span></b></center><center><center>"
<?php }else{?>

"<?php echo $accion?>"

<?php 
}
?>
],
<?php    }else{  


$accion = "<span class='badge' style='background-color: green;'>EVALUADO</span>";  ?>

["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
"<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",
"<span class='badge' style='background-color: green; font-size: 14px;'><?php echo $valor?></span>",
"<?php echo $accion?>"],

<?php } 



}else{ ?>

<?php if($data['confirmar'] == 'TRABAJO' || $data['confirmar'] == 'ENFERMEDAD' || $data['confirmar'] == 'OTROS'){ ?>




<?php }else{ ?>

["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
"<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

"<span class='badge' style='background-color: green;'><?php echo $valor?></span>",

"<a type='button' style='background-color:' title='Evaluación Curso' data-toggle='modal' data-target='#modal-evalcurso' onclick='cursoeval(<?php echo $id_curso ?>)' class='btn btn-primary '>EVALUAR</a>"

],


<?php } 

} 
}?>
];

var tableGenerarReporte = $('#data-table-completo').DataTable({
"language": {
"searchPlaceholder": "Buscar datos...",
"url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
},
data: dataSet,
columns: [{
title: "CURSO"
},
{
title: "TIPO"
},
{
title: "INICIA"
},
{
title: "HORA"
},
{
title: "FINALIZA"
},
{
title: "ASISTENCIA"
},
{
title: "ACCIÓN"
}
],
});

var dataSet = [
<?php 
$query = "
SELECT *,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as final,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as inicial 
FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_curso'];

$fcurso = $data['inicial'];
$fechaf = $data['final'];

if($data['confirmar']=='ENFERMEDAD'){
$valor ="<span style='background-color:#BB2303; font-size: 13px; cursor: pointer;' class='badge' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' onclick='confirmar($id_curso)'>DECLINADO</span>";


?>["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
"<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

// "<a type='button' title='Evaluación' onclick='asignacion(<?php //echo $id_curso ?>)' class='btn btn-danger' data-toggle='modal' data-target='#modal-asignar'>CANCELADO </a>"
// "<span class='badge' style='background-color: red;'>CANCELADO</span>"
"<?php echo $valor ?>"
],

<?php }else if($data['confirmar']=='TRABAJO'){ 

$valor ="<span style='background-color:#BB2303; font-size: 13px; cursor: pointer;' class='badge' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' onclick='confirmar($id_curso)'>DECLINADO</span>"; ?>

["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
"<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

"<?php echo $valor ?>"
],

<?php }else if($data['confirmar']=='OTROS'){
$valor ="<span style='background-color:#BB2303; font-size: 13px; cursor: pointer;' class='badge' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' onclick='confirmar($id_curso)'>DECLINADO</span>";?>

["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
"<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

"<?php echo $valor ?>"
],



<?php } 
}?>
];
var tableGenerarReporte = $('#data-table-cancelado').DataTable({
"language": {
"searchPlaceholder": "Buscar datos...",
"url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
},
data: dataSet,
columns: [{
title: "CURSO"
},
{
title: "TIPO"
},
{
title: "INICIA"
},
{
title: "HORA"
},
{
title: "FINALIZA"
},
{
title: "ACCIÓN"
}
],
});


var dataSet = [
<?php 
$query = "
SELECT *,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as final,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as inicial, cursos.fcurso AS fin,evaluacion
FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND confirmar = 'CONFIRMAR' AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_curso'];

$fcurso = $data['inicial'];
$fechaf = $data['final'];
$eva = $data['evaluacion'];

$fin = $data['fin'];

$valor = 'FECHA';

$actual = date("Y-m-d"); 
$hactual = date('H:i:s');
//strtotime($actual.''.$hcurso)

$f3 = strtotime($actual.''.$hactual);
$f2 = strtotime($fin.''.$data['hcurso']); 

if($f3>=$f2 && $data['proceso']=='PENDIENTE' || $f3>= $f2 && $data['proceso']=='FINALIZADO'){   ?>

["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo $fcurso?>",
"<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

"<span class='badge' style='background-color: red; font-size: 14px;'>VENCIDO</span> ", "<?php echo $data['confirmar']?>"
],
<?php }


// else if($data['confirmar']=='CONFIRMADO'){ $valor="<span style='background-color:green; font-size: 13px;' class='badge' title='Ver detalles'>CONFIRMADO</span>";?>

// ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo $fcurso?>","<?php echo $data['hcurso']?>", "<?php echo $fechaf?>","<?php echo $valor ?>", "<?php echo $data['confirmar']?>"],
<?php //} 

}?>
]

var tableGenerarReporte = $('#data-table-vencidos').DataTable({
"language": {
"searchPlaceholder": "Buscar datos...",
"url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
},
data: dataSet,
columns: [{
title: "CURSO"
},
{
title: "TIPO"
},
{
title: "INICIA"
},
{
title: "HORA"
},
{
title: "FINALIZA"
},
{
title: "ACCIÓN"
}
],
});


var counter = 0;

function desactivar() {
if (counter < 1) {
document.getElementById("myCertificate").enable = true;
counter++;
} else {
document.getElementById("myCertificate").disabled = true;

}
}
</script>