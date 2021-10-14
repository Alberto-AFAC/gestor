<!DOCTYPE html><?php include ("../conexion/conexion.php");

$sql = "SELECT gstIdlsc, gstTitlo,gstTipo FROM listacursos WHERE estado = 0";
$curso = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'INSTRUCTOR' AND estado = 0";
$instructor = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdper,gstNombr,gstApell,gstCargo FROM personal WHERE gstCargo = 'INSPECTOR' AND estado = 0 || gstCargo = 'DIRECTOR' AND estado = 0 ";
$inspector = mysqli_query($conexion,$sql);

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Capacitación AFAC | Programación</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/skins/card.css">
    <script src="../dist/jspdf/dist/jspdf.debug.js"></script>
    <script src="../dist/js/jspdf.plugin.autotable.min.js"></script>
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
                                   <div style="display: none;">
                                    <?php include('../html/lisCurso.html');?>
                                </div>
                                    <!-- Datatables> 
                                    <!--SEGUNDA TABLA OPTIMIZADA-->
                                    <table class="display table table-striped table-bordered dataTable"  id="example"  style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>TÍTULO</th>
                                                    <th>TIPO</th>
                                                    <th>INICIO</th>
                                                    <th>DURACIÓN</th>
                                                    <th>FINAL</th>
                                                    <th>PARTICIPANTES</th>
                                                    <th>ESTATUS</th>
                                                    <th>ACCIÓN</th>
                                                </tr>
                                            </thead>
                                           
                                        </table> 
                                </div>

                                <section class="content" id="viscurso">
                                    <div class="row">

                                        <?php include('viscurso.php');?>

                                    </div>
                            </div>
                            <div id='lstacurs'></div>
                            <div class="modal fade" id="modal-participnt">
                                <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" onclick="location.href='pendientes.php'"
                                                    class="close" data-dismiss="modal" aria-label="Close"><span
                                                        aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">AGREGAR PARTICIPANTE</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" id="Prtcpnt">
                                                    <input type="hidden" name="acodigos" id="acodigos">
                                                    <input type="hidden" class="form-control" id="gstIdlsc"
                                                        name="gstIdlsc">

                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <label>TÍTULO</label>
                                                            <input type="text" onkeyup="mayus(this);"
                                                                class="form-control" id="gstTitlo" name="gstTitlo"
                                                                disabled="">
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <label>INICIO</label>
                                                            <input type="date" onkeyup="mayus(this);"
                                                                class="form-control" id="finicio" name="finicio"
                                                                disabled="">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label>DURACIÓN</label>
                                                            <input type="text" onkeyup="mayus(this);"
                                                                class="form-control" id="gstDrcin" name="gstDrcin"
                                                                disabled="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">

                                                        <div class="col-sm-12">
                                                            <label>PARTICIPANTE</label>
                                                            <select class="form-control" id="idinsp" name="idinsp"
                                                                style="width: 100%;">
                                                                <option value="">ELIJA PARTICIPANTE PARA ASISTIR AL
                                                                    CURSO </option>
                                                                <?php while($inspectors = mysqli_fetch_row($inspector)):?>
                                                                <option value="<?php echo $inspectors[0]?>">
                                                                    <?php echo $inspectors[1].' '.$inspectors[2].' ('.$inspectors[3].')'?>
                                                                </option>
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

                                                            <button type="button" id="button" class="btn btn-info"
                                                                onclick="agrPartc();">ACEPTAR</button>

                                                        </div>
                                                        <b>
                                                            <p class="alert alert-info text-center padding error"
                                                                id="danger">El participante ya está agregado </p>
                                                        </b>

                                                        <b>
                                                            <p class="alert alert-success text-center padding exito"
                                                                id="succe">¡Se agregó el participante con éxito!</p>
                                                        </b>

                                                        <b>
                                                            <p class="alert alert-warning text-center padding aviso"
                                                                id="empty">Elija participante </p>
                                                        </b>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-content
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <form class="form-horizontal" action="" method="POST">
                    <div class="modal fade" id="modal-eliminar">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">CANCELAR CURSO </h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="codigos" id="codigos">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <p> ¿ESTÁ SEGURO DE CANCELAR EL CURSO: <span id="cgstTitlo"></span> <!-- +'?'<input type="text" name="cgstTitlo"
             +'?'                                       id="cgstTitlo" class="form-c+'?'ontrol disabled" disabled=""
                                                    style="background: white;border: 1px solid white;"> --></p>
                                        </div>
                                        <br>
                                        <div class="col-sm-5">
                                            <button type="button" class="btn btn-primary"
                                                onclick="canCurso()">ACEPTAR</button>
                                        </div>
                                        <b>
                                            <p class="alert alert-warning text-center padding error" id="danger">Error
                                                al eliminar curso</p>
                                        </b>
                                        <b>
                                            <p class="alert alert-success text-center padding exito" id="succe">¡Se
                                                elimino curso con éxito !</p>
                                        </b>
                                        <b>
                                            <p class="alert alert-warning text-center padding aviso" id="empty">Elija
                                                curso para eliminar </p>
                                        </b>
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

    <!-- EVALUACIÓN CURSO -------------------------------------------------------------------------------------------->
    <!-- FIN EVALUACIÓN CURSO -->

    <!-- inicia la evaluación DEL INSTRUCTOR -->
    <form class="form-horizontal" action="" method="POST" id="avaluacion">
        <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal fade" id="modal-evaluar">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" style="font-size: 22px" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true" style="font-size: 22px">&times;</span></button>
                            <p>
                            <h4 class="modal-title" style="text-align:Center;">EVALUACIÓN DE RESULTADOS</h4>
                            </p>
                            <label>PARTICIPANTE</label>
                            <input type="text" disabled=""
                                style="text-transform:uppercase; font-size: 14pt; display:none" class="form-control "
                                id="idinsev" name="evaNombr">
                            <input type="text" disabled="" style="text-transform:uppercase; font-size: 14pt"
                                class="form-control" id="evaNombr" name="evaNombr">
                        </div>
                        <div class="modal-body">
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <a href='javascript:openEditeva()' id="abrirev" style="font-size:22px"> <i
                                            class="fa fa-edit"></i> </a>
                                    <a href='javascript:cerrarEditeva()' id="cerrareval"
                                        style="display:none; font-size: 22px"> <i class="fa fa-ban"></i> </a>
                                </button>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label>FOLIO:</label>
                                    <input type="text" name="id_curso" id="id_curso" style="text-transform:uppercase;"
                                        class="form-control disabled" disabled="">
                                </div>
                                <div class="col-sm-12">
                                    <label>CURSO:</label>
                                    <input type="text" name="idperon" id="idperon" style="text-transform:uppercase;"
                                        class="form-control disabled" disabled="">
                                </div>
                                <div class="col-sm-12">
                                    <label>FECHA DE LA EVALUACIÓN:</label>
                                    <input type="date" style="text-transform:uppercase;" class="form-control disabled"
                                        disabled="" id='fechaev'>

                                </div>
                                <div class="col-sm-12">
                                    <table class="content-table">
                                        <thead>
                                            <tr>
                                                <th>RESULTADOS</th>
                                                <th>ESTATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="number" title="el numero no debe ser superior a 100"
                                                        name="cantidad" min="1" max="100"
                                                        style="text-transform:uppercase;" class="form-control disabled"
                                                        disabled="" id='validoev' onchange="cambiartexto()"></td>
                                                <td><span class='label label-primary' style="font-size:18px;"
                                                        id='PE'>PENDIENTE</span><span class='label label-success'
                                                        style="font-size:18px; display:none"
                                                        id='SIe'>APROBADO</span><span class='label label-danger'
                                                        style="font-size:18px; display:none" id='NOE'>REPROBADO</span>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                                <div class="col-sm-12">
                                    <textarea class="col-sm-12" name="comentarios" id="comeneva" rows="4" cols="10"
                                        onkeyup="mayus(this);" style="font-size: 14px; border-radius: 5px;"
                                        placeholder="Comentarios Adicionales" disabled=""></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-5">
                                    <button type="button" class="btn btn-primary"
                                        onclick="cerrareval()">ACEPTAR</button>
                                </div>
                                <b>
                                    <p class="alert alert-warning text-center padding error" id="dangerev">Error al
                                        Evaluar!!
                                </b>
                                <b>
                                    <p class="alert alert-success text-center padding exito" id="succeev">¡Se Evaluo con
                                        exito!</p>
                                </b>
                                <b>
                                    <p class="alert alert-warning text-center padding aviso" id="emptyev">Falto Ingresar
                                        la Puntuación!</p>
                                </b>
                                <b>
                                    <p class="alert alert-warning text-center padding aviso" id="emptyev1">Falto
                                        Ingresar la Fecha!</p>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.modal-content -->
            <!-- /.modal-dialog -->
    </form>
    <!-- /.content -->

    </section>
    <!-- /.content -->
    </div>

