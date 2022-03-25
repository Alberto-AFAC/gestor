<?php 
include ("../conexion/conexion.php");

session_start();

$sql = "SELECT id_ojt, tarea, subtarea FROM ojt WHERE estado = 0";
$tareas = mysqli_query($conexion,$sql);

$sql = "SELECT id_ojt, subtarea FROM ojt WHERE estado = 0";
$subtarea = mysqli_query($conexion,$sql);

$sql = "SELECT id_ojt, subsubtarea FROM ojt WHERE estado = 0";
$subsubtarea = mysqli_query($conexion,$sql);

$sql = "SELECT id_pers, gstNombr,gstApell FROM instcoord_ojt INNER JOIN personal on instcoord_ojt.id_pers=personal.gstIdper WHERE instcoord_ojt.estado = 0 AND instcoord_ojt.tipo = 'INSTRUCTOR PRINCIPAL OJT'  OR instcoord_ojt.estado = 0 AND instcoord_ojt.tipo = 'INSTRUCTOR OJT'  ORDER BY instcoord_ojt.id_inscorojt ASC";
$instructor  = mysqli_query($conexion,$sql);

$sql = "SELECT id_pers, gstNombr,gstApell FROM instcoord_ojt INNER JOIN personal on instcoord_ojt.id_pers=personal.gstIdper WHERE instcoord_ojt.estado = 0 AND instcoord_ojt.tipo = 'COORDINADOR OJT'  ORDER BY instcoord_ojt.id_inscorojt ASC";
$cordinador  = mysqli_query($conexion,$sql);

$sql = "SELECT id_pers, gstNombr,gstApell FROM instcoord_ojt INNER JOIN personal on instcoord_ojt.id_pers=personal.gstIdper WHERE instcoord_ojt.estado = 0 AND instcoord_ojt.tipo = 'INSTRUCTOR OJT'  ORDER BY instcoord_ojt.id_inscorojt ASC";
$inst2  = mysqli_query($conexion,$sql);

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
    <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
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
<!------------------------------------------------------------- ESPECIALIDAD Y COMISIÓN-------------------------------------------------------------------------->
                        <div class="box box-default collapsed-box" >
                            <div class="box-header with-border">
                                <h3 class="box-title">ESPECIALIDAD Y COMISIÓN</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-plus"></i></button>

                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <form id="addcurse" class="form-horizontal" action="" method="POST">
                                                <label>ESPECIALIDAD<span class="text-red">*</span></label>
                                                <div id="idSpecialidad"></div>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>COMISIÓN</label>
                                            <input type="text" onkeyup="mayus(this);"
                                                class="form-control disabled inputalta" id="comision">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                    <div id="ubiojt" style="" class="">
                                        <div class="form-group">
                                            <label>UBICACIÓN<span class="text-red">*</label>
                                            <select onchange="filubi()" id="uboj" name="uboj"
                                                class="form-control inputalta" placeholder="Seleccione la ubicación">
                                                <option value="">SELECCIONE LA UBICACIÓN</option>
                                                <option value="ÁREA CENTRAL">ÁREA CENTRAL</option>
                                                <option value="COMANDANCIA">COMANDANCIA</option>
                                            </select>
                                        </div>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>FECHA INICIO</label>
                                                    <input type="date" onkeyup="mayus(this);"
                                                        class="form-control disabled inputalta" id="comfecini">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>FECHA FIN</label>
                                                    <input type="date" onkeyup="mayus(this);"
                                                        class="form-control disabled inputalta" id="comfecfin">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>NIVEL<span class="text-red">*</label>
                                            <select id="idnivel" name="idnivel" class="form-control inputalta"
                                                placeholder="Seleccione la el nivel">
                                                <option value="">SELECCIONE EL NIVEL</option>
                                                <option value="1">NIVEL 1</option>
                                                <option value="2">NIVEL 2</option>
                                                <option value="3">NIVEL 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="label2">LUGAR</label>
                                            <textarea cols="30" rows="2" type="text" onkeyup="mayus(this);"
                                                class="form-control disabled inputalta" id="addubic"></textarea>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label2">SEDE</label>
                                            <textarea cols="30" rows="2" type="text" onkeyup="mayus(this);"
                                                class="form-control disabled inputalta" id="addsede"></textarea>

                                        </div>

                                    </div>
                                    </form>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                        </div>

