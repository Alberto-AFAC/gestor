<!DOCTYPE html><?php 

session_start();

include ("../conexion/conexion.php");

$sql = "SELECT gstIdlsc, gstTitlo,gstTipo FROM listacursos WHERE estado = 0";
$curso = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'INSTRUCTOR' AND estado = 0";
$instructor  = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'COORDINADOR ' AND estado = 0";
$cordinador  = mysqli_query($conexion,$sql);


$sql = "SELECT gstIdper,gstNombr,gstApell,gstCargo FROM personal WHERE gstCargo != 'INSTRUCTOR' AND estado = 0 || estado = 0 ";
$inspector = mysqli_query($conexion,$sql);

$sqlList = "SELECT * FROM listacursos WHERE estado = 0 ORDER BY gstIdlsc desc";
$cursos = mysqli_query($conexion,$sqlList);

$sqlEspecialidad = "SELECT * FROM categorias WHERE estado = 0 ";
$especialidad = mysqli_query($conexion,$sqlEspecialidad);

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
    <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->
    <!-- <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" /> -->

    <style>
    /* datatables */
    td.details-control {
        background: url('../dist/img/add.png') no-repeat center center;
        cursor: pointer;
    }

    tr.shown td.details-control {
        background: url('../dist/img/remove.png') no-repeat center center;
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
                    <!-- ESPECIALIDAD OJT -->
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs" style="font-size: 14px;">
                                <li class="active"><a href="#activity" data-toggle="tab">ESPECIALIDAD OJT</a></li>
                                <li><a href="#puesto" data-toggle="tab">CATALOGO OJT</a></li>
                                <!-- <li><a href="#estudios" data-toggle="tab">TAREAS ASIGNADAS</a></li> -->
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
                                                        <!-- <H4><i class=""></i>
<label> TAREA PRINCIPAL </label>

</H4> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <!-- <label>ESPECIALIDAD OJT</label> -->
                                                    <input class="form-control" type="hidden" id="dateR" name="dateR" value="<?php echo date("Y-m-d");?>">
                                                    <select id="idcur" name="idcur" class="form-control"
                                                        placeholder="Seleccione..." disabled="">
                                                        <option value="0">Seleccione...</option>
                                                        <?php while($data = mysqli_fetch_row($especialidad)):?>
                                                        <option value="<?php echo $data[0]?>">
                                                            <?php echo $data[1]?> -
                                                            <?php echo $data[2]?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>

                                            </div>


                                            <div class="form-group" id="agregarTarea" style="display: none;">
                                                <div id="ojt-principal" class="col-sm-12">
                                                    <div id="tareas"></div>


                                                    <div class="form-group" id="otra"><br>
                                                        <div class="col-sm-offset-0 col-sm-2">
                                                            <button type="button"
                                                                title="Dar click para guardar los cambios"
                                                                style="background-color:#052E64; border-radius:10px;"
                                                                class="btn btn-block btn-primary"
                                                                onclick="agregarTarea();">
                                                                AGREGAR OTRA TAREA</button>
                                                        </div>
                                                        <div class="col-sm-offset-0 col-sm-2">

                                                            <button type="button" id=""
                                                                title="Dar click para guardar los cambios"
                                                                style="background-color:#052E64; border-radius:10px;"
                                                                class="btn btn-block btn-primary"
                                                                onclick="window.location.href='tareas.php?#puesto'">
                                                                SALIR</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="form-group" id="formulario">
                                                <div id="ojt-principal" class="col-sm-3">
                                                    <input type="hidden" name="idsubt" id="idsubt">
                                                    <!-- <label><a id="agrega-ojt-principal">OJT PRINCIPAL N° 1</a></label> -->
                                                    <label>OJT PRINCIPAL N° 1</label>
                                                    <input type="text" style="text-transform:uppercase;"
                                                        class="form-control" id="titulo1" placeholder="Escribe OJT..."
                                                        name="ojt_principal[]" disabled=""><br>
                                                </div>

                                                <div id="sub1" class="col-sm-3">
                                                    <label>SUB 1</label>
                                                    <div>
                                                        <input class="form-control" placeholder="INGRESAR..."
                                                            type="text" name="tarea1[]" id="oculsub1" disabled="">
                                                    </div><span class="badge" id="add_sub1"
                                                        style="cursor: pointer; background-color: #3C8DBC;"><i
                                                            class="fa fa-plus-circle" aria-hidden="true"></i>
                                                        AÑADIR</span>
                                                </div>


                                                <div id="sub2" class="col-sm-3">
                                                    <label>SUB 2</label>
                                                    <div>
                                                        <input class="form-control" placeholder="INGRESAR..."
                                                            type="text" name="tarea2[]" id="oculsub2" disabled="">
                                                    </div><span class="badge" id="add_sub2"
                                                        style="cursor: pointer; background-color: #3C8DBC;"><i
                                                            class="fa fa-plus-circle" aria-hidden="true"></i>
                                                        AÑADIR</span>
                                                </div>

                                                <div id="sub3" class="col-sm-3">
                                                    <label>SUB 3</label>
                                                    <div>
                                                        <input class="form-control" placeholder="INGRESAR..."
                                                            type="text" name="tarea3[]" id="oculsub3" disabled="">
                                                    </div><span class="badge" id="add_sub3"
                                                        style="cursor: pointer;background-color: #3C8DBC;"><i
                                                            class="fa fa-plus-circle" aria-hidden="true"></i>
                                                        AÑADIR</span>
                                                </div>
                                            </div>





                                            <div class="form-group" id="butons1"><br>
                                                <div class="col-sm-offset-0 col-sm-2">

                                                    <button type="button" id="button1"
                                                        title="Dar click para guardar los cambios"
                                                        style="background-color:#052E64; border-radius:10px;"
                                                        class="btn btn-block btn-primary" onclick="agrTarea();">
                                                        GUARDAR</button>

                                                </div>
                                                <b>
                                                    <p class="alert alert-danger text-center padding error"
                                                        id="danger1">
                                                        Error al agregar tarea </p>
                                                </b>
                                                <b>
                                                    <p class="alert alert-success text-center padding exito"
                                                        id="succe1">
                                                        ¡Se agregaron los datos con éxito!</p>
                                                </b>

                                                <b>
                                                    <p class="alert alert-warning text-center padding aviso"
                                                        id="vacio1">
                                                        Es necesario agregar los datos que se solicitan </p>
                                                </b>
                                            </div>
                                        </form>


                                        <form style="display: none;" class="form-horizontal" action="" method="POST">
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <H4><i class=""></i>
                                                            <label> SUB-TAREA</label>
                                                        </H4>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="idsubt2" id="idsubt2">
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <label>TÍTULO</label>
                                                    <input type="text" style="text-transform:uppercase;"
                                                        class="form-control" id="titulo2" name="titulo2" disabled="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label>DESCRIPCIÓN </label>
                                                    <textarea type="text" style="text-transform:uppercase;"
                                                        class="form-control" id="descrip2" name="descrip2" rows="4"
                                                        disabled=""></textarea><br>

                                                </div>

                                            </div>

                                            <div class="form-group" id="butons2"><br>
                                                <div class="col-sm-offset-0 col-sm-2">

                                                    <button type="button" id="button2"
                                                        title="Dar click para guardar los cambios"
                                                        style="background-color:#052E64; border-radius:10px;"
                                                        class="btn btn-block btn-primary" onclick="agrTarea2();">
                                                        AGREGAR</button>

                                                </div>
                                                <b>
                                                    <p class="alert alert-danger text-center padding error"
                                                        id="danger2">Error al agregar tarea </p>
                                                </b>
                                                <b>
                                                    <p class="alert alert-success text-center padding exito"
                                                        id="succe2">¡Se agregaron los datos con éxito!</p>
                                                </b>

                                                <b>
                                                    <p class="alert alert-warning text-center padding aviso"
                                                        id="vacio2">Es necesario agregar los datos que se solicitan </p>
                                                </b>
                                            </div>
                                        </form>





                                        <form id="form3" style="display: none;" class="form-horizontal" action=""
                                            method="POST">
                                            <!--               <input type="hidden" name="gstIdper" id="gstIdper"> -->
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <H4><i class=""></i>
                                                            <label> SUB SUB-TAREA </label>
                                                        </H4>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="idsubt3" id="idsubt3">
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <label>TÍTULO</label>
                                                    <input type="text" style="text-transform:uppercase;"
                                                        class="form-control" id="titulo3" name="titulo3" disabled="">
                                                </div>
                                                <!-- <div class="col-sm-4">
<label>FECHA DE ALTA</label>
<input type="date" style="text-transform:uppercase;"
class="form-control" id="fechaA3" name="fechaA3" disabled="">
</div> -->
                                                <!-- <div class="col-sm-4">
<label>FECHA LIMITE</label>
<input type="date" style="text-transform:uppercase;"
class="form-control" id="fechaT3" name="fechaT3" disabled="">
</div> -->
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label>DESCRIPCIÓN </label>
                                                    <textarea type="text" style="text-transform:uppercase;"
                                                        class="form-control" id="descrip3" name="descrip3" rows="4"
                                                        disabled=""></textarea><br>



                                                </div>

                                            </div>

                                            <div class="form-group" id="butons3"><br>
                                                <div class="col-sm-offset-0 col-sm-2">

                                                    <button type="button" id="button3"
                                                        title="Dar click para guardar los cambios"
                                                        style="background-color:#052E64; border-radius:10px;"
                                                        class="btn btn-block btn-primary" onclick="agrTarea3();">
                                                        AGREGAR</button>

                                                </div>
                                                <b>
                                                    <p class="alert alert-danger text-center padding error"
                                                        id="danger3">Error al agregar tarea </p>
                                                </b>
                                                <b>
                                                    <p class="alert alert-success text-center padding exito"
                                                        id="succe3">¡Se agregaron los datos con éxito!</p>
                                                </b>

                                                <b>
                                                    <p class="alert alert-warning text-center padding aviso"
                                                        id="vacio3">Es necesario agregar los datos que se solicitan </p>
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
                                            <div class="col-sm-3">
                                                <div class="input-group">
                                                    <!-- <H4><i class="fa   fa-suitcase"></i>
<label> ------- </label>

</H4> -->



                                                </div>

                                            </div>

                                        </div>
                                        <table id="add-task" class="table display table-striped table-bordered"
                                            style="width:100%">

                                        </table>
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
<button type="button" id="button"
title="Dar click para guardar los cambios"
style="background-color:#052E64; border-radius:10px;"
class="btn btn-block btn-primary"
onclick="actPuesto();">ACTUALIZAR</button>
</div>
<b>
<p class="alert alert-danger text-center padding error" id="danger1">
Error al actualizar
datos </p>
</b>
<b>
<p class="alert alert-success text-center padding exito" id="succe1">¡Se
actualizaron los
datos con éxito!</p>
</b>

<b>
<p class="alert alert-warning text-center padding aviso" id="empty1">Es
necesario agregar
los datos que se solicitan </p>
</b>
</div>
</form>
</div>

</div>
<!-------------TODAS LAS TAREAS------------->
<div id="todasTareas" style="display: none;" tabindex="-1" role="dialog" aria-labelledby="todasTareas" aria-hidden="true">





<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>


<div class="modal-body">

<div id="add_ojts1"></div>
<div id="add_ojts2"></div>





<!-- <div class="dataTables_wrapper form-inline dt-bootstrap">
<div class="row">
<div class="col-md-6"> 
<div class="box"> 
<div class="box-header with-border"> 
<h3 class="box-title">OJT PRINCIPAL</h3>
</div>
<div class="box-body">
<table class="table table-bordered"><tr><th style="width: 10px">#</th><th>ojt_principal</th><th>detalles</th></tr>
<tr><td>'+n+'</td><td>'+obj.data[H].ojt_subtarea+'</td><td>3</td></tr><tr></tr>
</table>

</div>
</div>

</div>

</div>
</div> -->

<!----------------------------------------------------------------------------->



</div>

</div>




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
<!-- MODAL UPLOAD DATAS -->
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal"
aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">
<div id="titulo"></div>
</h4>
</div>
<input type="hidden" name="idRtarea" id="idRtarea">
<div id="rspnsbls"></div>

<div class="modal-footer">
<div class="form-group">
<div class="col-sm-4">
<button type="button" class="btn btn-primary" onclick="notificacion()">EVALUAR</button>
<button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>

</div>
</div>
<b>
<p class="alert alert-success text-center padding exito" id="succe">¡Su evaluación se
realizó con éxito !</p>
</b>
<b>
<p class="alert alert-warning text-center padding aviso" id="aviso">Es necesario llenar
campo</p>
</b>
</div>




</div>
</div>
</div>





<div class="modal fade" id="detalleSub1" tabindex="-1" role="dialog" aria-labelledby="detalleSub1"
aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">SUB 1</h4>
</div>
<div class="modal-body">

<div id="ojt"></div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
<button type="button" class="btn btn-primary">GUARDAR</button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="detalleSub2" tabindex="-1" role="dialog" aria-labelledby="detalleSub2"
aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">SUB 2</h4>
</div>
<div class="modal-body">

<div id="tablasub2"></div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
<button type="button" class="btn btn-primary">GUARDAR</button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="detalleSub3" tabindex="-1" role="dialog" aria-labelledby="detalleSub3"
aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">SUB TAREAS</h4>
</div>
<div class="modal-body">

<div id="1tablasub"></div>
<div id="2tablasub"></div>
<div id="3tablasub"></div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
<button type="button" class="btn btn-primary">GUARDAR</button>
</div>
</div>
</div>
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
            <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Civil</a>.</strong>
            Todos los derechos Reservados DDE
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
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script> -->
    <!-- page script -->
</body>

</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function() {
    $('#idcur').select2();

});
</script>
<script src="../js/select2.js"></script>

