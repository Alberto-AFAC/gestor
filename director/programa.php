<!DOCTYPE html><?php 

session_start();

include ("../conexion/conexion.php");

$sql = "SELECT gstIdlsc, gstTitlo,gstTipo FROM listacursos WHERE estado = 0";
$curso = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'INSTRUCTOR' AND estado = 0 OR  gstCargo = 'COORDINADOR' AND estado = 0 ";
$instructor  = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'COORDINADOR' AND estado = 0 ";
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
  <link rel="stylesheet" type="text/css" href="../dist/css/contra.css">
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
<div class="col-sm-12">
<label class="label2">SELECCIONE CURSO</label>
<div id="selcurso"></div>                            
</div>
</div>
<!-- <div id="partici"></div>  -->

<div class="form-group">
<div class="col-sm-4">
<label class="label2">FECHA INICIO <span class="fa fa-lightbulb-o" style="display: none;color:red;" id="av"></label>
<input type="date" class="form-control inputalta" id="fcurso" name="fcurso">
</div>

<div class="col-sm-4">
<label class="label2">HORA</label>
<input type="time" class="form-control inputalta" id="hcurso" name="hcurso">
</div>


<div class="col-sm-4">
<label class="label2">FECHA CONCLUSIÓN <span class="fa fa-lightbulb-o" style="display: none;color:red;" id="so"></label>
<input type="date" class="form-control inputalta" id="fechaf" name="fechaf">
</div>
</div>

<div class="form-group">

    
    <div class="col-sm-4">
    <label class="label2">COORDINADOR</label>
      <select class="form-control inputalta" id="idcord" name="idcord" style="width: 100%;">
          <option value="0">SELECCIONE COORDINADOR </option> 
          <?php while($cordinadors = mysqli_fetch_row($cordinador)):?>
          <option value="<?php echo $cordinadors[0]?>"><?php echo $cordinadors[1].' '.$cordinadors[2]?></option>
          
          <?php endwhile; ?>
      </select>
    </div>

    <?php //include('advanced.php');?>

    <div class="col-sm-4">
    <label class="label2">INSTRUCTOR</label>
      <select style="width: 100%" class="form-control inputalta" class="selectpicker" id="idinst" name="idinst[]" type="text" multiple="multiple" data-placeholder="SELECCIONE INSTRUCTOR" data-live-search="true">
          <?php while($instructors = mysqli_fetch_row($instructor)):?>
          <option value="<?php echo $instructors[0]?>"><?php echo $instructors[1].' '.$instructors[2]?></option>
          <?php endwhile; ?>
      </select>
    </div>

    <div class="col-sm-4">
    <label class="label2">SEDE DEL CURSO</label>
    <input type="text" onkeyup="mayus(this);" class="form-control inputalta" id="sede" name="sede">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-4">
      <label class="label2">MODALIDAD</label>
      <select type="text" class="form-control inputalta" id="modalidad" name="modalidad" onChange="modalidades()">
           <option value="0">ELEGIR UNA OPCIÓN</option>
           <option value="A DISTANCIA">A DISTANCIA</option>
           <option value="AUTOAPRENDIZAJE">AUTOAPRENDIZAJE</option>
           <option value="AUTOGESTIVO">AUTOGESTIVO</option>
           <option value="E-LEARNNING">E-LEARNNING</option>
           <option value="HIBRIDO">HIBRIDO</option>
           <option value="PRESENCIAL">PRESENCIAL</option>          
      </select>
    </div>

    <div id="dismod" style="display: none;">
    <div class="col-sm-4">
      <label class="label2">LINK DE ACCESO</label>
      <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-globe"></i>
                  </div>
            <input type="url" onkeyup="mayus(this);" class="form-control inputalta" id="link" name="link" placeholder="URL ">
      </div>
    </div>
    <div class="col-sm-4">
         <label class="label2">CONTRASEÑA DE ACCESO</label>
         <div class="input-group">
            <div class="input-group-addon">
                    <i class="fa fa-unlock-alt"></i>
            </div>
          <input type="password" class="form-control inputalta" id="contracceso" name="contracceso">
         </div>
    </div>
    <div class="col-sm-4"><br>
      <label class="label2">CLASS ROOM</label>
      <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-globe"></i>
                  </div>
            <input type="url" onkeyup="mayus(this);" class="form-control inputalta" id="classroom" name="classroom" placeholder="URL ">
      </div> 
</div>

    </div>
            
      <div id="disocl" style="display: none;" class="form-group">
      <input type="hidden" name="link" id="link">
      <input type="hidden" name="contracceso" id="contracceso">  
      <input type="hidden" name="classroom" id="classroom">
      </div> 

</div>


<div class="form-group">
<div class="col-sm-4">
<label class="label2">PARTICIPANTES DEL CURSO</label>

</div>                     
</div>  

<div id="tabcurso"></div> 


<br>


<div class="form-group"><br>
<div class="col-sm-offset-0 col-sm-5">
<button type="button" id="buttonpro" style="font-size:16px" class="btn btn-info altaboton" onclick="proCurso();">PROGRAMAR</button>
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

<b><p class="alert alert-info text-center padding aviso" id="fechasA">Fecha conclusión es menor a fecha inicio</p></b>
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
    <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Civil</a>.</strong> Todos los derechos Reservados DDE
.
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
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
  var accesopers = document.getElementById('idact').value; // SE RASTREA EL NUMERO DE EMPLEADO
    //alert(idpersona1);
    $.ajax({
            url: '../php/accesos-list.php',
            type: 'POST'
        }).done(function(resp) {    
            obj = JSON.parse(resp);
            var res = obj.data;

            //AQUI03
            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="estudio" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>NOMBRE INSTITUCIÓN</th><th><i></i>GRADO</th><th><i></i>PERIODO</th><th><i></i>DOCUMENTACIÓN</th><th><i></i>FECHA</th></tr></thead><tbody>';
            var n = 0;
            for (H = 0; H < res.length; H++) { //RASTREAR EL ID DE LA PERSONA
                //alert(obj.data[H].id_usu);
                if (obj.data[H].id_usu == accesopers && obj.data[H].cambio == '0' ) {
                    $('#modal-obligatorio').modal('show'); 
                    $("#usuarioobl").val(obj.data[H].gstNombr +" "+obj.data[H].gstApell  );
                }else if (obj.data[H].id_usu == accesopers && obj.data[H].cambio == '1' ) {
                    $('#modal-obligatorio').modal('hide');  
                }

        }
    })
    //FIN DE ACTUALIZACION
$(document).ready(function(){
//$('#id_mstr').select2();
$('#idinst').select2();
$("#idcord").select2();
 $('#selcurso').load('select/buscateg.php');
 $('#tabcurso').load('select/tablacateg.php');
 //$('#partici').load('select/tablaoblig.php')
}); 
</script>
<script src="../js/select2.js"></script> 

<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; 
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("fcurso").setAttribute("min", today);
//Second date
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; 
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("fechaf").setAttribute("min", today);
</script>
<script src="../js/global.js"></script>