<!------------------------------------------------------------- SELECCIÓN DE TAREAS-------------------------------------------------------------------------->

                         <div class="box box-default collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">SELECCIÓN DE TAREAS</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-plus"></i></button>

                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                <div class="form-group">
                                            <div class="col-sm-4">
                                                <label class="label2" style="font-size:16px">SELECCIONE LA
                                                    TAREA</label>
                                            </div>
                                        </div>
                                        <!-- <div id="tablaPro"></div> -->

                                        <div id="tabtareas"></div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                        </div>

<!------------------------------------------------------------- PROGRAMACIÓN DE TAREAS-------------------------------------------------------------------------->
                        <div class="box box-default collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">PROGRAMACIÓN DE TAREAS</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-plus"></i></button>

                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>FECHA Y HORA DE INICIO<span class="text-red">*</label>
                                            <input type="datetime-local" class="form-control inputalta"
                                                placeholder="Ingresa subtarea..." name="fechaInicio" id="fechaInicio">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>FECHA Y HORA DE TERMINO<span class="text-red">*</label>
                                            <input type="datetime-local" onkeyup="mayus(this);" class="form-control inputalta"
                                                id="fechaTermino" name="fechaTermino">
                                        </div>
                                        <div class="col-md-4">
                                            <label>COORDINADOR DEL OJT<span class="text-red">*</label>
                                            <select multiple="multiple"
                                                data-placeholder="SELECCIONE COORDINADOR OJT"
                                                style="width: 100%;color: #000" class="form-control select2" type="text"
                                                id="coordinador" name="coordinador">
                                                <option value="">SELECCIONE COORDINADOR </option>
                                                <?php while($cordinadors = mysqli_fetch_row($cordinador)):?>
                                                <option value="<?php echo $cordinadors[0]?>">
                                                    <?php echo $cordinadors[1].' '.$cordinadors[2]?></option>

                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                    .
                                    <br>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                        <label>INSTRUCTOR OJT<span class="text-red">*</label>
                                            <select multiple="multiple" data-placeholder="SELECCIONE INSTRUCTOR OJT"
                                                style="width: 100%;color: #000" class="form-control select2" type="text"
                                                class="form-control" id="instructor" name="instructor">
                                                <?php while($instructors = mysqli_fetch_row($instructor)):?>
                                                <option value="<?php echo $instructors[0]?>">
                                                    <?php echo $instructors[1].' '.$instructors[2]?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                        </div>

