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
    <title>Gestor inspectores | Programación</title>
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
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-gantt.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-data-adapter.min.js"></script>
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  <script src="https://cdn.anychart.com/releases/8.10.0/locales/es-es.js"></script>
  <script src="https://cdn.anychart.com/releases/8.10.0/themes/dark_provence.min.js"></script>
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
                            <div class="tab-content">

                                <div class="box-body" id="listCurso">
                                    <!--TODO AQUI VA--> 

                                    <!-- <div id="legend"></div> -->
                                    <!-- <div class="toolbar">
    
    <label for="startMonth">Selecciona mes: </label>
    
    <select name="startMonth" id="startMonth">
      
      <option value="1">Enero</option>
      
      <option value="2">Febrero</option>
      
      <option value="3">Marzo</option>
      
      <option value="4">Abril</option>
      
      <option value="5">Mayo</option>
      
      <option value="6">Junio</option>
      
      <option value="7">Julio</option>
      
      <option value="8">Agosto</option>
      
      <option value="9">Septiembre</option>
      
      <option value="10">Octubre</option>
      
      <option value="11">Noviembre</option>
      
      <option value="12">Diciembre</option>
    
    </select>
  
  </div> -->
                                    <div style="width: 96%; height: 400px;" id="container"></div>
                                </div>

                                <section class="content" id="viscurso">
                                 
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
            <b>Version</b> 1.1
        </div>
        <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong>
        Todos los derechos Reservados AJ.
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
    <!-- page script -->
    <script src="js/anychart-base.min.js"></script>
    <script src="js/anychart-ui.min.js"></script>
    <script src="js/anychart-exports.min.js"></script>
    <script src="js/anychart-gantt.min.js"></script>
    <script src="js/anychart-data-adapter.min.js"></script>
    <script>

anychart.onDocumentReady(function () {
    var locale = "es-mx";

    anychart.format.outputLocale('es-es');
  // create a data tree
  var treeData = anychart.data.tree(data, 'as-tree');

  // create a chart
  var chart = anychart.ganttProject();
  // set the data
  chart.data(treeData);

  // get chart data grid
  var dataGrid = chart.dataGrid();
  dataGrid.column(1).title('NOMBRE DEL CURSO').width(230);
  dataGrid.column(0).title('ITEM').width(60);

  // enable tooltip html mode
  dataGrid.tooltip().useHtml(true);

  chart.splitterPosition(303);

  // get chart's timeline
  var timeline = chart.getTimeline();

  //get chart's timeline milestones
  var milestones = timeline.milestones();

  // set default settings for the milestones
  // settings for other milestones was pre-setted in the data using "milestone" property
  milestones.markerType('square').fill('#96a6a6').stroke('#333');

  // set default tooltip's title formatter
  timeline.tooltip().titleFormat(function () {
    return '<h1 class="title default">' + this.name + '</h1>';
  });

  // set default tooltip's content formatter
  timeline
    .tooltip()
    .useHtml(true)
    .format(function () {
      return (
        '<div class="tooltip-content">\n' +
        '<p><b>Fecha de inicio</b>: ' +
        anychart.format.date(this.actualStart) +
        '</p>\n' +
        '<p><b> Fecha final</b>: ' +
        anychart.format.date(this.actualEnd) +
        '</p>\n' +
        '</div>'
      );
    });

  // set milestones tooltip's title formatter
  milestones
    .tooltip()
    .useHtml(true)
    .titleFormat(function () {
      var bgcolor = this.getData('milestone')
        ? this.getData('milestone').fill
        : '#96a6a6';
      return (
        '<h5 class="title" style="background: ' +
        bgcolor +
        '">' +
        this.name +
        '</h5>'
      );
    });

  // set milestones tooltip's content formatter
  milestones
    .tooltip()
    .useHtml(true)
    .format(function () {
      return (
        '<div class="tooltip-content"><p><b>Fecha de Inicio</b>: ' +
        anychart.format.date(this.actualStart) +
        '</p></div>'
      );
    });

  // enable milestones preview
  milestones.preview().enabled(true);

  // set the container id
  chart.container('container');

  // initiate drawing the chart
  chart.draw();

  chart.collapseAll();
  chart.expandTask('1');

  // set chart's initial zoom
  chart.zoomTo(Date.UTC(2019, 6, 1, 0), Date.UTC(2019, 6, 16, 0));

  // create gantt toolbar and render it in the container
  var toolbar = anychart.ui.ganttToolbar();
  toolbar.container('container');
  toolbar.target(chart);
  toolbar.draw();

  // set weekends fill color
  timeline.weekendsFill('red 0.2');

  // set holidays fill color
  timeline.holidaysFill('green 0.2');

  // get timeline calendar
  var calendar = timeline.scale().calendar();

  // set working hours  and holidays
  calendar
    .schedule([
      null,
      { from: 10, to: 18 },
      { from: 10, to: 18 },
      { from: 10, to: 18 },
      { from: 10, to: 18 },
      { from: 10, to: 18 },
      null
    ])
    .holidays([{ day: 4, month: 6, label: 'Independence Day' }]);

  // create and setup legend
 

  // draw legend
});

