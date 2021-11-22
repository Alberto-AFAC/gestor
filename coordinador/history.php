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

                                        <li class="list-group-item">
                                            <a href="inspector">
                                                <i class="fa fa-user"></i> <span>Perfil</span>
                                                <span class="pull-right-container">
                                                    <small class="label pull-right bg-red"></small>
                                                    <small class="label pull-right bg-blue"></small>
                                                </span>
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
                                                                                    onclick="cambio();">NO ENCUENTRA EL
                                                                                    CURSO</a>

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
                                                                                    <option value="">Seleccione...
                                                                                    </option>
                                                                                    <option value="INTERNO (AFAC)">
                                                                                        INTERNO
                                                                                        (AFAC)</option>
                                                                                    <option value="INTERNO (NACIONAL)">
                                                                                        INTERNO (NACIONAL)</option>
                                                                                    <option
                                                                                        value="EXTERNO (INTERNACIONAL)">
                                                                                        EXTERNO (INTERNACIONAL)
                                                                                    </option>
                                                                                </select>

                                                                            </div>

                                                                            <div class="col-sm-6">
                                                                                <label>MODALIDAD</label>
                                                                                <select type="text" class="form-control"
                                                                                    id="mCurse" name="mCurse"
                                                                                    placeholder="Seleccione...">
                                                                                    <option value="" selected>
                                                                                        Seleccione...
                                                                                    </option>
                                                                                    <option value="A DISTANCIA">A
                                                                                        DISTANCIA
                                                                                    </option>
                                                                                    <option value="PRESENCIAL">
                                                                                        PRESENCIAL
                                                                                    </option>
                                                                                    <option
                                                                                        value="PRESENCIAL (SEMIPRESENCIAL)">
                                                                                        MIXTA (SEMIPRESENCIAL)
                                                                                    </option>
                                                                                    <option value="E-LEARNNING">
                                                                                        E-LEARNNING
                                                                                    </option>
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


    <script type="text/javascript">
