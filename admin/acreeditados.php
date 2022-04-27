<!DOCTYPE html><?php include ("../conexion/conexion.php");

$sql = "SELECT gstIdlsc, gstTitlo,gstTipo FROM listacursos WHERE estado = 0";
$curso = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'INSTRUCTOR' AND estado = 0";
$instructor = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdper,gstNombr,gstApell,gstCargo, estado FROM personal WHERE  gstCargo = 'INSTRUCTOR' OR  gstCargo = 'INSPECTOR' OR gstCargo = 'ADMINISTRATIVO' OR gstCargo = 'COORDINADOR' AND estado = 0 || estado = 3 ";
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
    <link rel="stylesheet" href="../dist/css/input-correos.css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!-- <link rel="stylesheet" type="text/css" href="../datas/bootstrap.css"> -->
<link rel="stylesheet" type="text/css" href="../datas/dataTables.css">
<script type="text/javascript" async="" src="../datas/ga.js"></script>
<script type="text/javascript" src="../datas/site.js"></script>
<script type="text/javascript" src="../datas/dynamic.php" async=""></script>
<script type="text/javascript" language="javascript" src="../datas/jquery-3.js"></script>
<script type="text/javascript" language="javascript" src="../datas/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../datas/dataTables.js"></script>
<script type="text/javascript" language="javascript" src="../datas/demo.js"></script>
<script src="http://momentjs.com/downloads/moment.min.js"></script>

    <style>
    #data-table-cursosProgramados input {
        width: 80% !important;
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
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">

                            <!--<ul class="nav nav-tabs">
<li class="active"><a href="#activity" data-toggle="tab">PROGRAMACIÓN DEL CURSO</a></li>
<li><a href="#timeline" data-toggle="tab">LISTA DE PROGRAMACIÓN</a></li>
</ul>-->
                            <div class="tab-content">

                                <div class="box-body" id="listCurso">
             
                                    <!-- Datatables-->
                                    <!--SEGUNDA TABLA OPTIMIZADA-->
                                    <table class="display table table-striped table-bordered dataTable" id="example"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <!-- <th>CODIGO</th> -->
                                                <th>TÍTULO</th>
                                                <th>TIPO</th>
                                                <th>INICIO</th>
                                                <th>DURACIÓN</th>
                                                <th>FINAL</th>
                                                <th>PARTICIPANTES</th>
                                                <th>ESTATUS</th>
                                                <th style="width:15%;">ACCIÓN</th>

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
                                                <button type="button" onclick="location.href='acreeditados'" class="close"
                                                    data-dismiss="modal" aria-label="Close"><span
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
                                                            <input type="data" onkeyup="mayus(this);"
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
                                                    <input type="hidden" name="contracceso" id="contracceso">
                                                    <input type="hidden" name="classroom" id="classroom">
                                                    <div class="form-group">
                                                        <div class="col-sm-5">
                                                            <button type="button" id="buttons" class="btn btn-info"
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
<!- /.nav-tabs-custom -->
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
                                        <input type="hidden" name="liga" id="liga" value="acreeditados"> 
                                        <input type="hidden" name="codigos" id="codigos">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <p> ¿ESTÁ SEGURO DE CANCELAR EL CURSO: <span id="cgstTitlo"></span>
                                                    <!-- +'?'<input type="text" name="cgstTitlo"
+'?'                                       id="cgstTitlo" class="form-c+'?'ontrol disabled" disabled=""
style="background: white;border: 1px solid white;"> -->
</p>
</div>
<br>
<div class="col-sm-5">
<button id="cancela" type="button" class="btn btn-primary"
onclick="canCurso()">ACEPTAR</button>
</div>
<b>
<p class="alert alert-warning text-center padding error" id="dangerr">
Error
al cancelar curso</p>
</b>
<b>
<p class="alert alert-success text-center padding exito" id="succes">¡Se
cancelo curso con éxito !</p>
</b>
<b>
<p class="alert alert-warning text-center padding aviso" id="emptyy">
Elija
curso para cancelar </p>
</b>
</div>
</div>
</div>
</div>
</div>
<!-- /.modal-content -->
</form>
<!---------------------------------------ELIMINAR----------------------------------------->