<script type="text/javascript">
document.getElementById('titulo1').disabled = false;
document.getElementById('oculsub1').disabled = false;
document.getElementById('oculsub2').disabled = false;
document.getElementById('oculsub3').disabled = false;
// document.getElementById('descrip1').disabled = false;
document.getElementById('titulo2').disabled = false;
document.getElementById('descrip2').disabled = false;
document.getElementById('titulo3').disabled = false;
document.getElementById('descrip3').disabled = false;
document.getElementById('idcur').disabled = false;


let contador = 0;


function agrTarea() {


    //ID inspector
    idcur = document.getElementById('idcur').value;
    dateR = document.getElementById('dateR').value;
    titulo1 = document.getElementById('titulo1').value;
    idsubt = document.getElementById('idsubt').value;
    alert(dateR);
    // // descrip1 = document.getElementById('descrip1').value;

    // // fechaA = document.getElementById('fechaA').value;
    // // fechaT = document.getElementById('fechaT').value;

    // subtarea = document.getElementById('agrega_ojt_subtarea').value;

    var tareatre = new Array();
    /*Agrupamos todos los input con name=cbxEstudiante*/
    $('input[name="tarea3[]"]').each(function(element) {
        var item = {};
        item.tareatre = this.value;
        tareatre.push(item);
    });

    var tareados = new Array();
    /*Agrupamos todos los input con name=cbxEstudiante*/
    $('input[name="tarea2[]"]').each(function(element) {
        var item = {};
        item.tareados = this.value;
        tareados.push(item);
    });

    var tareauno = new Array();
    /*Agrupamos todos los input con name=cbxEstudiante*/
    $('input[name="tarea1[]"]').each(function(element) {
        var item = {};
        item.tareauno = this.value;
        tareauno.push(item);
    });


    var array = JSON.stringify(tareauno);
    var array2 = JSON.stringify(tareados);
    var array3 = JSON.stringify(tareatre);

    // alert(array3);

    datos = 'idcur=' + idcur + '&titulo1=' + titulo1 + '&dateR=' + dateR + '&idsubt=' + idsubt + '&array=' + array + '&array2=' + array2 +
        '&array3=' + array3 + '&opcion=tareAgr';
    //var gstFslda = document.getElementById('AgstFslda').value;


    if (titulo1 == '' || idcur == '') {
        Swal.fire({
            type: 'info',
            // title: 'AFAC INFORMA',
            text: 'LLENE CAMPOS VACÍOS',
            showConfirmButton: false,
            timer: 2900,
            customClass: 'swal-wide',
            showConfirmButton: false,
        });
        // $('#vacio1').toggle('toggle');
        // setTimeout(function() {
        //     $('#vacio1').toggle('toggle');
        // }, 2000);

        return;
    } else {
        $.ajax({
            url: '../php/regTarea.php',
            type: 'POST',
            data: datos
        }).done(function(respuesta) {

            // alert(respuesta);

            // if (respuesta != 0) {

            Swal.fire({
                type: 'success',
                // title: 'AFAC INFORMA',
                html: `<p>SE HA AGREGADO LA TAREA <b>${titulo1}</b> CORRECTAMENTE</p>`,
                showConfirmButton: false,
                timer: 3200,
                customClass: 'swal-wide',
                showConfirmButton: false,
            });

            //conprofesion(ActIdpro);
            // } else {

            // $("#idsubt2").val(respuesta);
            // $('#succe1').toggle('toggle');
            // setTimeout(function() {
            // $('#succe1').toggle('toggle');
            // }, 2000);

            $("#button2").show();
            $("#form2").show();
            $("#resp1").show();


            // document.getElementById('titulo1').disabled = true;
            // document.getElementById('oculsub1').disabled = true;
            // document.getElementById('oculsub2').disabled = true;
            // document.getElementById('oculsub3').disabled = true;
            // document.getElementById('idcur').disabled = true;
            $("#agregarTarea").show();
            $("#formulario").hide();
            $("#button1").show();
            $("#button1").hide();
            contador++;
            //alert('El contador ahora vale :' + contador);
            $("#tareas").html(contador + ' TAREA AGREGADA, DESEA AGREGAR LA SIGUIENTE TAREA');
            $("#otra").show();

            // document.getElementById("formulario").reset();

            // document.getElementById('descrip1').disabled = true;
            // document.getElementById('fechaA').disabled = true;
            // document.getElementById('fechaT').disabled = true;


            //}
        });
    }

}

