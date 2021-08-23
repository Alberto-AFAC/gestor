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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.2/sweetalert2.min.css"
        integrity="sha512-rogivVAav89vN+wNObUwbrX9xIA8SxJBWMFu7jsHNlvo+fGevr0vACvMN+9Cog3LAQVFPlQPWEOYn8iGjBA71w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.2/sweetalert2.min.js"
        integrity="sha512-2sjxi4MoP9Gn7QE0NhJdxOFVMK/qYsZO6JnO6pngGvck8p5UPwFX2LV5AsAMOQYgvbzMmki6sIqJ90YO3STAnA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                                        <b>Cursos programados</b> <a class="pull-right">
                                            <div id="programados"></div>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Cursos Completados</b> <a class="pull-right">
                                            <div id="completos"></div>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Cursos cancelados</b> <a class="pull-right">
                                            <div id="cancelados"></div>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Cursos vencidos</b> <a class="pull-right">
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

                                <hr>
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
                                <li class="active"><a href="#activity" data-toggle="tab">Cursos en proceso </a></li>
                                <li><a href="#curComplet" data-toggle="tab">Cursos programados</a></li>
                                <li><a href="#timeline" data-toggle="tab">Cursos completados</a></li>
                                <li><a href="#settings" data-toggle="tab">Cursos vencidos</a></li>
                                <li><a href="#settings" data-toggle="tab">Cursos cancelados</a></li>
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
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <form name="form1" action="" class="formulario1">
                                                                    <div class="radio">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title">SE ESPECIFICÓ LOS
                                                                                OBJETIVOS AL INICIO DEL CURSO,
                                                                                EN FORMA CLARA Y COMPRENSIBLE? <span
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
                                                                                            value="SATISFACTORIO"
                                                                                            id="r3">
                                                                                        <label
                                                                                            for="r3">SATISFACTORIO</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <input type="radio" name="preg1"
                                                                                            value="EXCELENTE" id="r4">
                                                                                        <label
                                                                                            for="r4">EXCELENTE</label>
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
                                                                    <h3 class="box-title">SE EXPLICÓ EL MODO DE
                                                                        EVALUACIÓN AL INICIO DEL CURSO? <span
                                                                            id="span2">*</span></h3>
                                                                </div>
                                                                <form class="form-horizontal">
                                                                    <div class="box-body">
                                                                        <div class="form-group">
                                                                            <div class="col-sm-12">
                                                                                <input type="radio" name="preg2"
                                                                                    value="DEFICIENTE" id="r5">
                                                                                <label for="r5">DEFICIENTE</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-sm-12">
                                                                                <input type="radio" name="preg2"
                                                                                    value="NO SATISFACTORIO" id="r6">
                                                                                <label for="r6">NO SATISFACTORIO</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-sm-12">
                                                                                <input type="radio" name="preg2"
                                                                                    value="SATISFACTORIO" id="r7">
                                                                                <label for="r7">SATISFACTORIO</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-sm-12">
                                                                                <input type="radio" name="preg2"
                                                                                    value="EXCELENTE" id="r8">
                                                                                <label for="r8">EXCELENTE</label>
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
                                                                <h3 class="box-title">EL INSTRUCTOR/A CONTESTÓ LAS DUDAS
                                                                    EN TIEMPO Y FORMA? <span id="span3">*</span></h3>
                                                            </div>
                                                            <form class="form-horizontal">
                                                                <div class="box-body">
                                                                    <div class="form-group">
                                                                        <div class="col-sm-12">
                                                                            <input type="radio" name="preg3"
                                                                                value="DEFICIENTE" id="r9">
                                                                            <label for="r9">DEFICIENTE</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-sm-12">
                                                                            <input type="radio" name="preg3"
                                                                                value="NO SATISFACTORIO" id="r10">
                                                                            <label for="r10">NO SATISFACTORIO</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-sm-12">
                                                                            <input type="radio" name="preg3"
                                                                                value="SATISFACTORIO" id="r11">
                                                                            <label for="r11">SATISFACTORIO</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-sm-12">
                                                                            <input type="radio" name="preg3"
                                                                                value="EXCELENTE" id="r12">
                                                                            <label for="r12">EXCELENTE</label>
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
                                                            <h3 class="box-title">LOS CONOCIMIENTOS ADQUIRIDOS SON
                                                                APLICABLES A TU PUESTO DE
                                                                TRABAJO? <span id="span4">*</span></h3>
                                                        </div>
                                                        <form class="form-horizontal">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        <input type="radio" name="preg4"
                                                                            value="DEFICIENTE" id="r13">
                                                                        <label for="r13">DEFICIENTE</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        <input type="radio" name="preg4"
                                                                            value="NO SATISFACTORIO" id="r14">
                                                                        <label for="r14">NO SATISFACTORIO</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        <input type="radio" name="preg4"
                                                                            value="SATISFACTORIO" id="r15">
                                                                        <label for="r15">SATISFACTORIO</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        <input type="radio" name="preg4"
                                                                            value="EXCELENTE" id="r16">
                                                                        <label for="r16">EXCELENTE</label>
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
                                                        <h3 class="box-title">CONSIDERAS QUE EL CONTENIDO DEL CURSO FUE
                                                            SUFICIENTE? <span id="span5">*</span></h3>
                                                    </div>
                                                    <form class="form-horizontal">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <input type="radio" name="preg5" value="DEFICIENTE"
                                                                        id="r17">
                                                                    <label for="r17">DEFICIENTE</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <input type="radio" name="preg5"
                                                                        value="NO SATISFACTORIO" id="r18">
                                                                    <label for="r18">NO SATISFACTORIO</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <input type="radio" name="preg5"
                                                                        value="SATISFACTORIO" id="r19">
                                                                    <label for="r19">SATISFACTORIO</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <input type="radio" name="preg5" value="EXCELENTE"
                                                                        id="r20">
                                                                    <label for="r20">EXCELENTE</label>
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
                                                <h3 class="box-title">EL CURSO CUBRIÓ TUS EXPECTATIVAS? <span
                                                        id="span6">*</span></h3>
                                            </div>
                                            <form class="form-horizontal">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <input type="radio" name="preg6" value="DEFICIENTE"
                                                                id="r21">
                                                            <label for="r21">DEFICIENTE</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <input type="radio" name="preg6" value="NO SATISFACTORIO"
                                                                id="r22">
                                                            <label for="r22">NO SATISFACTORIO</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <input type="radio" name="preg6" value="SATISFACTORIO"
                                                                id="r23">
                                                            <label for="r23">SATISFACTORIO</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <input type="radio" name="preg6" value="EXCELENTE" id="r24">
                                                            <label for="r24">EXCELENTE</label>
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
                                            <h3 class="box-title">EL CONTENIDO DEL CURSO AUMENTÓ TUS CONOCIMIENTOS Y
                                                COMPRENSIÓN DE LOS
                                                TEMAS REVISADOS? <span id="span7">*</span></h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg7" value="DEFICIENTE" id="r25">
                                                        <label for="r25">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg7" value="NO SATISFACTORIO"
                                                            id="r26">
                                                        <label for="r26">NO SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg7" value="SATISFACTORIO" id="r27">
                                                        <label for="r27">SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg7" value="EXCELENTE" id="r28">
                                                        <label for="r28">EXCELENTE</label>
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
                                        <h3 class="box-title">EL TIEMPO PARA ENTREGAR LAS ACTIVIDADES, FUE SUFICIENTE
                                            PARA CUMPLIR
                                            CON ELLAS? <span id="span8">*</span></h3>
                                    </div>
                                    <form class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="radio" name="preg8" value="DEFICIENTE" id="r29">
                                                    <label for="r29">DEFICIENTE</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="radio" name="preg8" value="NO SATISFACTORIO" id="r30">
                                                    <label for="r30">NO SATISFACTORIO</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="radio" name="preg8" value="SATISFACTORIO" id="r31">
                                                    <label for="r31">SATISFACTORIO</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="radio" name="preg8" value="EXCELENTE" id="r32">
                                                    <label for="r32">EXCELENTE</label>
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
                                    <h3 class="box-title">LA PRESENTACIÓN DEL CONTENIDO, FUE FÁCIL DE REVISAR? <span
                                            id="span9">*</span></h3>
                                </div>
                                <form class="form-horizontal">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="radio" name="preg9" value="DEFICIENTE" id="r33">
                                                <label for="r33">DEFICIENTE</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="radio" name="preg9" value="NO SATISFACTORIO" id="r34">
                                                <label for="r34">NO SATISFACTORIO</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="radio" name="preg9" value="SATISFACTORIO" id="r35">
                                                <label for="r35">SATISFACTORIO</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="radio" name="preg9" value="EXCELENTE" id="r36">
                                                <label for="r36">EXCELENTE</label>
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
                            <h3 class="box-title">LA EXPLICACIÓN DE LAS TAREAS, FUERON CLARAS Y SENCILLAS? <span
                                    id="span10">*</span></h3>
                        </div>
                        <form class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="radio" name="preg10" value="DEFICIENTE" id="r37">
                                        <label for="r37">DEFICIENTE</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="radio" name="preg10" value="NO SATISFACTORIO" id="r38">
                                        <label for="r38">NO SATISFACTORIO</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="radio" name="preg10" value="SATISFACTORIO" id="r39">
                                        <label for="r39">SATISFACTORIO</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="radio" name="preg10" value="EXCELENTE" id="r40">
                                        <label for="r40">EXCELENTE</label>
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
                        <h3 class="box-title">EL TIEMPO CON EL QUE RECIBIÓ LA INFORMACIÓN (INVITACIÓN, TEMARIO,
                            ETC.) AL CURSO FUE ADECUADO? <span id="span11">*</span></h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="radio" name="preg11" value="DEFICIENTE" id="r41">
                                    <label for="r41">DEFICIENTE</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="radio" name="preg11" value="NO SATISFACTORIO" id="r42">
                                    <label for="r42">NO SATISFACTORIO</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="radio" name="preg11" value="SATISFACTORIO" id="r43">
                                    <label for="r43">SATISFACTORIO</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="radio" name="preg11" value="EXCELENTE" id="r44">
                                    <label for="r44">EXCELENTE</label>
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
                        <h3 class="box-title">CÓMO FUE EL MATERIAL DIDÁCTICO (AUDIOVISUALES, PRESENTACIÓN, TEXTOS,
                            ENLACES) UTILIZADO? <span id="span12">*</span></h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="radio" name="preg12" value="DEFICIENTE" id="r45">
                                    <label for="r45">DEFICIENTE</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="radio" name="preg12" value="NO SATISFACTORIO" id="r46">
                                    <label for="r46">NO SATISFACTORIO</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="radio" name="preg12" value="SATISFACTORIO" id="r47">
                                    <label for="r47">SATISFACTORIO</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="radio" name="preg12" value="EXCELENTE" id="r48">
                                    <label for="r48">EXCELENTE</label>
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
            <form name="form13" action="" class="formulario1">
                <div class="radio">
                    <div class="box-header with-border">
                        <h3 class="box-title">MENCIONA ALGUNA MEJORA QUE SE PUDIERA REALIZAR A ESTE PROCESO DE
                            APRENDIZAJE <span id="span13">*</span></h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" name="preg13" id="preg13" class="col-sm-12"
                                        onkeyup="mayus(this);" placeholder="TU RESPUESTA"
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
            <form name="form14" action="" class="formulario1">
                <div class="radio">
                    <div class="box-header with-border">
                        <h3 class="box-title">DÓNDE REALIZASTE TU CURSO? <span id="span14">*</span></h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="box-body" id=pregunta14>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="radio" name="preg14" value="OFICINA" id="r49">
                                    <label for="r49">OFICINA</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="radio" name="preg14" value="CASA" id="r50">
                                    <label for="r50">CASA</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="radio" name="preg14" value="CAFÉ INTERNET" id="r51">
                                    <label for="r51">CAFÉ INTERNET</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="radio" name="preg14" value="OTROS" id="r52">
                                    <label for="r52">OTROS</label>
                                    <input type="text" name="otro" id="otro" onkeyup="mayus(this);"
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
            <form name="form15" action="" class="formulario1">
                <div class="radio">
                    <div class="box-header with-border">
                        <h3 class="box-title">DÓNDE REALIZASTE TU CURSO? <span id="span15">*</span></h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="radio" name="preg15" value="COMPUTADORA" id="r53" required>
                                    <label for="r53">COMPUTADORA</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="radio" name="preg15" value="TABLET" id="r54">
                                    <label for="r54">TABLET</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="radio" name="preg15" value="TELÉFONO" id="r55">
                                    <label for="r55">TELÉFONO</label>
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
                        <h3 class="box-title">COMPARTE TUS COMENTARIOS, QUEJAS, SUGERENCIAS... <span
                                id="span16">*</span></h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <textarea class="col-sm-12" name="preg16" id="preg16" rows="5" cols="40"
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
                    <button type="button" class="btn btn-primary" onclick="evaluar()">ACEPTAR</button>
                </div>
            </div>
            <b>
                <p class="alert alert-danger text-center padding error" id="peligro">Error al agregar datos
                </p>
            </b>
            <b>
                <p class="alert alert-success text-center padding exito" id="enviadoexito">¡Su evaluación de reacción se
                    realizó con éxito !</p>
            </b>
            <b>
                <p class="alert alert-info text-center padding error" id="aviso">Su evaluación de reacción fue realizada
                </p>
            </b>
            <b>
                <p class="alert alert-warning text-center padding error" id="pregunta">Pregunta obligatoria<strong
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
    <?php include('modal.php');?>
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