<!-- inicio de el check list para generar un certificado -->
<form class="form-horizontal" action="" method="POST" id="acreditacion">
        <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal fade" id="modal-acreditacion">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" style="font-size: 22px" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true" style="font-size: 22px">&times;</span></button>
                            <p>
                            <h4 class="modal-title" style="text-align:Center;">GENERACIÓN DE CONSTANCIAS</h4>
                            </p>
                            <div class="form-group">
                                <div class="col-sm-2">
                                  <label>FOLIO:</label>
                                  <input type="text" name="id_cursoc" id="id_cursoc" style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                </div>     
                                <div class="col-sm-10">
                                  <label>PARTICIPANTE</label>
                                  <input type="text" disabled="" style="text-transform:uppercase; font-size: 14pt; display:none;" class="form-control " id="idinsevc1" name="idinsevc1">
                                  <input type="text" disabled="" style="text-transform:uppercase; font-size: 14pt" class="form-control" id="evaNombrc" name="evaNombrc">
                                </div>
                                <div class="col-sm-12">
                                  <label>CURSO:</label>
                                  <input type="text" name="idperonc" id="idperonc" style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                  <input type="text" disabled="" style="text-transform:uppercase; font-size: 14pt; display:none;" class="form-control " id="copnum" name="copnum">
                                </div>
                                   
                            </div>                                         
                        </div>
                        
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-sm-12">
                                <table class="table table-striped table-bordered dataTable">
                                        <thead>
                                            <tr>
                                                <th>PARAMETROS</th>
                                                <th>ESTATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                   CONVOCATORIA Y CONFIRMACIÓN
                                                </td>
                                                <td>

                                                <i class="fa fa-check" id="che1" disabled style="color:green; font-size: 16pt"></i></span>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    LISTA DE REGISTRO
                                                </td>
                                                <td>
                                                <input style="width:16px; height:16px;" value="SI" id="check2c" type="checkbox" name="check-box" /> <span></span>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    LISTA DE ASISTENCIA
                                                </td>
                                                <td>
                                                <input style="width:16px; height:16px;" value="SI" id="check3c" type="checkbox" name="check-box" /> <span></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    REPORTES DE INCIDENCIAS
                                                </td>
                                                <td>
                                                <input style="width:16px; height:16px;" value="SI" id="check4c" type="checkbox" name="check-box" /> <span></span>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    CARTAS DESCRIPTIVAS
                                                </td>
                                                <td>
                                                <input style="width:16px; height:16px;" value="SI" id="check5c" type="checkbox" name="check-box" /> <span></span>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    EVALUACIÓN POR PARTICIPANTE
                                                </td>
                                                <td>
                                                
                                                <i class="fa fa-check" id="che6" disabled style="color:green; font-size: 16pt"></i></span>    
                                            </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    REGISTRO DE PONDERACIÓN
                                                </td>
                                                <td>
                                                <input style="width:16px; height:16px;" value="SI" id="check7c" type="checkbox" name="check-box" /> <span></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    INFORME FINAL
                                                </td>
                                                <td>
                                                <input style="width:16px; height:16px;" value="SI" id="check8c" type="checkbox" name="check-box" /> <span></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    EVALUACIÓN DE REACCIÓN
                                                </td>
                                                <td>
                                                <input style="width:16px; height:16px;" value="SI" id="check9c" type="checkbox" name="check-box" /> <span></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                
                            </div>
                           

                            <div class="form-group">
                                <div class="col-sm-5">
                                    <button type="button" id="guaacredit" onclick="vergenercerf()" class="btn btn-info altaboton" style="font-size:16px; width:110px; height:35px" >ACEPTAR</button>
                                    <button type="button" id="actacredit" onclick="" class="btn btn-info altaboton" style="font-size:16px; width:110px; height:35px; display:none;">ACTUALIZAR</button>
                                </div>
                                <b>
                                    <p class="alert alert-warning text-center padding error" id="cerdangerev">Error al
                                        Acreditar!!
                                </b>
                                <b>
                                    <p class="alert alert-warning text-center padding aviso" id="ceravisos">Error al
                                        Acreditar!!
                                </b>
                                <b>
                                    <p class="alert alert-success text-center padding exito" id="cersucceev">¡Se Acredito con
                                        exito!</p>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.modal-content -->
            <!-- /.modal-dialog -->
    </form>
    <!-- /.content -->

    </section>
    <!-- /.content -->
    </div>

    <!-- fin del chechk list para copletar iun certificado -->

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
        <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong>
        Todos los derechos Reservados AJ.
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
    <script src="../js/global.js"></script>
    <!-- page script -->