function agregarTarea() {

    $("#formulario").show();
    $("#otra").hide();
    $("#button1").show();

}
// function agrTarea2() {
// idcur = document.getElementById('idcur').value;
// titulo1 = document.getElementById('titulo2').value;
// // descrip1 = document.getElementById('descrip2').value;
// idsubt = document.getElementById('idsubt2').value;
// // fechaA = document.getElementById('fechaA2').value;
// // fechaT = document.getElementById('fechaT2').value;
// datos = 'idcur=' + idcur + '&titulo1=' + titulo1 + '&idsubt=' + idsubt +
// '&opcion=tareAgr';
// //var gstFslda = document.getElementById('AgstFslda').value;

// if (titulo1 == '') {

// $('#vacio2').toggle('toggle');
// setTimeout(function() {
// $('#vacio2').toggle('toggle');
// }, 2000);

// return;
// } else {
// $.ajax({
// url: '../php/regTarea.php',
// type: 'POST',
// data: datos
// }).done(function(respuesta) {
// if (respuesta == 0) {

// $('#danger2').toggle('toggle');
// setTimeout(function() {
// $('#danger2').toggle('toggle');
// }, 2000);
// //conprofesion(ActIdpro);
// } else {
// $("#idsubt3").val(respuesta);
// $('#succe2').toggle('toggle');
// setTimeout(function() {
// $('#succe2').toggle('toggle');
// }, 2000);
// $("#button1").hide();
// $("#button2").hide();
// $("#button3").show();
// $("#form3").show();
// $("#resp1").hide();
// $("#resp2").show();
// document.getElementById('titulo2').disabled = true;
// document.getElementById('descrip2').disabled = true;
// // document.getElementById('fechaA2').disabled = true;
// // document.getElementById('fechaT2').disabled = true;
// }
// });
// }

