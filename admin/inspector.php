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
                                <?php
$data = mysqli_fetch_array($generate);
if(isset($data['base64']) == ''){ ?>

                                <img class='profile-user-img img-responsive img-circle' src='../dist/img/perfil.png'
                                    alt='User profile picture'>
                                <center><a href="#"><span data-toggle="modal" data-target="#ProfileModal"
                                            style="paddint-top: 90px; font-size: 10px;">AGREGAR FOTO DE
                                            PERFIL</span></a></center>

                                <?php } else{ ?>
                                <img class='profile-user-img img-responsive img-circle'
                                    src='<?php echo $data['base64']?>' alt='User profile picture'>

                                <center><a href="#"><span data-toggle="modal" data-target="#ProfileModal"
                                            style="paddint-top: 90px; font-size: 10px;">ACTUALIZAR FOTO DE
                                            PERFIL</span></a></center>

                                <?php } ?>


                                <!-- PROFILE MODAL -->
                                <div class="modal fade" id="ProfileModal" tabindex="-1" role="dialog"
                                    aria-labelledby="ProfileModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>

                                                <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR FOTO DE PERFIL
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <form id="Editar" method="POST">

                                                    <?php 
if(isset($data['base64']) == ''){ ?>

                                                    <input type="hidden" name="opciones" id="opciones" value="agregar">
                                                    <?php }else{ ?>
                                                    <input type="hidden" name="opciones" id="opciones" value="editar">
                                                    <?php } ?>


                                                    <input type="text" name="id_persona" id="id_persona"
                                                        value="<?php echo $datos[0]?>" hidden>
                                                    <input type="file" name="image"
                                                        accept="image/png, image/gif, image/jpeg" id="image">
                                                    <input type="datetime" name="date"
                                                        value="<?php echo date("Y-m-d");?>" id="date" hidden>
                                                    <div class="form-group">
                                                        <!-- Editor donde se recortará la imagen con la ayuda de croppr.js -->
                                                        <div class="col-sm">
                                                            <div style="height:1px; width: 300px;" id="editor"></div>
                                                        </div>
                                                        <div class="col-sm">
                                                            <canvas style="width: 300px;" id="preview"></canvas>
                                                        </div>
                                                        <code name="base64" id="base64" hidden></code>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" onclick="uploadProfile()"
                                                    class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


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

                                <form class="form-horizontal" action="" method="POST">

                                    <div class="modal fade" id="modal-evalcurso">
                                        <div class="modal-dialog width" role="document" style="/*margin-top: 10em;*/">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h3><i class="fa fa-question-circle" style="color:#08308A"></i>
                                                        EVALUACIÓN DE REACCIÓN
                                                    </h3>
                                                    <br>
                                                    <b>
                                                        <label1 style="font-size: 14px">EL OBJETIVO DE ESTA EVALUACIÓN,
                                                            ES CONOCER LA OPINIÓN ACERCA
                                                            DE LA EFICACIA DEL CURSO Y SU DESARROLLO, LO QUE PERMITE
                                                            ESTABLECER ACCIONES DE MEJORA
                                                            CONTINUA HACIA LA CAPACITACIÓN.</label1>
                                                    </b>
                                                    <br>
                                                    <section class="content">





                                                        <div class="row">
                                                            <!-- <img src="../dist/img/AFAC2.png" alt="Descripción de la imagen"> -->
                                                            <div class="col-md-12">
                                                                <div class="nav-tabs-custom">
                                                                    <div class="box-header with-border">
                                                                        <form action="" class="formulario1">
                                                                            <input type="hidden" name="idcursoen"
                                                                                id="idcursoen">

                                                                            <div class="radio">
                                                                                <div class="form-group ">
                                                                                    <div class="col-sm-8">
                                                                                        <label
                                                                                            style="font-size:16px">FOLIO
                                                                                            DEL CURSO:</label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <input class="col-sm-2"
                                                                                            type="text" name="codigo"
                                                                                            id="codigo"
                                                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                                                            disabled="">
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <label
                                                                                            style="font-size:16px">NOMBRE
                                                                                            DEL CURSO:</label>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <input class="col-sm-12"
                                                                                            type="text"
                                                                                            name="nomcursoen"
                                                                                            id="nomcursoen"
                                                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                                                            disabled="">
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <label
                                                                                            style="font-size:16px">NOMBRE
                                                                                            DE LAS/LOS
                                                                                            INSTRUCTORAS/ES:</label>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <input class="col-sm-12"
                                                                                            type="text"
                                                                                            name="id_instruct"
                                                                                            id="id_instruct"
                                                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                                                            disabled="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>
                                                        <h3 style="COLOR:#08308A" for="">I. INSTRUCTOR/A</h3>
                                                        </p>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form1" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">SE ESPECIFICÓ LOS
                                                                                OBJETIVOS AL INICIO DEL CURSO, EN FORMA
                                                                                CLARA Y COMPRENSIBLE? <span
                                                                                    id="span1">*</span></h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg1"
                                                                                            value="DEFICIENTE" id="r1"
                                                                                            required>
                                                                                        <label
                                                                                            for="r1">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg1"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r2">
                                                                                        <label for="r2">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg1"
                                                                                            value="REGULAR" id="r3">
                                                                                        <label for="r3">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg1"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r4">
                                                                                        <label
                                                                                            for="r4">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg1"
                                                                                            value="EXCELENTE" id="r5">
                                                                                        <label
                                                                                            for="r5">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>


                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form2" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">DEMOSTRÓ DOMINIO
                                                                                ADECUADO DEL TEMA?<span
                                                                                    id="span2">*</span></h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg2"
                                                                                            value="DEFICIENTE" id="r6">
                                                                                        <label
                                                                                            for="r6">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg2"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r7">
                                                                                        <label for="r7">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg2"
                                                                                            value="REGULAR" id="r8">
                                                                                        <label for="r8">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg2"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r9">
                                                                                        <label
                                                                                            for="r9">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg2"
                                                                                            value="EXCELENTE" id="r10">
                                                                                        <label
                                                                                            for="r10">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form3" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">SE APEGÓ AL
                                                                                TEMARIO?<span id="span3">*</span></h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg3"
                                                                                            value="DEFICIENTE" id="r11">
                                                                                        <label
                                                                                            for="r11">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg3"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r12">
                                                                                        <label for="r12">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg3"
                                                                                            value="REGULAR" id="r13">
                                                                                        <label for="r13">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg3"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r14">
                                                                                        <label
                                                                                            for="r14">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg3"
                                                                                            value="EXCELENTE" id="r15">
                                                                                        <label
                                                                                            for="r15">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form4" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">UTILIZÓ UN LENGUAJE
                                                                                SENCILLO Y COMPRENSIBLE DURANTE LA
                                                                                SESIÓN?<span id="span4">*</span></h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg4"
                                                                                            value="DEFICIENTE" id="r16">
                                                                                        <label
                                                                                            for="r16">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg4"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r17">
                                                                                        <label for="r17">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg4"
                                                                                            value="REGULAR" id="r18">
                                                                                        <label for="r18">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg4"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r19">
                                                                                        <label
                                                                                            for="r19">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg4"
                                                                                            value="EXCELENTE" id="r20">
                                                                                        <label
                                                                                            for="r20">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form5" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">ATENDIÓ CLARA Y
                                                                                OPORTUNAMENTE LAS DUDAS Y REACTIVOS DE
                                                                                LOS PARTICIPANTES?<span
                                                                                    id="span5">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg5"
                                                                                            value="DEFICIENTE" id="r21">
                                                                                        <label
                                                                                            for="r21">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg5"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r22">
                                                                                        <label for="r22">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg5"
                                                                                            value="REGULAR" id="r23">
                                                                                        <label for="r23">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg5"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r24">
                                                                                        <label
                                                                                            for="r24">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg5"
                                                                                            value="EXCELENTE" id="r25">
                                                                                        <label
                                                                                            for="r25">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form6" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">PLANEÓ Y DIRIGIÓ
                                                                                ADECUADAMENTE LA SESIÓN?<span
                                                                                    id="span6">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg6"
                                                                                            value="DEFICIENTE" id="r26">
                                                                                        <label
                                                                                            for="r26">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg6"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r27">
                                                                                        <label for="r27">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg6"
                                                                                            value="REGULAR" id="r28">
                                                                                        <label for="r28">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg6"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r29">
                                                                                        <label
                                                                                            for="r29">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg6"
                                                                                            value="EXCELENTE" id="r30">
                                                                                        <label
                                                                                            for="r30">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form7" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">DESPERTÓ EL INTERÉS
                                                                                DEL GRUPO CON RESPECTO A LOS CONTENIDOS?
                                                                                <span id="span7">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg7"
                                                                                            value="DEFICIENTE" id="r31">
                                                                                        <label
                                                                                            for="r31">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg7"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r32">
                                                                                        <label for="r32">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg7"
                                                                                            value="REGULAR" id="r33">
                                                                                        <label for="r33">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg7"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r34">
                                                                                        <label
                                                                                            for="r34">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg7"
                                                                                            value="EXCELENTE" id="r35">
                                                                                        <label
                                                                                            for="r35">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form8" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">FUE PUNTUAL DURANTE LA
                                                                                SESIÓN?<span id="span8">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg8"
                                                                                            value="DEFICIENTE" id="r36">
                                                                                        <label
                                                                                            for="r36">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg8"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r37">
                                                                                        <label for="r37">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg8"
                                                                                            value="REGULAR" id="r38">
                                                                                        <label for="r38">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg8"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r39">
                                                                                        <label
                                                                                            for="r39">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg8"
                                                                                            value="EXCELENTE" id="r40">
                                                                                        <label
                                                                                            for="r40">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form9" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">PROPICIÓ UN CLIMA DE
                                                                                COLABORACIÓN Y RESPETO ENTRE LOS
                                                                                PARTICIPANTES?<span id="span9">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg9"
                                                                                            value="DEFICIENTE" id="r41">
                                                                                        <label
                                                                                            for="r41">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg9"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r42">
                                                                                        <label for="r42">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg9"
                                                                                            value="REGULAR" id="r43">
                                                                                        <label for="r43">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg9"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r44">
                                                                                        <label
                                                                                            for="r44">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg9"
                                                                                            value="EXCELENTE" id="r45">
                                                                                        <label
                                                                                            for="r45">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form10" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">EXPLICÓ CON CLARIDAD
                                                                                LAS INSTRUCCIONES DE LAS ACTIVIDADES
                                                                                REALIZADAS?<span id="span10">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg10"
                                                                                            value="DEFICIENTE" id="r46">
                                                                                        <label
                                                                                            for="r46">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg10"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r47">
                                                                                        <label for="r47">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg10"
                                                                                            value="REGULAR" id="r48">
                                                                                        <label for="r48">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg10"
                                                                                            value="REGULAR" id="r49">
                                                                                        <label
                                                                                            for="r49">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg10"
                                                                                            value="EXCELENTE" id="r50">
                                                                                        <label
                                                                                            for="r50">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form11" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">TUVO UN CONTROL
                                                                                ADECUADO DEL GRUPO?<span
                                                                                    id="span11">*</span></h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg11"
                                                                                            value="DEFICIENTE" id="r51">
                                                                                        <label
                                                                                            for="r51">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg11"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r52">
                                                                                        <label for="r52">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg11"
                                                                                            value="REGULAR" id="r53">
                                                                                        <label for="r53">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg11"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r54">
                                                                                        <label
                                                                                            for="r54">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg11"
                                                                                            value="EXCELENTE" id="r55">
                                                                                        <label
                                                                                            for="r55">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form12" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">EXPLICÓ LOS CRITERIOS
                                                                                DE EVALUACIÓN DE LA SESIÓN?<span
                                                                                    id="span12">*</span></h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg12"
                                                                                            value="DEFICIENTE" id="r56">
                                                                                        <label
                                                                                            for="r56">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg12"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r57">
                                                                                        <label for="r57">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg12"
                                                                                            value="REGULAR" id="r58">
                                                                                        <label for="r58">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg12"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r59">
                                                                                        <label
                                                                                            for="r59">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg12"
                                                                                            value="EXCELENTE" id="r60">
                                                                                        <label
                                                                                            for="r60">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <b>
                                                            <h3 style="COLOR:#08308A" for="">II.CONTENIDO</h3>
                                                        </b>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form13" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">LOS CONOCIMIENTOS
                                                                                ADQUIRIDOS SON APLICABLES A TU PUESTO DE
                                                                                TRABAJO? <span id="span13">*</span></h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg13"
                                                                                            value="DEFICIENTE" id="r61">
                                                                                        <label
                                                                                            for="r61">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg13"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r62">
                                                                                        <label for="r62">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg13"
                                                                                            value="REGULAR" id="r63">
                                                                                        <label for="r63">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg13"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r64">
                                                                                        <label
                                                                                            for="r64">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg13"
                                                                                            value="EXCELENTE" id="r65">
                                                                                        <label
                                                                                            for="r65">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form14" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">CONSIDERAS QUE EL
                                                                                CONTENIDO DEL CURSO FUE
                                                                                SUFICIENTE? <span id="span14">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg14"
                                                                                            value="DEFICIENTE" id="r66">
                                                                                        <label
                                                                                            for="r66">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg14"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r67">
                                                                                        <label for="r67">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg14"
                                                                                            value="REGULAR" id="r68">
                                                                                        <label for="r68">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg14"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r69">
                                                                                        <label
                                                                                            for="r69">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg14"
                                                                                            value="EXCELENTE" id="r70">
                                                                                        <label
                                                                                            for="r70">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form15" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">LA SESIÓN CUBRIÓ TUS
                                                                                EXPECTATIVAS? <span id="span15">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg15"
                                                                                            value="DEFICIENTE" id="r71">
                                                                                        <label
                                                                                            for="r71">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg15"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r72">
                                                                                        <label for="r72">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg15"
                                                                                            value="REGULAR" id="r73">
                                                                                        <label for="r73">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg15"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r74">
                                                                                        <label
                                                                                            for="r74">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg15"
                                                                                            value="EXCELENTE" id="r75">
                                                                                        <label
                                                                                            for="r75">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form16" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">EL CONTENIDO AUMENTÓ
                                                                                MIS CONOCIMIENTOS Y COMPRENSIÓN DEL TEMA
                                                                                EXPUESTO? <span id="span16">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg16"
                                                                                            value="DEFICIENTE" id="r76">
                                                                                        <label
                                                                                            for="r76">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg16"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r77">
                                                                                        <label for="r77">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg16"
                                                                                            value="REGULAR" id="r78">
                                                                                        <label for="r78">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg16"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r79">
                                                                                        <label
                                                                                            for="r79">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg16"
                                                                                            value="EXCELENTE" id="r80">
                                                                                        <label
                                                                                            for="r80">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form17" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">LA DURACIÓN DE LA
                                                                                SESIÓN FUE LA MÁS APROPIADA PARA CUMPLIR
                                                                                EL OBJETIVO? <span id="span17">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg17"
                                                                                            value="DEFICIENTE" id="r81">
                                                                                        <label
                                                                                            for="r81">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg17"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r82">
                                                                                        <label for="r82">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg17"
                                                                                            value="REGULAR" id="r83">
                                                                                        <label for="r83">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg17"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r84">
                                                                                        <label
                                                                                            for="r84">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg17"
                                                                                            value="EXCELENTE" id="r85">
                                                                                        <label
                                                                                            for="r85">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <b>
                                                            <h3 style="COLOR:#08308A" for="">III.COORDINACIÓN </h3>
                                                        </b>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form18" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">EL TIEMPO CON EL QUE
                                                                                RECIBIÓ LA INFORMACIÓN (INVITACIÓN,
                                                                                TEMARIO, ETC.) A LA SESIÓN FUE
                                                                                ADECUADO?<span id="span18">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg18"
                                                                                            value="DEFICIENTE" id="r86">
                                                                                        <label
                                                                                            for="r86">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg18"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r87">
                                                                                        <label for="r87">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg18"
                                                                                            value="REGULAR" id="r88">
                                                                                        <label for="r88">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg18"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r89">
                                                                                        <label
                                                                                            for="r89">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg18"
                                                                                            value="EXCELENTE" id="r90">
                                                                                        <label
                                                                                            for="r90">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form19" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">CÓMO FUE EL SERVICIO
                                                                                DE CAFÉ PROPORCIONADO?<span
                                                                                    id="span19">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg19"
                                                                                            value="DEFICIENTE" id="r91">
                                                                                        <label
                                                                                            for="r91">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg19"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r92">
                                                                                        <label for="r92">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg19"
                                                                                            value="REGULAR" id="r93">
                                                                                        <label for="r93">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg19"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r94">
                                                                                        <label
                                                                                            for="r94">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg19"
                                                                                            value="EXCELENTE" id="r95">
                                                                                        <label
                                                                                            for="r95">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form20" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">LA DISPONIBILIDAD
                                                                                DEL/A COORDINADOR/A PARA RESPONDER DUDAS
                                                                                SOBRE EL SERVICIO FUE ADECUADA?<span
                                                                                    id="span20">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg20"
                                                                                            value="DEFICIENTE" id="r96">
                                                                                        <label
                                                                                            for="r96">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg20"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r97">
                                                                                        <label for="r97">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg20"
                                                                                            value="REGULAR" id="r98">
                                                                                        <label for="r98">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg20"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r99">
                                                                                        <label
                                                                                            for="r99">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg20"
                                                                                            value="EXCELENTE" id="r100">
                                                                                        <label
                                                                                            for="r100">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <b>
                                                            <h3 style="COLOR:#08308A" for="">IV.INSTALACIONES Y MATERIAL
                                                            </h3>
                                                        </b>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form21" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">CÓMO FUE EL MATERIAL
                                                                                DIDÁCTICO (MANUAL, ROTAFOLIOS,
                                                                                AUDIOVISUALES, PRESENTACIÓN)
                                                                                UTILIZADO?<span id="span21">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg21"
                                                                                            value="DEFICIENTE"
                                                                                            id="r101">
                                                                                        <label
                                                                                            for="r101">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg21"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r102">
                                                                                        <label for="r102">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg21"
                                                                                            value="REGULAR" id="r103">
                                                                                        <label
                                                                                            for="r103">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg21"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r104">
                                                                                        <label
                                                                                            for="r104">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg21"
                                                                                            value="EXCELENTE" id="r105">
                                                                                        <label
                                                                                            for="r105">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form22" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">SÍ EL MATERIAL DE LA
                                                                                SESIÓN SE ENTREGÓ EN TIEMPO?<span
                                                                                    id="span22">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg22"
                                                                                            value="DEFICIENTE"
                                                                                            id="r106">
                                                                                        <label
                                                                                            for="r106">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg22"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r107">
                                                                                        <label for="r107">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg22"
                                                                                            value="REGULAR" id="r108">
                                                                                        <label
                                                                                            for="r108">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg22"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r109">
                                                                                        <label
                                                                                            for="r109">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg22"
                                                                                            value="EXCELENTE" id="r110">
                                                                                        <label
                                                                                            for="r110">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form23" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">CÓMO FUERON LAS
                                                                                CONDICIONES DEL AULA PARA LA IMPARTICIÓN
                                                                                DE LA SESIÓN (LUZ, VENTILACIÓN,
                                                                                LIMPIEZA, COMODIDAD ETC.) ?<span
                                                                                    id="span23">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg23"
                                                                                            value="DEFICIENTE"
                                                                                            id="r111">
                                                                                        <label
                                                                                            for="r111">DEFICIENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg23"
                                                                                            value="NO SATISFACTORIO"
                                                                                            id="r112">
                                                                                        <label for="r112">NO
                                                                                            SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg23"
                                                                                            value="REGULAR" id="r113">
                                                                                        <label
                                                                                            for="r113">REGULAR</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg23"
                                                                                            value="SATISFACTORIO"
                                                                                            id="r114">
                                                                                        <label
                                                                                            for="r114">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg23"
                                                                                            value="EXCELENTE" id="r115">
                                                                                        <label
                                                                                            for="r115">EXCELENTE</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <b>
                                                            <h3 style="COLOR:#08308A" for="">V.COMENTARIOS Y SUGERENCIAS
                                                            </h3>
                                                        </b>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form24" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">MENCIONA ALGUNOS DE
                                                                                LOS APRENDIZAJES ADQUIRIDOS EN ESTA
                                                                                ACCIÓN DE CAPACITACIÓN Y SUS BENEFICIOS
                                                                                <span id="span24">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="text" name="preg24"
                                                                                            id="preg24"
                                                                                            class="col-sm-12"
                                                                                            onkeyup="mayus(this);"
                                                                                            placeholder="TU RESPUESTA"
                                                                                            style="background-color: #E5E7EC; border: 0; outline: none">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form25" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">MENCIONA ALGUNA MEJORA
                                                                                QUE SE PUDIERA REALIZAR A ESTE PROCESO
                                                                                DE APRENDIZAJE <span
                                                                                    id="span25">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="text" name="preg25"
                                                                                            id="preg25"
                                                                                            class="col-sm-12"
                                                                                            onkeyup="mayus(this);"
                                                                                            placeholder="TU RESPUESTA"
                                                                                            style="background-color: #E5E7EC; border: 0; outline: none">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form26" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">DÓNDE REALIZASTE TU
                                                                                CURSO? <span id="span14">*</span></h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body" id=preg26>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg26"
                                                                                            value="OFICINA" id="r116">
                                                                                        <label
                                                                                            for="r116">OFICINA</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg26" value="CASA"
                                                                                            id="r117">
                                                                                        <label for="r117">CASA</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg26"
                                                                                            value="CAFÉ INTERNET"
                                                                                            id="r118">
                                                                                        <label for="r118">CAFÉ
                                                                                            INTERNET</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio"
                                                                                            name="preg26" value="OTROS"
                                                                                            id="r119">
                                                                                        <label for="r119">OTROS</label>
                                                                                        <input type="text" name="otro"
                                                                                            id="otro"
                                                                                            onkeyup="mayus(this);"
                                                                                            placeholder="TU RESPUESTA"
                                                                                            style="background-color: #E5E7EC; border: 0; outline: none">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>




                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form27" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">COMPARTE TUS
                                                                                COMENTARIOS, QUEJAS, SUGERENCIAS...
                                                                                <span id="span16">*</span>
                                                                            </h3>
                                                                        </div>
                                                                        <form class="form-horizontal">
                                                                            <div class="box-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <textarea class="col-sm-12"
                                                                                            name="preg27" id="preg27"
                                                                                            rows="5" cols="40"
                                                                                            onkeyup="mayus(this);"
                                                                                            style="font-size: 18px; border-radius: 5px; background-color: #E5E7EC"
                                                                                            placeholder="ESCRIBE AQUÍ TUS COMENTARIOS"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>


                                                        <div class="box-body">
                                                            <div class="form-group"><br>
                                                                <div class="col-sm-offset-0 col-sm-5">

                                                                    <!-- <form id="impri" action="" method="POST"  >