</body>

</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function() {
    $('#id_mstr').select2();
    $('#idinst').select2();
    $('#idinsp').select2();
});
</script>
<script src="../js/select2.js"></script>
<!-- // AQUÍ VA LA TABLA MÁS OPTIMIZADA -->
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable({
        
        "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
            "order": [
            [7, "DESC"]
        ],
        "ajax": "../php/cursosPendnt.php",
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<a href='javascript:openCurso()' id='example' class='datos btn btn-default' ><i class='fa fa-list-alt text-success'></i></a> "

        }]
    });

    detalles("#example tbody", table);
    agrinspctor("#example tbody", table);


    $('#example thead tr').clone(true).appendTo('#example thead');

    $('#example thead tr:eq(1) th').each(function(i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html('<input type="text"  placeholder="Buscar" />');

        $('input', this).on('keyup change', function() {
            if (table.column(i).search() !== this.value) {
                table
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });



    $('#example tbody').on('click', 'a', function() {
        var data = table.row($(this).parents('tr')).data();
        //alert( "Es el ID: "+ data );
        $.ajax({
            url: '../php/lisCurso.php',
            type: 'POST'
        }).done(function(resp) {
            obj = JSON.parse(resp);
            var res = obj.data;
            var x = 0;

            for (i = 0; i < res.length; i++) {
                if (obj.data[i].id_curso == data[8]) {


                    cursos = obj.data[i].gstIdlsc + "*" + obj.data[i].gstTitlo + "*" + obj.data[
                            i].gstTipo + "*" + obj.data[i].gstPrfil + "*" + obj.data[i]
                        .gstCntnc + "*" + obj.data[i].gstDrcin + "*" + obj.data[i].gstVignc +
                        "*" + obj.data[i].gstObjtv + "*" + obj.data[i].hcurso + "*" + obj.data[
                            i].fcurso + "*" + obj.data[i].fechaf + "*" + obj.data[i].idinst +
                        "*" + obj.data[i].sede + "*" + obj.data[i].link + "*" + obj.data[i]
                        .modalidad + "*" + obj.data[i].codigo + '*' + obj.data[i].proceso +
                        '*' + obj.data[i].idinsp + '*' + obj.data[i].idinsp;


                    var d = cursos.split("*");

                    gstIdlsc = d[0];

                    $("#impri #gstIdlstc").val(d[0]);
                    $("#impri #gstTitulo").val(d[1]);
                    $("#Dtall #gstTitlo").val(d[1]);
                    $("#Dtall #gstTipo").val(d[2]);
                    $("#Dtall #gstPrfil").val(d[3]);
                    $("#Dtall #gstCntnc").val(d[4]);
                    $("#Dtall #gstDrcin").val(d[5]);
                    $("#Dtall #gstVignc").val(d[6]);
                    $("#Dtall #gstObjtv").val(d[7]);
                    $("#Dtall #hcurso").val(d[8]);
                    $("#Dtall #fcurso").val(d[9]);
                    $("#Dtall #fechaf").val(d[10]);
                    $("#Dtall #idinst").val(d[11]);
                    $("#Dtall #sede").val(d[12]);
                    $("#Dtall #modalidads").val(d[14]);
                    $("#Dtall #linkcur").val(d[13]);
                    $("#Dtall #codigo").val(d[15]);
                    $("#Dtall #proceso").val(data[18]);

                    codigo = d[15];

                    idcurso(codigo);

                }
            }
        })


        modalidadcur = document.getElementById('modalidads').value; //variable para declara la modalidad
        dismod = document.getElementById(
        "dismod"); //variable para el contenedor de el link y la contraseña

        if (modalidadcur == "A DISTANCIA") { //se visualiza el link y contraseña 
            dismod.style.display = '';
        }
        if (modalidadcur == "MIXTA (SEMIPRESENCIAL)") { //se visualiza el link y contraseña 
            linidismodnpu.style.display = '';
        }
        if (modalidadcur == "PRESENCIAL") { //se oculta el link y la contraseña
            dismod.style.display = 'none';
        }

    });

});

function idcurso(codigo) {

    $.ajax({
        url: '../php/curLista.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        //
        //TODO AQUI ES
        html =
            '<table id="lstcurs" class="table display table-striped table-bordered" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th style="width: 20px;"><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> NOMBRE(S)</th><th><i></i> APELLIDO(S)</th><th><i></i>ESPECIALIDAD</th><th><i></i>ASISTENCIA</th><th style="display:none;"><i></i>MOTIVO</th><th style="display:none;"><i></i>justifi</th></tr></thead><tbody>';


        //TRAE LOS DATOS DE LA TABLA CELDA RECURRENTE
        $(document).ready(function() {
            $("#lstcurs tr").on('click', function() {
                var toma1 = "",
                    toma2 = "",
                    toma3 = "",
                    toma4 = ""; //declaramos las columnas NOMBRE DEL CURSO
                toma1 += $(this).find('td:eq(1) ').html(); //NOMBRE DEL CURSO  
                toma2 += $(this).find('td:eq(2)').html(); //PDF
                toma3 += $(this).find('td:eq(6)').html(); //PDF 
                toma4 += $(this).find('td:eq(7)').html(); //PDF  

                $("#nomdeclina1").text(toma1 + " " + toma2); // Label esta en valor.php
                $("#declinpdf1").attr('href', toma2); // Label esta en valor.php
                $("#motivod1").text('Motivo:' + toma3); // Label esta en valor.php
                //  $("#nombredeclin").text(toma4); // Label esta en valor.php
                $("#otrosd1").text(toma4); // Label esta en valor.php
                $("#declinpdf1").attr('href', toma4); // Label esta en valor.php


                if (toma3 == 'OTROS') {
                    document.getElementById('otrosd1').style.display = '';
                    document.getElementById('declinpdf1').style.display = 'none';
                }
                if (toma3 == 'TRABAJO') {
                    document.getElementById('otrosd1').style.display = 'none';
                    document.getElementById('declinpdf1').style.display = '';
                }
                if (toma3 == 'ENFERMEDAD') {
                    document.getElementById('otrosd1').style.display = 'none';
                    document.getElementById('declinpdf1').style.display = '';
                }



            });
            //020920211
        });

        for (i = 0; i < res.length; i++) {
            x++;

            year = obj.data[i].fcurso.substring(0, 4);
            month = obj.data[i].fcurso.substring(5, 7);
            day = obj.data[i].fcurso.substring(8, 10);
            Finicio = day + '/' + month + '/' + year;
            year = obj.data[i].fechaf.substring(0, 4);
            month = obj.data[i].fechaf.substring(5, 7);
            day = obj.data[i].fechaf.substring(8, 10);
            Finaliza = day + '/' + month + '/' + year;

            cursos = obj.data[i].gstIdlsc + "*" + obj.data[i].gstTitlo + "*" + obj.data[i].gstTipo + "*" + obj
                .data[i].gstPrfil + "*" + obj.data[i].gstCntnc + "*" + obj.data[i].gstDrcin + "*" + obj.data[i]
                .gstVignc + "*" + obj.data[i].gstObjtv + "*" + obj.data[i].hcurso + "*" + obj.data[i].fcurso +
                "*" + obj.data[i].fechaf + "*" + obj.data[i].idinst + "*" + obj.data[i].sede + "*" + obj.data[i]
                .link + "*" + obj.data[i].gstNombr + "*" + obj.data[i].gstApell + "*" + obj.data[i].idmstr +
                "*" + obj.data[i].evaluacion + "*" + obj.data[i].idinsp + "*" + obj.data[i].id_curso + "*" + obj
                .data[i].confirmar + "*" + obj.data[i].codigo + '*' + obj.data[i].idinsp;

            if (obj.data[i].gstCargo == 'ADMINISTRATIVO') {
                cargo = obj.data[i].gstCargo;
            } else {
                cargo = obj.data[i].gstCatgr;
            }
            //--------------BASE DE VISTA DETALLE CURSO------------------------//
            confirmar = "<a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" + '"' +
                obj.data[i].id_curso + '"' +
                ")' class='circular-button check green transition' ><i class='fa ion-android-done'  style='font-size:15px;'></i></a>";
            evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" + '"' +
                cursos + '"' +
                ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";
            evalcurso =
                "<a type='button' style='margin-left:2px' title='Curso por evaluar' onclick='evalucurs(" + '"' +
                cursos + '"' +
                ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:15px;'></i></a>";
            listcer =
                "<a type='button' style='margin-left:2px' title='Generar Certificado' onclick='gencerti(" +
                '"' + cursos + '"' +
                ") ' class='btn btn-default' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa fa-list-ul' style='font-size:15px;'></i></a>";

            // vista cuando se confirma "DETALLE DEL CURSO"
            if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMADO') {
                confirmar = "<a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" +
                    '"' + obj.data[i].id_curso + '"' +
                    ")' class='circular-button check green transition' ><i class='fa ion-android-done'  style='font-size:15px;'></i></a>";
            }
            // vista cuando se confirma "DETALLE DEL CURSO" CON EVALUACIÓN
            if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMADO' && ((obj.data[i]
                    .reaccion) == 'SI EXISTE')) {
                confirmar = "<a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" +
                    '"' + obj.data[i].id_curso + '"' +
                    ")' class='circular-button check green transition' ><i class='fa ion-android-done'  style='font-size:15px;'></i></a>";
                evalcurso =
                    "<a type='button' style='margin-left:2px' title='Curso por evaluar' onclick='evalucurs(" +
                    '"' + cursos + '"' +
                    ")' class='btn btn-success' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:15px;'></i></a>";
            }
            // vista cuando se DECLINA POR TRABAJO "DETALLE DEL CURSO"
            if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'TRABAJO') {
                confirmar = "<a type='button' title='Declina la convocatoria' style= 'red' onclick='agregar(" +
                    '"' + obj.data[i].id_curso + '"' +
                    ")' class='circular-button declin transition pend1' data-toggle='modal' data-target='#modal-declinado1'></a>";
                evaluacion = "";
                evalcurso = "";
                listcer = "";
            }
            // vista cuando se DECLINA POR ENFERMEDAD "DETALLE DEL CURSO"
            if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'ENFERMEDAD') {
                confirmar = "<a type='button' title='Declina la convocatoria' style= 'red' onclick='agregar(" +
                    '"' + obj.data[i].id_curso + '"' +
                    ")' class='circular-button declin transition pend1' data-toggle='modal' data-target='#modal-declinado1'></a>";
                evaluacion = "";
                evalcurso = "";
                listcer = "";
            }
            // vista cuando se DECLINA POR OTROS "DETALLE DEL CURSO"
            if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'OTROS') {
                confirmar =
                    "<a type='button' title='Declina la convocatoria otros' style= 'red' onclick='agregar(" +
                    '"' + obj.data[i].id_curso + '"' +
                    ")' class='circular-button declin transition pend1' data-toggle='modal' data-target='#modal-declinado1'></a>";
                evaluacion = "";
                evalcurso = "";
                listcer = "";
            }
            // vista cuando se APRUEBA AL INSPECTOR "DETALLE DEL CURSO" CON EVALUACIÓN
            if (((obj.data[i].evaluacion) >= 80) && ((obj.data[i].evaluacion) <= 100) && ((obj.data[i]
                    .reaccion) == 'SI EXISTE')) {
                evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" +
                    '"' + cursos + '"' +
                    ")' class='btn btn-success' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:16px;'></i></a>";
                evalcurso =
                    "<a type='button' style='margin-left:2px' title='Curso Evaluado' onclick='evalucurs(" +
                    '"' + cursos + '"' +
                    ")' class='btn btn-success' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:15px;'></i></a>";
            }
            // vista cuando se APRUEBA AL INSPECTOR "DETALLE DEL CURSO" SIN EVALUACIÓN
            if (((obj.data[i].evaluacion) >= 80) && ((obj.data[i].evaluacion) <= 100) && ((obj.data[i]
                    .reaccion) == 'NO EXISTE')) {
                evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" +
                    '"' + cursos + '"' +
                    ")' class='btn btn-success' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";
            }
            // vista cuando se REPRUEBA AL INSPECTOR "DETALLE DEL CURSO" SIN EVALUACIÓN
            if (((obj.data[i].evaluacion) < 80) && ((obj.data[i].evaluacion) >= 1) && ((obj.data[i].reaccion) ==
                    'NO EXISTE')) {
                evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" +
                    '"' + cursos + '"' +
                    ")' class='btn btn-danger' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";
            }
            // vista cuando se REPRUEBA AL INSPECTOR "DETALLE DEL CURSO" CON EVALUACIÓN
            if (((obj.data[i].evaluacion) < 80) && ((obj.data[i].evaluacion) >= 1) && ((obj.data[i].reaccion) ==
                    'SI EXISTE')) {
                evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" +
                    '"' + cursos + '"' +
                    ")' class='btn btn-danger' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";
                evalcurso =
                    "<a type='button' style='margin-left:2px' title='Curso Evaluado' onclick='evalucurs(" +
                    '"' + cursos + '"' +
                    ")' class='btn btn-success' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:15px;'></i></a>";
            }

            //FIN BASE DE VISTA DETALLE CURSO

            //---------------VISTA PRINCIPAL DE LA TABLA DETALLE INSPECTOR CURSO---------------//
            if (obj.data[i].codigo == codigo) {

                if (obj.data[i].gstCargo == 'INSPECTOR' || obj.data[i].gstCargo == 'DIRECTOR' || obj.data[i]
                    .gstCargo == 'ADMINISTRATIVO') {

                    if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMAR') {
                        html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
                            .gstApell + "</td><td>" + cargo +
                            "</td><td><center><a type='button' title='Pendiente por confirmar asistencia' style= 'red' onclick='agregar(" +
                            '"' + obj.data[i].id_curso + '"' +
                            ")' class='circular-button right transition pend'><i class='fa ion-android-time'  style='font-size:18px;'></i></a></center>" +
                            "</td></tr>";

                    } else {
                        html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
                            .gstApell + "</td><td>" + cargo + "</td><td><center> " + confirmar + "</center></td></tr>";
                    }


                    //---------------VISTA PRINCIPAL DE LA TABLA DETALLE CURSO CORDINADOR (TOMA EL CURSO)---------------//
                } else if (obj.data[i].gstCargo == 'COORDINADOR') {

                    if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMAR' && obj.data[i]
                        .codigo == codigo && obj.data[i].idinst != obj.data[i].idinsp) {
                        html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
                            .gstApell + "</td><td>" + obj.data[i].gstCargo +
                            "</td></tr>";

                    } else if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMADO' && obj.data[
                            i].codigo == codigo && obj.data[i].idinst != obj.data[i].idinsp) {
                        html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
                            .gstApell + "</td><td>" + obj.data[i].gstCargo + "</td><td> " + confirmar +
                            "</td><td>" + evaluacion + evalcurso + listcer +
                            "<td style='display:none;'>" +
                            obj.data[i].confirmar + "</td><td style='display:none;'>" + obj.data[i].justifi +
                            "</td></td></tr>";
                    }
                }

                //---------------VISTA PRINCIPAL DE LA TABLA DETALLE DEL CURSO INSTRUCTOR---------------//

                if (obj.data[i].gstCargo == 'INSTRUCTOR' && obj.data[i].codigo == codigo) {
                    html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
                        .gstApell + "</td><td>" + cargo +
                        "</td><td><center><img src='../dist/img/inspector.svg' alt='Inspector' title='Instructor' width='50px;'></center></td>" +
                        "</tr>";
                }

                //---------------VISTA PRINCIPAL DE LA TABLA DETALLE DEL CURSO COORDINADOR (PRINCIPAL)---------------//
                if (obj.data[i].gstCargo == 'COORDINADOR' && obj.data[i].codigo == codigo && obj.data[i]
                    .idinst == obj.data[i].idinsp) {
                    html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
                        .gstApell + "</td><td>" + obj.data[i].gstCargo +
                        "</td><td><center><img src='../dist/img/coordinador.svg' alt='Coordinador' title='Coordinador' width='50px;'></center></tr>";
                }

            } else if (obj.data[i].codigo == codigo && obj.data[i].proceso == 'FINALIZADO') {

                if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMADO') {

                    if (obj.data[i].gstCargo == 'COORDINADOR') {
                        html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
                            .gstApell + "</td><td>" + obj.data[i].gstCargo +
                            "</td><td> <a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" +
                            '"' + obj.data[i].id_curso + '"' +
                            ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" +
                            "</td></tr>";
                    } else {
                        html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
                            .gstApell + "</td></tr>";

                    }

                }
                if (((obj.data[i].evaluacion) >= 80) && ((obj.data[i].evaluacion) <= 100)) {
                    html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
                        .gstApell + "</td><td>" + cargo +
                        "</td><td> <a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" +
                        '"' + obj.data[i].id_curso + '"' +
                        ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" +
                        "</td><td>" + "<a type='button' title='Evaluación Inspector' onclick='evaluarins(" +
                        '"' + cursos + '"' +
                        ")' class='btn btn-success' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" +
                        '"' + cursos + '"' +
                        ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' text-blue' style='font-size:18px;'></i></a><a type='button' title='Generar Certificado' onclick='gencerti(" +
                        '"' + cursos + '"' +
                        ") ' class='btn btn-primary' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa fa-list-ul' style='font-size:18px;'></i></a><a type='button' title='Eliminar' onclick='eliminar(" +
                        '"' + obj.data[i].id_curso + '"' +
                        ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";
                }
                if (((obj.data[i].evaluacion) < 80) && ((obj.data[i].evaluacion) >= 1)) {
                    html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
                        .gstApell + "</td><td>" + cargo +
                        "</td><td> <a type='button' title='Confirma asistencia'style= 'red' onclick='agregar(" +
                        '"' + obj.data[i].id_curso + '"' +
                        ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" +
                        "</td><td>" + "<a type='button' title='Evaluación Inspector' onclick='evaluarins(" +
                        '"' + cursos + '"' +
                        ")' class='btn btn-danger' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" +
                        '"' + cursos + '"' +
                        ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:18px;'></i></a><a type='button' title='Eliminar' onclick='eliminar(" +
                        '"' + obj.data[i].id_curso + '"' +
                        ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";
                }
            }

        }
        html += '</tbody></table>';
        $("#proCursos").html(html);

    })
}