// }


// //
// function agrTarea3() {
// idcur = document.getElementById('idcur').value;
// titulo1 = document.getElementById('titulo3').value;
// // descrip1 = document.getElementById('descrip3').value;
// idsubt = document.getElementById('idsubt3').value;
// // fechaA = document.getElementById('fechaA3').value;
// // fechaT = document.getElementById('fechaT3').value;
// subtarea = document.getElementById('ojt-subtarea').value;


// datos = 'idcur=' + idcur + '&titulo1=' + titulo1 + '&idsubt=' + idsubt +
// '&opcion=tareAgr';
// //var gstFslda = document.getElementById('AgstFslda').value;

// if (titulo1 == '') {

// $('#vacio3').toggle('toggle');
// setTimeout(function() {
// $('#vacio3').toggle('toggle');
// }, 2000);

// return;
// } else {
// $.ajax({
// url: '../php/regTarea.php',
// type: 'POST',
// data: datos
// }).done(function(respuesta) {
// //alert(respuesta);
// if (respuesta == 0) {
// $('#danger3').toggle('toggle');
// setTimeout(function() {
// $('#danger3').toggle('toggle');
// }, 2000);


// } else {


// $('#succe3').toggle('toggle');
// setTimeout(function() {
// $('#succe3').toggle('toggle');
// }, 2000);
// $("#button1").hide();
// $("#button2").hide();
// $("#button3").hide();
// $("#resp1").hide();
// $("#resp2").hide();
// $("#resp3").show();

