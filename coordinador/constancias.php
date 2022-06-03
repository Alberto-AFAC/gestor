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
    <link rel="stylesheet" href="../dist/css/card.css">
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
                    HISTORIAL DE CONSTANCIAS, CERTIFICADOS Y DIPLOMAS.
                </h1>
            </section>
            <!-- Main content -->
            <form id="editarcons" action="" method="POST">
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div style="padding-top: 65px;" class="container box box-solid">
                            <ul class="nav nav-tabs" id="myNavTabs">
                                <li class="active"><a href="#navtabs1" data-toggle="tab">HISTORIAL</a>
                                <li><a href="#navtabs2" data-toggle="tab">VERIFICAR CADENA</a>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="navtabs1"> <br><br>
                                    <table id="data-table-ponderacion" class="table table-bordered" width="100%"
                                        cellspacing="0">
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="navtabs2"><br><br>
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                                      
                                        <label for="">INGRESE ID DE CERTIFICADO, CONSTANCIA Ó DIPLOMA.</label>
                                        <input class="form-control" type="text" name="validar" required><br>
                                        <input class="btn btn-info" type="submit" value="VALIDAR" name="submit">
                                    </form><br>
                                    <?php 
                                    if(isset($_POST['submit'])){
                                        $validar = base64_decode($_POST['validar']);
                                        echo "<img src='../dist/img/check.gif' style='display: block; margin-left: auto; margin-right: auto; width: 150px;'><br><center><span style='font-size: 24px; color: gray;'>{$validar}</span></center>";

                                    }
                                        ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.box -->
                    </div>
            </section>
            <div>

            </div>
            <!-- /.content -->
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
$query = "
SELECT
*
,DATE_FORMAT(reaccion.fechareac, '%d/%m/%Y') as reaccion
FROM
cursos
-- INNER JOIN constancias ON id_persona = idinsp
INNER JOIN personal ON idinsp = gstIdper
INNER JOIN reaccion ON cursos.id_curso = reaccion.id_curso
-- INNER JOIN listacursos ON idmstr = listacursos.gstIdlsc 
WHERE
proceso = 'Finalizado' 
AND confirmar = 'CONFIRMADO' 
AND evaluacion >= 70 
GROUP BY cursos.id_curso
";
$resultado = mysqli_query($conexion, $query);

      while($data = mysqli_fetch_array($resultado)){ 
       
       $idperson = $data['idinsp'];
       $idmstr = $data['idmstr'];
       $idcuro = $data['id_curso'];
       $codigo = $data['codigo'];
       $id_reac = $data['id_reac'];
       $fec_reac = $data['reaccion'];

       $query1 = "SELECT * FROM listacursos WHERE gstIdlsc = '$idmstr'";
        $resultado1 = mysqli_query($conexion, $query1);

        if($data1 = mysqli_fetch_assoc($resultado1)){
            $idlist = $data1['gstIdlsc'];
            $titulo = $data1['gstTitlo'];
        }


        $query2 = "SELECT * FROM constancias 
        WHERE id_persona = $idperson
        AND listregis = 'SI' 
        AND lisasisten = 'SI' 
        AND listreportein = 'SI' 
        AND cartdescrip = 'SI' 
        AND regponde = 'SI' 
        AND infinal = 'SI' 
        AND evreaccion = 'SI'
        ";
        $resultado2 = mysqli_query($conexion, $query2);

        if($data2 = mysqli_fetch_assoc($resultado2)){
            $constancia = $data2['id_codigocurso'];
            $id_persona = $data2['id_persona'];
        }else{
            $constancia = 'SIN CONST';
            $id_persona = 'SIN ID';
        }


       // $query3 = "SELECT *,DATE_FORMAT(reaccion.fechareac, '%d/%m/%Y') as reaccion FROM reaccion WHERE id_curso = '$idcuro'";
       //  $resultado3 = mysqli_query($conexion, $query3);

       //  // if($data3 = mysqli_fetch_assoc($resultado3)){
            // $id_reac = $data['id_reac'];
            // $fec_reac = $data['reaccion'];
        // }else{
        //     $id_reac = 'SIN FECHA';
        //     $fec_reac = 'NO HAY FECHA';

        // }        
       $encrypidpersona = base64_encode($id_persona);
       $encryidlist = base64_encode($idlist);     
      ?>


            ["<?php echo $id_reac ?>", 
                "<?php echo $data['gstNombr']." ".$data['gstApell']?>",
                "<?php echo $titulo ?>",//TODO AQUI VA
                "<?php echo "<a href='constancia.php?data={$encrypidpersona}&cod={$encryidlist} ' target='_blank' title='Dar clic para consultar' onclick='visualcon({$idcuro})'><center><img src='../dist/img/constancias.svg' width='30px;' alt='pdf'></center></a><span><center><span  data-toggle='modal' data-target='#correcionModal' style='cursor: pointer;' onclick='perfil({$idcuro})' class='btn-info badge'>REALIZAR CORRECIÓN</center></span>" ?>",


                "<?php echo $fec_reac ?>",
                "<?php echo $codigo?>"
            ],

            <?php  } ?>

        ];

        var tableGenerarReporte = $('#data-table-ponderacion').DataTable({
            "language": {
                "searchPlaceholder": "Buscar datos...",
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            },
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
                    title: "PARTICIPANTE"
                },
                {
                    title: "CURSO"
                },
                {
                    title: "DOCUMENTO"
                },
                {
                    title: "FECHA DE GENERACIÓN"
                },
                {
                    title: "FOLIO DEL CURSO"
                }

            ]
        });
        </script>
        
        
    <div class="control-sidebar-bg"></div>
    </div>

    
    <!-- <div class="modal fade" id="correcionModal" tabindex="-1" role="dialog" aria-labelledby="correcionModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-size: 20px;" class="modal-title" id="correcionModalLabel">CORRECIÓN DE CONSTANCIAS Y
                        CERTIFICADOS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    * SI REQUIERE HACER UN CAMBIO EN EL <u>NOMBRE DEL PARTICIPANTE</u> ES IMPORTANTE QUE ACUDA AL AREA
                    DE <span style="font-weight: bold;">RECURSOS HUMANOS</span><br><br>
                    * TOME EN CUENTA QUE EL SISTEMA AUTOMATIZA LOS DATOS EN LA GENERACIÓN DE LA CONSTANCIA Y/O
                    CERTIFICADOS POR LO QUE UNICAMENTE PUEDE REALIZAR CAMBIOS EN EL TEMARIO.<br><br>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="table-responsive">
                                <div id="temariotab"></div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">CERRAR</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- page script -->

    <!-- CONFIRMACIÓN ENVIÓ DE INVITACIÓN A PARTICIPANTES-->
    <form id="editarcons" action="" method="POST">
                <div class="modal fade" id='correcionModal' tabindex="-1" role="dialog" aria-labelledby="correcionModalLabel" aria-hidden="true">  
                    <div class="modal2" style="width:750px;">
                        <div id="success-icon">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                            <div>
                                <img class="img-circle1" src="../dist/img/lapiz.png">
                            </div>
                        </div>

                        <h5 style="font-size: 20px;" class="modal-title" id="correcionModalLabel">CORRECIÓN DE CONSTANCIAS Y CERTIFICADOS</h5>
                        <div class="modal-body" style="text-align:left; font-size:16px;">
                        <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="!">!</span> SI REQUIERE HACER UN CAMBIO EN EL <u>NOMBRE DEL PARTICIPANTE</u> ES IMPORTANTE QUE ACUDA AL AREA DE <span style="font-weight: bold;">RECURSOS HUMANOS.</span><br><br>
                        <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="!">!</span> TOME EN CUENTA QUE EL SISTEMA AUTOMATIZA LOS DATOS EN LA GENERACIÓN DE LA CONSTANCIA Y/O CERTIFICADOS POR LO QUE UNICAMENTE PUEDE REALIZAR CAMBIOS EN EL TEMARIO.<br><br>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="table-responsive">
                                   <div id="temariotab"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">CERRAR</button>
                        </div>
                    </div>
                </div>
                               
            </form>
    <!-- page script -->


</body>

</html>

<script>
function perfil(id) {
    $.ajax({
        url: '../php/temario.php',
        type: 'POST'
    }).done(function(resp) {

        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        html =
            '<table class="table table-bordered"><tr><th style="width: 10px">#</th><th>TITULO</th>';


        for (i = 0; i < res.length; i++) {
            x++;
            if (obj.data[i].idcurso == id) {
                html += "<tr><td>" + x + "</td><td style='width: 75%;'>" + obj.data[i].titulo + "</td></tr>";
            }
        }
        html += '</table>';
        $("#temariotab").html(html);
    })
}


function visualcon(idcur){
    // alert(idcur);
    var curso_id=idcur
    //alert(curso_id);
    
    var datos= 'curso_id=' + curso_id + '&opcion=descarga';
   // alert(datos);
    $.ajax({
        type:'POST',
        url: '../php/visulcons.php',
        data:datos
    }).done(function(respuesta) {
        if (respuesta==0){
           // alert("funciono bien");

        }else{
            //alert("no funciona suerte");
        }
    })
}

</script>