<form class="form-horizontal" action="" method="POST">
<div class="modal fade" id="eliminar-modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">ELIMINAR INSPECTOR </h4>
</div>
<div class="modal-body">
<!-- <input type="hidden" name="codInsp" id="codInsp"> -->
<input type="hidden" name="idInspt" id="idInspt">
<div class="form-group">
<div class="col-sm-12">
<p> ¿ESTÁ SEGURO DE ELIMINAR INSPECTOR? <span id="nomInsp"></span>
<!-- +'?'<input type="text" name="cgstTitlo"
+'?'                                       id="cgstTitlo" class="form-c+'?'ontrol disabled" disabled=""
style="background: white;border: 1px solid white;"> -->
</p>
</div>
<br>
<div class="col-sm-5">
<button id="elimina" type="button" class="btn btn-primary"
onclick="elInspt()">ACEPTAR</button>
</div>
<b>
<p class="alert alert-warning text-center padding error" id="dangerr1">
Error
al eliminar inspector</p>
</b>
<b>
<p class="alert alert-success text-center padding exito" id="succes1">
¡Se
elimino inspector con éxito !</p>
</b>
<b>
<p class="alert alert-warning text-center padding aviso" id="emptyy1">
Elija
inspector para eliminar </p>
</b>
</div>
</div>
</div>
</div>
</div>
<!-- /.modal-content -->

</form>
<!------------EVALUACION DE CURSOS-------------------->
<!-- FIN EVALUACIÓN CURSO -->

<!-- inicia la evaluación DEL INSTRUCTOR -->
<form class="form-horizontal" action="" method="POST" id="avaluacion">
<div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel">
<div class="modal fade" id="modal-evaluar">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" style="font-size: 22px"
data-dismiss="modal" aria-label="Close">
<span aria-hidden="true" style="font-size: 22px">&times;</span></button>
<p>
<h4 class="modal-title" style="text-align:center;"><b>EVALUACIÓN DE RESULTADOS</b></h4>
</p>
<input type="hidden" name="ogidoc" id="ogidoc">
<label>PARTICIPANTE</label>
<input type="text" disabled=""
style="text-transform:uppercase; font-size: 14pt; display:none"
class="form-control " id="idinsev" name="evaNombr">
<input type="text" disabled=""
style="text-transform:uppercase; font-size: 14pt" class="form-control"
id="evaNombr" name="evaNombr">
</div>
<div class="modal-body">
<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse">
<a href='javascript:openEditeva()' id="abrirev"
style="font-size:22px"> <i class="fa fa-edit"></i> </a>
<a href='javascript:cerrarEditeva()' id="cerrareval"
style="display:none; font-size: 22px"> <i class="fa fa-ban"></i>
</a>
</button>
</div>
<div class="form-group">
<div class="col-sm-2">
<label>FOLIO:</label>
<input type="hidden" name="id_curso" id="id_curso">
<input type="text" name="codigocurso" id="codigocurso"
style="text-transform:uppercase;" class="form-control disabled"
disabled="">
</div>
<div class="col-sm-12">
<label>CURSO:</label>
<input type="text" name="idperon" id="idperon"
style="text-transform:uppercase;" class="form-control disabled"
disabled="">
</div>
<div class="col-sm-12">
<label>FECHA DE LA EVALUACIÓN:</label>
<input type="date" style="text-transform:uppercase;"
class="form-control disabled" disabled="" id='fechaev' value="<?php echo date('Y-m-d');?>">

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
<!-- TODO -->
<td><input type="number"
title="el numero no debe ser superior a 100"
name="cantidad" min="0" max="99999" maxlength="3"
style="text-transform:uppercase;"
class="evaluacion form-control disabled" disabled=""
id='validoev' onchange="cambiartexto()"></td>
<td><span class='label label-primary'
style="font-size:18px;"
id='PE'>PENDIENTE</span><span
class='label label-success'
style="font-size:18px; display:none"
id='SIe'>APROBADO</span><span
class='label label-danger'
style="font-size:18px; display:none"
id='NOE'>REPROBADO</span>
</td>