<!------------------------------------------------------------- SELECCIÓN DE INSPECTOR -------------------------------------------------------------------------->
                        <div class="box box-default collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">SELECCIÓN DE INSPECTOR</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                <div class="col-sm-12">
                                                <div id="tabSpcl"></div>
                                            </div>
                                    <!-- /.col -->
                                </div>
                                <div class="form-group"><br>
                                            <div class="col-sm-offset-0 col-sm-5">
                                                <button type="button" id="button" class="btn btn-success"
                                                    onclick="regOjt();">FINALIZAR </button>
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
                                                <p class="alert alert-warning text-center padding aviso" id="repetido">
                                                    ¡El curso ya está registrado!</p>
                                            </b>

                                            <b>
                                                <p class="alert alert-danger text-center padding adjuto" id="renom">
                                                    Renombre su archivo</p>
                                            </b>

                                            <b>
                                                <p class="alert alert-warning text-center padding adjuto" id="adjunta">
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
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                         <!-- SELECT2 EXAMPLE -->
                         <!-- <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Visualizador de Tareas programadas</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>

                                </div>
                            </div>
                            
                            <div class="box-body">
                                <div class="row">
                                <div class="form-group">
                                            <div class="col-sm-4">
                                                <label class="label2" style="font-size:16px">TAREAS ASIGNADAS</label>
                                            </div>
                                        </div>
                                        <div id="tareasprogram"></div>
                                </div>
                            </div>
                        </div> -->

                        

                        <div class="nav-tabs-custom">

                        







                                        </form>

            </section>
            <!-- /.content -->
        </div>

        <!-------------------------------------------MODAL------------------------------------------------------>
        <form class="form-horizontal" action="" method="POST">
            <div class="modal fade" id="detalleSub3" tabindex="-1" role="dialog" aria-labelledby="detalleSub3"
                aria-hidden="true">
                <div class="modal-dialog" style="width: 80%;">
                    <div class="modal-content">
                        <div class="modal-header">

                            <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                            <h4 class="modal-title" id="myModalLabel">AGREGAR SUB TAREAS</h4>
                        </div>
                        <div class="modal-body">

                            <div class='modal-body'>
                                <div id="elimino" style="display: none; text-align: center;font-size: 14px; color: red">
                                    SU
                                    REGISTRO FUE ELIMINADO</div>
                                <div id="actualizo"
                                    style="display: none;text-align: center;font-size: 14px; color: green">
                                    SE ACTUALIZO REGISTRO CON ÉXITO</div>

                                <div id="tablasub01"></div>

                                <div id="tablasub02"></div>
                                <div id="tablasub03"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"
                                    onclick="vaciar();">CERRAR</button>
                                <!-- <button type="button" class="btn btn-primary">GUARDAR</button> -->
                            </div>
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
    $('#instojt').select2();
    $('#idSpecialidad').load('select/buspecialidad.php');
    $('#tabSpcl').load('select/tablaSpc.php');
    $('#tablaPro').load('select/tablaProgOJT.php');
    //tabla tareas
    // $('#tabtareas').load('select/tareasojt.php');

});

function filubi() {
    var especialidas = document.getElementById('isSpc').value;
    var ubicacion = document.getElementById('uboj').value;
    var persona = document.getElementById('idInspct').value;
    //alert(persona)
    $.ajax({
        url: '../php/ojt_tareas.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var n = 0;
        html =
            '<div style="padding-top:5px;" class="col-md-12"><div class="nav-tabs-custom"><form id="Dtall" class="form-horizontal" action="" method="POST"><table width="100%" id="tabsubtareas" class="table table-striped table-hover center" ><thead><tr><th scope="col" style="width: 10%;">ID</th><th scope="col" style="width:650px">OJTS</th></th><th scope="col" style="">UBICACION</th><th scope="col" style="width:250px;">ACCIONES</th><th scope="col" style="display:none" >ID_REGISTRO</th></tr></thead><tbody>';
        for (H = 0; H < res.length; H++) {
            if (obj.data[H].id_spc == especialidas && obj.data[H].idarea == ubicacion) {
                var idojt = obj.data[H].id_ojt;
                n++;
                datos = obj.data[H].id_ojt + "*" + n;
                if (obj.data[H].ojt == 'SIN SUB TAREAS') {
                    subtareas =
                        '<a id="" type="button" title="Agregar tarea" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" onclick="destarea()" data-target="#editartraprin"><i class="fa fa-plus"></i></a>'
                } else {
                    subtareas =
                        '<a title="Seleccionar las subtareas" class="label label-primary" data-toggle="modal" data-target="#detalleSub3" onclick="tabsub()" style="font-weight: bold; height: 50px; font-size: 13px;"> +   SUB TAREAS</a>'
                }
                html += '<tr><th scope="row">' + n + ')</th><td>' + obj.data[H].ojt_principal + '</td><td>' +
                    obj.data[H].idarea +
                    '</td><td>' + subtareas +
                    '</td><td style="display:none">' + obj.data[H].id_ojt; + '</td></tr>'
            }
        }
        html += '</tbody></table></form></div></div>';
        $("#tabtareas").html(html);
    });
}