// document.getElementById('titulo3').disabled = true;
// document.getElementById('descrip3').disabled = true;
// // document.getElementById('fechaA3').disabled = true;
// // document.getElementById('fechaT3').disabled = true;
// //conprofesion(ActIdpro);
// }
// });
// }

// }

function agrIva() {

    idinsp = document.getElementById('idinsp').value;

    datos = 'idinsp=' + idinsp + '&opcion=agrIVA';

    if (idinsp == '') {

        $('#vacio0').toggle('toggle');
        setTimeout(function() {
            $('#vacio0').toggle('toggle');
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
                $('#danger0').toggle('toggle');
                setTimeout(function() {
                    $('#danger0').toggle('toggle');
                }, 2000);


            } else {


                $('#succe0').toggle('toggle');
                setTimeout(function() {
                    $('#succe0').toggle('toggle');
                }, 2000);

            }
        });
    }

}
// $(document).ready(function() {


//     // INICIALIZE DATATABLES
//     $('#add-task').DataTable({
//         "language": {
//             "searchPlaceholder": "Buscar datos...",
//             "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
//         },
//         "ajax": '../php/data-task.php'
//     });
// });


$(document).ready(function() {

var dataSet = [
<?php 
$query = "SELECT *, count(id_spc) AS ttl FROM ojts
INNER JOIN categorias ON categorias.gstIdcat = ojts.id_spc
WHERE ojts.estado = 0 GROUP BY id_spc";
$resultado = mysqli_query($conexion, $query);
$contador = 0;
while($data = mysqli_fetch_assoc($resultado)){
$id = $data["id_ojt"];
$idspc = $data['id_spc'];
$contador++;

// if($data["ojt_subtarea"]==''){

// }

// $query2 = "SELECT * FROM ojts INNER JOIN categorias ON categorias.gstIdcat = ojts.id_spc
// WHERE ojts.estado = 0 AND id_spc = $idspc"; 
// $resultados = mysqli_query($conexion, $query2);
// "<?php 
// $ttl = 1;
// while($datas = mysqli_fetch_assoc($resultados)){
// $ttls = $ttl++;    
// echo "<a href='#' data-toggle='modal' data-target='#detalleSub3' onclick='idsub3($id)'>TAREA $ttls | </a>";
// }

// 
?>

["<?php echo  $contador;?>", "<?php echo  $data['gstCatgr']?>","<?php echo  "<a href='#' data-target='#todasTareas' onclick='todasT($idspc)'>TAREAS</a>"?>",
"<?php 


// $queri = "SELECT * FROM ojts_subs WHERE idtarea = $id";
// $resultados = mysqli_query($conexion, $queri);
// while($datas = mysqli_fetch_assoc($resultados)){

// if($datas['ojt_subtarea']!='' && $datas['numsubt'] == 1){
// echo "<a href='#' data-toggle='modal' data-target='#detalleSub1' onclick='idsub1($id)' >SUB 1</a>";
// }else if($datas['ojt_subtarea']!='' && $datas['numsubt'] == 2){
// echo " || <a href='#' data-toggle='modal' data-target='#detalleSub2' onclick='idsub2($id)' >SUB 2</a>";
// }else if($datas['ojt_subtarea']!='' && $datas['numsubt'] == 3){
// echo "<a href='#' data-toggle='modal' data-target='#detalleSub3' onclick='idsub3($id)' >SUB 3</a>";
// }

// |  | 


//}

?>",
],

<?php  } ?>

];

var tableOJT = $('#add-task').DataTable({
"language": {
"searchPlaceholder": "Buscar datos...",
"url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
},
// "order": [
//     [0, 'desc']
// ],
orderCellsTop: true,
fixedHeader: true,
data: dataSet,
columns: [{
title: "#"
},
{
title: "ESPECIALIDAD OJT"
},
{
title: "OJTS PRINCIPALES"
}
]
});

});