</tr>
</tbody>
</table>

</div>

<div class="col-sm-12">
<textarea class="col-sm-12" name="comentarios" id="comeneva"
rows="4" cols="10" onkeyup="mayus(this);"
style="font-size: 14px; border-radius: 5px;"
placeholder="Comentarios Adicionales" disabled=""></textarea>
</div>
</div>

<div class="form-group">
<div class="col-sm-5">
<button type="button" class="btn btn-primary"
onclick="cerrareval()">ACEPTAR</button>
</div>
<b>
<p class="alert alert-warning text-center padding error"
id="dangerev">Error al
Evaluar!!
</b>
<b>
<p class="alert alert-success text-center padding exito"
id="succeev">¡Se Evaluo
con
exito!</p>
</b>
<b>
<p class="alert alert-warning text-center padding aviso"
id="emptyev">Falto
Ingresar
la Puntuación!</p>
</b>
<b>
<p class="alert alert-warning text-center padding aviso"
id="emptyev1">Falto
Ingresar la Fecha!</p>
</b>
</div>
</div>
</div>
</div>
</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<form class="form-horizontal" action="" method="POST" id="avaluacion">
<div class="col-xs-12 col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal fade" id="modal-masiva">
<div class="modal-dialog modal-lg">
<div class="modal-content" style="width: 1100px;">
<div class="modal-header">
<button type="button" class="close" style="font-size: 22px"
data-dismiss="modal" aria-label="Close">
<span aria-hidden="true" style="font-size: 22px">&times;</span></button>
<p>
<h4 class="modal-title" style="text-align:center;">GENERACIÓN DE CONSTANCIAS DE PARTICIPANTES</h4><br>
<div class="col-sm-12">
<div id="generacion"></div>
</div>
</p>
</div>
<div class="modal-body">
<div class="form-group">
<div class="col-sm-5">
<button type="button" class="btn btn-primary"
onclick="generar()">ACEPTAR</button>
</div>
<b>
<p class="alert alert-warning text-center padding error"
id="dangerev">Error al
Evaluar!!
</b>
<b>
<p class="alert alert-success text-center padding exito"
id="succeev">¡Se Evaluo
con
exito!</p>
</b>
<b>
<p class="alert alert-warning text-center padding aviso"
id="emptyev">Falto
Ingresar
la Puntuación!</p>
</b>
<b>
<p class="alert alert-warning text-center padding aviso"
id="emptyev1">Falto
Ingresar la Fecha!</p>
</b>
</div>
</div>
</div>
</div>
</div>
</form>

<form class="form-horizontal" action="" method="POST" id="avaluacion">
<div class="col-xs-12 col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal fade" id="modal-evalua">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" style="font-size: 22px"
data-dismiss="modal" aria-label="Close">
<span aria-hidden="true" style="font-size: 22px">&times;</span></button>
<p>
<h4 class="modal-title" style="text-align:center;"><b>EVALUACIÓN DE
RESULTADOS</b></h4>
<br>
<div class="col-sm-12">
<div id="evaluacion"></div>
</div>
</p>
</div>
<div class="modal-body">
<div class="form-group">
<div style="margin-left: 3em" class="col-sm-offset-0 col-sm-5">
<button type="button" class="btn btn-primary"
onclick="evalresult()">ACEPTAR</button>
</div>
<b>
<p class="alert alert-danger text-center padding error"
id="danger1">Error al
evaluar!!
</b>
<b>
<p class="alert alert-success text-center padding exito"
id="exito1">¡Se evaluo
con
exito!</p>
</b>
<b>
<p class="alert alert-warning text-center padding aviso"
id="emptyev">Falto
Ingresar
la Puntuación!</p>
</b>
<b>
<p class="alert alert-warning text-center padding aviso"
id="emptyev1">Falto
Ingresar la Fecha!</p>
</b>
</div>
</div>
</div>
</div>
</div>
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
<input type="text" name="id_cursoc" id="id_cursoc"
style="text-transform:uppercase;" class="form-control disabled" disabled="">
</div>
<div class="col-sm-10">
<label>PARTICIPANTE</label>
<input type="text" disabled=""
style="text-transform:uppercase; font-size: 14pt; display:none;"
class="form-control " id="idinsevc1" name="idinsevc1">
<input type="text" disabled="" style="text-transform:uppercase; font-size: 14pt"
class="form-control" id="evaNombrc" name="evaNombrc">
</div>
<div class="col-sm-12">
<label>CURSO:</label>
<input type="text" name="idperonc" id="idperonc"
style="text-transform:uppercase;" class="form-control disabled" disabled="">
<input type="text" disabled=""
style="text-transform:uppercase; font-size: 14pt; display:none;"
class="form-control " id="copnum" name="copnum">
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

