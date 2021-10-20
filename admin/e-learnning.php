<!DOCTYPE html><?php include ("../conexion/conexion.php"); ?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Capacitación AFAC | Programación e-learnning</title>
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
    <link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">

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
                    BIENVENIDO A E-LEARNNING
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div style="padding-top: 65px;" class="container box box-solid">
                            <table id="data-table-ponderacion" class="table table-bordered" width="100%"
                                cellspacing="0">
                            </table>
                        </div>
                        <!-- /.box -->
                    </div>
            </section>
            <div>

            </div>
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
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- MODAL CARGAR VIDEO -->
        <form id="uVideo" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">
            <div class="modal fade" id="uVideoM" tabindex="-1" role="dialog" aria-labelledby="uVideoMLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 120%;">
                        <input type="hidden" id="idCurso" name="idCurso">
                        <div class="modal-header">
                            <span style="font-size: 20px;" id="tituloCurso" name="tituloCurso"></span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <label>NOMBRE DEL VIDEO</label>
                                    <input type="text" id="tituloV" name="tituloV" class="form-control"
                                        style="text-transform: uppercase;">
                                </div>
                                <div class="col-sm-7">
                                    <label>OBJETIVO</label>
                                    <input type="text" id="objetivoV" name="objetivoV" class="form-control"
                                        style="text-transform: uppercase;">
                                </div><br><br>
                                <div class="col-sm-12"><br>
                                    <label>Ingresa URL</label>
                                    <input type="url" pattern="https?://.+" required id="url" name="url"
                                        class="form-control" style="text-transform: uppercase;">
                                </div>
                            </div><br><br>
                            <table id="data-table-multimedia" class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ITEM</th>
                                        <th>TITULO</th>
                                        <th>DESCRIPCIÓN</th>
                                        <th>MODULO</th>
                                        <th>VIDEO</th>
                                    </tr>
                                </thead>
                            </table>
                        </div><br><br><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                            <button type="button" id="btnguardar" class="btn btn-primary">GUARDAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- FINALIZA MODAL CARGAR VIDEO -->
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <!-- EDICION DEL TEMARIO -->

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
        <script>
        var dataSet = [
            <?php 
    $query ="SELECT *,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as final, DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as inicio FROM cursos 
    INNER JOIN listacursos ON gstIdlsc = idmstr  
    WHERE modalidad = 'E-LEARNNING'
    GROUP BY gstIdlsc";
    $resultado = mysqli_query($conexion, $query);
    while($data = mysqli_fetch_array($resultado)){ 
        $id = $data['gstIdlsc'];
        
        ?>

            ["<?php echo $data['id_curso']?>", "<?php echo $data['gstTitlo']?>", "<?php echo $data['inicio']?>",
                "<?php echo $data['final']?>",
                "<center><img data-toggle='modal' data-target='#uVideoM' onclick='insertLearnning(<?php echo $id ?>)' src='../dist/img/video.png' alt='Video' style='width:42px;' title='Cargar video'> <img src='../dist/img/cuestionario.png' alt='Cuestionario' style='width:42px;' title='Cargar cuestionario'> <img src='../dist/img/pdf.png' alt='Video' style='width:42px;' title='Cargar archivo'></center>"
            ],

            <?php  } ?>

        ];

        var tableGenerarReporte = $('#data-table-ponderacion').DataTable({
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
                    title: "FOLIO"
                },
                {
                    title: "NOMBRE DEL CURSO"
                },
                {
                    title: "INICIO"
                },
                {
                    title: "FINAL"
                },
                {
                    title: "APRENDIZAJE"
                }
            ]
        });


        function insertLearnning(id) {
            $("#uVideo").slideDown("slow");
            $("#cuadro1").hide("slow");

            idcursos(id);

            $.ajax({
                url: '../php/e-learnningSel.php',
                type: 'POST'
            }).done(function(resp) {
                obj = JSON.parse(resp);
                var res = obj.data;
                for (i = 0; i < res.length; i++) {
                    if (obj.data[i].gstIdlsc == id) {
                        var
                            id_curso = $("#uVideoM #idCurso").val(obj.data[i].gstIdlsc),
                            titulo = $("#uVideoM #tituloCurso").html(obj.data[i].gstTitlo),
                            opcion = $("#uVideoM #opcion").val("modificar");
                    }
                }
            })
        }



function idcursos(id){

        var idc = id;
            // $.ajax({
            //     url: '../php/conE-learnnin.php',
            //     type: 'POST',
            //     data: 'idc='+idc
            // }).done(function(resp) {

        $.ajax({
            url: '../php/conE-learnnin.php',
            type: 'POST',
            data: 'idc='+idc
        }).done(function(rsp) {
                // obj = JSON.parse(resp);
                // var res = obj.data;
                // for (i = 0; i < res.length; i++) {


                    alert(rsp);



                // }
            })

}



    // SEGUNDO DATATABLES PARA VISUALIZAR LOS VIDEOS CARGADOS
    var dataSet = [
            <?php 

    $id = "<script>document.writeln(id_curso)</script>";

    $query ="SELECT * FROM elearnning  ";
    $resultado = mysqli_query($conexion, $query);
    $x = 0;
    while($data = mysqli_fetch_array($resultado)){ 
        $x++;
     
        
        ?>

            ["<?php echo $x?>","<?php echo $data['tituloV']?>","<?php echo $data['objetivoV']?>","$$$$$","<iframe width='220' height='100' src='<?php echo $data['url']?>'></iframe>"],

            <?php  } ?>

        ];

        var tableGenerarReporte = $('#data-table-multimedia').DataTable({
            "ajax": '',
            "language": {
                "searchPlaceholder": "Buscar datos...",
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            },
            // "order": [
            //     [0, 'desc']
            // ],
            orderCellsTop: true,
            fixedHeader: true

        });









        $(document).ready(function() {
            $('#btnguardar').click(function() {
                var tituloV = $("#tituloV").val();
                var objetivoV = $("#objetivoV").val();
                var idCurso = $("#idCurso").val();
                var url = $("#url").val();
                swal.showLoading();
                if (tituloV == '' || objetivoV == '') {
                    Swal.fire({
                        type: 'info',
                        title: 'Notificaciones AFAC',
                        text: 'Llene los campos que se solicitan',
                        timer: 2000,
                        customClass: 'swal-wide',
                        showConfirmButton: false,
                    });
                } else {
                    $.ajax({
                        type: "POST",
                        url: "../php/insertVideo.php",
                        data: {
                            idCurso: idCurso,
                            tituloV: tituloV,
                            objetivoV: objetivoV,
                            url: url,
                        },
                        success: function(data) {
                            document.getElementById("uVideo").reset();
                            Swal.fire({
                                type: 'success',
                                title: 'AFAC INFORMA',
                                text: 'Sus datos fueron guardados correctamente',
                                showConfirmButton: false,
                                timer: 2900,
                                customClass: 'swal-wide',
                                showConfirmButton: false,
                            });
                            setTimeout("location.href = 'e-learnning';", 2000);
                        }
                    });
                }

                return false;
            });
        });


        // REZIZE INPUT
        </script>
        <div class="control-sidebar-bg"></div>
    </div>

    <!-- page script -->

</body>

</html>