//02092021



function detalles(tbody, table) {

    $(tbody).on("click", "a.eliminar", function() {
        var data = table.row($(this).parents("tr")).data();

        //var gstIdlsc = $().val(data.gstIdlsc);
        $("#modal-eliminar #codigos").val(data[9]);
        $("#modal-eliminar #cgstTitlo").html(data[1] + '?');

    });
}

function agrinspctor(tbody, table) {

    $(tbody).on("click", "a.asiste", function() {
        var data = table.row($(this).parents("tr")).data();

        // alert(data[16]);
        // alert(data[17]);

        $("#Prtcpnt #gstIdlsc").val(data[15]);
        $("#Prtcpnt #acodigos").val(data[9]);
        $("#Prtcpnt #gstTitlo").val(data[1]);
        $("#Prtcpnt #finicio").val(data[3]);
        $("#Prtcpnt #gstDrcin").val(data[10]);

        $("#Prtcpnt #hrcurs").val(data[17]);
        $("#Prtcpnt #finalf").val(data[5]);
        $("#Prtcpnt #idcord").val(data[16]);
        $("#Prtcpnt #sede").val(data[12]);
        $("#Prtcpnt #linke").val(data[13]);
        $("#Prtcpnt #modalidad").val(data[14]);

    });
}


const myFunction = () => {
  const trs = document.querySelectorAll('#lstcurs tr:not(.header)');
  const filter = document.querySelector('#myInput').value;
  const regex = new RegExp(filter, 'i');
  const isFoundInTds = (td) => regex.test(td.innerHTML);
  const isFound = (childrenArr) => childrenArr.some(isFoundInTds);
  const setTrStyleDisplay = ({ style, children }) => {
    style.display = isFound([...children]) ? '' : 'none';
  };
  
  trs.forEach(setTrStyleDisplay);
};
</script>

<style>
#example input {
    width: 50% !important;
}
</style>