<?php $datos[0];?>


<script type="text/javascript">
var dataSet = [
    <?php 
$query = "
SELECT * FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND confirmar = 'CONFIRMAR' AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_curso'];

 $fcurso = $data['fcurso'] = date("d-m-Y");
 $fechaf = $data['fechaf'] = date("d-m-Y");
?>

    //console.log('<?php echo $id_curso ?>');

    ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

        "<a type='button' title='Confirmar asistencia' onclick='confirmar(<?php echo $id_curso ?>)' class='btn btn-warning' data-toggle='modal' data-target='#modal-confirma'>CONFIRMAR </a>"

        //"<a title='Evaluación' class='btn btn-danger' data-toggle='modal' data-target='#modal-asignar'>ASIGNAR</a>"

    ],
    <?php } ?>
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
SELECT * FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND proceso = 'PENDIENTE' AND cursos.estado = 0 || idinsp = $datos[0] AND confirmar = 'CONFIRMAR' AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_curso'];

 $fcurso = $data['fcurso'] = date("d-m-Y");
 $fechaf = $data['fechaf'] = date("d-m-Y");

if($data['confirmar']=='CONFIRMAR'){
$valor='POR CONFIRMAR';
}else if($data['confirmar']=='CONFIRMADO'){
 $valor=$data['confirmar']; 
}else{
 $valor=$data['confirmar'];  
}