var dataSet = [
    <?php 


    $queri = "SELECT *,DATE_FORMAT(iCurse, '%d/%m/%Y') as inicio,DATE_FORMAT(fCurse, '%d/%m/%Y') as final,file FROM historyc WHERE id_inspector = $datos[0] ";
    $result = mysqli_query($conexion, $queri);

    $x =0;
    while($datas = mysqli_fetch_array($result)){ 
    $x++;
    $query = 
    "
    SELECT 
    DATE_FORMAT(fechaf, '%d-%m-%Y') AS fechaf,
    idinsp,
    proceso,
    evaluacion,
    idmstr,
    confirmar, 
    gstTitlo,
    gstVignc
    FROM listacursos 
    INNER JOIN cursos ON gstIdlsc = idmstr 
    WHERE gstIdlsc = ".$datas['nCurse']."";
    $resultado = mysqli_query($conexion, $query);
    if($fecs = mysqli_fetch_row($resultado)){ 

    $fecs[0];
    $fecs[1];
    //$per[0];

    $fechav = date("d-m-Y",strtotime($fecs[0]."+ ".$fecs[7]." year"));

    if($fecs[7]==101){
    $pro = "<div title='$fecs[0]' style='cursor:pointer; width:100%; text-align:center; color: white; background-color: silver;'>  <p style='color:red;float:left; '></p>ÚNICO</div>";

    }else{
    $pro = $fechav;     
    }     

    $vencer = date("d-m-Y",strtotime($fechav."- 3 month"));
    ini_set('date.timezone','America/Mexico_City');
    $actual= date("d-m-Y"); 

    $f1 = strtotime($fechav);
    $f2 = strtotime($vencer);
    $f3 = strtotime($actual);

    if($fecs[7]==101){  

    $conf = "<center><a href='{$datas['file']}' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center> <div title='$fecs[0]' style='cursor:pointer; width:100%; text-align:center; color: white; background-color: silver;'>  <p style='color:red;float:left; '></p>REALIZADO</div>";      

    ?>

    ["<?php echo $x?>", "<?php echo $fecs[6]?>", "<?php echo $datas['tCurse']?>", "<?php echo $datas['inicio']?>",
        "<?php echo $datas['final']?>", "<?php echo $conf?>", "<?php echo $pro?>"],

    <?php  
    //}

    }else 

    //////////////////////////////////
    if($f3>=$f1){
    //$fech = 'vencido';
    $conf = "<center><a href='{$datas['file']}' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center><div title='$fecs[0]' style='cursor:pointer; width:100%; text-align:center; color: white; background-color:silver;'>REALIZADO</div>";
    //#AC2925
    ?>



    ["<?php echo $x?>", "<?php echo $fecs[6]?>", "<?php echo $datas['tCurse']?>", "<?php echo $datas['inicio']?>",
        "<?php echo $datas['final']?>", "<?php echo $conf?>",
        "<div style='cursor:pointer; width:100%; text-align:center; color: white; background-color: silver;'>  <p style='color:red;float:left; '></p><?php echo $pro?></div>"
        ],

    <?php
    }else if($f3 <= $f2 && $fecs[3] >= 80 ){ //$fech = 'vigente'; 
    $conf = "<center><a href='{$datas['file']}' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center><div title='$fechav' style='cursor:pointer; width:100%; text-align:center; color: white; background-color: #398439;'>VIGENTE</div>";
    ?>

    ["<?php echo $x?>", "<?php echo $fecs[6]?>", "<?php echo $datas['tCurse']?>", "<?php echo $datas['inicio']?>",
        "<?php echo $datas['final']?>", "<?php echo $conf?>",
        "<div style='cursor:pointer; width:100%; text-align:center; color: white; background-color: #398439;'>  <p style='color:red;float:left; '></p><?php echo $pro?></div>"
        ],


    <?php }

    else 

    if($f3 <= $f2 && $fecs[3] < 80 && $idcurso == $fecs[4] && $fecs[2]=='FINALIZADO'){ 



    if($fecs[5] == 'CONFIRMADO'){
    $conf = "<td style='color: #333; background-color: #F4F4F4;'><p style='color:red;float:left; '>*</p>POR REALIZAR</td>";
    }else{
    $conf = "<td style='color: #333; background-color: #F4F4F4;'><p style='color:red;float:left; '>#</p>POR REALIZAR</td>";  
    }

    ?>

    ["<?php echo $x?>", "<?php echo $fecs[6]?>", "<?php echo $datas['tCurse']?>", "<?php echo $datas['inicio']?>",
        "<?php echo $datas['final']?>", "<?php echo $conf?>", "<?php echo $pro?>"],




    <?php

    }else if($f3 >= $f2){   //$fech = 'por vencer';   

    $conf = "<center><a href='{$datas['file']}' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center><div title='$fecs[0]' style='cursor:pointer; width:100%; text-align:center; color: white; background-color: #D58512;'>POR VENCER</div>";
    ?>

    ["<?php echo $x?>", "<?php echo $fecs[6]?>", "<?php echo $datas['tCurse']?>", "<?php echo $datas['inicio']?>",
        "<?php echo $datas['final']?>", "<?php echo $conf?>",
        "<div style='cursor:pointer; width:100%; text-align:center; color: white; background-color: #D58512;'>  <p style='color:red;float:left; '></p><?php echo $pro?></div>"
        ],

    <?php
    }  

    }else if($datas['nCurse'] == 0){  

    $conf = "<center><a href='{$datas['file']}' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center><div title='Historial' style='cursor:pointer; width:100%; text-align:center; color: white; background-color: silver;'><p style='color:red;float:left; '></p>REALIZADO</div>";  
    ?>

    ["<?php echo $x?>", "<?php echo $datas['nameOther']?>", "<?php echo $datas['tCurse']?>",
        "<?php echo $datas['inicio']?>",
        "<?php echo $datas['final']?>", "<?php echo $conf?>", "<?php echo $pro?>"],
    <?php 

    }else{  

    $conf = "<center><a href='{$datas['file']}' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center><div title='Historial' style='cursor:pointer; width:100%; text-align:center; color: white; background-color: silver;'><p style='color:red;float:left; '></p>REALIZADO</div>";  
    ?>

    ["<?php echo $x?>", "<?php echo $datas['nCurse']?>", "<?php echo $datas['tCurse']?>",
        "<?php echo $datas['inicio']?>",
        "<?php echo $datas['final']?>", "<?php echo $conf?>", "<?php echo $pro?>"],
    <?php 

    }


    }


    ?>
];