function tabsub() {
    $("#tabsubtareas tr").on('click', function() {
        var espe = "";
        espe += $(this).find('td:eq(3)').html(); //Toma el id de la persona 
        // alert(espe);

        var id_esp = espe;
        //ajax debusqueda
        $.ajax({
            url: '../php/data-task.php',
            type: 'POST'
        }).done(function(respuesta) {
            obj = JSON.parse(respuesta);
            var res = obj.data;
            var x = 0;
            html =
                '<table  class="table table-bordered"><tr><th style="width:5%;">#</th><th style="width:80%;">SUBTAREA 1</th><th style="width:10%;">AGREGAR</th>';
            //html ='<div style="padding-top:5px;" class="col-md-12"><div class="nav-tabs-custom"><form id="Dtall" class="form-horizontal" action="" method="POST"><table width="100%" id="tabsub" class="table table-striped table-hover center" ><thead><tr><th scope="col" style="width: 10%;">#</th><th scope="col" style="width:650px">SUBTAREA 1</th></th><th scope="col" style="">ACCIONES</th></tr></thead><tbody>';
            for (ii = 0; ii < res.length; ii++) {
                if (obj.data[ii].idtarea == id_esp && obj.data[ii].numsubt == 1) {

                    x++;
                    // $("#tablasub01").show();      

                    dato = obj.data[ii].idtarea + '*' + obj.data[ii].id_subojt + '*' + obj.data[ii]
                        .ojt_subtarea + '*' + obj.data[ii].numsubt;

                    adatos = obj.data[ii].idtarea + '*' + obj.data[ii].id_subojt + '*' + obj.data[ii]
                        .ojt_subtarea;
                    accion =
                        '<a title="Seleccionar las subtareas" class="label label-primary" data-toggle="modal" data-target="#detalleSub3" onclick="tabsub()" style="font-weight: bold; height: 50px; font-size: 13px;"> +   SUB TAREAS</a>'

                    html += "<tr><th>" + x + "</th><td><textarea class='form-control' id=' " + obj.data[
                            ii].id_subojt +
                        "' name='" + obj.data[ii].id_subojt + "' style='resize: none;' disabled>" + obj
                        .data[ii].ojt_subtarea + "</textarea></td><td><a id='" + obj.data[ii]
                        .id_subojt +
                        "mostrar' type='button' title='Tarea Agregada' class='btn btn-default' data-toggle='modal' style='display:none;a margin-left:2px' onclick='subOjtagregar(" +
                        '"' + adatos + '"' +
                        ");' data-target='#modal-actualizardoc'><i class='fa fa-check text-success'></i></a><a id='" +
                        obj.data[ii].id_subojt +
                        "ocultar' type='button' title='Agregar subtarea' class='asiste btn btn-default' data-toggle='modal' style='margin-left:2px' onclick='ageg(" +
                        '"' + dato + '"' +
                        ");' data-target=''><i class='fa fa-plus' style='color:#3c8dbc '></i></a></td></tr>"

                    //html += '<tr><th scope="row">' + x + ')</th><td>' + obj.data[ii].ojt_subtarea + '</td><td>' + accion +'</td></tr>'

                }
            }

            html += '</tbody></table></form></div></div>';
            $("#tablasub01").html(html);
        });

        //segunda función

        $.ajax({
            url: '../php/data-task.php',
            type: 'POST'
        }).done(function(respuesta) {
            obj = JSON.parse(respuesta);
            var res = obj.data;
            var x = 0;
            html =
                '<table  class="table table-bordered"><tr><th style="width:5%;">#</th><th style="width:80%;">SUB 2</th><th style="width:10%;">AGREGAR</th>';
            //html ='<div style="padding-top:5px;" class="col-md-12"><div class="nav-tabs-custom"><form id="Dtall" class="form-horizontal" action="" method="POST"><table width="100%" id="tabsub" class="table table-striped table-hover center" ><thead><tr><th scope="col" style="width: 10%;">#</th><th scope="col" style="width:650px">SUBTAREA 1</th></th><th scope="col" style="">ACCIONES</th></tr></thead><tbody>';
            for (ii = 0; ii < res.length; ii++) {
                if (obj.data[ii].idtarea == id_esp && obj.data[ii].numsubt == 2) {


                    x++;
                    // $("#tablasub01").show();      

                    dato = obj.data[ii].idtarea + '*' + obj.data[ii].id_subojt + '*' + obj.data[ii]
                        .ojt_subtarea + '*' + obj.data[ii].numsubt;

                    adatos = obj.data[ii].idtarea + '*' + obj.data[ii].id_subojt + '*' + obj.data[ii]
                        .ojt_subtarea;
                    accion =
                        '<a title="Seleccionar las subtareas" class="label label-primary" data-toggle="modal" data-target="#detalleSub3" onclick="tabsub()" style="font-weight: bold; height: 50px; font-size: 13px;"> +   SUB TAREAS</a>'

                    html += "<tr><th>" + x + "</th><td><textarea class='form-control' id=' " + obj.data[
                            ii].id_subojt +
                        "' name='" + obj.data[ii].id_subojt + "' style='resize: none;' disabled>" + obj
                        .data[ii].ojt_subtarea + "</textarea></td><td><a id='" + obj.data[ii]
                        .id_subojt +
                        "mostrar' type='button' title='Tarea Agregada' class='btn btn-default' data-toggle='modal' style='display:none;a margin-left:2px' onclick='subOjtagregar(" +
                        '"' + adatos + '"' +
                        ");' data-target=''><i class='fa fa-check text-success'></i></a><a id='" +
                        obj.data[ii].id_subojt +
                        "ocultar' type='button' title='Agregar subtarea' class='asiste btn btn-default' data-toggle='modal' style='margin-left:2px' onclick='ageg(" +
                        '"' + dato + '"' +
                        ");' data-target=''><i class='fa fa-plus' style='color:#3c8dbc '></i></a></td></tr>"

                    //html += '<tr><th scope="row">' + x + ')</th><td>' + obj.data[ii].ojt_subtarea + '</td><td>' + accion +'</td></tr>'

                }
            }

            html += '</tbody></table></form></div></div>';
            $("#tablasub02").html(html);
        });

        //tercera función

        $.ajax({
            url: '../php/data-task.php',
            type: 'POST'
        }).done(function(respuesta) {
            obj = JSON.parse(respuesta);
            var res = obj.data;
            var x = 0;
            html =
                '<table  class="table table-bordered"><tr><th style="width:5%;">#</th><th style="width:80%;">SUB 2</th><th style="width:10%;">AGREGAR</th>';
            //html ='<div style="padding-top:5px;" class="col-md-12"><div class="nav-tabs-custom"><form id="Dtall" class="form-horizontal" action="" method="POST"><table width="100%" id="tabsub" class="table table-striped table-hover center" ><thead><tr><th scope="col" style="width: 10%;">#</th><th scope="col" style="width:650px">SUBTAREA 1</th></th><th scope="col" style="">ACCIONES</th></tr></thead><tbody>';
            for (ii = 0; ii < res.length; ii++) {
                if (obj.data[ii].idtarea == id_esp && obj.data[ii].numsubt == 3) {


                    x++;
                    // $("#tablasub01").show();      

                    dato = obj.data[ii].idtarea + '*' + obj.data[ii].id_subojt + '*' + obj.data[ii]
                        .ojt_subtarea + '*' + obj.data[ii].numsubt;

                    adatos = obj.data[ii].idtarea + '*' + obj.data[ii].id_subojt + '*' + obj.data[ii]
                        .ojt_subtarea;
                    accion =
                        '<a title="Seleccionar las subtareas" class="label label-primary" data-toggle="modal" data-target="#detalleSub3" onclick="tabsub()" style="font-weight: bold; height: 50px; font-size: 13px;"> +   SUB TAREAS</a>'

                    html += "<tr><th>" + x + "</th><td><textarea class='form-control' id=' " + obj.data[
                            ii].id_subojt +
                        "' name='" + obj.data[ii].id_subojt + "' style='resize: none;' disabled>" + obj
                        .data[ii].ojt_subtarea + "</textarea></td><td><a id='" + obj.data[ii]
                        .id_subojt +
                        "mostrar' type='' title='Tarea agregarada' class='btn btn-default' data-toggle='modal' style='display:none;a margin-left:2px' onclick='io(" +
                        '"' + adatos + '"' +
                        ");' data-target=''><i class='fa fa-check text-success'></i></a><a id='" +
                        obj.data[ii].id_subojt +
                        "ocultar' type='button' title='Agregar subtarea' class='asiste btn btn-default' data-toggle='modal' style='margin-left:2px' onclick='ageg(" +
                        '"' + dato + '"' +
                        ");' data-target=''><i class='fa fa-plus' style='color:#3c8dbc '></i></a></td></tr>"

                    //html += '<tr><th scope="row">' + x + ')</th><td>' + obj.data[ii].ojt_subtarea + '</td><td>' + accion +'</td></tr>'

                }
            }

            html += '</tbody></table></form></div></div>';
            $("#tablasub03").html(html);
        });
        //cuarta función

    })
}