function idsub1(id1) {

    $.ajax({
        url: '../php/data-task.php',
        type: 'POST'
    }).done(function(resp) {

        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        html =
            '<table class="table table-bordered"><tr><th>#</th><th>SUB 1</th><th>ACCIONES</th>';


        for (i = 0; i < res.length; i++) {
            x++;
            if (obj.data[i].idtarea == id1) {
                html += "<tr><td>" + '1.' + x + "</td><td>" + obj.data[i].ojt_subtarea +
                    "</td><td>Editar</td></tr>";
            }
        }
        html += '</table>';
        $("#ojt").html(html);
    })


}

function idsub2(id2) {
    $.ajax({
        url: '../php/sub2.php',
        type: 'POST'
    }).done(function(resp) {

        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        html =
            '<table class="table table-bordered"><tr><th>#</th><th>SUB 2</th><th>ACCIONES</th>';


        for (i = 0; i < res.length; i++) {
            x++;
            if (obj.data[i].idtarea == id2) {
                html += "<tr><td>" + '2.' + x + "</td><td>" + obj.data[i].ojt_subtarea +
                    "</td><td>Editar</td></tr>";
            }
        }
        html += '</table>';
        $("#tablasub2").html(html);
    })


}

function idsub3(id3) {
    $.ajax({
        url: '../php/sub3.php',
        type: 'POST'
    }).done(function(resp) {

        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        html =
            '<table class="table table-bordered"><tr><th>#</th><th>SUB 3</th><th>ACCIONES</th>';


        for (i = 0; i < res.length; i++) {
            x++;
            if (obj.data[i].idtarea == id3) {
                html += "<tr><td>" + '3.' + x + "</td><td>" + obj.data[i].ojt_subtarea +
                    "</td><td>Editar</td></tr>";
            }
        }
        html += '</table>';
        $("#tablasub3").html(html);
    })


}

// CONSULTA PARA VERIFICAR CUANTOS PARTICIPANTES SE NECESITAN
function participantes(id) {
    $.ajax({
        url: '',
        type: 'POST'
    }).done(function(resp) {

        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        html =
            '<table class="table table-bordered"><tr><th style="width: 10px">#</th><th>#</th>';


        for (i = 0; i < res.length; i++) {
            x++;
            if (obj.data[i].idcurso == id) {
                html += "<tr><td>" + x + "</td><td style='width: 75%;'>" + obj.data[i].id + "</td></tr>";
            }
        }
        html += '</table>';
        $("#participantes").html(html);
    })
}