// create data
var data = [
  {
    id: '1',
    name: 'Inducción',
    actualStart: '2019-07-01',
    actualEnd: '2019-08-03',
    children: [
      {
        id: '1.1',
        name: 'A Distancia',
        actualStart: '2019-07-01',
        actualEnd: '2019-07-06',
        children: [
          {
            id: '1.1.1',
            name: 'Legislación Aeronáutica Internacional',
            actualStart: '2019-07-01',
            actualEnd: '2019-07-03'
          },
          {
            id: '1.1.2',
            name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
            actualStart: '2019-07-05',
            actualEnd: '2019-07-05',
            milestone: {
              enabled: true,
              markerType: 'pentagon',
              fill: '#64b5f6',
              stroke: '#666'
            }
          },
          {
            id: '1.1.3',
            name: 'Inducción a la AFAC',
            actualStart: '2019-07-06',
            milestone: {
              enabled: true,
              markerType: 'pentagon',
              fill: '#64b5f6',
              stroke: '#666'
            }
          }
        ]
      },
      {
        id: '1.2',
        name: 'Mixta (Semipresencial)',
        actualStart: '2019-07-07',
        actualEnd: '2019-07-11',
        children: [
          {
            id: '1.2.1',
            name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
            actualStart: '2019-07-07',
            actualEnd: '2019-07-10'
          },
          {
            id: '1.2.2',
            name: 'Legislación Aeronáutica Nacional',
            actualStart: '2019-07-11',
            milestone: {
              enabled: true,
              markerType: 'diamond',
              fill: '#ffd54f',
              stroke: '#666'
            }
          }
        ]
      },
      {
        id: '1.3',
        name: 'Autogestivo',
        actualStart: '2019-07-10',
        actualEnd: '2019-07-14',
        children: [
          {
            id: '1.3.1',
            name: 'Básico Inspector de Exámenes',
            actualStart: '2019-07-10',
            actualEnd: '2019-07-13'
          },
          {
            id: '1.3.2',
            name: 'Básico de Operaciones Tierra',
            actualStart: '2019-07-14',
            milestone: {
              enabled: true,
              markerType: 'diamond',
              fill: '#ffd54f',
              stroke: '#666'
            }
          }
        ]
      },
      
      
      
    ]
  },
  {
    id: '1',
    name: 'Básico/inicial',
    actualStart: '2019-07-01',
    actualEnd: '2019-08-03',
    children: [
      {
        id: '1.1',
        name: 'A Distancia',
        actualStart: '2019-07-01',
        actualEnd: '2019-07-06',
        children: [
          {
            id: '1.1.1',
            name: 'Legislación Aeronáutica Internacional',
            actualStart: '2019-07-01',
            actualEnd: '2019-07-03'
          },
          {
            id: '1.1.2',
            name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
            actualStart: '2019-07-05',
            actualEnd: '2019-07-05',
            milestone: {
              enabled: true,
              markerType: 'pentagon',
              fill: '#64b5f6',
              stroke: '#666'
            }
          },
          {
            id: '1.1.3',
            name: 'Inducción a la AFAC',
            actualStart: '2019-07-06',
            milestone: {
              enabled: true,
              markerType: 'pentagon',
              fill: '#64b5f6',
              stroke: '#666'
            }
          }
        ]
      },
      {
        id: '1.2',
        name: 'Mixta (Semipresencial)',
        actualStart: '2019-07-07',
        actualEnd: '2019-07-11',
        children: [
          {
            id: '1.2.1',
            name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
            actualStart: '2019-07-07',
            actualEnd: '2019-07-10'
          },
          {
            id: '1.2.2',
            name: 'Legislación Aeronáutica Nacional',
            actualStart: '2019-07-11',
            milestone: {
              enabled: true,
              markerType: 'diamond',
              fill: '#ffd54f',
              stroke: '#666'
            }
          }
        ]
      },
      {
        id: '1.3',
        name: 'Autogestivo',
        actualStart: '2019-07-10',
        actualEnd: '2019-07-14',
        children: [
          {
            id: '1.3.1',
            name: 'Básico Inspector de Exámenes',
            actualStart: '2019-07-10',
            actualEnd: '2019-07-13'
          },
          {
            id: '1.3.2',
            name: 'Básico de Operaciones Tierra',
            actualStart: '2019-07-14',
            milestone: {
              enabled: true,
              markerType: 'diamond',
              fill: '#ffd54f',
              stroke: '#666'
            }
          }
        ]
      },
      
      
      
    ]
  },
  {
    id: '1',
    name: 'Transversales',
    actualStart: '2019-07-01',
    actualEnd: '2019-08-03',
    children: [
      {
        id: '1.1',
        name: 'A Distancia',
        actualStart: '2019-07-01',
        actualEnd: '2019-07-06',
        children: [
          {
            id: '1.1.1',
            name: 'Legislación Aeronáutica Internacional',
            actualStart: '2019-07-01',
            actualEnd: '2019-07-03'
          },
          {
            id: '1.1.2',
            name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
            actualStart: '2019-07-05',
            actualEnd: '2019-07-05',
            milestone: {
              enabled: true,
              markerType: 'pentagon',
              fill: '#64b5f6',
              stroke: '#666'
            }
          },
          {
            id: '1.1.3',
            name: 'Inducción a la AFAC',
            actualStart: '2019-07-06',
            milestone: {
              enabled: true,
              markerType: 'pentagon',
              fill: '#64b5f6',
              stroke: '#666'
            }
          }
        ]
      },
      {
        id: '1.2',
        name: 'Mixta (Semipresencial)',
        actualStart: '2019-07-07',
        actualEnd: '2019-07-11',
        children: [
          {
            id: '1.2.1',
            name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
            actualStart: '2019-07-07',
            actualEnd: '2019-07-10'
          },
          {
            id: '1.2.2',
            name: 'Legislación Aeronáutica Nacional',
            actualStart: '2019-07-11',
            milestone: {
              enabled: true,
              markerType: 'diamond',
              fill: '#ffd54f',
              stroke: '#666'
            }
          }
        ]
      },
      {
        id: '1.3',
        name: 'Autogestivo',
        actualStart: '2019-07-10',
        actualEnd: '2019-07-14',
        children: [
          {
            id: '1.3.1',
            name: 'Básico Inspector de Exámenes',
            actualStart: '2019-07-10',
            actualEnd: '2019-07-13'
          },
          {
            id: '1.3.2',
            name: 'Básico de Operaciones Tierra',
            actualStart: '2019-07-14',
            milestone: {
              enabled: true,
              markerType: 'diamond',
              fill: '#ffd54f',
              stroke: '#666'
            }
          }
        ]
      },
      
      
      
    ]
  },
  {
    id: '1',
    name: 'Recurrentes',
    actualStart: '2019-07-01',
    actualEnd: '2019-08-03',
    children: [
      {
        id: '1.1',
        name: 'A Distancia',
        actualStart: '2019-07-01',
        actualEnd: '2019-07-06',
        children: [
          {
            id: '1.1.1',
            name: 'Legislación Aeronáutica Internacional',
            actualStart: '2019-07-01',
            actualEnd: '2019-07-03'
          },
          {
            id: '1.1.2',
            name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
            actualStart: '2019-07-05',
            actualEnd: '2019-07-05',
            milestone: {
              enabled: true,
              markerType: 'pentagon',
              fill: '#64b5f6',
              stroke: '#666'
            }
          },
          {
            id: '1.1.3',
            name: 'Inducción a la AFAC',
            actualStart: '2019-07-06',
            milestone: {
              enabled: true,
              markerType: 'pentagon',
              fill: '#64b5f6',
              stroke: '#666'
            }
          }
        ]
      },
      {
        id: '1.2',
        name: 'Mixta (Semipresencial)',
        actualStart: '2019-07-07',
        actualEnd: '2019-07-11',
        children: [
          {
            id: '1.2.1',
            name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
            actualStart: '2019-07-07',
            actualEnd: '2019-07-10'
          },
          {
            id: '1.2.2',
            name: 'Legislación Aeronáutica Nacional',
            actualStart: '2019-07-11',
            milestone: {
              enabled: true,
              markerType: 'diamond',
              fill: '#ffd54f',
              stroke: '#666'
            }
          }
        ]
      },
      {
        id: '1.3',
        name: 'Autogestivo',
        actualStart: '2019-07-10',
        actualEnd: '2019-07-14',
        children: [
          {
            id: '1.3.1',
            name: 'Básico Inspector de Exámenes',
            actualStart: '2019-07-10',
            actualEnd: '2019-07-13'
          },
          {
            id: '1.3.2',
            name: 'Básico de Operaciones Tierra',
            actualStart: '2019-07-14',
            milestone: {
              enabled: true,
              markerType: 'diamond',
              fill: '#ffd54f',
              stroke: '#666'
            }
          }
        ]
      },
      
      
      
    ]
  }
];