var tableGenerarReporte = $('#data-table-historial').DataTable({
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [{
            title: "ITEM"
        }, {
            title: "CURSO"
        },
        {
            title: "TIPO"
        },
        {
            title: "INICIO"
        }, {

            title: "TERMINO"
        },
        {
            title: "ESTATUS"
        },
        {
            title: "PRONOSTICO"
        }
    ],
});


function cambio() {
    $("#otro").toggle('toggle');
    $("#curso").toggle('toggle');
}

function btnguardar() {

    var paqueteDeDatos = new FormData();
    paqueteDeDatos.append('fileDoc', $('#fileDoc')[0].files[0]);
    paqueteDeDatos.append('tCurse', $("#tCurse").prop('value'));
    paqueteDeDatos.append('iCurse', $("#iCurse").prop('value'));
    paqueteDeDatos.append('fCurse', $("#fCurse").prop('value'));
    paqueteDeDatos.append('mCurse', $("#mCurse").prop('value'));
    paqueteDeDatos.append('sCurse', $("#sCurse").prop('value'));
    paqueteDeDatos.append('idinsp', $("#idinsp").prop('value'));
    paqueteDeDatos.append('nCurse', $('#nCurse').prop('value'));
    paqueteDeDatos.append('nameOther', $('#nameOther').prop('value'));
    paqueteDeDatos.append('nEmpl', $('#nEmpl').prop('value'));
    $.ajax({
        url: '../php/insertHistory.php',
        data: paqueteDeDatos,
        type: "POST",
        contentType: false,
        processData: false,
        success: function(r) {
            // alert(r);
            if (r == 8) {
                $('#vacio').toggle('toggle');
                setTimeout(function() {
                    $('#vacio').toggle('toggle');
                }, 4000);

            } else if (r == 0) {
                $('#exito').toggle('toggle');
                setTimeout(function() {
                    $('#exito').toggle('toggle');
                }, 4000);
                setTimeout("location.href = 'history';", 2000);
                $('#vacia').show('slow');
                $('#agrega').hide();

            } else if (r == 1) {
                $('#falla').toggle('toggle');
                setTimeout(function() {
                    $('#falla').toggle('toggle');
                }, 4000);
            } else if (r == 2) {
                $('#error').toggle('toggle');
                setTimeout(function() {
                    $('#error').toggle('toggle');
                }, 4000);
            } else if (r == 3) {
                $('#renom').toggle('toggle');
                setTimeout(function() {
                    $('#renom').toggle('toggle');
                }, 4000);
            } else if (r == 4) {
                $('#forn').toggle('toggle');
                setTimeout(function() {
                    $('#forn').toggle('toggle');
                }, 4000);
            } else if (r == 6) {
                $('#adjunta').toggle('toggle');
                setTimeout(function() {
                    $('#adjunta').toggle('toggle');
                }, 4000);
            } else if (r == 7) {
                $('#repetido').toggle('toggle');
                setTimeout(function() {
                    $('#repetido').toggle('toggle');
                }, 4000);
            }
        }
    });

    // swal.showLoading();
    // if (nCurse == '' || tCurse == '' || iCurse == '' || fCurse == '' || mCurse == '' || sCurse ==
    // '') {
    // Swal.fire({
    // type: 'info',
    // title: 'Notificaciones AFAC',
    // text: 'Llene los campos que se solicitan',
    // timer: 2000,
    // customClass: 'swal-wide',
    // showConfirmButton: false,
    // });
    // } else {
    // $.ajax({
    // type: "POST",
    // url: "../php/insertHistory.php",
    // data: {
    // paqueteDeDatos: paqueteDeDatos,
    // },
    // success: function(data) {
    // Swal.fire({
    // type: 'success',
    // title: 'AFAC INFORMA',
    // text: 'Sus datos fueron guardados correctamente',
    // showConfirmButton: false,
    // timer: 2900,
    // customClass: 'swal-wide',
    // showConfirmButton: false,
    // });
    // setTimeout("location.href = 'history';", 2000);
    // }
    // });
    // }

    // return false;

}

// });
// });

// SELECT CONFIGURATION SEARCH
$(document).ready(function() {
    $('select').selectize({
        sortField: 'text'
    });
});
    </script>