<input type="hidden" class="form-control" id="gstIdlstc" name="gstIdlstc">

<button type="button" class="btn btn-info btn-lg" onclick="enviar();">ENVIAR</button>
</form> -->
                                                                    <div class="col-sm-5">
                                                                        <button type="button" class="btn btn-primary"
                                                                            onclick="evaluar()">ACEPTAR</button>
                                                                    </div>
                                                                </div>
                                                                <b>
                                                                    <p class="alert alert-danger text-center padding error"
                                                                        id="peligro">Error al agregar datos
                                                                    </p>
                                                                </b>
                                                                <b>
                                                                    <p class="alert alert-success text-center padding exito"
                                                                        id="enviadoexito">¡Su evaluación de reacción se
                                                                        realizó con éxito !</p>
                                                                </b>
                                                                <b>
                                                                    <p class="alert alert-info text-center padding error"
                                                                        id="aviso">Su evaluación de reacción fue
                                                                        realizada
                                                                    </p>
                                                                </b>
                                                                <b>
                                                                    <p class="alert alert-warning text-center padding error"
                                                                        id="pregunta">Pregunta obligatoria<strong
                                                                            style=";font-size: 1.7em"> *</strong>
                                                                    </p>
                                                                </b>

                                                            </div>
                                                        </div>




                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <script type="text/javascript" src="../js/encuestadatos.js"></script>
                                <?php include('../perfil/modal.php');?>
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




                </section>
            </div>
    </div>
    </div>
    </div>
    </form>
    <script type="text/javascript" src="../js/encuestadatos.js"></script>
    <?php include('../perfil/modal.php');?>
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
                        <div class="modal-title" id="myModalLabel"><span style="font-size: 15px;" id="titulo"></span>
                        </div>
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
    <script type="text/javascript" src="../js/cursos.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/gh/jamesssooi/Croppr.js@2.3.0/dist/croppr.min.js"></script>
    <link href="https://cdn.jsdelivr.net/gh/jamesssooi/Croppr.js@2.3.0/dist/croppr.min.css" rel="stylesheet" />
    <script src="../js/lisCurso.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {

        // Input File
        const inputImage = document.querySelector('#image');
        // Nodo donde estará el editor
        const editor = document.querySelector('#editor');
        // El canvas donde se mostrará la previa
        const miCanvas = document.querySelector('#preview');
        // Contexto del canvas
        const contexto = miCanvas.getContext('2d');
        // Ruta de la imagen seleccionada
        let urlImage = undefined;
        // Evento disparado cuando se adjunte una imagen
        inputImage.addEventListener('change', abrirEditor, false);

        /**
         * Método que abre el editor con la imagen seleccionada
         */
        function abrirEditor(e) {
            // Obtiene la imagen
            urlImage = URL.createObjectURL(e.target.files[0]);

            // Borra editor en caso que existiera una imagen previa
            editor.innerHTML = '';
            let cropprImg = document.createElement('img');
            cropprImg.setAttribute('id', 'croppr');
            editor.appendChild(cropprImg);

            // Limpia la previa en caso que existiera algún elemento previo
            contexto.clearRect(0, 0, miCanvas.width, miCanvas.height);

            // Envia la imagen al editor para su recorte
            document.querySelector('#croppr').setAttribute('src', urlImage);

            // Crea el editor
            new Croppr('#croppr', {
                aspectRatio: 1,
                startSize: [65, 65],
                onCropEnd: recortarImagen
            })
        }

        /**
         * Método que recorta la imagen con las coordenadas proporcionadas con croppr.js
         */
        function recortarImagen(data) {
            // Variables
            const inicioX = data.x;
            const inicioY = data.y;
            const nuevoAncho = data.width;
            const nuevaAltura = data.height;
            const zoom = 1;
            let imagenEn64 = '';
            // La imprimo
            miCanvas.width = nuevoAncho;
            miCanvas.height = nuevaAltura;
            // La declaro
            let miNuevaImagenTemp = new Image();
            // Cuando la imagen se carge se procederá al recorte
            miNuevaImagenTemp.onload = function() {
                // Se recorta
                contexto.drawImage(miNuevaImagenTemp, inicioX, inicioY, nuevoAncho * zoom, nuevaAltura *
                    zoom, 0, 0, nuevoAncho, nuevaAltura);
                // Se transforma a base64
                imagenEn64 = miCanvas.toDataURL("image/jpeg");
                // Mostramos el código generado
                document.querySelector('#base64').textContent = imagenEn64;
            }
            // Proporciona la imagen cruda, sin editarla por ahora
            miNuevaImagenTemp.src = urlImage;
        }
    });
    </script>

    <script>
    function uploadProfile() {
        var date = $("#date").val();
        var id_persona = $("#id_persona").val();
        var opciones = $("#opciones").val();
        var base64 = $("#base64").html();

        //alert(date + id_persona + opcion + base64);
        if (base64 == '') {
            Swal.fire({
                type: 'warning',
                customClass: 'swal-wide',
                timer: 2000,
                text: 'ES NECESARIO CARGAR UNA FOTO',
                showConfirmButton: false,
            });
        } else {
            $.ajax({
                type: "POST",
                url: "../php/insertProfile.php",
                data: {
                    id_persona: id_persona,
                    date: date,
                    opciones: opciones,
                    base64: base64
                },
                success: function(data) {
                    Swal.fire({
                type: 'success',
                customClass: 'swal-wide',
                timer: 3000,
                text: 'SE CARGÓ CON ÉXITO',
                showConfirmButton: false,
            });
                    setTimeout("location.href = 'inspector';", 3000);
                }
            });
        }

        return false;

    }
    </script>
</body>

</html>

<?php include('../perfil/cursos.php'); ?>