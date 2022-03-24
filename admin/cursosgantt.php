<!DOCTYPE html><?php include ("../conexion/conexion.php");

$sql = "SELECT gstIdlsc, gstTitlo,gstTipo FROM listacursos WHERE estado = 0";
$curso = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'INSTRUCTOR' AND estado = 0";
$instructor = mysqli_query($conexion,$sql);         

$sql = "SELECT gstIdper,gstNombr,gstApell,gstCargo FROM personal WHERE gstCargo = 'INSPECTOR' AND gstEvalu = 'SI' AND estado = 0 || gstCargo = 'DIRECTOR' AND estado = 0 ";
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
    <!-- <script src="https://code.highcharts.com/gantt/highcharts-gantt.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script> -->
    <link href="css/mobiscroll.javascript.min.css" rel="stylesheet" />
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
    .md-resource-details .mbsc-timeline-resource,
    .md-resource-details .mbsc-timeline-resource-col {
        width: 230px;
    }

    .md-resource-details .mbsc-timeline-resource-title {
        padding: 0;
        height: 100%;
    }

    .md-resource-details-cont {
        height: 100%;
        line-height: 50px;
    }

    .md-resource-details-name {
        height: 100%;
        display: inline-block;
        padding: 0 5px;
    }

    .md-resource-details-seats {
        border-left: 1px solid #ccc;
        width: 90px;
        height: 100%;
        float: right;
        padding: 0 5px;
    }

    @supports (overflow:clip) {
        .md-resource-details.mbsc-ltr .mbsc-schedule-event-inner {
            left: 230px;
        }

        .md-resource-details.mbsc-rtl .mbsc-schedule-event-inner {
            right: 230px;
        }
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
                    CURSOS PROGRAMADOS
                </h1>
            </section>

            <input name="prueba" id="prueba">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">

                                <div class="box-body" id="listCurso">
                                    <!--TODO AQUI VA-->
                                </div>

                                <div id="container"></div>
                                <div id="demo-resource-details"></div>
                            </div>

                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->



        </div>
        <script type="text/javascript" src="../js/encuestadatos.js"></script>
        </section>
    </div>
    </div>
    </div>
    </form>
    <!-- FIN EVALUACIÓN CURSO -->


    <!-- /.modal-content -->
    <!-- /.modal-dialog -->
    </form>
    <!-- /.content -->

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
    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="js/mobiscroll.javascript.min.js"></script>


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
    <script>
    //       // OPTIONS FOR THE GRAPHICS

    // Highcharts.setOptions({
    //     credits: {
    //         enabled: false
    //     },
    //     lang: {
    //         loading: 'Cargando...',
    //         months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
    //             'Octubre', 'Noviembre', 'Diciembre'
    //         ],
    //         weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    //         shortMonths: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nv', 'Dic'],
    //         exportButtonTitle: "Exportar",
    //         printButtonTitle: "Importar",
    //         rangeSelectorFrom: "Desde",
    //         rangeSelectorTo: "Hasta",
    //         rangeSelectorZoom: "Período",
    //         downloadPNG: 'Descargar imagen PNG',
    //         downloadJPEG: 'Descargar imagen JPEG',
    //         downloadPDF: 'Descargar imagen PDF',
    //         downloadSVG: 'Descargar imagen SVG',
    //         printChart: 'Imprimir',
    //         resetZoom: 'Reiniciar zoom',
    //         resetZoomTitle: 'Reiniciar zoom',
    //         thousandsSep: ",",
    //         decimalPoint: '.'
    //     },
    // });

    // var today = new Date(),
    //     day = 1000 * 60 * 60 * 24;
    // today.setUTCHours(0);
    // today.setUTCMinutes(0);
    // today.setUTCSeconds(0);
    // today.setUTCMilliseconds(0);
    // Highcharts.getJSON('../php/data.php', function(data) {
    //     let chart = Highcharts.ganttChart('container', {
    //         title: {
    //             text: 'CURSOS PROGRAMADOS HASTA LA FECHA'
    //         },

    //         yAxis: {
    //             uniqueNames: true
    //         },

    //         navigator: {
    //             enabled: false,
    //             liveRedraw: true,
    //             series: {
    //                 type: 'gantt',
    //                 pointPlacement: 0.5,
    //                 pointPadding: 0.25
    //             },
    //             yAxis: {
    //                 min: 0,
    //                 max: 3,
    //                 reversed: true,
    //                 categories: []
    //             }
    //         },
    //         scrollbar: {
    //             enabled: false
    //         },
    //         rangeSelector: {
    //             enabled: true,
    //             selected: 0
    //         },
    //         xAxis: [{
    //             currentDateIndicator: {
    //         width: 1,
    //         color: 'blue',
    //         label: {
    //             format: 'Ahora'
    //         }
    //     },
    //     // min: today.getTime() - (30 * day),
    //     // max: today.getTime() + (30 * day),
    //         }, {
    //             dateTimeLabelFormats: {
    //                 week: 'Sem %W'
    //             }
    //         }],
    //         // AQUI EMPIEZA LA CONFIGURACIÓN DE LOS DATOS
    //         series: [{
    //             name: 'Agencia Federal de Aviación Civil',
    //             data: data,
    //         }]

    //     });
    //     chart.xAxis[0].setExtremes(1609480800000, 1640930400000);
    //     let DATA = chart.series[0].data;
    //     for (let i = 0; i < DATA.length; i++) {
    //         // alert(i, new Date(DATA[i].x).toUTCString())
    //     }
    // });

    // NUEVO GANTT CONFIGURADO
    mobiscroll.setOptions({
        locale: mobiscroll.localeEs,
        theme: 'ios',
        themeVariant: 'light'
    });


    $(function() {
        <?php 
            $query2 = "SELECT *,COUNT(*) as prtcpnts FROM cursos INNER JOIN listacursos ON listacursos.gstIdlsc = cursos.idmstr WHERE cursos.estado = 0 GROUP by listacursos.gstTitlo,cursos.idmstr,cursos.idinst ORDER BY id_curso DESC ";
            $resultado2 = mysqli_query($conexion, $query2);
            while($data2 = mysqli_fetch_assoc($resultado2)){
                  $tipo = $data2['gstTipo'];
                  $nombre = $data2['gstTitlo'];
            }
        ?>
        var calendar = $('#demo-resource-details').mobiscroll().eventcalendar({
            view: {
                timeline: {
                    type: 'month'
                }
            },
            resources: [{
                "id": "INDUCCIÓN",
                "name": "INDUCCIÓN",
                "color": "rgba(0, 58, 146, 0.6)",
            },{
                "id": "BÁSICOS\/INICIAL",
                "name": "BÁSICOS\/INICIAL",
                "color": "rgba(0, 102, 255, 0.6)",
               
            },
            {
                "id": "TRANSVERSALES",
                "name": "TRANSVERSALES",
                "color": "#ff1717",
               
            },
            {
                "id": "RECURRENTES",
                "name": "RECURRENTES",
                "color": "#ff1717",
               
            },
            {
                "id": "ESPECÍFICOS",
                "name": "ESPECÍFICOS",
                "color": "#ff1717",
               
            }],
            renderResource: function(resource) {
                return '<div class="md-resource-details-cont">' +
                    '<div class="md-resource-details-name">' + resource.name + '</div>' +
                    '</div>';
            }
        }).mobiscroll('getInst');

        $.getJSON('../php/data.php', function(events) {
            calendar.setEvents(events);
        }, 'jsonp');
    });

    function listview(id) {
        alert(id);

    }
    </script>

</body>

</html>