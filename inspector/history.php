    <?php 
    include ("../conexion/conexion.php");

    ?>
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
        <!-- select librarys -->

        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
            integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.2/sweetalert2.min.css"
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
                                    <img class="profile-user-img img-responsive img-circle" src="../dist/img/perfil.png"
                                        alt="User profile picture">

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
                                    <li class="active"><a href="#activity" data-toggle="tab">Registrar Curso </a></li>
                                    <li><a href="#curComplet" data-toggle="tab">Historial</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <div class="post">
                                            <section class="content">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="box">
                                                            <div class="box-header">
                                                            </div>
                                                            <div class="box-body">
                                                                <div id="refresh">

                                                                    <form action method="POST" class="form-horizontal"
                                                                        id="form">
                                                                        <input type="text" id="idinsp" name="idinsp"
                                                                            value="<?php echo $datos[0]?>" hidden>
                                                                        <input type="hidden" name="nEmpl" id="nEmpl"
                                                                            value="<?php echo $datos[4]?>">
                                                                        <div class="form-group">

                                                                            <div class="col-sm-12">
                                                                                <label>NOMBRE DEL CURSO</label>

                                                                                <a type="button"
                                                                                    style="float: right; cursor: pointer;"
                                                                                    onclick="cambio();">¿NO ENCUENTRA EL CURSO? </a>

                                                                                <!--         <button type="button" style="float: right;" onclick="cambio()">OTRO(S)</button>     -->

                                                                                <p id="curso">
                                                                                    <select id="nCurse" name="nCurse"
                                                                                        class="form-control"
                                                                                        placeholder="Seleccione...">
                                                                                        <option value="0">Seleccione...
                                                                                        </option>
                                                                                        <?php while($data = mysqli_fetch_row($cursos)):?>
                                                                                        <option
                                                                                            value="<?php echo $data[0]?>">
                                                                                            <?php echo $data[2]?> -
                                                                                            <?php echo $data[3]?>
                                                                                        </option>
                                                                                        <?php endwhile; ?>
                                                                                    </select>
                                                                                </p>

                                                                                <p style="display: none;" id="otro">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="nameOther" name="nameOther"
                                                                                        placeholder="Ingrse otro nombre">
                                                                                </p>

                                                                            </div>



                                                                            <div class="col-sm-6">
                                                                                <label>TIPO DE CURSO</label>
                                                                                <select type="text" class="form-control"
                                                                                    id="tCurse" name="tCurse"
                                                                                    placeholder="Seleccione...">
                                                                                    <option value="0">ELEGIR UNA OPCIÓN
                                                                                    </option>
                                                                                    <option value="INTERNO">INTERNO
                                                                                    </option>
                                                                                    <option value="EXTERNO">EXTERNO
                                                                                    </option>
                                                                                </select>

                                                                            </div>

                                                                            <div class="col-sm-6">
                                                                                <label>MODALIDAD</label>
                                                                                <select type="text" class="form-control" id="mCurse" name="mCurse" placeholder="Seleccione...">
                                                                                <option value="0">ELEGIR UNA OPCIÓN</option>
                                                                                    <option value="A DISTANCIA">A DISTANCIA</option>
                                                                                    <option value="AUTOAPRENDIZAJE">AUTOAPRENDIZAJE</option>
                                                                                    <option value="AUTOGESTIVO">AUTOGESTIVO</option>
                                                                                    <option value="E-LEARNNING">E-LEARNNING</option>
                                                                                    <option value="HIBRIDO">HIBRIDO</option>
                                                                                    <option value="PRESENCIAL">PRESENCIAL</option> 
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <label>INICIO</label>
                                                                                <input type="date" class="form-control"
                                                                                    id="iCurse" name="iCurse">
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <label>CONCLUYE</label>
                                                                                <input type="date" class="form-control"
                                                                                    id="fCurse" name="fCurse">
                                                                            </div>
                                                                            <div class="col-sm-6"><br>
                                                                                <label>SEDE</label>
                                                                                <input type="text"
                                                                                    class="form-control inputalta"
                                                                                    id="sCurse" name="sCurse">
                                                                            </div>

                                                                            <div class="col-sm-6">
                                                                                <br>
                                                                                <label class="label2">DOCUMENTO</label>

                                                                                <input id="fileDoc" type="file"
                                                                                    name="fileDoc"
                                                                                    style="width: 410px; margin:0 auto; "
                                                                                    required accept=".pdf,.doc"
                                                                                    class="input-file" size="1450">

                                                                            </div>


                                                                        </div>
                                                                        <button type="button" style="float: right;"
                                                                            class="btn btn-primary"
                                                                            onclick="btnguardar();">GUARDAR</button>
                                                                    </form>

                                                                    <b>
                                                                        <p class="alert alert-danger text-center padding error"
                                                                            id="falla">Error al registrar datos o al
                                                                            adjuntar archivo</p>
                                                                    </b>

                                                                    <b>
                                                                        <p class="alert alert-success text-center padding exito"
                                                                            id="exito">¡Se registraron los datos y
                                                                            archivo
                                                                            con éxito!</p>
                                                                    </b>

                                                                    <b>
                                                                        <p class="alert alert-warning text-center padding aviso"
                                                                            id="vacio">Es necesario agregar los datos
                                                                            que se
                                                                            solicitan </p>
                                                                    </b>

                                                                    <b>
                                                                        <p class="alert alert-warning text-center padding aviso"
                                                                            id="repetido">¡El grado de estudio ya está
                                                                            registrado!</p>
                                                                    </b>

                                                                    <b>
                                                                        <p class="alert alert-danger text-center padding adjuto"
                                                                            id="renom">
                                                                            Renombre su archivo</p>
                                                                    </b>

                                                                    <b>
                                                                        <p class="alert alert-warning text-center padding adjuto"
                                                                            id="adjunta">
                                                                            Debes adjuntar archivo</p>
                                                                    </b>

                                                                    <b>
                                                                        <p class="alert alert-danger text-center padding adjuto"
                                                                            id="error">
                                                                            Ocurrio un error</p>
                                                                    </b>

                                                                    <b>
                                                                        <p class="alert alert-danger text-center padding adjuto"
                                                                            id="forn">
                                                                            Formato no valido</p>
                                                                    </b>

                                                                    <b>
                                                                        <p class="alert alert-danger text-center padding adjuto"
                                                                            id="max">
                                                                            Supera el limite permitido</p>
                                                                    </b>







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
                                                            <table id="data-table-historial" class="display"
                                                                style="width:100%">
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>

                </section>
            </div>
        </div>
        </div>
        </div>
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
        <script src="../js/lisCurso.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
            integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>


    </body>

    </html>

    <?php 

    ini_set('date.timezone','America/Mexico_City');
    $datos[0];?>

<?php include('../perfil/historia.php'); ?>