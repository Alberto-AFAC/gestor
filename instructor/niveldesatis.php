<!DOCTYPE html><?php include ("../conexion/conexion.php");

$sql = "SELECT gstIdlsc, gstTitlo,gstTipo FROM listacursos WHERE estado = 0";
$curso = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'INSTRUCTOR' AND estado = 0";
$instructor = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdper,gstNombr,gstApell,gstCargo FROM personal WHERE gstCargo = 'INSPECTOR' AND gstEvalu = 'SI' AND estado = 0 || gstCargo = 'DIRECTOR' AND estado = 0 ";
$inspector = mysqli_query($conexion,$sql);
include("../php/nivelSatis.php");
$query ="SELECT
                *
            FROM
                bitevaluacion 
            ORDER BY
                id DESC
                LIMIT 1";
$resultado = mysqli_query($conexion, $query);

$row = mysqli_fetch_assoc($resultado);
if(!$resultado) {
    var_dump(mysqli_error($conexion));
    exit;
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Capacitación AFAC | Nivel de Calidad</title>
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
    <!--JQUERY CONFIRM-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../dist/css/skins/card.css">
    <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap.min.css">
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

        <?php
include('header.php');
?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <section class="content-header">
                <h1>
                    NIVEL DE SATISFACCIÓN
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <div class="box-header with-border">
                                    <h3 style="color: grey;" class="box-title">TOTAL DE PERSONAS ENCUESTADAS:</h3>
                                    <label id="per1" style="font-size:28px; color:green"
                                        for=""><?php echo ($totalresg)?></label>

                                </div>
                                <button id="button" type="button" class="btn btn-info" style="float: left"> NIVEL GENERAL DE SATISFACCIÓN
                                    DE SATISFACCIÓN</button>
                                <button type="button" data-toggle="modal" data-target="#basicModal" class="btn btn-info" style="float: right"> NIVEL DE SATISFACCIÓN DESEADA</button>
                            </div>
                            <div class="box-body text-center">
                                <div class="col-md-6">
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <h3 style="color: gray;" class="box-title">NIVEL GENERAL DE SATISFACCIÓN
                                            </h3>
                                        </div>
                                        <div style="color: green; font-size: 50px;" class="box-body">
                                        <?php 
                                        
                                        if($totalfull == 0 && $totalcantida == 0){
                                            echo "N/A";
                                        } else {
                                            echo porcentaje($totalfull, $totalcantida, 0) . "%";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <h3 style="color: gray;"
                                                class="box-title">NIVEL DE SATISFACCIÓN DESEADA
                                            </h3>
                                        </div>
                                        <div style="color: green; font-size: 50px;" class="box-body">
                                            <?php if($row['evaluation']== ''){
                                            echo "N/A";
                                        } else {
                                            echo "$row[evaluation] %";
                                        }
                                        ?><br>
                                      
                                        </div>
                                    </div>
                                </div>
                                <canvas id="piechart-satisfaccion"></canvas>
                            </div>
                            <div style="padding-left: 100px; padding-bottom: 10px;" class="container">
                                <table width="80%">
                                    <tr style="color: gray;">
                                        <th>DEFICIENTE</th>
                                        <th>NO SATISFACTORIO</th>
                                        <th>SATISFACTORIO</th>
                                        <th>EXCELENTE</th>

                                    </tr>
                                </table>
                            </div>
                            <!-- /.box-body -->
                            <?php include('ponivel.php'); ?>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Vertical Progress Bars Different Sizes</h3>
            </div>
        
            <div class="box-body text-center">
              <p>By adding the class <code>.vertical</code> and <code>.progress-sm</code>, <code>.progress-xs</code> or
                <code>.progress-xxs</code> we achieve:</p>

              <div class="progress vertical active">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="height: 40%">
                  <span class="sr-only">40%</span>
                </div>
              </div>
              <div class="progress vertical progress-sm">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="height: 100%">
                  <span class="sr-only">100%</span>
                </div>
              </div>
              <div class="progress vertical progress-xs">
                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: 60%">
                  <span class="sr-only">60%</span>
                </div>
              </div>
              <div class="progress vertical progress-xxs">
                <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: 60%">
                  <span class="sr-only">60%</span>
                </div>
              </div>
            </div>
         
          </div>
        
        </div> -->
                    <!-- /.col -->

            </section>
            <!-- /.content -->
        </div>
        <!-- MODAL PARA HACER HISTORIAL DE SATISFACCIÓN -->
        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal"
            aria-hidden="true">
            <form class="col s12" id="ponderacion" method="POST">
                <div class="modal-dialog" style="width: 50%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">NIVEL DE SATISFACCIÓN DESEADA</h4>
                        </div>
                        <div class="modal-body">
                            <!-- <div class="input-group"> -->
                            
                            <input type="text" id="obtained" name="obtained" value="<?php echo porcentaje($totalfull, $totalcantida, 0) . "%"?>" hidden>
                            <input type="date" id="date_update" name="date_update" value="<?php echo date("Y-m-d"); ?>"
                                hidden>
                            <span style="font-size: 20px;">Ponderación actual</span>
                            <span
                                style="font-weight: bold; color: green; font-size: 25px; float: right;"><?php echo $row['evaluation']?>
                                %</span>
                            <!-- </div> -->
                            <br><br>
                            <div class="input-group">
                                <input type="date" id="date_update" name="date_update"
                                    value="<?php echo date("Y-m-d"); ?>" hidden>
                                <input type="text" id="evaluation" name="evaluation" class="form-control"
                                    placeholder="Escribe la ponderación" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2">%</span>

                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Desde
                                        </span>
                                        <input type="date" name="start_date" id="start_date" class="form-control"
                                            aria-label="...">
                                    </div><!-- /input-group -->
                                </div><!-- /.col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Hasta
                                        </span>
                                        <input type="date" name="end_date" id="end_date" class="form-control"
                                            aria-label="...">
                                    </div><!-- /input-group -->
                                </div><!-- /.col-lg-6 -->
                            </div><br><br>
                            <table id="data-table-ponderacion" class="table table-bordered" width="100%"
                                cellspacing="0">
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="btnguardar" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
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

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
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
                                <a href="javascript:void(0)" class="text-red pull-right"><i
                                        class="fa fa-trash-o"></i></a>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap.min.js"></script>
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
<script>
var piechar = new Chart(document.getElementById("piechart-satisfaccion"), {
    type: 'bar',
    data: {
        labels: ["PREGUNTA 1", "PREGUNTA 2", "PREGUNTA 3", "PREGUNTA 4", "PREGUNTA 5", "PREGUNTA 6",
            "PREGUNTA 7", "PREGUNTA 8", "PREGUNTA 9", "PREGUNTA 10", "PREGUNTA 11", "PREGUNTA 12","PREGUNTA 13",
            "PREGUNTA 14","PREGUNTA 15","PREGUNTA 16","PREGUNTA 17","PREGUNTA 18","PREGUNTA 19","PREGUNTA 20",
            "PREGUNTA 21","PREGUNTA 22","PREGUNTA 23"
        ],
        datasets: [{
            label: "PONDERACIÓN",
            backgroundColor: ["#154360", "#1A5276", "#1F618D", "#2471A3", "#2980B9", "#5499C7",
                "#7FB3D5", "#A9CCE3", "#1ABC9C", "#48C9B0", "#76D7C4", "#A3E4D7", "#154360","#1A5276",
                "#1F618D","#2471A3","#2980B9","#5499C7","#7FB3D5","#A9CCE3","#1ABC9C","#48C9B0","#76D7C4",
                "#A3E4D7","#A3E4D7"
            ],
            borderWidth: 0,
            data: ["<?php echo $pregunta1?>", "<?php echo $pregunta2?>", "<?php echo $pregunta3?>",
                "<?php echo $pregunta4?>", "<?php echo $pregunta5?>", "<?php echo $pregunta6?>",
                "<?php echo $pregunta7?>", "<?php echo $pregunta8?>", "<?php echo $pregunta9?>",
                "<?php echo $pregunta10?>", "<?php echo $pregunta11?>", "<?php echo $pregunta12?>",
                "<?php echo $pregunta13?>", "<?php echo $pregunta14?>","<?php echo $pregunta15?>",
                "<?php echo $pregunta16?>","<?php echo $pregunta17?>","<?php echo $pregunta18?>",
                "<?php echo $pregunta19?>","<?php echo $pregunta20?>","<?php echo $pregunta21?>",
                "<?php echo $pregunta22?>","<?php echo $pregunta23?>"
            ]
        }]
    },
    options: {
        indexAxis: 'y',
        responsive: true,
        elements: {
            bar: {
                borderWidth: 4,
            }
        },
        plugins: {
            legend: {
                position: 'right',
            },
            title: {
                display: true,
                text: 'Evaluación de satisfacción'
            }
        },
        // scales: {
        //     x: { // defining min and max so hiding the dataset does not change scale range
        //         min: 0,
        //         max: 10
        //     }
        // }
    }
});

//JQUERY CONFIRM CALLBACK
$('#button').confirm({
    boxWidth: '50%',
    useBootstrap: false,
    animation: 'zoom',
    closeAnimation: 'scale',
    animationSpeed: 2000,
    title: 'CONTENIDO DE EVALUACIÓN',
    content: '<table class="table table-bordered table-condensed table-striped"><tr><th>CONTENIDO</th><th>DESCRIPCIÓN</th></tr><tr><td>PREGUNTA 1</td><td>¿SE ESPECIFICÓ LOS OBJETIVOS AL INICIO DEL CURSO, EN FORMA CLARA Y COMPRENSIBLE?</td></tr><tr><td>PREGUNTA 2</td><td>¿DEMOSTRÓ DOMINIO ADECUADO DEL TEMA?</td></tr><tr><td>PREGUNTA 3</td><td>¿SE APEGÓ AL TEMARIO?</td></tr><tr><td>PREGUNTA 4</td><td>¿UTILIZÓ UN LENGUAJE SENCILLO Y COMPRENSIBLE DURANTE LA SESIÓN?</td></tr><tr><td>PREGUNTA 5</td><td>¿ATENDIÓ CLARA Y OPORTUNAMENTE LAS DUDAS Y REACTIVOS DE LOS PARTICIPANTES?</td></tr><tr><td>PREGUNTA 6</td><td>¿PLANEÓ Y DIRIGIÓ ADECUADAMENTE LA SESIÓN?</td></tr><tr><td>PREGUNTA 7</td><td>¿DESPERTÓ EL INTERÉS DEL GRUPO CON RESPECTO A LOS CONTENIDOS?</td></tr><tr><td>PREGUNTA 8</td><td>¿FUE PUNTUAL DURANTE LA SESIÓN?</td></tr><tr><td>PREGUNTA 9</td><td>¿PROPICIÓ UN CLIMA DE COLABORACIÓN Y RESPETO ENTRE LOS PARTICIPANTES?</td></tr><tr><td>PREGUNTA 10</td><td>¿EXPLICÓ CON CLARIDAD LAS INSTRUCCIONES DE LAS ACTIVIDADES REALIZADAS?</td></tr><tr><td>PREGUNTA 11</td><td>¿TUVO UN CONTROL ADECUADO DEL GRUPO?</td></tr><tr><td>PREGUNTA 12</td><td>¿EXPLICÓ LOS CRITERIOS DE EVALUACIÓN DE LA SESIÓN?</td></tr><tr><td>PREGUNTA 13</td><td>¿LOS CONOCIMIENTOS ADQUIRIDOS SON APLICABLES A TU PUESTO DE TRABAJO?</td></tr><tr><td>PREGUNTA 14</td><td>¿CONSIDERAS QUE EL CONTENIDO DEL CURSO FUE SUFICIENTE?</td></tr><tr><td>PREGUNTA 15</td><td>¿LA SESIÓN CUBRIÓ TUS EXPECTATIVAS?</td></tr><tr><td>PREGUNTA 16</td><td>¿EL CONTENIDO AUMENTÓ MIS CONOCIMIENTOS Y COMPRENSIÓN DEL TEMA EXPUESTO?</td></tr><tr><td>PREGUNTA 17</td><td>¿LA DURACIÓN DE LA SESIÓN FUE LA MÁS APROPIADA PARA CUMPLIR EL OBJETIVO?</td></tr><tr><td>PREGUNTA 18</td><td>¿EL TIEMPO CON EL QUE RECIBIÓ LA INFORMACIÓN (INVITACIÓN, TEMARIO, ETC.) A LA SESIÓN FUE ADECUADO?</td></tr><tr><td>PREGUNTA 19</td><td>¿CÓMO FUE EL SERVICIO DE CAFÉ PROPORCIONADO?</td></tr><tr><td>PREGUNTA 20</td><td>¿LA DISPONIBILIDAD DEL/A COORDINADOR/A PARA RESPONDER DUDAS SOBRE EL SERVICIO FUE ADECUADA?</td></tr><tr><td>PREGUNTA 21</td><td>¿CÓMO FUE EL MATERIAL DIDÁCTICO (MANUAL, ROTAFOLIOS, AUDIOVISUALES, PRESENTACIÓN) UTILIZADO?</td></tr><tr><td>PREGUNTA 22</td><td>¿SÍ EL MATERIAL DE LA SESIÓN SE ENTREGÓ EN TIEMPO?</td></tr><tr><td>PREGUNTA 23</td><td>¿CÓMO FUERON LAS CONDICIONES DEL AULA PARA LA IMPARTICIÓN DE LA SESIÓN (LUZ, VENTILACIÓN, LIMPIEZA, COMODIDAD ETC.)?</td></tr></table>',
    buttons: {
        Aceptar: {
            keys: ['Y'],
            // action: function() {
            //     $.alert('Thank you for contacting us.');
            // },
            btnClass: 'btn-info'
        },
        no: {
            isHidden: true,
            keys: ['N']
        }

    },
    type: 'blue',
    typeAnimated: true,
    columnClass: 'small',
    icon: 'fa fa-question-circle'
})
//AQUI COMIENZA PARA PODER INSERTAR LOS DATOS EN LA TABLA DE PONDERACIÓN
$(document).ready(function() {
    $('#btnguardar').click(function() {
        var date_update = $("#date_update").val();
        var obtained = $("#obtained").val();
        var evaluation = $("#evaluation").val();
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        swal.showLoading();
        if (date_update == '' || obtained == '' || evaluation == '' || start_date == '' || end_date == '') {
            Swal.fire({
                type: 'error',
                title: 'ATENCIÓN!',
                customClass: 'swal-wide',
                timer: 2300,
                text: 'Aun no has ingresado ponderación de evaluación',
                showConfirmButton: false,
            });
        } else {
            $.ajax({
                type: "POST",
                url: "../php/insertEv.php",
                data: {
                    date_update: date_update,
                    obtained: obtained,
                    evaluation: evaluation,
                    start_date: start_date,
                    end_date: end_date
                },
                success: function(data) {
                    document.getElementById("ponderacion").reset();
                    Swal.fire({
                        type: 'success',
                        title: 'AFAC INFORMA',
                        text: 'Ponderación de evaluación actualizada satisfactoriamente',
                        showConfirmButton: false,
                        timer: 2900,
                        customClass: 'swal-wide',
                        showConfirmButton: false,
                    });
                    setTimeout("location.href = '../admin/niveldesatis.php';", 2000);
                }
            });
        }

        return false;
    });
});

//DATATABLES//

var dataSet = [
    <?php 
$query = "SELECT * FROM bitevaluacion";
$resultado = mysqli_query($conexion, $query);

      while($data = mysqli_fetch_array($resultado)){ 
          $Modificacion = $data['date_update'];
          $Modificacion = date("d-m-Y");  
          $start = $data['start_date'];
          $end = $data['end_date'];
          $start = date("d-m-Y");
          $end = date("d-m-Y");
      ?>

    ["<?php echo $data['id']?>", "<?php echo $data['start_date']. " - " . $data['end_date']?>", "<?php echo $Modificacion?>","<?php echo $data['obtained']?>",
        "<?php echo $data['evaluation']?> %"],


    <?php } ?>
];

var tableGenerarReporte = $('#data-table-ponderacion').DataTable({
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    pageLength: 5,
    lengthMenu: [
        [5, 10, 20, -1],
        [5, 10, 20, 'Todos']
    ],
    "order": [
        [0, 'desc']
    ],
    orderCellsTop: true,
    fixedHeader: true,
    data: dataSet,
    columns: [{
            title: "FOLIO"
        },
        {
            title: "PERIÓDO"
        },
        {
            title: "MODIFICACIÓN"
        },
        {
            title: "OBTENIDA"
        },
        {
            title: "DESEADA"
        }
    ]
});
</script>