<i class="" id="che1" disabled
style="color:green; font-size: 16pt"></i></span>
<!-- <i class="fa fa-exclamation" id="chep1" disabled style="color:#CD8704; font-size: 16pt"></i></span> -->
</td>

</tr>
<tr>
<td>
LISTA DE REGISTRO
</td>
<td>
<!-- <input style="width:16px; height:16px;" value="SI" id="check2c" type="checkbox" name="check-box" /> <span></span> -->
<i class="" id="check2c" disabled
style="color:green; font-size: 16pt"></i></span>
</td>

</tr>
<tr>
<td>
LISTA DE ASISTENCIA
</td>
<td>
<!-- <input style="width:16px; height:16px;" value="SI" id="check3c" type="checkbox" name="check-box" /> <span></span> -->
<i class="" id="check3c" disabled
style="color:green; font-size: 16pt"></i></span>
</td>
</tr>
<tr>
<td>
REPORTES DE INCIDENCIAS
</td>
<td>
<!-- <input style="width:16px; height:16px;" value="SI" id="check4c" type="checkbox" name="check-box" /> <span></span> -->
<i class="" id="check4c" disabled
style="color:green; font-size: 16pt"></i></span>
</td>

</tr>
<tr>
<td>
CARTAS DESCRIPTIVAS
</td>
<td>
<!-- <input style="width:16px; height:16px;" value="SI" id="check5c" type="checkbox" name="check-box" /> <span></span> -->
<i class="" id="check5c" disabled
style="color:green; font-size: 16pt"></i></span>
</td>

</tr>
<tr>
<td>
EVALUACIÓN POR PARTICIPANTE
</td>
<td>
<i class="fa fa-check" id="che6" disabled
style="color:green; font-size: 16pt"></i></span>
</td>
</tr>
<tr>
<td>
REGISTRO DE PONDERACIÓN
</td>
<td>
<!-- <input style="width:16px; height:16px;" value="SI" id="check7c" type="checkbox" name="check-box" /> <span></span> -->
<i class="" id="check7c" disabled
style="color:green; font-size: 16pt"></i></span>
</td>
</tr>
<tr>
<td>
INFORME FINAL
</td>
<td>
<!-- <input style="width:16px; height:16px;" value="SI" id="check8c" type="checkbox" name="check-box" /> <span></span> -->
<i class="" id="check8c" disabled
style="color:green; font-size: 16pt"></i></span>
</td>
</tr>
<tr>
<td>
EVALUACIÓN DE REACCIÓN
</td>
<td>
<!-- <input style="width:16px; height:16px;" value="SI" id="check9c" type="checkbox" name="check-box" /> <span></span> -->
<i class="" id="check9c" disabled
style="color:green; font-size: 16pt"></i></span>
<!-- <i class="fa fa-check" id="che91" disabled style="color:green; font-size: 16pt; display:none;"></i></span>         -->
</td>
</tr>
</tbody>
</table>
</div>
</div>