//SEGUNDO GANTT
// anychart.onDocumentReady(function () {
//       var locale = "es-mx";

//     anychart.format.outputLocale('es-es');
//       // The data used in this sample can be obtained from the CDN
//       // https://cdn.anychart.com/samples-data/gantt-general-features/fiscal-year/data.json
//       anychart.data.loadJsonFile(
//         'https://cdn.anychart.com/samples-data/gantt-general-features/fiscal-year/data.json',
//         function (data) {
//           // tree data settings
//           var treeData = anychart.data.tree(data, 'as-table');
          
//           // create gantt resource chart
//           var chart = anychart.ganttResource();
//           var dataGrid = chart.dataGrid();
//           dataGrid.column(1).title('NOMBRE').width(180);
//           dataGrid.column(0).title('ITEM').width(60);
//           // set splitter position
//           chart.splitterPosition(222);

//           // set chart data
//           chart.data(treeData);

//           // set container id for the chart
//           chart.container('container');

//           // initiate chart drawing
//           chart.draw();

//           // show all items
//           chart.fitAll();

//           document
//             .getElementById('startMonth')
//             .addEventListener('change', function (event) {
//               // set fiscal year start month
//               chart.xScale().fiscalYearStartMonth(event.target.value);
//             });
//         }
//       );
//     });
    </script>
</body>
</html>