function responsables(idResp) {

    $("#basicModal #idRtarea").val(idResp);

    $.ajax({
        url: "../php/conRespon.php",
        type: "POST",
        data: 'idResp=' + idResp
    }).done(function(resp) {

        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;

        $("#titulo").html(obj.data[0].gstTitlo);

        html =
            '<div style="padding-top: 5px;" class="col-md-12"><div class="nav-tabs-custom"><form class="form-horizontal" action="" method="POST"><table style="width: 100%;" id="checkrh" class="table table-striped table-hover center" ><thead><tr><th scope="col">#</th> <th scope="col">NOMBRE </th><th>APROBÓ</th> </tr></thead><tbody>';

        for (p = 0; p < res.length; p++) {

            nombres = obj.data[p].gstNombr + ' ' + obj.data[p].gstApell;
            // dato = obj.data[D].idi + '*' + obj.data[D].idperdoc + '*' + obj.data[D].documento;
            x++;

            if (obj.data[p].entrega == 1 && obj.data[p].evalua == 0) {
                html += '<tr><input type="hidden" name="idtarea" id="idtarea" value="' + obj.data[p]
                    .id_tare +
                    '"><td>' + x + '</td> <td>' + nombres +
                    '</td><td><b>SI</b> <input type="checkbox" style="width:17px; height:17px;" name="evalsi" id="evalsi" value=""> <b>NO</b> <input type="checkbox" style="width:17px; height:17px;" name="evalno" id="evalno" value=""></td></tr>';
            } else if (obj.data[p].entrega == 0 && obj.data[p].evalua == 0) {
                html += '<tr><td>' + x + '</td> <td>' + nombres +
                    '</td><td><span style="border-radius:10px; background:grey;color:white;padding:5px;width: 102px; display:block;">POR ENTREGAR</span></td></tr>';
            } else {
                if (obj.data[p].evalua == 'SI') {
                    html += '<tr><td>' + x + '</td> <td>' + nombres +
                        '</td><td><span class="label label-success" style="font-size:1em;width: 100px; display:block;">' +
                        obj.data[p].evalua + '</span></td></tr>';
                } else {
                    html += '<tr><td>' + x + '</td> <td>' + nombres +
                        '</td><td><span class="label label-danger" style="font-size:1em;width: 100px; display:block;">' +
                        obj.data[p].evalua + '</span></td></tr>';
                }
            }
            //  $("#titulo").html(obj.data[2].gstTitlo); 
        }

        html += '</tbody></table></form></div></div>';

        $("#rspnsbls").html(html);


    })

    //<a type="button" title="Actualizar documento" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" onclick="ctualDoc(' + "'" + dato + "'" + ');" data-target="#modal-docactualizar"><i class="fa fa-refresh text-info"></i></a><a href="#" onclick="borrarOjt(' + "'" + dato + "'" + ')" type="button" style="margin-left:2px" title="Borrar documento"  class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminarojt"><i class="fa fa-trash-o text-danger"></i></a>
}

function notificacion() {

    idtarea = document.getElementById('idRtarea').value;

    var id_tarea = new Array();
    /*Agrupamos todos los input con name=cbxEstudiante*/
    $('input[name="idtarea"]').each(function(element) {
        var item = {};
        item.id_tarea = this.value;
        item.idtarea = this.checked;
        id_tarea.push(item);
    });

    var evalsi = new Array();
    /*Agrupamos todos los input con name=cbxEstudiante*/
    $('input[name="evalsi"]').each(function(element) {
        var item = {};
        item.evalsi = this.checked;
        evalsi.push(item);
    });

    var evalno = new Array();
    /*Agrupamos todos los input con name=cbxEstudiante*/
    $('input[name="evalno"]').each(function(element) {
        var item = {};
        item.evalno = this.checked;
        evalno.push(item);
    });
    /*Creamos un objeto para enviarlo al servidor*/
    var array1 = JSON.stringify(id_tarea);
    var array2 = JSON.stringify(evalsi);
    var array3 = JSON.stringify(evalno);

    datos = 'array1=' + array1 + '&array2=' + array2 + '&array3=' + array3 + '&opcion=ntfccn';

    $.ajax({
        url: '../php/regTarea.php',
        type: 'POST',
        data: datos
    }).done(function(respuesta) {
        if (respuesta == '2') {
            $('#aviso').toggle('toggle');
            setTimeout(function() {
                $('#aviso').toggle('toggle');
            }, 2000);
        } else {
            responsables(idRtarea);
            $('#succe').toggle('toggle');
            setTimeout(function() {
                $('#succe').toggle('toggle');
            }, 2000);
        }

    });


}

var campos_max2 = 10;
var vojt2 = 0;
$('#add_sub2').click(function(e) {
    e.preventDefault(); //chups
    if (vojt2 < campos_max2) {
        $('#sub2').append('<div>\
<br><input style="text-transform: uppercase;" placeholder="INGRESA SUB 2" class="form-control" type="text" name="tarea2[]">\
<a href="#" style="background-color: gray;" class="badge remover_campo"><i class="fa fa-minus-circle" aria-hidden="true"></i> REMOVER</a>\
</div>');
        vojt2++;
    }
});
// Remover o div anterior
$('#sub2').on("click", ".remover_campo", function(e) {
    e.preventDefault();
    $(this).parent('div').remove();
    vojt2--;
});