<div class="form-group">
<div class="col-sm-5">
<button type="button" id="guaacredit" onclick="vergenercerf()"
class="btn btn-info altaboton"
style="font-size:16px; width:110px; height:35px; display:none;">ACEPTAR</button>
<button type="button" id="actacredit" onclick="" class="btn btn-info altaboton"
style="font-size:16px; width:110px; height:35px; display:none;">ACTUALIZAR</button>
</div>
<b>
<p class="alert alert-warning text-center padding error" id="cerdangerev">Error
al
Acreditar!!
</b>
<b>
<p class="alert alert-warning text-center padding aviso" id="ceravisos">Error al
Acreditar!!
</b>
<b>
<p class="alert alert-success text-center padding exito" id="cersucceev">¡Se
Acredito con
exito!</p>
</b>
</div>
</div>
</div>
</div>
</div>
</form>
<!-- /.content -->

</section>
<!-- /.content -->
</div>

<!-- fin del chechk list para copletar iun certificado -->

<!-- /.content-wrapper -->
<footer class="main-footer">
<div class="pull-right hidden-xs">
<b>Version</b> <?php 
$query ="SELECT * FROM
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
    $("#acreeditados").show();
$(document).ready(function() {
    $.fn.dataTableExt.errMode = 'ignore';  
    var table = $('#example').DataTable({

        "language": {
            "searchPlaceholder": "Buscar datos...",
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        "order": [
            [7, "DESC"]
        ],
        "ajax": "../php/cursosAcred.php",
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<a href='javascript:openCurso()' id='example' title='Detalle del curso' class='datos btn btn-default' ><i class='fa fa-list-alt text-success'></i></a> <a type='button' class='asiste btn btn-default' data-toggle='modal' data-target='#modal-participnt'><i class='fa fa-user-plus text-info'></i></a> <a href='#' onclick='eliminar({$gstIdlsc})' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger'></i></a>"

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
        // alert( "Es el ID: "+ data );
        $.ajax({
            url: '../php/lisCurso.php',
            type: 'POST'
        }).done(function(resp) {

            obj = JSON.parse(resp);
            var res = obj.data;
            var x = 0;
            
            $("#acreeditados").show();

            for (i = 0; i < res.length; i++) {
                if (obj.data[i].id_curso == data[8]) {
                    cursos =
                        obj.data[i].gstIdlsc +
                        "*" + obj.data[i].gstTitlo +
                        "*" + obj.data[i].gstTipo +
                        "*" + obj.data[i].gstPrfil +
                        "*" + obj.data[i].gstCntnc +
                        "*" + obj.data[i].gstDrcin +
                        "*" + obj.data[i].gstVignc +
                        "*" + obj.data[i].gstObjtv +
                        "*" + obj.data[i].hcurso +
                        "*" + obj.data[i].fcurso +
                        "*" + obj.data[i].fechaf +
                        "*" + obj.data[i].idinst +
                        "*" + obj.data[i].sede +
                        "*" + obj.data[i].link +
                        "*" + obj.data[i].modalidad +
                        "*" + obj.data[i].codigo +
                        "*" + obj.data[i].proceso +
                        "*" + obj.data[i].idinsp +
                        "*" + obj.data[i].contracur +
                        "*" + obj.data[i].classroom;

                    var d = cursos.split("*");

                    gstIdlsc = d[0];
                    $("#impri #codigoCurso").val(d[15]);
                    $("#impri #gstIdlstc").val(d[0]);
                    $("#impri #gstTitulo").val(d[1]);

                    $("#idperonc").val(d[1]);
                    $("#avaluacion #idperon").val(d[1]);

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
                    if (d[13] == '0') {
                        $("#Dtall #linkcur").val(d[13]);
                        $("#Dtall #contracur").val(d[18]);
                        $("#dismod").hide();
                        $("#disocl").show();
                    } else {
                        $("#Dtall #linkcur").val(d[13]);
                        $("#Dtall #contracur").val(d[18]);
                        $("#dismod").show();
                        $("#disocl").hide();
                    }

                    $("#Dtall #codigo").val(d[15]);
                    $("#Dtall #proceso").val(data[18]);
                    $("#Dtall #codigoIDCuro").val(d[15]);
                    codigo = d[15];

                    idcurso(codigo);
                    if (data[18] == 'FINALIZADO' || data[18] == 'VENCIDO') {
                        $("#buttonfin").hide();
                        $("#editcurs").hide();
                        $("#notiocu").hide();
                        $("#notiocus").hide();
                        $("#ocubotn").hide();
                        document.getElementById('modalMost').disabled = false;  
                        document.getElementById('allselect').disabled = true; 

                    } else {
                        $("#buttonfin").show();
                        $("#editcurs").show();
                        $("#notiocu").show();
                        $("#notiocus").show();
                    }
                    $("#Dtall #classromcur").val(d[19]);
                }
            }
        })


        modalidadcur = document.getElementById('modalidads').value; //variable para declara la modalidad
        dismod = document.getElementById(
            "dismod"); //variable para el contenedor de el link y la contraseña

        if (modalidadcur == "A DISTANCIA") { //se visualiza el link y contraseña 
            dismod.style.display = '';
        }
        if (modalidadcur == "HIBRIDO") { //se visualiza el link y contraseña 
            linidismodnpu.style.display = '';
        }
        if (modalidadcur == "PRESENCIAL") { //se oculta el link y la contraseña
            dismod.style.display = 'none';
        }

    });

});

function idcurso(codigo) {

    var id = codigo

    var tableCursosProgramados = $('#data-table-cursosProgramados').DataTable({
        "ajax": {
            "url": "../php/cursosProgramados.php",
            "type": "GET",
            "data": function(d) {
                d.id = id;
            }
        },


        "language": {

            "searchPlaceholder": "Buscar datos...",
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },

    });

}


function id_cursos(idp) {

    $.ajax({
        url: '../php/curLista.php',
        type: 'POST'
    }).done(function(resp) {

        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;

        for (i = 0; i < res.length; i++) {
            if (obj.data[i].id_curso == idp) {


                //DETALLES CURSOS DECLINADOS

                var toma1 = "",
                    toma2 = "",
                    toma3 = "",
                    toma4 = ""; //declaramos las columnas NOMBRE DEL CURSO
                toma1 += obj.data[i].gstNombr; //NOMBRE DEL CURSO  
                toma2 += obj.data[i].gstApell; //PDF
                toma3 += obj.data[i].confirmar; //PDF 
                toma4 += obj.data[i].justifi; //PDF  

                $("#nomdeclina1").text(toma1 + " " + toma2); // Label esta en valor.php
                $("#declinpdf1").attr('href', toma2); // Label esta en valor.php
                $("#motivod1").text('Motivo:' + toma3); // Label esta en valor.php
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
            }
        }
    })
}


function detalles(tbody, table) {

    $(tbody).on("click", "a.eliminar", function() {
        var data = table.row($(this).parents("tr")).data();

        //var gstIdlsc = $().val(data.gstIdlsc);
        $("#modal-eliminar #codigos").val(data[9]);
        $("#modal-eliminar #cgstTitlo").html(data[1] + '?');

        if (data[18] == 'FINALIZADO' || data[18] == 'VENCIDO') {
            $("#cancela").show();
        } else {
            $("#cancela").show();
        }

    });
}

function agrinspctor(tbody, table) {

    $(tbody).on("click", "a.asiste", function() {
        var data = table.row($(this).parents("tr")).data();

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
        $("#Prtcpnt #contracceso").val(data[19]);
        $("#Prtcpnt #classroom").val(data[20]);

        if (data[18] == 'FINALIZADO' || data[18] == 'VENCIDO') {
            $("#buttons").hide();
        } else {
            $("#buttons").show();
        }


    });
}


</script>
<script type="text/javascript" src="../js/lisCurso.js"></script>
<style>
#example input {
    width: 50% !important;
}
</style>
<!-- <script src="../dist/js/multiples-correos.js"></script> -->