?>

    //console.log('<?php echo $id_curso ?>');

    ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

        // "<a type='button' title='Evaluación' onclick='asignacion(<?php echo $id_curso ?>)' class='btn btn-default' data-toggle='modal' data-target='#modal-asignar'><?php echo $valor?> </a>"

        "<?php echo $valor?>"



    ],
    <?php } ?>
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
            title: "ACCIÓN"
        }
    ],
});

// CURSOS PROGRAMADOS
var dataSet = [
    <?php 


$query = "SELECT * FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND proceso = 'FINALIZADO' AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 
$id_curso = $data['id_curso'];


$fcurso = $data['fcurso'] = date("d-m-Y");
 $fechaf = $data['fechaf'] = date("d-m-Y");

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



$accion = "<span class='badge' style='background-color: green;'>EVALUADO</span>";


?>

    ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",
        "<span class='badge' style='background-color: green;'><?php echo $valor?></span>", "<?php echo $accion?>"],

<?php 

}else{

?>["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

        "<span class='badge' style='background-color: green;'><?php echo $valor?></span>",

        "<a type='button' title='Evaluación Curso' data-toggle='modal' data-target='#modal-evalcurso' onclick='cursoeval(<?php echo $id_curso ?>)' class='btn btn-info'>EVALUAR</a>"

 ], <?php }   
            }?> ];

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
            title: "ESTATUS"
        },
        {
            title: "ACCIÓN"
        }
    ],
});

var dataSet = [
    <?php 
$query = "
SELECT * FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND proceso = 'CANCELADO' AND cursos.estado = 1 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_curso'];

 $fcurso = $data['fcurso'] = date("d-m-Y");
 $fechaf = $data['fechaf'] = date("d-m-Y");
?>["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

        // "<a type='button' title='Evaluación' onclick='asignacion(<?php //echo $id_curso ?>)' class='btn btn-danger' data-toggle='modal' data-target='#modal-asignar'>CANCELADO </a>"
        "<span class='badge' style='background-color: red;'>CANCELADO</span>"
    ],
    <?php } ?>
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
</script>