//función para que
function ageg(dato) {
    //alert("entra agregar");
    // alert(dato);
    var a = dato.split("*");
    id_subojt = a[1];
    id_tarea = a[0];
    //alert(id_tarea);

    var isSpc = document.getElementById('isSpc').value;
    var idInspct = document.getElementById('idInspct').value;
    var fechaInicio = document.getElementById('fechaInicio').value;
    var fechaTermino = document.getElementById('fechaTermino').value;
    var coordinador = document.getElementById('coordinador').value;
    var instructor = document.getElementById('instructor').value;

    var nivel = document.getElementById('idnivel').value;
    var ubicacion = document.getElementById('uboj').value;
    var lugar = document.getElementById('addubic').value;
    var sede = document.getElementById('addsede').value;
    var idsubtarea = id_subojt;
    var idtarea = id_tarea;

    var datos = 'isSpc=' + isSpc + '&idtarea=' + idtarea + '&idInspct=' + idInspct + '&fechaInicio=' + fechaInicio +
        '&fechaTermino=' + fechaTermino + '&coordinador=' + coordinador + '&instructor=' + instructor + '&nivel=' +
        nivel + '&ubicacion=' + ubicacion + '&lugar=' + lugar + '&sede=' + sede + '&idsubtarea=' + idsubtarea +
        '&opcion=registraroj';


    //alert(datos)

    //VALIDA QUE LOS CAMPOS D   EBEN DE ESTAR LLENOS PARA AGREGAR LA TAREA
    if (isSpc == '' || idInspct == '' || fechaInicio == '' || fechaTermino == '' || coordinador == '' || instructor ==
        '' || nivel == '') {
        Swal.fire({
            type: 'info',
            text: 'LLENE LOS CAMPOS OBLIGATORIOS(*)',
            timer: 2000,
            customClass: 'swal-wide',
            showConfirmButton: false,
        });
        return;
    } else {
        //INICIO DE LA FUNCIÓN PARA GUARDAR SUBTAREAS
        $.ajax({
            type: "POST",
            url: "../php/insertOJT.php",
            data: datos
        }).done(function(respuesta) {
            if (respuesta == 0) {
                //SE MUESTRA EL BOTON DE VALIDACIÓN  
                $("#" + id_subojt + "ocultar").hide();
                $("#" + id_subojt + "mostrar").show();
                document.getElementById(id_subojt).disabled = false;
            } else if (respuesta == 2) {
                Swal.fire({
                    type: 'info',
                    text: 'YA SE ENCUENTRA PROGRAMADA ESTA SUBTAREA A ESTE INSPECTOR',
                    timer: 2000,
                    customClass: 'swal-wide',
                    showConfirmButton: false,
                });
            } else {


            }
        }); //FIN DE AJAX
    }
}



function regOjt() {

    var fechaInicio = $("#fechaInicio").val();




    Swal.fire({
        type: 'success',
        // title: 'AFAC INFORMA',
        html: `<span>EL OJT SE HA PROGRAMADO ÉXITOSAMENTE EN EL HORARIO <b>${fechaInicio}</b></span>`,
        showConfirmButton: false,
        customClass: 'swal-wide',
        showConfirmButton: false,
    });
    setTimeout("location.href = 'catalogoOJT';", 3500);


}
</script>
<script src="../js/select2.js"></script>