var campos_max = 20;
var vojt = 0;
$('#add_sub1').click(function(e) {
    e.preventDefault(); //chups
    if (vojt < campos_max) {
        $('#sub1').append('<div>\
<br><input style="text-transform: uppercase;" placeholder="INGRESA SUB 1" class="form-control" type="text" name="tarea1[]" id="oculsub1" >\
<a href="#" style="background-color: gray;" class="badge remover_campo"><i class="fa fa-minus-circle" aria-hidden="true"></i> REMOVER</a>\
</div>');
        vojt++;
    }
});
// Remover o div anterior
$('#sub1').on("click", ".remover_campo", function(e) {
    e.preventDefault();
    $(this).parent('div').remove();
    vojt--;
});



var campos_max3 = 10;
var vojt3 = 0;
$('#add_sub3').click(function(e) {
    e.preventDefault(); //chups
    if (vojt3 < campos_max3) {
        $('#sub3').append('<div>\
<br><input style="text-transform: uppercase;" placeholder="INGRESA SUB 3" class="form-control" type="text" name="tarea3[]">\
<a href="#" style="background-color: gray;" class="badge remover_campo"><i class="fa fa-minus-circle" aria-hidden="true"></i> REMOVER</a>\
</div>');
        vojt3++;
    }
});
// Remover o div anterior
$('#sub3').on("click", ".remover_campo", function(e) {
    e.preventDefault();
    $(this).parent('div').remove();
    vojt3--;
});

// JQUERY PARA LAS ACTIVIDADES DE LAS SUBTAREAS

//TODAS LAS TAREAS

function todasT(t){



    $("#todasTareas").show();
    $("#puesto").hide();

        $.ajax({
        url: '../php/ojt_tareas.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;

        //AQUI03

        var n = 0;

           // html += '<div class="col-sm-6"><div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-md-12"> <div class="box"> <div class="box-header with-border"><h3 class="box-title">OJT</h3></div><div class="box-body"><table class="table table-bordered"><tr><th style="width: 10px">#</th><th>ojt_principal</th><th>detalles</th></tr>';      
  html = '<div style="padding-top: 5px;" class="col-md-12"><div class="nav-tabs-custom"><form id="Dtall" class="form-horizontal" action="" method="POST"><table class="table table-striped table-hover center" ><thead><tr><th scope="col" style="width: 10%;">ID</th><th scope="col" style="width:100px;">TAREAS</th><th scope="col" style="width:150px;">SUB TAREAS</th> </tr></thead><tbody>';


        for (H = 0; H < res.length; H++) {

            if (obj.data[H].id_spc == t) {

             var idojt = obj.data[H].id_ojt;
                n++;


        html += '<tr><th scope="row">' + n + ')</th><td>' +obj.data[H].ojt_principal+ '</td><td> <a href="#" data-toggle="modal" data-target="#detalleSub3" onclick="idsubTa('+obj.data[H].id_ojt+')">SUB TAREAS</a></td></tr>'; 

            } 

        }

   html += '</tbody></table></form></div></div>';

        $("#add_ojts1").html(html);
 
    })
}

function idsubTa(idsub) {

    $.ajax({
        url: '../php/data-task.php',
        type: 'POST'
    }).done(function(resp) {

        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        var y = 0;
        var w = 0;
        html =
            '<table class="table table-bordered"><tr><th>#</th><th>SUB 1</th><th>ACCIONES</th>';


        for (i = 0; i < res.length; i++) {
            
            if (obj.data[i].idtarea == idsub) {
             
                if(obj.data[i].numsubt==1){
                x++;
                html += "<tr><td>" + obj.data[i].numsubt+'. ' + x + "</td><td>" + obj.data[i].ojt_subtarea +
                    "</td><td>Editar</td></tr>";
                }

            }
        }
        html += '</table>';
        $("#1tablasub").html(html);



        html ='<table class="table table-bordered"><tr><th>#</th><th>SUB 2</th><th>ACCIONES</th>';


        for (i = 0; i < res.length; i++) {
            
            if (obj.data[i].idtarea == idsub) {
             
                if(obj.data[i].numsubt==2){
                y++;
                html += "<tr><td>" + obj.data[i].numsubt+'. ' + y + "</td><td>" + obj.data[i].ojt_subtarea +
                    "</td><td>Editar</td></tr>";
                }

            }
        }
        html += '</table>';
        $("#2tablasub").html(html);






       html ='<table class="table table-bordered"><tr><th>#</th><th>SUB 3</th><th>ACCIONES</th>';


        for (i = 0; i < res.length; i++) {
            
            if (obj.data[i].idtarea == idsub) {
             
               if(obj.data[i].numsubt==3){
                w++;
                html += "<tr><td>" + obj.data[i].numsubt+'. ' + w + "</td><td>" + obj.data[i].ojt_subtarea +
                    "</td><td>Editar</td></tr>";
                }

            }
        }
        html += '</table>';
        $("#3tablasub").html(html);




    })


}

</script>

